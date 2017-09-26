<?php
/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 10:04
 */

$app = new Lib\Base\App();

$app->addMiddlewareList([
    \App\Http\Middleware\Router::class
]);

return $app;