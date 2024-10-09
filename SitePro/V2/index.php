<?php
    require_once('template_header.php');
    createHeader('Acceuil');
    require_once('template_menu.php');
    renderMenuToHTML('index');
?>
        <div id="contenu" class="contenu" style="text-align: center; font-size: x-large;">
            <img src="Youtube_loading_symbol_1_(wobbly).gif" alt="" height="50%" style="position: absolute; right:0; margin: 5px;">
            <img src="Youtube_loading_symbol_1_(wobbly).gif" alt="" height="50%" style="position: absolute; left:0; margin: 5px;">
            <p style="color: blue; font-size: xxx-large;">Bienvenu sur ce Site Web</p>
            <p>Utilisez le <b>menu</b> pour naviguer</p>
            <br><br>
            <p style="font-size: medium;">Site crée pour un cours d'</p>
            <img src="logo-blanc.png" alt="" height="20%">
            <div class="bottom"></div>
            
        </div>
<?php
    require_once('template_bottom.php');
?>