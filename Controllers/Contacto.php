<?php

class Contacto extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    // Método principal
    public function index()
    {
        $data['page_title'] = "Contacto | UV Energía Solar";
        $data['page_name'] = "contacto";
        $data['page_description'] = "Comunicate con UV Energía Solar. Pedí tu presupuesto para paneles solares en Tucumán.";

        // CORRECCIÓN: Ahora cargamos la vista específica de contacto
        $this->views->getView($this, "Contacto/contacto", $data);
    }

    // Método para procesar el envío (Backend)
    public function enviarMensaje()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // 1. Limpieza de datos
            $nombre = isset($_POST['nombre']) ? strClean($_POST['nombre']) : '';
            $empresa = isset($_POST['empresa']) ? strClean($_POST['empresa']) : '';
            $correo = isset($_POST['correo']) ? strClean($_POST['correo']) : '';
            $telefono = isset($_POST['telefono']) ? strClean($_POST['telefono']) : '';
            $asunto = isset($_POST['asunto']) ? strClean($_POST['asunto']) : '';
            $mensaje = isset($_POST['mensaje']) ? strClean($_POST['mensaje']) : '';

            // 2. Validaciones backend
            if (empty($nombre) || empty($correo) || empty($mensaje)) {
                echo json_encode(['status' => false, 'msg' => 'Por favor, completá los campos obligatorios.']);
                die();
            }

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['status' => false, 'msg' => 'El correo electrónico no es válido.']);
                die();
            }

            // 3. Preparar correo
            $destinatario = "info@uvenergiasolar.com.ar"; // ¡Asegurate que este email exista!
            $asuntoCorreo = "Nuevo contacto web: " . $asunto;

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";
            $headers .= "From: Web UV Solar <no-reply@uvenergiasolar.com.ar>\r\n";
            $headers .= "Reply-To: $correo\r\n";

            // Plantilla HTML del correo
            $cuerpoMensaje = "
            <html>
            <body style='font-family: Arial, sans-serif;'>
                <h2 style='color: #16a34a;'>Nuevo Mensaje de Contacto</h2>
                <p><strong>Nombre:</strong> {$nombre}</p>
                <p><strong>Empresa:</strong> {$empresa}</p>
                <p><strong>Correo:</strong> {$correo}</p>
                <p><strong>Teléfono:</strong> {$telefono}</p>
                <p><strong>Asunto:</strong> {$asunto}</p>
                <hr>
                <p><strong>Mensaje:</strong><br>{$mensaje}</p>
            </body>
            </html>";

            // 4. Enviar
            // Nota: En local (XAMPP) esto puede fallar si no tienes configurado SMTP. 
            // En hosting real funcionará bien.
            $envio = @mail($destinatario, $asuntoCorreo, $cuerpoMensaje, $headers);

            if ($envio) {
                echo json_encode(['status' => true, 'msg' => '¡Mensaje enviado! Nos contactaremos a la brevedad.']);
            } else {
                echo json_encode(['status' => false, 'msg' => 'Error al enviar. Por favor escribinos por WhatsApp.']);
            }
            die();
        }
    }
}