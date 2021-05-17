<?php
declare(strict_types = 1);

use App\Application;
use App\Comparable\Integer;
use App\Factory\OutputFactory;
use App\Service\FizzBuzzService;

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    printf("autoload.php does not exist. Did you forget to execute 'composer install'?%s", PHP_EOL);
    die;
}

require __DIR__.'/vendor/autoload.php';

$fizzInteger = new Integer(3);
$buzzInteger = new Integer(5);

$fizzBuzzService = new FizzBuzzService($fizzInteger, $buzzInteger);
$outputFactory = new OutputFactory($fizzBuzzService);

$app = new Application($outputFactory);
$app->run();
