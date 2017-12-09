<?php
session_start();
$title = $_POST['title'];
$country = $_POST['country'];
$tag = $_POST['tag'];
$text = $_POST['about'];
$description = $_POST['description'];

$imgname = $_FILES["fileToUpload"]["name"];
$timestamp = time();
$len = strlen($text);
$len--;
$len--;
$text1 = substr($text, 1, $len);
//Connect to database
$db = mysqli_connect('us-cdbr-iron-east-05.cleardb.net','bec1a71a767104','9a289f08','heroku_49030ae2f7996af')
or die('Error connecting to MySQL server.');


//Insert
$query = "INSERT INTO `posts` (`country`, `title`, `text`, `tag`, `timestamp`, `imgname`, `description`) VALUES ('$country', '$title', '$text1', '$tag', now(), '$imgname', '$description');";

mysqli_query($db, $query) or die('Error querying database.');
$new_id = mysqli_insert_id($db);
mysqli_close($db);


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
$arr = array ('message'=>'success', 'postid' => $new_id);
echo json_encode($arr);
?>

