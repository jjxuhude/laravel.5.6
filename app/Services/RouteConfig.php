<?php
namespace App\Services;

class RouteConfig
{

    function setController($controller)
    {
        $refClass = new \ReflectionClass($controller);
        $methods = $refClass->getMethods(\ReflectionMethod::IS_PUBLIC);
        $methods = array_filter($methods, function ($method) use ($refClass) {
            if ($method->class == $refClass->getName()) {
                return $method;
            }
        });
        
        //dump($methods);exit;
        foreach ($methods as $method) {
            $route = strtolower(strstr(basename($method->class), 'Controller', true));
            
            preg_match_all('/[\\\](.*)\b/U', $method->class,$match);
            dump($method->class);
            dump($match);
            
            if ($method->name == 'index') {
                \Route::get('/' . $route, '\\' . $method->class . "@" . $method->name);
            }
            
            switch ($this->getDocParam($method, 'method')) {
                case 'post':
                    \Route::post('/' . $route . '/' . $method->name, '\\' . $method->class . "@" . $method->name);
                    break;
                case 'put':
                    \Route::put('/' . $route . '/' . $method->name, '\\' . $method->class . "@" . $method->name);
                    break;
                case 'delete':
                    \Route::delete('/' . $route . '/' . $method->name, '\\' . $method->class . "@" . $method->name);
                    break;
                case 'option':
                    \Route::option('/' . $route . '/' . $method->name, '\\' . $method->class . "@" . $method->name);
                    break;
                case 'patch':
                    \Route::patch('/' . $route . '/' . $method->name, '\\' . $method->class . "@" . $method->name);
                    break;
                case 'get':
                default:
                    \Route::get('/' . $route . '/' . $method->name, '\\' . $method->class . "@" . $method->name);
                    break;
            }
        }
    }

    function getDocParam($method, $name)
    {
        $string = $method->getDocComment();
        if (empty($string))
            return '';
        preg_match('/@' . $name . '(.*)/', $string, $match);
        if (isset($match[1])) {
            return trim($match[1]);
        } else {
            return $method->name;
        }
    }

    function getDocParamByControllerString($string, $name)
    {
        $data = explode('@', $string);
        if (count($data) == 2) {
            $method = new \ReflectionMethod($data[0], $data[1]);
            return $this->getDocParam($method->getDocComment(), $name);
        }
        return '';
    }
}

