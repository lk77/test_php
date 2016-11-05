<?php

class indexController {

    /**
     * Action index, qui affiche la page d'accueil
     */
    public function indexAction() {
        $tpl = new raintpl();
        $tpl->assign("menu", array(
            "etudiant-entrepreneur" => "ETUDIANT ENTREPRENEUR",
            "outils" => "BOITE A OUTILS",
            "portrait" => "PORTRAIT D'ETUDIANTS ENTREPRENEURS ET MENTORS",
            "a-propos" => "A PROPOS",
        ));
        $imageDAO = new imageDAO();
        $images = $imageDAO->getImages();
        $tpl->assign("sitetitle","LE PREMIER SITE");
        $tpl->assign("sitesubtitle","DES PHOTOGRAPHES INDÉPENDANTS");
        $tpl->assign("imagestitle","LEE JEFFRIES");
        $tpl->assign("images", $images);
        $articleDAO = new articleDAO();
        $articles = $articleDAO->getArticles();
        $tpl->assign("articles", $articles);
        $tpl->draw('index/index');
    }

}
