<?php
    function createHeader($pageId,$lang) {
        $mymenu = array(
            //idPage  =>  titre
            'accueil'=> 'Accueil',
            'cv'=> 'Cv',
            'projets'=> 'Projets',
            'contact'=> 'Contact', 
            'erreur'=> 'Erreur',
            'connexion'=>"Connexion"
        );
        if(!array_key_exists($pageId,$mymenu)){
            $pageId='erreur';
        }
        echo"
        <!doctype html>
        <html style=\"min-width: 700px;min-height: 900px;\">
            <head>
                <title>".$mymenu[$pageId]."</title>
                <link rel=\"icon\" href=\"images/logo.png\">
                <meta charset=\"utf-8\">
                <link rel=\"stylesheet\" href=\"css/menu.css\">";

                $arraysCss=array(
                    // form     cookie
                    "style1"=>"style1",
                    "style2"=>"style2"
                );
                if(isset($_COOKIE["style"])&&array_search($_COOKIE["style"],$arraysCss)!=false){
                    $style=array_search($_COOKIE["style"],$arraysCss);
                }else{
                    $style="style1";
                }
                echo "<link rel=\"stylesheet\" href=\"css/".$style.".css\"> 
                
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
                    </nav>
                    <form style=\" top: 20%; position:absolute; right:0; margin-right: 8%;\" id=\"style_form\" action=\"index.php\" method=\"GET\" >
                        <select name=\"css\">
                        <option value=\"style1\"";if($style=="style1"){echo"id=\"selectedStyle\"";}echo">Dark</option>
                        <option value=\"style2\"";if($style=="style2"){echo"id=\"selectedStyle\"";}echo">Light</option>
                    </select>
                        <br>
                        <input type=\"submit\" value=\"Appliquer\" />
                    </form>";
                    
    }
?>
