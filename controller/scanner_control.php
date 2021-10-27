<?php

include_once "../model/connection.php";
require_once "../model/scanner_model.php";
session_start();

$user_id = $_SESSION['user_id'] ?? null;
echo 'UserID ='. $user_id.'<br>';
if ($user_id){
    $person = getUserInfo($user_id);
    echo '<pre>';
    var_dump($person);
    echo '</pre>';
    $total_checkins = countCheckin($user_id);
    if ($total_checkins > 8){
        $check_symbol = '&#10003;';
    }
    echo "total checkins". " : ". $total_checkins;
}

if (isset($_POST['user-name'], $_POST['mobile-no'])){
    $user_name = $_POST['user-name'];
    $mobile_no = $_POST['mobile-no'];
    editInfo($user_name, $mobile_no, $user_id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (isset($_POST['submit'], $_POST['location'])){
        if ($_POST['location']){
            $location = $_POST['location'];
            handleCheckin($location, $user_id);
        }
    }
}
