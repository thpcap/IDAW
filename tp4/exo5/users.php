<?php
    require_once("init_pdo.php");  
    function escape_special_characters($string) {
        // Liste des caractères spéciaux à échapper
        $special_characters = "\0\n\r\t\\'\"\x1a\|\&\`\#"; // Caractères spéciaux communs
        // On utilise addcslashes pour ajouter des \ devant les caractères spéciaux
        return addcslashes($string, $special_characters);
    }
    function unescape_special_characters_in_object($object) {
        foreach ($object as $key => $value) {
            if (is_string($value)) {
                // Appliquer stripslashes uniquement sur les propriétés qui sont des chaînes de caractères
                $object->$key = stripslashes($value);
            }
        }
        return $object;
    }
    function testId($db,$id){
        $id=escape_special_characters($id);
        $sql = "SELECT `id` FROM USERS WHERE `id`=".$id;
        try {
            $exe = $db->query($sql);
            $exe=$exe->fetch();
            return $exe!=false;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
    }
    
    function get_users($db){
        $sql = "SELECT * FROM USERS";
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        $res=unescape_special_characters_in_object($res);
        return $res;
    }
    function get_one_user($db,$id){
        $id=escape_special_characters($id);
        $sql = "SELECT * FROM USERS WHERE `id`=".$id;
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        $res=unescape_special_characters_in_object($res);
        return $res;
    }
    function setHeaders() {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json; charset=utf-8');
    }
    function add_users( $db , $name , $email){
        $name=escape_special_characters($name);
        $email=escape_special_characters($email);
        $sql = "INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL,'".$name."', '".$email."')"; 
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
        $sql=null;
        $sql = "SELECT * FROM USERS WHERE `name`='".$name."' AND `email`='".$email."'";
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
        $res = $exe->fetch(PDO::FETCH_OBJ);
        $res=unescape_special_characters_in_object($res);
        return $res;
    }
    function delete_users( $db , $id){
        $id=escape_special_characters($id);
        $sql = "DELETE FROM `users` WHERE `id`=".$id; 
        try {
            $exe = $db->query($sql);
            return $exe;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
    }
    function update_users( $db , $id , $name , $email ){
        $id=escape_special_characters($id);
        $name=escape_special_characters($name);
        $email=escape_special_characters($email);
        //remplissage des champs name et email si non donnés
        if($name==""){
            $sql = 'select `name` from users WHERE `users`.`id`='.$id;
            try {
                $request = $db->query($sql);
            } catch (\Throwable $th) {
                echo $th->getMessage();
                echo "envoyer un message à l'admin système";
                http_response_code(500);
                exit(-1);
            }
            $name = $request->fetch()[0];
        }
        if( $email== ''){
            $sql = 'select `email` from users WHERE `users`.`id`='.$id;
            try {
                $request = $db->query($sql);
            } catch (\Throwable $th) {
                echo $th->getMessage();
                echo "envoyer un message à l'admin système";
                http_response_code(500);
                exit(-1);
            }
            $email = $request->fetch()[0];
        }
        $sql= "UPDATE `users` SET `id`=".$id.", `name` = '".$name."', `email` ='".$email."' WHERE `users`.`id` =".$id;
        try {
            $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
        $sql = "SELECT * FROM USERS WHERE `id`=".$id;
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo "envoyer un message à l'admin système";
            http_response_code(500);
            exit(-1);
        }
        $res = $exe->fetch(PDO::FETCH_OBJ);
        $res=unescape_special_characters_in_object($res);
        return $res;
    }
    // ==============
    // Responses
    // ==============
    switch($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            if(!isset($_GET['id'])){
                $result = get_users($pdo);
                setHeaders();
                http_response_code(200);
                exit(json_encode($result));
            }else{
                if(testId($pdo,$_GET['id'])){
                    $result = get_one_user($pdo,$_GET['id']);
                    setHeaders();
                    http_response_code(200);
                    exit(json_encode($result));
                }else{
                    http_response_code(404);
                    exit(-1);
                }
            }


        case 'POST':
            $data=json_decode(file_get_contents("php://input"));
            if(isset($data->name)&&isset($data->email)){
                $res=add_users($pdo,$data->name,$data->email);
                setHeaders();
                http_response_code(201);
                exit(json_encode($res));
            }
            http_response_code(400);
            exit(-1);

        case 'DELETE':
            $data=json_decode(file_get_contents("php://input"));
            if(isset($data->id)){
                if(!testId($pdo,$data->id)){
                    http_response_code(404);
                    exit(-1);
                }
                if(delete_users($pdo,$data->id)===false){
                    http_response_code(500);
                    exit(-1);
                }
                setHeaders();
                http_response_code(200);
                exit(json_encode($data));
            }
            http_response_code(400);
            exit(-1);

        case 'PUT':
            $data=json_decode(file_get_contents("php://input"));
            if(isset($data->id)&&isset($data->name)&&isset($data->email)){
                $id=$data->id;                
                $name=$data->name;
                $email=$data->email;
                $res=update_users($pdo,$id,$name,$email);
                setHeaders();
                if($res==false){
                    http_response_code(404);
                    exit(-1);
                }
                http_response_code(200);
                exit(json_encode($res));
            }
            http_response_code(400);
            exit(-1);
    }