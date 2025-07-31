<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/ajax', 'Home::ajax');
// $routes->get('/previewimg', 'Home::img');
// $routes->get('/ckeditor-demo', 'Home::ckeditor');
// $routes->get('/array', 'Home::array');
// $routes->get('/multi-img', 'Home::imgMulti');
// $routes->post('/multi-img', 'Home::imgMulti');
// $routes->get('/nestable', 'Home_test::nestable');
// $routes->get('/captcha', 'Home_test::captcha');
// $routes->post('/captcha', 'Home_test::captcha_input');

$routes->get('/page/(:segment)', 'Home::page/$1');
$routes->get('/danh-muc-san-pham/(:segment)', 'Home::productCat/$1');
$routes->get('/san-pham/(:segment)', 'Home::product/$1');
$routes->get('/danh-muc-tin-tuc/(:segment)', 'Home::newsCat/$1');
$routes->get('/tin-tuc/(:segment)', 'Home::post/$1');

$routes->get('/tat-ca-tin-tuc', 'Home::postAll');
$routes->get('/tat-ca-san-pham', 'Home::productAll');
$routes->get('/sale', 'Home::productSale');
$routes->get('/filter', 'Home::filter');
$routes->get('/filter-price', 'Home::filterPrice');
$routes->get('/tim-kiem-san-pham', 'Home::searchProduct');
$routes->get('/tim-kiem-tin-tuc', 'Home::searchPost');
$routes->get('/lien-he', 'Home::contact');
$routes->post('/lien-he', 'Home::contactAdd');
$routes->get('/gio-hang', 'Home::viewCart');
$routes->get('/thanh-toan', 'Home::viewCartPay');
$routes->post('/thanh-toan', 'Home::addCartAdmin');
// ajax
$routes->post('/add-cart', 'Home::addCartHome');
$routes->get('/cart-change-quantity', 'Home::cartChangQuantity');
$routes->get('/del-item-cart', 'Home::cartDelItem');

// service('auth')->routes($routes);
// 

$routes->group('/admin', static function($routes) {
    service('auth')->routes($routes);

    $routes->get('manager', 'Admin\Config::dashBoard');
    $routes->get('config', 'Admin\Config::index');
    $routes->patch('config', 'Admin\Config::update');
    $routes->get('sitemap', 'Admin\Config::sitemap');

    $routes->get('users', 'Admin\UserAdmin::listUsers');
    $routes->get('user/add', 'Admin\DangKy::registerView');
    $routes->post('user/add', 'Admin\DangKy::registerAction');
    $routes->get('user/edit/(:num)', 'Admin\DangKy::editUser/$1');
    $routes->patch('user/edit/(:num)', 'Admin\DangKy::updateUser/$1');
    $routes->delete('user/delete/(:num)', 'Admin\UserAdmin::deleteUser/$1');

    $routes->get('slides', 'Admin\Slide::index');
    $routes->get('slide/add', 'Admin\Slide::new');
    $routes->post('slide/add', 'Admin\Slide::create');
    $routes->get('slide/edit/(:num)', 'Admin\Slide::edit/$1');
    $routes->patch('slide/edit/(:num)', 'Admin\Slide::update/$1');
    $routes->delete('slide/delete/(:num)', 'Admin\Slide::delete/$1');
    $routes->get('slide-sort', 'Admin\Slide::sort');

    $routes->get('pages', 'Admin\Page::index');
    $routes->get('page/add', 'Admin\Page::new');
    $routes->post('page/add', 'Admin\Page::create');
    $routes->get('page/edit/(:num)', 'Admin\Page::edit/$1');
    $routes->patch('page/edit/(:num)', 'Admin\Page::update/$1');
    $routes->delete('page/delete/(:num)', 'Admin\Page::delete/$1');

    $routes->get('newscats', 'Admin\NewsCat::index');
    $routes->get('newscat/add', 'Admin\NewsCat::new');
    $routes->post('newscat/add', 'Admin\NewsCat::create');
    $routes->get('newscat/edit/(:num)', 'Admin\NewsCat::edit/$1');
    $routes->patch('newscat/edit/(:num)', 'Admin\NewsCat::update/$1');
    $routes->delete('newscat/delete/(:num)', 'Admin\NewsCat::delete/$1');

    $routes->get('posts', 'Admin\Post::index');
    $routes->get('post/add', 'Admin\Post::new');
    $routes->post('post/add', 'Admin\Post::create');
    $routes->get('post/edit/(:num)', 'Admin\Post::edit/$1');
    $routes->patch('post/edit/(:num)', 'Admin\Post::update/$1');
    $routes->delete('post/delete/(:num)', 'Admin\Post::delete/$1');
    $routes->get('post/search', 'Admin\Post::search');

    $routes->get('productcats', 'Admin\ProductCat::index');
    $routes->get('productcat/add', 'Admin\ProductCat::new');
    $routes->post('productcat/add', 'Admin\ProductCat::create');
    $routes->get('productcat/edit/(:num)', 'Admin\ProductCat::edit/$1');
    $routes->patch('productcat/edit/(:num)', 'Admin\ProductCat::update/$1');
    $routes->delete('productcat/delete/(:num)', 'Admin\ProductCat::delete/$1');

    $routes->get('products', 'Admin\Product::index');
    $routes->get('product/add', 'Admin\Product::new');
    $routes->post('product/add', 'Admin\Product::create');
    $routes->get('product/edit/(:num)', 'Admin\Product::edit/$1');
    $routes->patch('product/edit/(:num)', 'Admin\Product::update/$1');
    $routes->delete('product/delete/(:num)', 'Admin\Product::delete/$1');
    $routes->post('product/copy/(:num)', 'Admin\Product::copy/$1');
    $routes->get('product/search', 'Admin\Product::search');

    $routes->get('menus', 'Admin\Menu::index');
    $routes->get('menu/add', 'Admin\Menu::new');
    $routes->post('menu/add', 'Admin\Menu::create');
    $routes->get('menu/edit/(:num)', 'Admin\Menu::edit/$1');
    $routes->patch('menu/edit/(:num)', 'Admin\Menu::update/$1');
    $routes->delete('menu/delete/(:num)', 'Admin\Menu::delete/$1');
    $routes->get('menu/get-select-type/(:segment)', 'Admin\Menu::getSelectType/$1');
    $routes->get('menu/sort', 'Admin\Menu::sort');
    $routes->post('menu/sort-ajax', 'Admin\Menu::sortAjax');

    $routes->get('videos', 'Admin\Video::index');
    $routes->get('video/add', 'Admin\Video::new');
    $routes->post('video/add', 'Admin\Video::create');
    $routes->get('video/edit/(:num)', 'Admin\Video::edit/$1');
    $routes->patch('video/edit/(:num)', 'Admin\Video::update/$1');
    $routes->delete('video/delete/(:num)', 'Admin\Video::delete/$1');

    $routes->get('carts', 'Admin\Cart::index');
    $routes->get('cart/edit/(:num)', 'Admin\Cart::edit/$1');
    $routes->patch('cart/edit/(:num)', 'Admin\Cart::update/$1');
    $routes->delete('cart/delete/(:num)', 'Admin\Cart::delete/$1');
    $routes->get('cart/search', 'Admin\Cart::search');

    $routes->get('cart-item/edit/(:num)', 'Admin\CartItem::edit/$1');
    $routes->get('cart-item/edit-total/(:num)', 'Admin\CartItem::editTotal/$1');

    $routes->get('contacts', 'Admin\Contact::index');
    $routes->delete('contact/delete/(:num)', 'Admin\Contact::delete/$1');



    
});
