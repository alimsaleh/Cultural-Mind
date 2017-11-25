<?php
session_start(); // Starting Session
$username=$_POST['username'];
$password=$_POST['password'];

//Step1
$db = mysqli_connect('us-cdbr-iron-east-05.cleardb.net','bec1a71a767104','9a289f08','heroku_49030ae2f7996af')
or die('Error connecting to MySQL server.');


//Step2
$query = "SELECT * FROM users WHERE username='$username'";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
mysqli_store_result($db);
$rows = mysqli_fetch_array($result);

$hash = $rows['pwd'];

if (password_verify($password, $hash)) {
    $_SESSION['login_user']=$username; // Initializing Session
    include_once ('header.php');
    echo '<h3 class="log_message">Successfully logged in.</h3>';
    echo "<h3 class='log_message'>Redirecting to home page in 3 seconds.</h3>";
    echo "<script>setTimeout(function () {
            window.location = '/';
        },3000);</script>";
} else {
    include_once ('header.php');
    $error = "Username or Password is invalid";
    echo '<h3 class="log_message">' . $error . '</h3>';

}

//Step 4
mysqli_close($db);

?>

</body>
<?php include_once ('footer.php')?>

</html>