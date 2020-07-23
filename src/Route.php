<?php

namespace MatthewMoray\Assessment;

use Illuminate\Support\Facades\Route as RouteFacade;

class Route
{
    /** Postfix values for the controller and parameter name */
    const POSTFIX_CONTROLLER = 'Controller';
    const POSTFIX_PARAM = '_pk';

    /** Controller method to HTTP action mapping */
    const RESOURCE_ACTIONS = [
        'index' => 'get', 
        'show' => 'get',
        'store' => 'post', 
        'update' => 'put', 
        'destroy' => 'delete'
    ];

    /** Controller methods that do not end with a parameter */
    const NON_PARAMETER_METHODS = [
        'index',
        'store'
    ];
    
    /**
     * Create the resource routes for the specified resource type.
     *
     * @param string $resourceType
     * @return void
     */
    public static function resource(string $resourceType): void
    {
        /** Determine the controller and route parameter(s) names */
        $controller = str_replace('.', '', ucwords($resourceType, '.')) . self::POSTFIX_CONTROLLER;
        $params = [];
        foreach (explode('.', $resourceType) AS $param) {
            $params[$param] = $param . self::POSTFIX_PARAM;
        }

        /** Create the resource routes */
        foreach (self::RESOURCE_ACTIONS AS $controllerMethod => $httpAction) {
            /** Build the uri based on the controller method and parameters */
            $uri = '';
            foreach ($params AS $model => $primaryKey) {
                $uri .= "/{$model}";
                $parameterAction = !in_array($controllerMethod, self::NON_PARAMETER_METHODS);
                if ($parameterAction || (!$parameterAction && last($params) !== $primaryKey)) {
                    $uri .= "/{{$primaryKey}}";
                }
            }

            /** Create the route based on the HTTP action, uri, controller, and controller method */
            RouteFacade::$httpAction($uri, "{$controller}@{$controllerMethod}");
        }
    }
}