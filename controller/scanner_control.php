<?php

include_once "model/connection.php";
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

function handleCheckin($location, $user_id){
    global $conn;
    $sql_check_location = "SELECT * FROM company WHERE company_name = '$location'";
    $result_check_loc = $conn->query($sql_check_location);
    //    echo '<pre>';
    //    var_dump($result_check_loc->fetch_object());
    //    echo '</pre>';

    $sql_insert_loc = "INSERT INTO company (company_name, created) VALUES ('$location', NOW())";

    $sql_insert_checkin = "INSERT INTO checkin (company_id,user_id, created) SELECT company_id,'$user_id', NOW() FROM company WHERE company_name = '$location'";

    if ($result_check_loc){
        // if location already exists
        if($count = $result_check_loc->num_rows){
            // echo '<p>', $count, '</p>';
            echo '$location exists';

        if ($conn->query($sql_insert_checkin) === TRUE) {
            echo "New checkin logged successfully";
            header('Location: scanner.php');
            }
            else
            {
                echo "Error: " . $sql_insert_checkin . "<br>" . $conn->error;
            }
        }
        else {
            echo "Company doesn't exist"."<br>";
            if ($conn->query($sql_insert_loc) === TRUE)
            {
                echo "New location created successfully"."<br>";
                if ($conn->query($sql_insert_checkin) === TRUE) {
                    echo "New attendance record created successfully"."<br>";
                    header('Location: scanner.php');
                 } else {
                    echo "Error: " . $sql_insert_checkin . "<br>" . $conn->error;
                }
            }
                else
                {
                    echo "Error: " . $sql_insert_checkin . "<br>" . $conn->error;
                }
        }
    }
}


function getUserInfo($user_id)
{
    global $conn;
    $sql = "SELECT user_id, user_name, created, mobile_no FROM users WHERE user_id = '$user_id'";
    $sql_checkin = "SELECT COUNT(*) FROM checkin WHERE user_id = $user_id";
    //    $sql_insert_user = "INSERT INTO users(user_name, mobile_no, created) VALUES('$name','$number', NOW())";

    $result = $conn->query($sql);
    //    $result_count_checkin = $conn->query($sql_checkin);
    //    var_dump($result);

    if ($result)
    {
        return $result->fetch_object();
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function editInfo($name, $number, $user_id)
{
    global $conn;
    $sql = "UPDATE users SET user_name = '$name', mobile_no = '$number' WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    if ($result)
    {
        echo 'successfully updated';
        header('Location: scanner.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function countCheckin($userid)
{
    global $conn;
    $sql = "SELECT COUNT(*) as count FROM checkin WHERE user_id = '$userid'";
    $result = $conn->query($sql);
    if ($result)
    {
        //        echo '<pre>';
        //        var_dump($result->fetch_object()->count);
        //        echo '</pre>';
        return $result->fetch_object()->count;
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
