<?php
    function renderMenuToHTML($currentPageId, $lang) {
        // un tableau qui définit la structure du site
        $mymenu = array(
        //idPage  =>  titre
        'accueil'=> 'Accueil',
        'cv'=> 'Cv',
        'projets'=> 'Projets',
        'contact'=> 'Contact'
        );
        echo "<nav class=\"menu\">\n<ul>\n<li class=\"deroulant\">\n<p>Menu</p>\n<ul class=\"sous\">";
        foreach($mymenu as $pageId => $pageParameters) {
            if ($pageId===$currentPageId) {
                $currentPage=" id=\"currentpage\"";
            }else{
                $currentPage="";
            }
            echo "<li><a href=\"index.php?page=".$pageId."&lang=".$lang."\"".$currentPage.">".$pageParameters."</a></li>";
        }
        echo "</ul>\n</li>\n</ul>\n</nav>\n<h1 class=\"centered\" id=\"title\">";
        if(array_key_exists($currentPageId,$mymenu)){
            echo$mymenu[$currentPageId];
        }else{
            echo'Erreur';
        }
        echo"</h1>\n</div>\n<br>\n<div style=\"background-color: white; height: 1px; width: 100%; bottom: 0; position: absolute;\">\n</div>\n</div>";
    }
?>