<?php
// Coordenadas de Fuenlabrada
$latitude = 40.2902;
$longitude = -3.7941;

// URL de la API de Open-Meteo
$api_url = "https://api.open-meteo.com/v1/forecast?latitude=$latitude&longitude=$longitude&daily=temperature_2m_max,temperature_2m_min,precipitation_sum&timezone=Europe/Madrid";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Decodificar la respuesta JSON
$data = json_decode($response, true);

// Verificar si  fue exitosa
if ($data && isset($data['daily'])) {
    // Acceder a los datos 
    foreach ($data['daily']['time'] as $index => $date) {
        echo 'Fecha: ' . $date . "\n";
        echo 'Temperatura máxima: ' . $data['daily']['temperature_2m_max'][$index] . "°C\n";
        echo 'Temperatura mínima: ' . $data['daily']['temperature_2m_min'][$index] . "°C\n";
    }
} else {
    echo "Error al obtener los datos de la API.";
}
