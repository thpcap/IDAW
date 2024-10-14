<?php
    session_start();
    $arraysCss=array(
        // form     cookie
        "style1"=>"style1",
        "style2"=>"style2"
    );
    if(isset($_GET["css"])&&key_exists($_GET["css"],$arraysCss)){
        setcookie("style",$arraysCss[$_GET["css"]],time()+60*60*24*2);
        //$style=$arraysCss[$_GET["css"]];
        setcookie('refreshed',true);
        if(key_exists('refreshed',$_COOKIE)){
            header("Refresh:0");
            setcookie('refreshed',"",time()-100);
        }
    }



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
    }else{
        renderMenuToHTML($currentPageId,$lang,"please log in");
    }
    //contenu
    $pageToInclude =$lang."/".$currentPageId ."_".$lang.".php";
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once($lang."/error_".$lang.".php");
    //bas de page
    require_once("footer.php");
    createFooter($lang);

    if(isset($_GET["disconect"])){
        session_unset();
        session_destroy();
        $_SESSION=[];
        header("Location: index.php?lang=".$lang);
        exit();
    }
?>