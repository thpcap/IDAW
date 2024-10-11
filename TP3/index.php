<!DOCTYPE html>
<html>
    <head>
        <title>hour</title>
        <meta charset="utf-8">
        <?php
            $arraysCss=array(
              // form     cookie
                "style1"=>"style1",
                "style2"=>"style2"
            );
            if(array_search($_COOKIE["style"],$arraysCss)!=false){
                $style=array_search($_COOKIE["style"],$arraysCss);
                echo $_COOKIE["style"];
                setcookie('refreshed',true);
            }else{
                $style="style1";
            }
            if(isset($_GET["css"])&&key_exists($_GET["css"],$arraysCss)){
                setcookie("style",$arraysCss[$_GET["css"]],time()+60*10);
                //$style=$arraysCss[$_GET["css"]];
                if(key_exists('refreshed',$_COOKIE)){
                    header("Refresh:0");
                    setcookie('refreshed',"",time()-100);
                }
            }
            echo "<link rel=\"stylesheet\" href=\"".$style.".css\">";
        ?>
    </head>

    <body>
        <form id="style_form" action="index.php" method="GET">
            <select name="css">
            <option value="style1">style1</option>
            <option value="style2">style2</option>
        </select>
            <input type="submit" value="Appliquer" />
        </form>
    </body>
</html>
