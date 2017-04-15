<?php

require_once 'inc/configuration.php';
require_once 'vendor/autoload.php';
/*
  use \Slim\Slim;
  $app = new Slim();
 */
$app = new \Slim\Slim();

$app->get('/', function() {
    require_once 'view/index.php';
});

$app->get('/videos', function() {
    require_once 'view/videos.php';
});

$app->get('/shop', function() {
    require_once 'view/shop.php';
});

$app->get('/produtos', function() {
    $sql = new Sql();
    $data = $sql->select(
            "SELECT * FROM tb_produtos 
        WHERE preco_promorcional > 0 
        ORDER BY preco_promorcional DESC LIMIT 3"
    );

    foreach ($data as &$produto) {
        $preco = $produto['preco'];
        $centavos = explode(".", $preco);
        $produto['preco'] = number_format($preco, 0, ",", ".");
        $produto['centavos'] = end($centavos);
        $produto['parcelas'] = 10;
        $produto['parcela'] = number_format($preco / $produto['parcelas'], 2, ",", ".");
        $produto['total'] = number_format($preco, 2, ",", ".");
    }

    echo json_encode($data);
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});

$app->run();
