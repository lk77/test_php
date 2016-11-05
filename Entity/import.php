<?php
$dsn = 'mysql:host=127.0.0.1;port=3306';
$username = 'root';
$password = 'root';
try {
    $db = new PDO($dsn, $username, $password); 
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}
$db->exec('CREATE DATABASE IF NOT EXISTS test_php;');
$db->query("use test_php");
$db->query("CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
$article = fopen('article', 'r');
while (!feof($article)) {
    $line = fgets($article);
    $array = explode("#",$line);
    $sql = "INSERT INTO `article`(`id`,`url`, `category`, `date`,`title`,`text`) VALUES ('".$array[0]."','".addslashes($array[1])."','".addslashes($array[2])."','".date('Y-m-d',strtotime($array[3]))."','".addslashes($array[4])."','".addslashes($array[5])."')";
    $db->exec($sql);
}
fclose($article);
$image = fopen('image', 'r');
while (!feof($image)) {
    $line = fgets($image);
    $array = explode("#",$line);
    $sql = "INSERT INTO `image`(`id`, `url`,`title`,`text`) VALUES ('".$array[0]."','".$array[1]."','".$array[2]."','".$array[3]."')";
    $db->exec($sql);
}
fclose($image);
?>