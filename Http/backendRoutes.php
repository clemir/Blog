<?php

$router->bind('category', function ($id) {
    return app(\Modules\Blog\Repositories\CategoryRepository::class)->find($id);
});
$router->bind('post', function ($id) {
    return app(\Modules\Blog\Repositories\PostRepository::class)->find($id);
});

$router->group(['prefix' => '/blog'], function () {
    get('posts', ['as' => 'admin.blog.post.index', 'uses' => 'PostController@index']);
    get('posts/create', ['as' => 'admin.blog.post.create', 'uses' => 'PostController@create']);
    post('posts', ['as' => 'admin.blog.post.store', 'uses' => 'PostController@store']);
    get('posts/{post}/edit', ['as' => 'admin.blog.post.edit', 'uses' => 'PostController@edit']);
    put('posts/{post}', ['as' => 'admin.blog.post.update', 'uses' => 'PostController@update']);
    delete('posts/{post}', ['as' => 'admin.blog.post.destroy', 'uses' => 'PostController@destroy']);

    get('categories', ['as' => 'admin.blog.category.index', 'uses' => 'CategoryController@index']);
    get('categories/create', ['as' => 'admin.blog.category.create', 'uses' => 'CategoryController@create']);
    post('categories', ['as' => 'admin.blog.category.store', 'uses' => 'CategoryController@store']);
    get('categories/{category}/edit', ['as' => 'admin.blog.category.edit', 'uses' => 'CategoryController@edit']);
    put('categories/{category}', ['as' => 'admin.blog.category.update', 'uses' => 'CategoryController@update']);
    delete('categories/{category}', ['as' => 'admin.blog.category.destroy', 'uses' => 'CategoryController@destroy']);
});
