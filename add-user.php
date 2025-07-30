<?php 

 $data = json_decode(file_get_contents("php://input"), true);
 if(!isset($data["name"]) || $data["name"] == ""){
    echo json_encode(["error" => "Name is required"]);
    exit;
 }

 $usersfile = "users.json";
 $users = file_exists($usersfile)?
 json_decode(file_get_contents($usersfile),true):[];

 $users[] = ["name" => $data["name"]];
 file_put_contents($usersfile,json_encode($users));


 echo json_encode(["message" => "User added successfully"]);
 ?>
