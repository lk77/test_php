<?php

class imageDAO {

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
     * Retourne le nombre d'images référencées dans le DAO
     */
    function size() {
        $sql = $this->_db->prepare("SELECT COUNT(*) FROM image");
        $sql->execute();
        $result = $sql->fetch();
        return $result[0];
    }

    /**
     * calcule le prochain id
     * @return type
     */
    function nextId() {
        $sql = $this->_db->prepare("SELECT id FROM `image` ORDER BY id DESC LIMIT 1");
        $sql->execute();
        $result = $sql->fetchColumn(0);
        return $result + 1;
    }

    /*
     *  Retourne un objet image correspondant à l'identifiant
     */
    function getImage($imageId) {
        # Verifie que cet identifiant est correct
        if (!($imageId >= 0 and $imageId <= $this->size())) {
            debug_print_backtrace();
            die("<h1>Erreur dans imageDAO.getImage: imageId=" . $imageId . " incorrect</h1>");
        }
        $sql = $this->_db->prepare("SELECT * FROM image WHERE id = :id");
        $sql->bindParam(':id', $imageId, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch();
        $url = self::urlPrefix . $result["url"];
        return new image($imageId, $url, $result['title'], $result['text']);
    }
    
    /*
     *  Retourne toutes les images
     */
    function getImages() {
        $sql = $this->_db->prepare("SELECT * FROM image");
        $sql->execute();
        $result = $sql->fetchAll();
        $images[] = null;
        foreach($result as $image){
            $url = $image["url"];
            $images[$image["id"]-1] = new image( $image["id"], $url, $image['title'], $image['text']);
        }
        return $images;
    }

    /**
     * met a jour une image
     * @param type $image
     */
    function updateImage($image) {
        $this->_db->exec("UPDATE `image` SET `url`='" . $image->getUrl() . "',`title`='" . $image->getTitle() . "',`text`='" . $image->getText() . "' WHERE id=" . $image->getId());
    }

    /**
     * Crée une image
     * @param type $image
     */
    function createImage($image) {
        $this->_db->exec("INSERT INTO `image`(`id`, `url`,`title`,`text`) VALUES (" . $image->getId() . ",'" . $image->getURL() . "','" . $image->getTitle() . "','" . $image->getText() . "')");
    }
}

?>