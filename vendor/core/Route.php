<?php

namespace core;

use core\App;

class Route
{

    protected static array $routes = [];

    protected static $route = [];

    public static function get($regex, $route = [])
    {
        self::$routes[$regex] = $route;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    protected static function removeQueryStr($url): string
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === str_contains($params[0], '=')) {
                return rtrim($params[0], '/');
            }
        }
        return '';
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryStr($url);
        if (self::matchRoute($url)) {
            if (!empty(self::$route['lang'])) {
                App::$app->setProperty('lang', self::$route['lang']);
            }
            $controller = 'app\controllers\\' . self::$route['admin_prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                /** @var Controller $controllerObject */
                $controllerObject = new $controller(self::$route);
                $controllerObject->getModel();
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Metod '{$controller}::{$action}' tapilmadi!", 404);
                }
            } else {
                throw new \Exception("Kontroller '{$controller}' tapilmadi!", 404);
            }
        } else {
            throw new \Exception("Sehife tapilmadi!", 404);
        }
    }



    public static function matchRoute($url): bool
    {

        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['admin_prefix'])) {
                    $route['admin_prefix'] = '';
                } else {
                    $route['admin_prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;

            }
        }
        return false;
    }

    protected static function upperCamelCase($name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
        // // new-product -> new product
        // $name = str_replace('-', ' ', $name);
        // // new product -> New Product
        // $name = ucwords($name);
        // // New Product -> NewProduct
        // $name = str_replace(' ', '', $name);
    }

    // camelCase
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }



}