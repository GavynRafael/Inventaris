<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Auth'] = 'Auth';
$route['user/detailRuangan/(:any)'] = 'user/detailRuangan/$1';
$route['user/tambahBarang/(:any)'] = 'user/tambahBarang/$1';


