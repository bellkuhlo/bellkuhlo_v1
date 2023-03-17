<?php
// index.php

require_once 'config/config.php';
require_once 'config/database.php';
require_once 'core/helpers/router.php';
require_once 'core/helpers/auth.php';

require_once 'core/classes/Controller.php';
require_once 'core/classes/Model.php';

require_once 'core/database/Connection.php';
require_once 'core/database/QueryBuilder.php';

require_once 'models/User.php';
require_once 'models/Menu.php';

require_once 'controllers/AdminController.php';
require_once 'controllers/FrontendController.php';

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'FrontendController@index');
$router->get('/admin', 'AdminController@index');
$router->get('/admin/login', 'AdminController@login');
$router->post('/admin/login', 'AdminController@authenticate');
$router->get('/admin/logout', 'AdminController@logout');
$router->get('/admin/menu', 'AdminController@menu');
$router->post('/admin/menu', 'AdminController@addMenuItem');

$router->run();
