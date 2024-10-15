<!DOCTYPE html>
<html>
    <head>
        <title>Users Admin CRUD</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Users Database CRUD</h1>
        <form method="POST" id="Delete">
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
                        <th scope="col"  colspan="4"><h2 style="margin: 0;">Table: Users</h2></th>
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
        <form method="POST" id="Create">
            <input name="Create" type="hidden" >
            <table class="tableform">
                <tr>
                    <th colspan="2"><h2 style="margin: 0;">Create a User</h2></th>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name" autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="email" name="email" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Create"></td>
                    <td><input type="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
        <br>
        <form method="POST" id="Update">
            <input name="Update" type="hidden" >
            <table class="tableform">
                <tr>
                    <th colspan="2"><h2 style="margin: 0;">Update a User</h2></th>
                </tr>
                <tr>
                    <th>Id:</th>
                    <td><input type="number" name="id" autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><input type="text" name="name" autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="email" name="email" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Update"></td>
                    <td><input type="reset" value="Reset"></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="font-size: x-small; margin:0;">N.B.The User modified will be the user with the provided Id</p></td>
                </tr>
            </table>
        </form>
        
        <?php
            //gestion des requests
            //requete post pour ajouter un User
            if(isset($_POST["Create"])&&isset($_POST["name"])&&isset($_POST["email"])&&$_POST['name']!=""&&$_POST['email']!=""){
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
            //requete post pour supprimer un User
            if(isset($_POST["Delete"])&&isset($_POST["id"])){
                $id=$_POST["id"];
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
            //requete post pour modifier un User
            if(isset($_POST["Update"])&&isset($_POST["id"])){
                $id=$_POST["id"];                
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
                //remplissage des champs name et email si non donnés
                if($_POST["name"]==""){
                    $sql = 'select `name` from users WHERE `users`.`id`='.$id;
                    $request = $pdo->query($sql);
                    $name = $request->fetch()[0];
                }else{
                    $name=$_POST["name"];
                }
                if($_POST["email"]==""){
                    $sql = 'select `email` from users WHERE `users`.`id`='.$id;
                    $request = $pdo->query($sql);
                    $email = $request->fetch()[0];
                }else{
                    $email=$_POST["email"];
                }
                $querry="UPDATE `users` SET `id`=".$id.", `name` = '".$name."', `email` ='".$email."' WHERE `users`.`id` =".$id;
                $pdo->query($querry);
                $pdo=null;
                header( "refresh:0" );
            }
        ?>
    </body>
</html>