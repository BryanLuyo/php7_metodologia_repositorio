<?php
require_once 'vendor/autoload.php';
require_once 'config.php';

use App\Models\Clientes;

$service = new Clientes;
$result = $service->get(1);

var_dump($result);
