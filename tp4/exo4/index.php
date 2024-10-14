<!DOCTYPE html>
<html>
    <head>
        <title>Hello World</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form method="POST">
            <input name="Delete" type="hidden">
            <table class="tableDb">
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
                            echo "<tr>";
                                echo "<th scope=\"row\"><input type=\"radio\" name=\"id\" value=\"".$this->id."\"></th>";
                                echo "<td>".$this->id."</td>";
                                echo "<td>".$this->name."</td>";
                                echo "<td>".$this->email."</td>";
                            echo "</tr>";
                        }
                    }
                    $sql = 'select * from users';
                    $request = $pdo->query($sql);
                    
                    $allUsers = $request->fetchAll(PDO::FETCH_CLASS,'User');
                ?>
                <thead>
                    <tr>
                        <th scope="col"  colspan="4"><h1 style="margin: 0;">Table: Users</h1></th>
                    </tr>
                    <tr>    
                        <th scope="col"><input type="submit" value="Delete"></th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($allUsers as $key => $user) {
                            $user->toHtml();
                        }
                        $pdo = null;

                    ?>
                    <tr>
                        <th><input type="reset" value="Reset"></th>
                    </tr>
                </tbody>
            </table>
        </form>
        <br>
        <form method="POST">
            <input name="Add" type="hidden">
            <table class="tableform">
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Add"></td>
                    <td><input type="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
        
        <?php
            //gestion des requests
            if(isset($_POST["Add"])&&isset($_POST["name"])&&isset($_POST["email"])&&$_POST['name']!=""&&$_POST['email']!=""){
                $name=$_POST["name"];
                $email=$_POST["email"];
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
                $querry="INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL,'".$name."', '".$email."')";
                $pdo->query($querry);
                $pdo=null;
                header( "refresh:0" );
            }
            if(isset($_POST["Delete"])&&isset($_POST["id"])){
                $id=$_POST["id"];
                
                //TODO ajouter dans la base les données
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
                $querry="DELETE FROM `users` WHERE `id`=".$id;
                $pdo->query($querry);
                $pdo=null;
                header( "refresh:0" );
            }
        ?>
    </body>
</html>