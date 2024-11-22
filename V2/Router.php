<?php

class Router
{
    public function getController(string $uri): array
    {
        //je découpe ma route
        $explodeUri = explode('/', $uri);

        //Je récupère mon controller
        $controller = $explodeUri[1] ? ucfirst($explodeUri[1]) : 'Home';

        //Je récupère mon action
        $action = 'list';

        //Je construit le nom complet de mon controller
        $controller .= 'Controller';

        return [
            'controller' => $controller,
            'action' => $action,
        ];
    }
}