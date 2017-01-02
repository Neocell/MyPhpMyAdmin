<?php

namespace Core\Controller;

/**
 * Class Controller 
 * Class qui permet d'initialiser la variable viewPath de la Class Controller.
 */
class Controller {

    /**
     * @var string $viewPath | Variable contenant le chemin correspondant aux vues.
     */
    protected $viewPath;

    /**
     * @param $view Contient la vue à charger.
     * @param $variables Contient le tableau des variables à envoyer à la vue, le scope.
     * @return void
     */
    public function render($view, $variables = []) {
        ob_start(); /* @example http://php.net/manual/fr/function.ob-start.php */
        extract($variables); /* @example http://php.net/manual/fr/function.extract.php */
        var_dump($this->viewPath);
        require($view = $this->viewPath . '/' . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean(); /* @example http://php.net/manual/fr/function.ob-get-clean.php */
        require($view);
    }

}

?>