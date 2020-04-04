<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/categorie' => [[['_route' => 'categorie.index', '_controller' => 'App\\Controller\\CategorieController::index'], null, null, null, false, false, null]],
        '/categorie/new' => [[['_route' => 'categorie.new', '_controller' => 'App\\Controller\\CategorieController::new'], null, null, null, false, false, null]],
        '/home' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/panier' => [[['_route' => 'panier.index', '_controller' => 'App\\Controller\\PanierController::index'], null, null, null, false, false, null]],
        '/product' => [[['_route' => 'product.index', '_controller' => 'App\\Controller\\ProductController::index'], null, null, null, false, false, null]],
        '/product/new' => [[['_route' => 'product.new', '_controller' => 'App\\Controller\\ProductController::new'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/search' => [[['_route' => 'search', '_controller' => 'App\\Controller\\SearchController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/categorie/(?'
                    .'|edit/([^/]++)(*:196)'
                    .'|([^/]++)(*:212)'
                .')'
                .'|/p(?'
                    .'|anier/(?'
                        .'|save/([^/]++)(*:248)'
                        .'|delete/([^/]++)(*:271)'
                    .')'
                    .'|roduct/(?'
                        .'|edit/([^/]++)(*:303)'
                        .'|show/([^/]++)(*:324)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        196 => [[['_route' => 'categorie.edit', '_controller' => 'App\\Controller\\CategorieController::edit'], ['id'], null, null, false, true, null]],
        212 => [[['_route' => 'categorie.search', '_controller' => 'App\\Controller\\CategorieController::search'], ['id'], null, null, false, true, null]],
        248 => [[['_route' => 'panier.save', '_controller' => 'App\\Controller\\PanierController::save'], ['id'], null, null, false, true, null]],
        271 => [[['_route' => 'panier.delete', '_controller' => 'App\\Controller\\PanierController::delete'], ['id'], null, null, false, true, null]],
        303 => [[['_route' => 'product.edit', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], null, null, false, true, null]],
        324 => [
            [['_route' => 'product.show', '_controller' => 'App\\Controller\\ProductController::show'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
