<?php

namespace Core\Controller;

class Controller {

    protected $viewPath;

    public function render($view, $variables = []) {
        ob_start();
        extract($variables);
        require($view = $this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($view);
    }

}

?>