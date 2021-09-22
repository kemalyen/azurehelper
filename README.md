
# Azure Functions PHP Helper

  
A helper package to create PHP based Azure Function

## How to setup

Fir do not forget to create your azure environment. Or if your function is ready, just add library.

    func init

Later, please add PHP Helper library.
   
    composer require gazatem/azurehelper

Now, you need to update host.js file. All you need is  to update Cumtom Handler section.

    {
    "customHandler": {
	    "description": {
	    "defaultExecutablePath": "php",
	    "arguments": [
		    "-S",
		    "0.0.0.0:%FUNCTIONS_CUSTOMHANDLER_PORT%",
		    "worker.php"
		    ]
		    },
	    "enableForwardingHttpRequest": false
	    }
	  }

Now this is the last step. You need to create worker.php to  run your function(s).

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

I want to add here a simple Azure Function for you.

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

## Helper Attributes
This is the list that you can call from Helper:

- requestUri
- requestBody
- data
- req
- url
- method
- query
- headers
- params
- identities
- body

## Logging & Exceptions

I added a ready to use logger to output to console.  I'll add more features for logging and exception.

    $context->log->warning('Get method not worked!');


This is just a starter that I used in my works. I added example usage in example folder. 



 
