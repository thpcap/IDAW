<?php
    function createHeader($pageTitle) {
        echo"
        <!doctype html>
        <html>
            <head>
                <title>".$pageTitle."</title>
                <link rel=\"icon\" href=\"logo.png\">
                <meta charset=\"utf-8\">
                <link rel=\"stylesheet\" href=\"styles.css\">
                <link rel=\"stylesheet\" href=\"menu.css\">
            </head>
        <body>
            <div id=\"top\" class=\"top\">
                    <div class=\"flexbox\">";
    }
?>
                