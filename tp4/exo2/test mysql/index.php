<!DOCTYPE html>
<html>
    <head>
        <title>Hello World</title>
        <meta charset="utf-8">
    </head>
    <body>

        <?php
            require_once('config.php');
            $connectionString = "mysql:host=". _MYSQL_HOST;
            if(defined('_MYSQL_PORT'))
                $connectionString .= ";port=". _MYSQL_PORT;
            $connectionString .= ";dbname=" . _MYSQL_DBNAME;
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            $pdo = NULL;
            try {
                $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $erreur) {
                echo 'Erreur : '.$erreur->getMessage();
            }
            
            class User
            {
                private $id;
                private $name;
                private $email;
                public function toHtml()
                {
                    echo "<ul><li>Id : " . $this->id . "</li>";
                    echo "<li>Name : ". $this->name ."</li>";
                    echo "<li>Email : " . $this->email . "</li></ul>";
                }
            }
            $sql = 'select * from users';
            $request = $pdo->query($sql);
            echo '<h1>Users</h1>';
            $allUsers = $request->fetchAll(PDO::FETCH_CLASS,'User');
            foreach ($allUsers as $key => $user) {
                $user->toHtml();
            }
            $pdo = null;

        ?>
        
    </body>
</html>