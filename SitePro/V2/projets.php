<?php
    require_once('template_header.php');
    createHeader('Projets');
    require_once('template_menu.php');
    renderMenuToHTML('projets');
?>
        <div id="contenu" class="contenu">
            <div id="projet1" style="border: 2px white solid; background-color: #151515 ; width: auto; margin-top: 20px; border-radius: 30px;">
                <h1 style="color:aliceblue; margin-left: 10px;">/Projet 1/</h1>
                <h2 style="color:crimson; margin-left: 10px;">/Temps du projet/</h2>
                <p style="margin-left: 10px; color: darkcyan;">/explication du projet/</p>
            </div>

            <div id="projet2" style="border: 2px white solid; background-color: darkblue ; width: auto; margin-top: 20px; border-radius: 30px;">
                <h1 style="color:aliceblue; margin-left: 10px;">/Projet 2/</h1>
                <h2 style="color:crimson; margin-left: 10px;">/Temps du projet/</h2>
                <p style="margin-left: 10px; color: darkcyan;">/explication du projet/</p>
            </div>

            <div id="projet3" style="border: 2px white solid; background-color: red ; width: auto; margin-top: 20px; border-radius: 30px;">
                <h1 style="color:aliceblue; margin-left: 10px;">/Projet 3/</h1>
                <h2 style="color:crimson; margin-left: 10px;">/Temps du projet/</h2>
                <p style="margin-left: 10px; color: darkcyan;">/explication du projet/</p>
            </div>

            <div id="projet4" style="border: 2px white solid; background-color: orange; width: auto; margin-top: 20px; border-radius: 30px; margin-bottom: 10px;">
                <h1 style="color:aliceblue; margin-left: 10px;">/Projet 4/</h1>
                <h2 style="color:crimson; margin-left: 10px;">/Temps du projet/</h2>
                <p style="margin-left: 10px; color: darkcyan;">/explication du projet/</p>
            </div>
            <div class="bottom"></div>
        </div>
<?php
    require_once('template_bottom.php');
?>