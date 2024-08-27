<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\AccueilController::index'], [], [['text', '/']], [], [], []],
    'app_contact' => [[], ['_controller' => 'App\\Controller\\ContactController::contact'], [], [['text', '/contact']], [], [], []],
    'app_instruments' => [[], ['_controller' => 'App\\Controller\\InstrumentsController::index'], [], [['text', '/instruments']], [], [], []],
    'app_produit' => [[], ['_controller' => 'App\\Controller\\ProduitController::index'], [], [['text', '/produit']], [], [], []],
    'app_produit_show' => [['slug', 'id'], ['_controller' => 'App\\Controller\\ProduitController::show'], ['slug' => '[a-z0-9\\-]*'], [['variable', '-', '[^/]++', 'id', true], ['variable', '/', '[a-z0-9\\-]*', 'slug', true], ['text', '/produit']], [], [], []],
    'app_produit_edit' => [['slug', 'id'], ['_controller' => 'App\\Controller\\ProduitController::edit'], ['slug' => '[a-z0-9\\-]*'], [['text', '/edit'], ['variable', '-', '[^/]++', 'id', true], ['variable', '/', '[a-z0-9\\-]*', 'slug', true], ['text', '/produit']], [], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], [], []],
    'app_verify_email' => [[], ['_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], [], [['text', '/verify/email']], [], [], []],
    'App\Controller\AccueilController::index' => [[], ['_controller' => 'App\\Controller\\AccueilController::index'], [], [['text', '/']], [], [], []],
    'App\Controller\ContactController::contact' => [[], ['_controller' => 'App\\Controller\\ContactController::contact'], [], [['text', '/contact']], [], [], []],
    'App\Controller\InstrumentsController::index' => [[], ['_controller' => 'App\\Controller\\InstrumentsController::index'], [], [['text', '/instruments']], [], [], []],
    'App\Controller\ProduitController::index' => [[], ['_controller' => 'App\\Controller\\ProduitController::index'], [], [['text', '/produit']], [], [], []],
    'App\Controller\ProduitController::show' => [['slug', 'id'], ['_controller' => 'App\\Controller\\ProduitController::show'], ['slug' => '[a-z0-9\\-]*'], [['variable', '-', '[^/]++', 'id', true], ['variable', '/', '[a-z0-9\\-]*', 'slug', true], ['text', '/produit']], [], [], []],
    'App\Controller\ProduitController::edit' => [['slug', 'id'], ['_controller' => 'App\\Controller\\ProduitController::edit'], ['slug' => '[a-z0-9\\-]*'], [['text', '/edit'], ['variable', '-', '[^/]++', 'id', true], ['variable', '/', '[a-z0-9\\-]*', 'slug', true], ['text', '/produit']], [], [], []],
    'App\Controller\RegistrationController::register' => [[], ['_controller' => 'App\\Controller\\RegistrationController::register'], [], [['text', '/register']], [], [], []],
    'App\Controller\RegistrationController::verifyUserEmail' => [[], ['_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], [], [['text', '/verify/email']], [], [], []],
];
