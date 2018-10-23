<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['allUsers'] = 'users/all';
$route['viewImage'] = 'images/index';
//$route['viewImage'] = 'images';
$route['admin/users/statistic'] = 'admin/statisticUser';
$route['admin/users/list'] = 'admin/listUsers';
$route['admin/userImages'] = 'admin/userImages';
$route['uploadImage'] = 'uploadImage';
$route['users'] = 'users/all';
$route['users/register'] = 'users/register';
$route['image/(:any)']='images/view/$1';
$route['imageComment/(:any)']='comments/view/$1';
$route['viewImage/(:any)']='images/index/$1';
$route['allUsers/(:any)']='users/all/$1';
$route['contacts'] = 'contacts';
$route['default_controller'] = 'pages/view';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
