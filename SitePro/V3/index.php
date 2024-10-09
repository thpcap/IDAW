<?php
    require_once("template_header.php");
    
    $currentPageId = 'accueil';
    $lang='fr';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    if(isset($_GET['lang'])) {
        $lang = $_GET['lang'];
    }
    $langArr=array('fr','en');
    if(!in_array($lang,$langArr)){
        $lang='fr';
    }
    require_once("template_menu.php");
    createHeader($currentPageId,$lang);
    renderMenuToHTML($currentPageId,$lang);
?>
<section class="corps">
        <?php
            $pageToInclude = $currentPageId ."_".$lang.".php";
            if(is_readable($pageToInclude))
                require_once($pageToInclude);
            else
                require_once("error_".$lang.".php");
        ?>
    </section>
<?php
    require_once("footer.php");
    createFooter($lang);
?>