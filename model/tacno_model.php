<?php


function checkUser($name, $number, $conn){
    $sql_check_user = "SELECT user_id FROM users WHERE user_name = '$name' AND mobile_no = '$number'";
    $sql_insert_user = "INSERT INTO users(user_name, mobile_no, created) VALUES('$name','$number', NOW())";

    $result_check = $conn->query($sql_check_user);

    if($result_check)
    {
        while($row = $result_check->fetch_object()){
            $_SESSION['user_id'] = $row->user_id;
            $user_id = $_SESSION['user_id'] ?? null;
        }
        if($count = $result_check->num_rows){
            // if user exists
            echo "User exists";
        } else {
            // if user doesn't exist
            echo "User doesn't exist";
            if ($conn->query($sql_insert_user) === TRUE) {
                echo "New user created successfully"."<br>";
                $result_check = $conn->query($sql_check_user);
                while($row = $result_check->fetch_object()){
                    $_SESSION['user_id'] = $row->user_id;
                    $user_id = $_SESSION['user_id'] ?? null;
                }
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

