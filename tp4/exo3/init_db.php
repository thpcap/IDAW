<?php
    require_once('config.php');
    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $pdo = NULL;
    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }
    $res=false;
    $querry=file_get_contents("sql/create_db.sql");
    $res=$pdo->query($querry);
    $pdo=null;
    echo "<h1>";
    if($res->errorCode()==0000) echo"database creation sucessfull";
    else echo$res->errorCode();
    echo "</h1>";
    if($res->errorCode()!=0000)echo"<p>to learn more <a href=\"https://www.ibm.com/docs/fr/i/7.5?topic=codes-listing-sqlstate-values\">https://www.ibm.com/docs/fr/i/7.5?topic=codes-listing-sqlstate-values</a></p>";
?>
