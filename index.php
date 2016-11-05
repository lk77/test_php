<?php
/**
 * Controlleur frontal de l'application
 */
require_once "Entity/image.php";//Chargement des entités nécessaires
require_once "Entity/imageDAO.php";
require_once "Entity/article.php";
require_once "Entity/articleDAO.php";
include "vendor/rain.tpl.class.php";//Chargement de la classe du moteur de template
raintpl::$tpl_dir = "Views/";
raintpl::$cache_dir = "cache/";
$router = array(//table de routage
    "accueil" => "indexController"
);
if (isset($_SERVER["REQUEST_URI"])) {//routeur
    $uri = $_SERVER["REQUEST_URI"];
    $uri_array = array_filter(explode("/", trim($uri)));//récupère les segments d'uri
    if (count($uri_array) > 0 && array_key_exists($uri_array[1], $router)) {//Si un controlleur est spécifié
        $classname = $router[$uri_array[1]];
        $classpath = "Controller/" . $classname . ".php";
        include $classpath;//alors on l'inclus
        $obj = new $classname();//on l'initialise
        $param[] = null;
        if (count($uri_array) > 1) {//on récupère l'action si besoin
            $action = $uri_array[2] . "Action";
            for ($i = 3; $i < count($uri_array)+1; $i++) {
                $param[$i - 3] = $uri_array[$i];
            }
            if (method_exists($obj, $action)) {//on teste que l'action existe bien
                $obj->$action($param);//et on fait appel a la methode action correspondante avec les paramètres s'il y en a
            } else {
                for ($i = 2; $i < count($uri_array)+1; $i++) {
                    $param[$i-2] = $uri_array[$i];
                }
                $obj->indexAction($param);//sinon, on fait appel a la methode index avec les paramètres
            }
        } else {
            $obj->indexAction();//sinon on fait appel a la methode index sans paramètre
        }
    } else {
        include "Controller/indexController.php";//Par défaut, si aucun controlleur n'est spécifié, on prend le controlleur index par défaut
        $obj = new indexController();
        $obj->indexAction();
    }
}