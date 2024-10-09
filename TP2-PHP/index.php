<!DOCTYPE html>
<html>
    <head>
        <title>hour</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="menu.css">
    </head>

    <body>
        <?php
            date_default_timezone_set('Europe/Paris');
            $date=date("j F  Y, g:i:s");
            echo 'date: '.$date;
        ?>
    </body>
</html>
