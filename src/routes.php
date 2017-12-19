<?php

use Slim\Http\Request;
use Slim\Http\Response;

use Bold\Stats;
use Bold\BookStatsData;
use Bold\Book\BookRepository;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {

    $repository = new BookRepository($this['db']);

    //stats 1
    $stats = new Stats($repository, new BookStatsData());
    $results1 = $stats->showStatistics('ZieLoNa MiLa|age>30');
    $results1->sortData('compatibility');

    //stats 2
    $stats = new Stats($repository, new BookStatsData());
    $results2 = $stats->showStatistics('ZiElonA Droga|age<30');
    $results2->sortData('compatibility');

    return $this->renderer->render($response, 'index.phtml', [
        'stats' => [
            'results1' => $results1,
            'results2' => $results2
        ]
    ]);
});
