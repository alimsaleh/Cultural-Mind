<?php
session_start(); // Starting Session
$username=$_POST['username'];
$password=$_POST['password'];
$password1=$_POST['password1'];

if (strlen($password) < 8){
    $arr = array ('status'=>'1','message'=>'Password is too short.');
} else if ($password != $password1){
    $arr = array ('status'=>'1','message'=>'Passwords do not match.');
}else {
//Step1
    $db = mysqli_connect('us-cdbr-iron-east-05.cleardb.net', 'bec1a71a767104', '9a289f08', 'heroku_49030ae2f7996af')
    or die('Error connecting to MySQL server.');


//Step2
    $query = "SELECT * FROM users WHERE username='$username'";
    mysqli_query($db, $query) or die('Error querying database.');

//Step3
    $result = mysqli_query($db, $query);
    mysqli_store_result($db);
    $rows = mysqli_fetch_array($result);
    if ($rows) {
        $arr = array('status' => '2', 'message' => 'Username is taken.');
    } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO `users` (`username`, `pwd`) VALUES ('$username', '$hash');";
        mysqli_query($db, $query) or die('Error querying database.');
        $arr = array('status' => '0', 'message' => 'Account created successfully.');
    }

//Step 4
    mysqli_close($db);
}
echo json_encode($arr);
?>