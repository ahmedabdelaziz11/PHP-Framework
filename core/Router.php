<?php 
namespace app\core;


class Router 
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $requset,Response $response)
    {
        $this->request  = $requset;
        $this->response = $response;
    }

    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path,$callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false)
        {
            $this->response->setStatusCode(404);
            return '<h1>Not Found 404 !</h1>';
        }

        if(is_string($callback))
        {
            return $this->renderView($callback);
        }

        if(is_array($callback))
        {
            $callback[0] = new $callback[0];   // create instance from passed controller
        }


        return call_user_func($callback,$this->request);
        
    }

    public function renderView($view,$params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view,$params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layout/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view,$params)
    {
        foreach($params as $key => $value)
        {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}