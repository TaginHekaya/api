<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["name"])) {
    echo json_encode(["message" => "الاسم غير موجود"]);
    exit;
}

$name = $data["name"];
$usersFile = "users.json";

if (!file_exists($usersFile)) {
    echo json_encode(["message" => "لا يوجد مستخدمين"]);
    exit;
}

$users = json_decode(file_get_contents($usersFile), true);

// Filter out the user with the matching name
$users = array_values(array_filter($users, function($user) use ($name) {
    return $user["name"] !== $name;
}));

file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));

echo json_encode(["message" => "تم الحذف بنجاح"]);
?>