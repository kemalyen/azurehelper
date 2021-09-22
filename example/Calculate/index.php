<?php
use Gazatem\Phpfunc\FunctionContext;

function run(FunctionContext $context) {

    // Post or Get request
    $query = $context->request->query;

    // Json body
    $body = json_decode($context->request->body, true);

    $message = "Hello ". $query['name'];
    return [
        'body' => $message,
        'headers' => [
            'Content-type' => 'text/plain'
        ]
    ];
}