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
                <link rel=\"stylesheet\" href=\"styles.css\">
                <link rel=\"stylesheet\" href=\"menu.css\">
            </head>
        <body>
            <div id=\"top\" class=\"top\">
                    <div class=\"flexbox\">
                    <nav class=\"menu \" style=\"positon: absolute; right:0;\">
                        <ul>
                            <li><a  style=\"color:white;\" href=\"index.php?page=".$pageId."&lang=en\"><img src=\"UK-flag-png-xl.png\" width=20px alt=\"\"> English</a></li>
                            <li><a  style=\"color:white;\" href=\"index.php?page=".$pageId."&lang=fr\"><img src=\"france-flag-png-xl.png\" width=15px alt=\"\"> Français</a></li>
                        </ul>
                    </nav>";
    }
?>
