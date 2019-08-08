<?php
class Router
{
    protected $routes = [];
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }
    public function define($routes)
    {
        $this->routes = $routes;
    }
    public function direct($uri)
    {

        if (preg_match('~[0-9]+~', $uri))
        {
            // Build the pattern
            $uri = preg_replace('~[0-9]+~',':id', $uri);

        }

        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }
        throw new Exception('No route defined for this URI.');
    }
}
