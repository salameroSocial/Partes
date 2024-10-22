<?php
function obtenerEnlaces($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($ch);

    // Verifica si hubo un error con la solicitud cURL
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch) . "\n";
        curl_close($ch);
        return [];
    }

    curl_close($ch);

    // Verifica si el contenido está vacío
    if (empty($html)) {
        echo "No se pudo obtener el contenido de $url\n";
        return [];
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    $enlaces = $xpath->query("//a/@href");
    $resultados = [];

    foreach ($enlaces as $enlace) {
        $href = $enlace->nodeValue;
        if (!in_array($href, $resultados)) {
            $resultados[] = $href;
            // echo $href . "\n";
        }
    }

    return $resultados;
}


$urls = [
    "https://artesaniaaudio.com/about-us/",
    "https://artesaniaaudio.com/technology/",
    "https://artesaniaaudio.com/products/classic-line/",
    "https://artesaniaaudio.com/products/organic-line/",
    "https://artesaniaaudio.com/products/new-products/",
    "https://artesaniaaudio.com/videos/",
    "https://artesaniaaudio.com/gallery/",
    "https://artesaniaaudio.com/sales/",
    "https://artesaniaaudio.com/reviews/",
    "https://artesaniaaudio.com/support/",
    "https://artesaniaaudio.com/warranty/",
    "https://es-es.facebook.com/artesaniaaudio/",
];

$todosEnlaces = [];

foreach ($urls as $url) {
    $enlaces = obtenerEnlaces($url);
    $todosEnlaces = array_merge($todosEnlaces, $enlaces);
}

// Si deseas ver todos los enlaces únicos recopilados
print_r(array_unique($todosEnlaces));
