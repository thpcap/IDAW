<?php
    require_once('template_header.php');
    createHeader('CV');
    require_once('template_menu.php');
    renderMenuToHTML('cv');
?>
        <div id="contenu" class="contenu" style="text-align: center;">
            <div style="margin: 10px;">
                <h1 style="color: lightblue;">Thomas CAPRON</h1>
                <h2 style="color: cornflowerblue;">Futur developper web</h2>
                <p> Recherche stage en informatique de 12 à 16 semaines :</p>
                <div style="display:flex; align-items: center; justify-content: center; text-align: left;">
                    <div style="background-color: gray; border-radius: 15px; width: 200px; margin: 2%;">
                        <h2 style="margin: 10px;">Compétances :</h2>
                        <ul>
                            <li>Travail d’équipe</li>
                            <li>Gestion du temps</li>
                            <li>Adaptabilité</li>
                            <li>Esprit d’initiative</li>
                            <li>Rigueur</li>
                            <li>Méthode</li>
                        </ul>
                    </div>
                    <div style="background-color: darkblue; border-radius: 15px; width: 250px; margin: 2%;">
                        <h2 style="margin: 10px;">Connaissances en informatique :</h2>
                        <ul>
                            <li>C, Java, Python</li>
                            <li>HTML, CSS, JavaScript</li>
                            <li>SQL</li>
                            <li>Linux, Windows</li>
                            <li>Virtualisation</li>
                            <li>Infrastructure Réseau</li>
                            <li>Infrastructure Web</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <h2>Stages</h2>
                </div>
            </div>
<?php
    require_once('template_bottom.php');
?>