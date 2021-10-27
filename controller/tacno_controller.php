<?php

include_once "../model/connection.php";
require_once '../model/tacno_model.php';

session_start();
//echo session_id();

if (isset($_POST['user-name'], $_POST['mobile-no']))
{
//    $name = $_POST['user-name'];
//    $number = $_POST['mobile-no'];
    global $conn;
    $display_error = false;
    $_SESSION['name'] = $_POST['user-name'];
    $_SESSION['number'] = $_POST['mobile-no'];
    $name = $_SESSION['name'];
    $number = $_SESSION['number'];
//    print_r($conn).'<br>';
//    echo $name.'<br>';
//    echo $number.'<br>';
    $tac = checkUser($name, $number, $conn);
}

if (isset($_POST['tac1'], $_POST['tac2'], $_POST['tac3'],  $_POST['tac4'], $_POST['tac5'], $_POST['tac6'] )){
    $tac_entered = $_POST['tac1'] . $_POST['tac2'] . $_POST['tac3'] . $_POST['tac4'] . $_POST['tac5'] . $_POST['tac6'];
//    echo $tac_entered;
    $user_id = $_SESSION['user_id'] ?? null;
//    echo $user_id;
    $tac = verifyTac($tac_entered, $user_id) ?? null;
    if ($tac){
        $display_error = true;
    }
}

