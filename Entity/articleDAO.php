<?php

class articleDAO {

    const urlPrefix = "../../Resources/images/";

    private $_db = null;

    private function setPDO() {
        $dsn = 'mysql:dbname=test_php;host=127.0.0.1;port=3306';
        $username = 'root';
        $password = 'root';
        if ($this->_db == null) {
            try {
                $this->_db = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                die('Connexion a la base impossible:<br/>' . $e);
            }
        }
    }

    function __construct() {
        $this->setPDO();
    }

    /*
     * Retourne le nombre d'articles référencées dans le DAO
     */

    function size() {
        $sql = $this->_db->prepare("SELECT COUNT(*) FROM article");
        $sql->execute();
        $result = $sql->fetch();
        return $result[0];
    }

    /**
     * calcule le prochain id
     * @return type
     */
    function nextId() {
        $sql = $this->_db->prepare("SELECT id FROM `article` ORDER BY id DESC LIMIT 1");
        $sql->execute();
        $result = $sql->fetchColumn(0);
        return $result + 1;
    }

    /*
     * Retourne un objet article correspondant à l'identifiant
     */

    function getArticle($articleId) {
        # Verifie que cet identifiant est correct
        if (!($articleId >= 0 and $articleId <= $this->size())) {
            debug_print_backtrace();
            die("<h1>Erreur dans articleDAO.getArticle: articleId=" . $articleId . " incorrect</h1>");
        }
        $sql = $this->_db->prepare("SELECT * FROM article WHERE id = :id");
        $sql->bindParam(':id', $articleId, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $url = self::urlPrefix . $result["url"];
        return new article($articleId, $url, $result['category'], $result['date'], $result['title'], $result['text']);
    }
    
    /*
     *  Retourne tous les articles
     */
    function getArticles() {
        $sql = $this->_db->prepare("SELECT * FROM article");
        $sql->execute();
        $result = $sql->fetchAll();
        $articles[] = null;
        foreach($result as $article){
            $url = self::urlPrefix . $article["url"];
            $articles[$article["id"]-1] = new article( $article["id"], $url, $article['category'],$article['date'],$article['title'], $article['text']);
        }
        return $articles;
    }

    /**
     * met a jour un article
     * @param type $article
     */
    function updateArticle($article) {
        $this->_db->exec("UPDATE `article` SET `url`='" . $article->getUrl() . "',`category`='" . $article->getCategory() . "',`date`='" . $article->getDate() . "',`title`='" . $article->getTitle() . "',`text`='" . $article->getText() . "' WHERE id=" . $article->getId());
    }

    /**
     * Crée un article
     * @param type $article
     */
    function createArticle($article) {
        $this->_db->exec("INSERT INTO `article`(`id`, `url`, `category`, `date`,`title`,`text`) VALUES (" . $article->getId() . ",'" . $article->getURL() . "','" . $article->getCategory() . "','" . $article->getDate() . "','" . $article->getTitle() . "','" . $article->getText() . "')");
    }

    /**
     * récupère toutes les catégories
     * @return type
     */
    function getCategories() {
        $sql = $this->_db->prepare("SELECT id,category FROM article GROUP BY category");
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }

    function deleteCategorie($categorie) {
        $this->_db->exec("UPDATE `article` SET `category`=NULL WHERE category=" . $categorie);
    }

}

?>