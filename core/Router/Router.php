<?php

namespace Core\Router;

/**
 * Class Router
 */
class Router
{
    /**
     * @var string $url | Variable contenant l'url.
     */
    private $url;

    /**
     * @var array $routes | Variable contenant toute les routes de l'applie.
     */
    private $routes = [];

    /**
     * @param string $url | Variable contenant l'url.
     * @return void
     */
    public function __construct($url) 
    {
        $this->url = $url; 
    }

    public function getRoutes() {
        return $this->routes;
    }

    /**
     * Function Get | Instancie du nouvelle route de type GET.
     * @param string $path | Variable contenant le chemin.
     * @param function $callable | Variable contenant une fonctions de rappel.
     * @return void
     */
    public function get($path, $callable) 
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    /**
     * Function Post | Instancie du nouvelle route de type POST.
     * @param string $path | Variable contenant le chemin.
     * @param function $callable | Variable contenant une fonctions de rappel.
     * @return void
     */
    public function post($path, $callable) 
    {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    /**
     * @return void
     */
    public function run() 
    {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD does exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new RouterException('No matching routes...');
    }
}
