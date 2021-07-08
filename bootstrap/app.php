<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

if(PHP_SAPI == 'cli'){
    $brand="";
    array_map(function($item) use (&$brand){
        if(strpos($item,'--env=')===0 && strlen($item)>6){
            $brand =strtoupper(strtr($item,['--env='=>'']));
        }
    },$argv);
    if($brand){
        $loader= new \Dotenv\Loader(app()->environmentPath());
        $_SERVER['HTTP_BRAND_CODE'] = $brand;
        $loader->setEnvironmentVariable('APPID',getBrandConfig('APP','APPID'));
        $loader->setEnvironmentVariable('SECRET',getBrandConfig('APP','SECRET'));
        $loader->setEnvironmentVariable('MAIL_USERNAME',"jack@163.com");
    }
}

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
