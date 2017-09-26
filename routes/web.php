<?php

return [
    'error' => [
        'rule' => '/error',
        'method' => 'GET',
        'action' => 'ErrorController@index'
    ],
    'home' => [
        'rule' => '/',
        'method' => 'GET',
        'action' => 'PostsController@index'
    ],
    'posts.view' => [
        'rule' => '/posts/(?<id>[\d]+)',
        'method' => 'GET',
        'action' => 'PostsController@view'
    ],
    'posts.create' => [
        'rule' => '/posts/create',
        'method' => 'GET',
        'action' => 'PostsController@create'
    ],
    'posts.store' => [
        'rule' => '/posts',
        'method' => 'POST',
        'action' => 'PostsController@store'
    ],
    'posts.edit' => [
        'rule' => '/posts/(?<id>[\d]+)/edit',
        'method' => 'GET',
        'action' => 'PostsController@edit'
    ],
    'posts.update' => [
        'rule' => '/posts/(?<id>[\d]+)',
        'method' => 'PUT',
        'action' => 'PostsController@update'
    ],
    'posts.delete' => [
        'rule' => '/posts/(?<id>[\d]+)',
        'method' => 'DELETE',
        'action' => 'PostsController@delete'
    ],
];