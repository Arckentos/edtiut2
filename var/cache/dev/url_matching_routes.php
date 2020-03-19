<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/cours' => [[['_route' => 'api_cours', '_controller' => 'App\\Controller\\Api\\CoursController::getCours'], null, null, null, false, false, null]],
        '/api/cours/create' => [[['_route' => 'api_put_cours', '_controller' => 'App\\Controller\\Api\\CoursController::createCours'], null, ['PUT' => 0], null, false, false, null]],
        '/api/professeurs' => [[['_route' => 'api_professeurs', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseurs'], null, null, null, false, false, null]],
        '/api/matieres' => [[['_route' => 'api_matieres', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getMatieres'], null, null, null, false, false, null]],
        '/api/salles' => [[['_route' => 'api_salles', '_controller' => 'App\\Controller\\Api\\SalleController::getSalles'], null, null, null, false, false, null]],
        '/professeurs' => [[['_route' => 'professeurs', '_controller' => 'App\\Controller\\ProfesseurController::index'], null, null, null, true, false, null]],
        '/professeurs/create' => [[['_route' => 'professeurs.create', '_controller' => 'App\\Controller\\ProfesseurController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin' => [[['_route' => 'easyadmin', '_controller' => 'EasyCorp\\Bundle\\EasyAdminBundle\\Controller\\EasyAdminController::indexAction'], null, null, null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/(?'
                    .'|cours/([^/]++)(?'
                        .'|(*:67)'
                        .'|/(?'
                            .'|edit(*:82)'
                            .'|delete(*:95)'
                        .')'
                    .')'
                    .'|professeurs/([^/]++)(?'
                        .'|(*:127)'
                        .'|/(?'
                            .'|avis(?'
                                .'|(*:146)'
                            .')'
                            .'|cours(*:160)'
                        .')'
                    .')'
                    .'|avis/([^/]++)(*:183)'
                    .'|salles/(?'
                        .'|([^/]++)(?'
                            .'|(*:212)'
                            .'|/delete(*:227)'
                        .')'
                        .'|create(*:242)'
                    .')'
                .')'
                .'|/professeurs/([^/]++)/(?'
                    .'|edit(*:281)'
                    .'|delete(*:295)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        67 => [[['_route' => 'api_cours_id', '_controller' => 'App\\Controller\\Api\\CoursController::getUnCours'], ['id'], null, null, false, true, null]],
        82 => [[['_route' => 'api_cours_id_edit', '_controller' => 'App\\Controller\\Api\\CoursController::editUnCours'], ['id'], null, null, false, false, null]],
        95 => [[['_route' => 'api_delete_cours', '_controller' => 'App\\Controller\\Api\\CoursController::deleteCours'], ['id'], ['DELETE' => 0], null, false, false, null]],
        127 => [[['_route' => 'api_professeurs_id', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseur'], ['id'], null, null, false, true, null]],
        146 => [
            [['_route' => 'api_get_professeurs_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseurAvis'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'api_put_professeurs_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::putProfesseurAvis'], ['id'], ['PUT' => 0], null, false, false, null],
        ],
        160 => [[['_route' => 'api_get_professeurs_cours', '_controller' => 'App\\Controller\\Api\\ProfesseurController::getProfesseurCours'], ['id'], ['GET' => 0], null, false, false, null]],
        183 => [[['_route' => 'api_delete_professeurs_avis', '_controller' => 'App\\Controller\\Api\\ProfesseurController::deleteAvis'], ['id'], ['DELETE' => 0], null, false, true, null]],
        212 => [[['_route' => 'api_salles_id', '_controller' => 'App\\Controller\\Api\\SalleController::getUneSalle'], ['id'], null, null, false, true, null]],
        227 => [[['_route' => 'api_delete_salles', '_controller' => 'App\\Controller\\Api\\SalleController::deleteSalle'], ['id'], ['DELETE' => 0], null, false, false, null]],
        242 => [[['_route' => 'api_put_salles', '_controller' => 'App\\Controller\\Api\\SalleController::createSalle'], [], ['PUT' => 0], null, false, false, null]],
        281 => [[['_route' => 'professeurs.edit', '_controller' => 'App\\Controller\\ProfesseurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        295 => [
            [['_route' => 'professeurs.delete', '_controller' => 'App\\Controller\\ProfesseurController::delete'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
