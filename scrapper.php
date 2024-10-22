<?php
function obtenerEnlaces($url, &$todosEnlaces)
{
    static $vistos = [];

    if (isset($vistos[$url]) || count($todosEnlaces) > 1000) { // Límite para evitar bucles infinitos
        return;
    }

    $vistos[$url] = true;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($ch);
    curl_close($ch);

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    $enlaces = $xpath->query("//a/@href");

    foreach ($enlaces as $enlace) {
        $href = $enlace->nodeValue;
        if (!in_array($href, $todosEnlaces) && strpos($href, 'http') === 0) { // Asegura que es un enlace completo
            echo $href . "\n";
            $todosEnlaces[] = $href;
            obtenerEnlaces($href, $todosEnlaces); // Recursividad para seguir los enlaces
        }
    }
}

$todosEnlaces = [];
$urlInicial = "https://artesaniaaudio.com/"; // URL inicial
obtenerEnlaces($urlInicial, $todosEnlaces);
