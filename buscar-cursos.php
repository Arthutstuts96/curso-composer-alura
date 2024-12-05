<?php
require 'vendor/autoload.php';

use Arthutstuts96\BuscadorCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

    $cliente = new Client(['verify' => false]);
    $crawler = new Crawler();

    $buscador = new Buscador($cliente, $crawler);
    $cursos = $buscador->buscar('https://www.alura.com.br/cursos-online-programacao/php');

    foreach($cursos as $curso){
        echo $curso . "\n";
    }

