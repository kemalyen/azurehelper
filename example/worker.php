<?php
declare(strict_types=1);

error_reporting(E_ERROR | E_PARSE);

require_once __DIR__ . '/vendor/autoload.php';


$request = new Gazatem\Phpfunc\Request();
$context = new Gazatem\Phpfunc\FunctionContext();

require __DIR__  . $request->getRequestUri() . '/index.php';

$request->getRequestBody();
 
$context->request = $request;

$returnValue = run($context);

$response = [
    'Outputs' => $context->outputs,
    'ReturnValue' => $returnValue,
    'Logs' => $context->log->getMessages()
];

header("Content-type: application/json");
echo(json_encode($response));