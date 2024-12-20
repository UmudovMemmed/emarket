<?php

use core\Route;

/* Admin panel */
Route::get('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);


Route::get('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['admin_prefix' => 'admin']);

/* Front */
Route::get('^(?P<lang>[a-z]+)?/?product/(?P<slug>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);
Route::get('^(?P<lang>[a-z]+)?/?category/(?P<slug>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);
Route::get('^(?P<lang>[a-z]+)?/?search/?$', ['controller' => 'Search', 'action' => 'index']);
Route::get('^(?P<lang>[a-z]+)?/?wishlist/?$', ['controller' => 'Wishlist', 'action' => 'index']);
Route::get('^(?P<lang>[a-z]+)?/?page/(?P<slug>[a-z0-9-]+)/?$', ['controller' => 'Page', 'action' => 'view']);
Route::get('^cart$', ['controller' => 'Cart', 'action' => 'index']);
// Route::get('^login$', ['controller' => 'Login', 'action' => 'index']);

Route::get('^(?P<lang>[a-z]+)?/?login/?$', ['controller' => 'Login', 'action' => 'index']);

Route::get('^register$', ['controller' => 'Register', 'action' => 'index']);
Route::get('^(?P<lang>[a-z]+)?/?contact/?$', ['controller' => 'Contact', 'action' => 'index']);

Route::get('^(?P<lang>[a-z]+)?/?$', ['controller' => 'Main', 'action' => 'index']);

Route::get('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');
Route::get('^(?P<lang>[a-z]+)/(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');