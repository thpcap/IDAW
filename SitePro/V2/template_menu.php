<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
        // idPage titre
        'index'=> array('Accueil'),
        'cv'=> array('Cv'),
        'projets'=> array('Projets')
        'contacts'=> array('Contacts')
        );
        // ...
        foreach($mymenu as $pageId => $pageParameters) {
        echo "...";
        }
    // ...
    }
?>
<nav class="menu">
                    <ul>
                        <li class="deroulant"><p>Menu</p>
                            <ul class="sous">
                                <li><a href="index.php" >Acceuil</a></li>
                                <li><a href="cv.php">CV</a></li>
                                <li><a href="projets.php">Projets</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>