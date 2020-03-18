<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/cours' => [[['_route' => 'api_cours', '_controller' => 'App\\Controller\\Api\\CoursController::getCours'], null, null, null, false, false, null]],
        '/api/professeurs' => [[['_route' => 'api_professeurs', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseurs'], null, null, null, false, false, null]],
        '/api/matieres' => [[['_route' => 'api_matieres', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getMatieres'], null, null, null, false, false, null]],
        '/professeurs' => [[['_route' => 'professeurs', '_controller' => 'App\\Controller\\ProfesseurController::index'], null, null, null, true, false, null]],
        '/professeurs/create' => [[['_route' => 'professeurs.create', '_controller' => 'App\\Controller\\ProfesseurController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin' => [[['_route' => 'easyadmin', '_controller' => 'EasyCorp\\Bundle\\EasyAdminBundle\\Controller\\EasyAdminController::indexAction'], null, null, null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/(?'
                    .'|cours/(?'
                        .'|([^/]++)(?'
                            .'|(*:70)'
                            .'|/delete(*:84)'
                        .')'
                        .'|create(*:98)'
                    .')'
                    .'|professeurs/([^/]++)(?'
                        .'|(*:129)'
                        .'|/(?'
                            .'|avis(?'
                                .'|(*:148)'
                            .')'
                            .'|cours(*:162)'
                        .')'
                    .')'
                    .'|avis/([^/]++)(*:185)'
                .')'
                .'|/professeurs/([^/]++)/(?'
                    .'|edit(*:223)'
                    .'|delete(*:237)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        70 => [[['_route' => 'api_cours_id', '_controller' => 'App\\Controller\\Api\\CoursController::getUnCours'], ['id'], null, null, false, true, null]],
        84 => [[['_route' => 'api_delete__cours', '_controller' => 'App\\Controller\\Api\\CoursController::deleteCours'], ['id'], ['DELETE' => 0], null, false, false, null]],
        98 => [[['_route' => 'api_put_cours', '_controller' => 'App\\Controller\\Api\\CoursController::createCours'], [], ['PUT' => 0], null, false, false, null]],
        129 => [[['_route' => 'api_professeurs_id', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseur'], ['id'], null, null, false, true, null]],
        148 => [
            [['_route' => 'api_get_professeurs_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseurAvis'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_put_professeurs_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::putProfesseurAvis'], ['id'], ['PUT' => 0], null, false, false, null],
        ],
        162 => [[['_route' => 'api_get_professeurs_cours', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseurCours'], ['id'], ['GET' => 0], null, false, false, null]],
        185 => [[['_route' => 'api_delete_professeurs_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::deleteAvis'], ['id'], ['DELETE' => 0], null, false, true, null]],
        223 => [[['_route' => 'professeurs.edit', '_controller' => 'App\\Controller\\ProfesseurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        237 => [
            [['_route' => 'professeurs.delete', '_controller' => 'App\\Controller\\ProfesseurController::delete'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
