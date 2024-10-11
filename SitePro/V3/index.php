<?php
    session_start();
    //gestion de la requette Get
    $currentPageId = 'connexion';
    $lang='fr';
    $langArr=array('fr','en');

    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    if(isset($_GET['lang'])) {
        $lang = $_GET['lang'];
    }
    if(!in_array($lang,$langArr)){
        $lang='fr';
    }


    //haut de page
    require_once("template_header.php");
    createHeader($currentPageId,$lang);
    require_once("template_menu.php");
    if(isset($_SESSION)&&key_exists("login",$_SESSION)){
        renderMenuToHTML($currentPageId,$lang,$_SESSION['login']);
    }else 
        renderMenuToHTML($currentPageId,$lang,"not loged");
    

    //contenu
    $pageToInclude =$lang."/".$currentPageId ."_".$lang.".php";
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once($lang."/error_".$lang.".php");
    echo $_SESSION['login'];
    //bas de page
    require_once("footer.php");
    createFooter($lang);

    if(isset($_GET["disconect"])){
        session_destroy();
        $_SESSION=[];
        header("Location: index.php");
        exit();
    }
?>