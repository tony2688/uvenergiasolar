/**
 * --------------------------------------------------------------------------
 * Calculadora Solar & FAQ Dinámico - UV Energía Solar
 * --------------------------------------------------------------------------
 * @description Lógica para el cálculo de sistemas fotovoltaicos, generación
 * de gráficos y gestión de preguntas frecuentes.
 * @version 2.0.0 (Senior Refactor)
 */

document.addEventListener("DOMContentLoaded", () => {

  // ==========================================
  // 1. VARIABLES Y SELECTORES GLOBALES
  // ==========================================
  const DOM = {
    tipoIngreso: document.getElementById("tipoIngreso"),
    formFactura: document.getElementById("formFactura"),
    formElectro: document.getElementById("formElectro"),
    resultados: document.getElementById("resultados"),
    tablaElectro: document.getElementById("tablaElectro"),
    btnCalcular: document.getElementById("btnCalcular"),
    btnPDF: document.getElementById("btnDescargarPDF"),
    selectElectro: document.getElementById("selectElectro"),
    loader: document.getElementById("loader"), // Asegúrate de tener este ID en tu HTML o crear un div hidden
    faqContainer: document.getElementById("faqContainer")
  };

  // Validar existencia de elementos críticos
  if (!DOM.btnCalcular || !DOM.resultados) return;

  let chartInstance = null;

  // Configuración de Tarifas y Constantes (Fácil de actualizar)
  const CONFIG = {
    tarifaBase: 50, // $/kWh estimado si no hay factura
    horasSol: {
      norte: 5.5,
      centro: 4.5,
      sur: 3.5
    },
    equipos: {
      panelPotencia: 0.45, // kW (450W)
      bateriaCapacidad: 3, // kWh
      inversorPotencia: 3  // kW
    }
  };

  // ==========================================
  // 2. INICIALIZACIÓN DE DATOS
  // ==========================================

  // Catálogo de electrodomésticos
  const electrodomesticosAR = [
    { nombre: "Heladera con freezer", potencia: 300 },
    { nombre: "Aire Acondicionado (2500W)", potencia: 1500 },
    { nombre: "Lavarropas Automático", potencia: 500 },
    { nombre: 'Televisor LED 43"', potencia: 80 },
    { nombre: "Cargador celular", potencia: 10 },
    { nombre: "Notebook / PC", potencia: 200 },
    { nombre: "Iluminación LED (x1)", potencia: 10 },
    { nombre: "Pava Eléctrica", potencia: 2000 },
    { nombre: "Microondas", potencia: 800 },
  ];

  // Cargar opciones en el select
  if (DOM.selectElectro) {
    electrodomesticosAR.forEach((e) => {
      const option = document.createElement("option");
      option.value = e.potencia;
      option.textContent = `${e.nombre} (${e.potencia}W)`;
      DOM.selectElectro.appendChild(option);
    });
  }

  // Cargar FAQ dinámico
  cargarFAQ();

  // Recuperar datos guardados (Persistencia)
  cargarFilas();

  // ==========================================
  // 3. LISTENERS DE EVENTOS
  // ==========================================

  // Cambio de electrodoméstico en lista
  DOM.selectElectro?.addEventListener("change", function () {
    const potencia = parseFloat(this.value);
    if (potencia) agregarFila(potencia, 2, 30, 1);
    this.selectedIndex = 0;
    guardarFilas();
  });

  // Toggle entre Factura vs Electrodomésticos
  DOM.tipoIngreso?.addEventListener("change", () => {
    const esElectro = DOM.tipoIngreso.value === "electrodomesticos";
    DOM.formElectro.classList.toggle("hidden", !esElectro);
    DOM.formFactura.classList.toggle("hidden", esElectro);
    DOM.resultados.classList.add("hidden");
  });

  // Botón Calcular
  DOM.btnCalcular.addEventListener("click", (e) => {
    e.preventDefault();
    manejarCalculo();
  });

  // Botón PDF (Nueva Funcionalidad)
  if (DOM.btnPDF) {
    DOM.btnPDF.addEventListener("click", () => {
      window.print(); // Abre el diálogo de impresión nativo (El CSS se encarga del resto)
    });
  }

  // ==========================================
  // 4. LÓGICA DE NEGOCIO (CÁLCULOS)
  // ==========================================

  function manejarCalculo() {
    mostrarLoader(true);

    // Simulamos procesamiento asíncrono para UX
    setTimeout(() => {
      let consumo = 0;
      let ubicacion = "centro";

      try {
        if (DOM.tipoIngreso.value === "factura") {
          consumo = parseFloat(document.getElementById("txtConsumoFactura").value) || 0;
          const frecuencia = document.getElementById("frecuencia").value;
          ubicacion = document.getElementById("listUbicacionFactura").value;

          // Si el usuario puso consumo bimestral, lo dividimos
          if (frecuencia === "bimestral") consumo = consumo / 2;

        } else {
          // Cálculo por electrodomésticos
          ubicacion = document.getElementById("listUbicacionElectro").value;
          document.querySelectorAll(".filaElectro").forEach((row) => {
            const p = parseFloat(row.querySelector(".potencia").value) || 0;
            const h = parseFloat(row.querySelector(".horas").value) || 0;
            const d = parseFloat(row.querySelector(".dias").value) || 0;
            const c = parseInt(row.querySelector(".cantidad").value) || 0;
            consumo += (p * h * d * c) / 1000; // Wh a kWh
          });
        }

        if (consumo <= 0) {
          mostrarLoader(false);
          Swal.fire('Atención', 'Por favor ingresá valores de consumo válidos mayor a 0.', 'warning');
          return;
        }

        const resultado = calcularSistemaSolar(consumo, ubicacion);
        actualizarLinkWhatsApp(resultado);
        mostrarResultados();
        mostrarLoader(false);

        // Scroll suave hacia resultados
        DOM.resultados.scrollIntoView({ behavior: 'smooth' });

      } catch (error) {
        console.error("Error en cálculo:", error);
        mostrarLoader(false);
      }
    }, 800);
  }

  function calcularSistemaSolar(consumo, ubicacion) {
    // Obtener horas sol según ubicación (default centro)
    const horasSol = CONFIG.horasSol[ubicacion] || CONFIG.horasSol.centro;

    const factorPerdidas = 1.3; // Factor de seguridad (Senior: siempre sobredimensionar un poco)

    // Fórmulas
    const generacionDiariaRequerida = consumo / 30; // kWh/día
    const potenciaRecomendada = (generacionDiariaRequerida / horasSol) * factorPerdidas;
    const generacionMensualEstimada = potenciaRecomendada * horasSol * 30; // Lo que va a generar el sistema

    // Dimensionamiento de equipos
    const cantidadPaneles = Math.ceil(potenciaRecomendada / CONFIG.equipos.panelPotencia);

    // Baterías: Estimamos autonomía para el 50% del consumo diario
    const energiaBaterias = generacionDiariaRequerida * 0.5;
    const cantidadBaterias = Math.ceil(energiaBaterias / CONFIG.equipos.bateriaCapacidad);

    const cantidadInversores = Math.ceil(potenciaRecomendada / CONFIG.equipos.inversorPotencia);

    // Renderizar en el DOM
    renderText("potencia", `${potenciaRecomendada.toFixed(2)} kWp`);
    renderText("generacion", `${Math.round(generacionMensualEstimada)} kWh/mes`);
    renderText("paneles", `${cantidadPaneles} unid. (450W)`);
    renderText("baterias", `${cantidadBaterias} unid. (3kWh)`);
    renderText("inversores", `${cantidadInversores} unid. (3kW)`);

    const datos = {
      potencia: potenciaRecomendada,
      generacion: generacionMensualEstimada,
      paneles: cantidadPaneles,
      baterias: cantidadBaterias,
      inversores: cantidadInversores
    };

    actualizarGrafico(datos);
    return datos;
  }

  // ==========================================
  // 5. GRÁFICOS Y UTILIDADES VISUALES
  // ==========================================

  function actualizarGrafico(datos) {
    const canvas = document.getElementById("graficoSolar");
    if (!canvas) return;

    const ctx = canvas.getContext("2d");

    // Destruir anterior si existe
    if (chartInstance) chartInstance.destroy();

    // Verificar si Chart.js está cargado
    if (typeof Chart === 'undefined') {
      console.warn("Librería Chart.js no encontrada.");
      return;
    }

    chartInstance = new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Potencia (kW)", "Generación (kWh)", "Paneles (u)", "Baterías (u)", "Inversores (u)"],
        datasets: [{
          label: "Dimensionamiento del Sistema",
          data: [
            datos.potencia.toFixed(2),
            datos.generacion.toFixed(0),
            datos.paneles,
            datos.baterias,
            datos.inversores
          ],
          backgroundColor: [
            "#3B82F6", // Azul
            "#10B981", // Verde (Generación)
            "#F59E0B", // Naranja (Paneles)
            "#EF4444", // Rojo (Baterías)
            "#6366F1"  // Indigo (Inversores)
          ],
          borderRadius: 5
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: function (context) {
                return context.raw + ' unidades/valor';
              }
            }
          }
        },
        scales: {
          y: { beginAtZero: true, grid: { color: '#e5e7eb' } },
          x: { grid: { display: false } }
        }
      }
    });
  }

  // ==========================================
  // 6. FUNCIONES DE FAQ Y UTILITARIOS
  // ==========================================

  function cargarFAQ() {
    if (!DOM.faqContainer) return;

    const faqs = [
      { p: "¿Qué necesito saber antes de instalar?", r: "Conocer tu consumo mensual (en tu factura de luz) y la ubicación geográfica aproximada." },
      { p: "¿Funciona en días nublados?", r: "Sí, los paneles siguen generando energía con radiación difusa, aunque a menor potencia (aprox 20-30%)." },
      { p: "¿Cuánto cuesta el mantenimiento?", r: "Es mínimo. Solo requieren limpieza de la superficie de los paneles 2 o 3 veces al año." },
      { p: "¿Tienen garantía?", r: "Sí, los paneles tienen 25 años de garantía de rendimiento y los inversores 5 a 10 años." }
    ];

    DOM.faqContainer.innerHTML = ''; // Limpiar

    faqs.forEach((item) => {
      const div = document.createElement("div");
      div.className = "border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden mb-2";
      div.innerHTML = `
                <button class="w-full px-5 py-4 text-left flex justify-between items-center bg-white dark:bg-gray-800 text-gray-800 dark:text-white font-medium hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200" onclick="toggleFAQ(this)">
                    <span>${item.p}</span>
                    <i class="fas fa-chevron-down text-green-500 transition-transform duration-300 transform"></i>
                </button>
                <div class="hidden px-5 py-4 bg-gray-50 dark:bg-gray-750 text-gray-600 dark:text-gray-300 border-t border-gray-100 dark:border-gray-700 text-sm leading-relaxed">
                    ${item.r}
                </div>
            `;
      DOM.faqContainer.appendChild(div);
    });
  }

  // ==========================================
  // 7. FUNCIONES AUXILIARES GLOBALES
  // ==========================================

  // Exponer funciones necesarias para el HTML onclick (aunque lo ideal sería addEventListener)
  window.agregarFila = (potencia = "", horas = "", dias = "", cantidad = "") => {
    const fila = document.createElement("div");
    fila.className = "grid grid-cols-5 gap-2 filaElectro mb-2 items-center animate-fade-in";
    fila.innerHTML = `
          <div class="relative"><input type="number" value="${potencia}" class="potencia form-input-calculadora" placeholder="W"><span class="unit-label">W</span></div>
          <div class="relative"><input type="number" value="${horas}" class="horas form-input-calculadora" placeholder="h"><span class="unit-label">h</span></div>
          <div class="relative"><input type="number" value="${dias}" class="dias form-input-calculadora" placeholder="d"><span class="unit-label">d</span></div>
          <div class="relative"><input type="number" value="${cantidad}" class="cantidad form-input-calculadora" placeholder="u"><span class="unit-label">u</span></div>
          <button type="button" class="text-red-500 hover:text-red-700 transition" onclick="this.parentElement.remove(); guardarFilas()"><i class="fas fa-trash"></i></button>
        `;

    // Aplicar estilos de inputs dinámicamente o por clase CSS (definida abajo en footer o CSS)
    fila.querySelectorAll('input').forEach(i => {
      i.className = "w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md text-sm px-2 py-2 focus:ring-green-500 focus:border-green-500";
      i.addEventListener("input", guardarFilas);
    });

    DOM.tablaElectro.appendChild(fila);
    guardarFilas();
  };

  window.guardarFilas = () => {
    const datos = [];
    document.querySelectorAll(".filaElectro").forEach((row) => {
      datos.push({
        potencia: row.querySelector(".potencia").value,
        horas: row.querySelector(".horas").value,
        dias: row.querySelector(".dias").value,
        cantidad: row.querySelector(".cantidad").value,
      });
    });
    localStorage.setItem("electrodomesticos_v2", JSON.stringify(datos));
  };

  window.limpiarFilas = () => {
    DOM.tablaElectro.innerHTML = "";
    localStorage.removeItem("electrodomesticos_v2");
  };

  // Función global para el FAQ (llamada desde el HTML generado)
  window.toggleFAQ = (btn) => {
    const content = btn.nextElementSibling;
    const icon = btn.querySelector('i');

    // Toggle clases
    if (content.classList.contains('hidden')) {
      content.classList.remove('hidden');
      icon.classList.add('rotate-180');
    } else {
      content.classList.add('hidden');
      icon.classList.remove('rotate-180');
    }
  };

  // Internas
  function cargarFilas() {
    if (!DOM.tablaElectro) return;
    const datos = JSON.parse(localStorage.getItem("electrodomesticos_v2")) || [];
    datos.forEach((d) => agregarFila(d.potencia, d.horas, d.dias, d.cantidad));
  }

  function actualizarLinkWhatsApp(data) {
    const btn = document.querySelector("a[href*='wa.me']");
    if (!btn) return;

    const texto = `Hola UV Energía Solar! ☀️%0A` +
      `Hice una simulación web y este es mi resultado:%0A` +
      `⚡ Potencia: *${data.potencia.toFixed(2)} kW*%0A` +
      `🔋 Paneles sugeridos: *${data.paneles}*%0A` +
      `Quiero asesoramiento personalizado.`;

    btn.href = `https://wa.me/5493865586322?text=${texto}`;
  }

  function mostrarLoader(show) {
    if (!DOM.loader) return;
    if (show) DOM.loader.classList.remove("hidden");
    else DOM.loader.classList.add("hidden");
  }

  function mostrarResultados() {
    DOM.resultados.classList.remove("hidden");
    DOM.resultados.classList.add("animate-fade-in-up");
  }

  function renderText(id, text) {
    const el = document.getElementById(id);
    if (el) el.innerText = text;
  }

}); // Fin DOMContentLoaded