<?php
namespace Gazatem\Phpfunc;

class Request{

    public $requestUri;
    public $requestBody;
    public $data;
    public $req;   
    public $url;
    public $method;
    public $query;
    public $headers;
    public $params;
    public $identities;
    public $body;

    /**
     * Get the value of requestUri
     */ 
    public function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getRequestBody()
    {
        $requestBody = file_get_contents('php://input');
        $this->requestBody = json_decode($requestBody, true);
        $this->data = $this->requestBody['Data'];
        $this->req = $this->data['req'];
        $this->url = $this->req['Url'];
        $this->method = $this->req['Method'];
        $this->query = $this->req['Query'];
        $this->headers = $this->req['Headers'];
        $this->params = $this->req['Params'];
        $this->identities = $this->req['Identities'];
        $this->body = $this->req['Body'];
        return $this;
    }

    public function getData()
    {
        $request = $this->getRequestBody();
        $this->data = $request['Data'];
        return json_encode($this->data, true);
    }

    public function getQuery(){
        $request = $this->getData();
        $this->req = $request['req'];
        return json_decode($request->req, true);
        return json_decode($this->req['Query'], true);
    }
}