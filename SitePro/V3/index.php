<?php
    //gestion de la requette Get
    $currentPageId = 'accueil';
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
    renderMenuToHTML($currentPageId,$lang);
    

    //contenu
    $pageToInclude =$lang."/".$currentPageId ."_".$lang.".php";
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once($lang."/error_".$lang.".php");
    
    //bas de page
    require_once("footer.php");
    createFooter($lang);
?>