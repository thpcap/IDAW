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
                <link rel=\"stylesheet\" href=\"css/menu.css\">";

                $arraysCss=array(
                    // form     cookie
                    "style1"=>"style1",
                    "style2"=>"style2"
                );
                if(array_search($_COOKIE["style"],$arraysCss)!=false){
                    $style=array_search($_COOKIE["style"],$arraysCss);
                    echo $_COOKIE["style"];
                }else{
                    $style="style1";
                }
                if(isset($_GET["css"])&&key_exists($_GET["css"],$arraysCss)){
                    setcookie("style",$arraysCss[$_GET["css"]],time()+60*10);
                    //$style=$arraysCss[$_GET["css"]];
                    setcookie('refreshed',true);
                    if(key_exists('refreshed',$_COOKIE)){
                        header("Refresh:0");
                        setcookie('refreshed',"",time()-100);
                    }
                }
                echo $style;
                echo "<link rel=\"stylesheet\" href=\"".$style.".css\"> 
                
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
                    <form style=\" margin:auto top: 20%; position:absolute; right:0;\" id=\"style_form\" action=\"index.php\" method=\"GET\" >
                        <select name=\"css\">
                        <option value=\"style1\">style1</option>
                        <option value=\"style2\">style2</option>
                    </select>
                        <input type=\"submit\" value=\"Appliquer\" />
                    </form>";
                    
    }
?>
