<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Definir la URL base para el proyecto
const BASE_URL = "https://www.uvenergiasolar.com.ar/";

// Establecer la zona horaria por defecto para Argentina (Tucumán)
date_default_timezone_set('America/Argentina/Tucuman');

// Datos de conexión a la base de datos (DonWeb)
const DB_HOST = "localhost";
const DB_NAME = "c2162521_uvsolar";
const DB_USER = "c2162521_uvsolar";
const DB_PASSWORD = "83neteGIfa";
const DB_CHARSET = 'utf8';

// Delimitadores y moneda
const SPD = ","; // Separador decimal
const SPM = "."; // Separador de miles
const SMONEY = "ARS"; // Símbolo de moneda
?>