<?php

namespace Core\Router;

/**
 * Class Route
 */
class Route
{
    /**
     * @var string $path | Variable contenant le chemin.
     */
    private $path;

    /**
     * @var function $callable | Variable contenant une fonctions de rappel.
     */
    private $callable;

    /**
     * @var array $matches | Variable contenant le résultat d'une route aprés l'opération match.
     */
    private $matches;

    /**
     * @param string $path | Variable contenant le chemin.
     * @param function $callable | Variable contenant une fonctions de rappel.
     * @return void
     */
    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * Function Match | S'occupe de récupérer les éléments nécessaires a l'interpretation d'une route.
     * @param string $url | Variable contenant l'url du chemin.
     * @return void
     */
    public function match($url) 
    {
        $url = trim($url, '/'); /* @example http://php.net/manual/fr/function.trim.php */
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path); /* @example http://php.net/manual/fr/function.preg-replace.php */
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    /**
     * Function Call
     * @param string $url | Variable contenant l'url du chemin.
     * @return void
     */
    public function call() 
    {
        return call_user_func_array($this->callable, $this->matches);
    }
}
