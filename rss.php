<?php
// URL del feed RSS de El Periódico de Aragón (asegúrate de que esta URL sea válida)
$rss_url = "https://www.elperiodicodearagon.com/rss";

// Cargar el contenido del feed RSS
$rss_feed = simplexml_load_file($rss_url);

// Verificar si se cargó correctamente
if ($rss_feed) {
    echo "<h1>" . $rss_feed->channel->title . "</h1>";

    echo "<ul>";
    // Recorrer los elementos del RSS
    foreach ($rss_feed->channel->item as $item) {
        echo "<li>";
        echo "<a href='" . $item->link . "' target='_blank'>" . $item->title . "</a><br>";
        echo "<small>Publicado el: " . date('d-m-Y H:i', strtotime($item->pubDate)) . "</small><br>";
        echo "<p>" . $item->description . "</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "No se pudo cargar el feed RSS.";
}
