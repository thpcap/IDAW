<?php
    function createHeader($pageId,$lang) {
        $mymenu = array(
            //idPage  =>  titre
            'accueil'=> 'Accueil',
            'cv'=> 'Cv',
            'projets'=> 'Projets',
            'contact'=> 'Contact', 
            'erreur'=> 'Erreur'
        );
        if(!array_key_exists($pageId,$mymenu)){
            $pageId='erreur';
        }
        echo"
        <!doctype html>
        <html style=\"min-width: 700px;min-height: 900px;\">
            <head>
                <title>".$mymenu[$pageId]."</title>
                <link rel=\"icon\" href=\"logo.png\">
                <meta charset=\"utf-8\">
                <link rel=\"stylesheet\" href=\"css/styles.css\">
                <link rel=\"stylesheet\" href=\"css/menu.css\">
            </head>
        <body>
            <div id=\"top\" class=\"top\">
                    <div class=\"flexbox\">
                    <nav class=\"menu \" style=\"positon: absolute; right:0;\">
                        <ul>";
        
        $langArr=array(
            'en'=>"images/UK-flag-png-xl.png\" width=20px alt=\"\"> English",
            'fr'=>"images/france-flag-png-xl.png\" width=15px alt=\"\"> Français"
        );
        foreach ($langArr as $langf => $flag) {
            $currentLang="";
            if($langf==$lang){
                $currentLang="id=\"currentlang\"";
            }
            echo "<li><a ".$currentLang." style=\"color:black;\" href=\"index.php?page=".$pageId."&lang=".$langf."\"><img src=\"".$flag."</a></li>";
        }
                            
                    echo "</ul>
                    </nav>";
    }
?>