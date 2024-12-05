<?php
namespace Arthutstuts96\BuscadorCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador{
    private $cliente;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler){
        $this->cliente = $httpClient;
        $this->crawler = $crawler;
    }
    public function buscar(string $url): array{
        $resposta = $this->cliente->request('GET', $url);
        $html = $resposta->getBody();

        $this->crawler->addHtmlContent($html);

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach($elementosCursos as $elemento){
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}

// Eventos composer 
// https://getcomposer.org/doc/articles/scripts.md