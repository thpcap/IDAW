<?php
    function createFooter($lang){
        echo"
                    <div id=\"bottom\" class=\"bottom\">
                        <div style=\"background-color: white; height: 1px; width: 100%;\"></div>
                        <p style=\"position: relative; left: 0; margin: 10px;\">Website created by Thomas CAPRON for a course in web developpement</p>
                        <a href=\"index.php?page=contact&lang=".$lang."\" class=\"boutton\">Contact</a>
                        <a href=\"index.php?disconect=1\" class=\"boutton\">Disconnect</a>
                        <img src=\"images/logo-blanc.png\" alt=\"\" class=\"immageIMT\">
                    </div>
                </body>
            </html>";
    }

?>