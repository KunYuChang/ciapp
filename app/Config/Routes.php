<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// 自動路由 (Legacy) 非常危險。很容易建立易受攻擊的應用程式，
// 其中控制器過濾器或 CSRF 保護會被繞過。
// 如果您不想定義所有路由，請使用自動路由 (Improved)。
// 在 `app/Config/Feature.php` 中將 `$autoRoutesImproved` 設為 true，並將以下設定設為 true。
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * 路由定義 (Route Definitions)
 * --------------------------------------------------------------------
 */

// 指定預設路由可提高效能，因為我們不必掃描目錄。
$routes->get('/', 'Home::index');
$routes->get('/articles', 'Articles::index');
$routes->get('/articles/(:num)', 'Articles::show/$1');
$routes->get('/articles/new', 'Articles::new');
$routes->post('/articles/create', 'Articles::create');
$routes->get('/articles/edit/(:num)', 'Articles::edit/$1');
$routes->post('/articles/update/(:num)', 'Articles::update/$1');
$routes->get('/articles/delete/(:num)', 'Articles::delete/$1');

/*
 * --------------------------------------------------------------------
 * 其他路由
 * --------------------------------------------------------------------
 *
 * 有時您可能需要額外的路由，而且您需要它們能夠覆蓋此檔案中的任何預設值。
 * 環境 based 路由就是其中一種情況。在此處 require() 額外的路由檔案以實現此目的。
 *
 * 您將在該檔案中取得 $routes 物件，而無需重新載入它。
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
