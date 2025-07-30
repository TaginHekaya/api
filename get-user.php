<?php
$usersfile = "users.json";
if(file_exists($usersfile)){
    $users = json_decode(file_get_contents($usersfile),true);

    $data = file_get_contents($usersfile);
    echo $data;
}else{
    echo json_encode(["error" => "No users found"]);
}
?>