<?php
$country = strtolower($_GET['regionCode']);
//Step1
$db = mysqli_connect('us-cdbr-iron-east-05.cleardb.net','bec1a71a767104','9a289f08','heroku_49030ae2f7996af')
or die('Error connecting to MySQL server.');

//Step2
$query = "SELECT * FROM posts;";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
//$row = mysqli_fetch_array($result);
$posts_found = 0;
$arr = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $arr[$row['country']]++;
}
/* free result set */
mysqli_free_result($result);

//Step 4
mysqli_close($db);
echo json_encode($arr);

?>