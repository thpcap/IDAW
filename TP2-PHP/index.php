<!DOCTYPE html>
<html>
    <head>
        <title>hour</title>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            date_default_timezone_set('Europe/Paris');
            $date=date("j F  Y, g:i:s");
            echo 'date: '.$date;
        ?>
    </body>
</html>
