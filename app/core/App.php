<?php

class App
{
    protected $controller = 'Login';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Controller
        if (isset($url[0])) {
            $controllerPath = '../app/controllers/' . $url[0] . '.php';
            if (file_exists($controllerPath)) {
                $this->controller = $url[0];
                unset($url[0]);
            } else {
                // Log error or handle the error gracefully
                $this->controller = 'Error'; // Assuming there's an Error controller
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                // Log error or handle the error gracefully
                $this->method = 'index'; // Default method
            }
        }

        // Parameters
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Execute controller method with parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
