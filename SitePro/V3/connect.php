<?php
    session_start();
    // on simule une base de données
    $users = array(
        // login => password
        'Thomas'=> 'CAPRON',
        'Anakin'=> 'pasmaitrejedi');
    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
        } else
            $errorText = "Erreur de login/password";
    } else
        $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
        echo $errorText;
    } else {
        $_SESSION['login']=$login;
        $_SESSION['loged_in']=true;
    }
    header("Location: index.php");
    exit();
?>