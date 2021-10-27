<?php

include_once "model/connection.php";
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

function checkUser($name, $number, $conn){
    $sql_check_user = "SELECT user_id FROM users WHERE user_name = '$name' AND mobile_no = '$number'";
    $sql_insert_user = "INSERT INTO users(user_name, mobile_no, created) VALUES('$name','$number', NOW())";

    $result_check = $conn->query($sql_check_user);

    if($result_check)
    {
        while($row = $result_check->fetch_object()){
            $_SESSION['user_id'] = $row->user_id;
            $user_id = $_SESSION['user_id'] ?? null;
//            $user_id = $row->user_id ?? null;
        }

//        echo $user_id;
        // if user already exists
        if($count = $result_check->num_rows){
//            echo '<pre>';
//            var_dump($result_check);
//            echo '</pre>';

            echo "User exists";
            // redirect to scanner.php
//                header('Location: scanner.php');
        } else {
            echo "User doesn't exist";
            if ($conn->query($sql_insert_user) === TRUE) {
                echo "New user created successfully"."<br>";
            } else {
                echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
            }
        }
        return generateTac(6, $user_id);
    }
}

function generateTac($num, $id){
    global $conn;
    // generate a random array of numbers
    $tac = [];
    for ($i = 0; $i < $num; $i++){
        $tac[] = rand(0,9);
    }
    $tac = implode($tac);

    $sql = "INSERT INTO tac (tac_no, user_id, created_at) VALUES ('$tac', '$id', NOW())";
    $result = $conn->query($sql);
    if ($result){
//        echo "TAC inserted in DB".'<br>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    return $tac ;
}

function verifyTac($tac, $id) {
    global $conn;
    $sql = "SELECT tac_no FROM tac WHERE user_id = '$id' ORDER BY tac_id DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result){
        while($row = $result->fetch_object()){
            if ($tac === $row->tac_no){
//                echo 'tac matches';
                header('Location: scanner.php');
            } else {
//                echo "tac doesn't match, please try again";
                return generateTac(6, $id);
            }
        }
    }
}

