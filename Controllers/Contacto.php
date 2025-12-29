<?php

class Contacto extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    // Método principal que carga la vista de contacto
    public function index()
    {
        $data['page_title'] = "Contacto - UV Energía Solar";
        $data['page_name'] = "Contacto";
        $data['page_description'] = "Formulario de contacto de UV Energía Solar";
        
        // Carga la vista home que contiene el formulario de contacto
        $this->views->getView($this, "home", $data);
    }

    // Método para procesar el envío del formulario de contacto
    public function enviarMensaje()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Limpiar y validar datos del formulario
            $nombre = isset($_POST['nombre']) ? strClean($_POST['nombre']) : '';
            $empresa = isset($_POST['empresa']) ? strClean($_POST['empresa']) : '';
            $correo = isset($_POST['correo']) ? strClean($_POST['correo']) : '';
            $telefono = isset($_POST['telefono']) ? strClean($_POST['telefono']) : '';
            $asunto = isset($_POST['asunto']) ? strClean($_POST['asunto']) : '';
            $mensaje = isset($_POST['mensaje']) ? strClean($_POST['mensaje']) : '';
            
            // Validar que los campos obligatorios no estén vacíos
            if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
                $arrResponse = array(
                    'status' => false,
                    'msg' => 'Por favor, complete todos los campos obligatorios.'
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }
            
            // Validar formato de correo electrónico
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $arrResponse = array(
                    'status' => false,
                    'msg' => 'El correo electrónico no es válido.'
                );
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
                die();
            }
            
            // Destinatario del correo
            $destinatario = "info@uvenergiasolar.com.ar";
            
            // Asunto del correo
            $asuntoCorreo = "Contacto desde sitio web: " . $asunto;
            
            // Cabeceras del correo
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: {$nombre} <{$correo}>" . "\r\n";
            
            // Cuerpo del mensaje
            $cuerpoMensaje = "<html><body>";
            $cuerpoMensaje .= "<h2>Mensaje de contacto desde el sitio web</h2>";
            $cuerpoMensaje .= "<p><strong>Nombre:</strong> {$nombre}</p>";
            if (!empty($empresa)) {
                $cuerpoMensaje .= "<p><strong>Empresa:</strong> {$empresa}</p>";
            }
            $cuerpoMensaje .= "<p><strong>Correo:</strong> {$correo}</p>";
            if (!empty($telefono)) {
                $cuerpoMensaje .= "<p><strong>Teléfono:</strong> {$telefono}</p>";
            }
            $cuerpoMensaje .= "<p><strong>Asunto:</strong> {$asunto}</p>";
            $cuerpoMensaje .= "<p><strong>Mensaje:</strong></p>";
            $cuerpoMensaje .= "<p>{$mensaje}</p>";
            $cuerpoMensaje .= "</body></html>";
            
            // Enviar el correo
            $envio = mail($destinatario, $asuntoCorreo, $cuerpoMensaje, $headers);
            
            if ($envio) {
                $arrResponse = array(
                    'status' => true,
                    'msg' => 'Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.'
                );
            } else {
                $arrResponse = array(
                    'status' => false,
                    'msg' => 'Error al enviar el mensaje. Por favor, intente nuevamente o contáctenos directamente por teléfono.'
                );
            }
            
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}