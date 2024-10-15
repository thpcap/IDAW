<?php
    require_once("init_pdo.php");  
    
    
    function get_users($db){
        $sql = "SELECT * FROM USERS";
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
    function setHeaders() {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json; charset=utf-8');
    }
    function add_users( $db , $name , $email){
        $sql = "INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL,'".$name."', '".$email."')"; 
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $sql=null;
        $sql = "SELECT * FROM USERS WHERE `name`='".$name."' AND `email`='".$email."'";
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $res = $exe->fetch(PDO::FETCH_OBJ);
        return $res;
    }
    function delete_users( $db , $id){
        $sql = "DELETE FROM `users` WHERE `id`=".$id; 
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    function update_users( $db , $id , $name , $email ){
        //remplissage des champs name et email si non donnés
        if($name==""){
            $sql = 'select `name` from users WHERE `users`.`id`='.$id;
            try {
                $request = $db->query($sql);
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
            $name = $request->fetch()[0];
        }
        if( $email== ''){
            $sql = 'select `email` from users WHERE `users`.`id`='.$id;
            try {
                $request = $db->query($sql);
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
            $email = $request->fetch()[0];
        }
        $querry= "UPDATE `users` SET `id`=".$id.", `name` = '".$name."', `email` ='".$email."' WHERE `users`.`id` =".$id;
        $db->query($querry);
        $sql = "SELECT * FROM USERS WHERE `name`='".$name."' AND `id`=".$id;
        try {
            $exe = $db->query($sql);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
        $res = $exe->fetch(PDO::FETCH_OBJ);
        return $res;
    }
    // ==============
    // Responses
    // ==============
    switch($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            $result = get_users($pdo);
            setHeaders();
            http_response_code(200);
            exit(json_encode($result));

        case 'POST':
            $data=json_decode(file_get_contents("php://input"));
            if(isset($data->name)&&isset($data->email)){
                $res=add_users($pdo,$data->name,$data->email);
                if($res!="error"){
                    setHeaders();
                    http_response_code(201);
                    exit(json_encode($res));
                    
                }else{
                    echo"error in add user";
                    http_response_code(501);
                    exit(-1);
                }
            }
            http_response_code(501);
            exit(-1);
        case 'DELETE':
            $data=json_decode(file_get_contents("php://input"));
            if(isset($data->id){
                delete_users($pdo,$data->id);
                http_response_code(200);
                exit(-1);
            }
            http_response_code(501);
            exit(-1);
            
            if(isset($_POST["update"])&&isset($_POST["id"])&&isset($_POST['name'])&&isset($_POST['email'])){
                $id=$_POST["id"];                
                $name=$_POST["name"];
                $email=$_POST["email"];
                $res=update_users($pdo,$id,$name,$email);
                http_response_code(200);
                exit(exit(json_encode($res)));
            }
            http_response_code(501);
            exit(-1);
    }