<?php

class Response
{
    private $content;
    private $statusCode = "200";
    private $statusText = "OK";

    public function __construct() {

    }


    public function setContent($content) {
        $this->content = $content;
    }

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }

    public function setStatusText($statusText) {
        $this->statusText = $statusText;
    }

    public function send() {
        header('HTTP/1.1 ' . $this->statusCode . ' ' . $this->statusText);
        echo $this->content;
    }
}