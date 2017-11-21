<?php
//Step1
$db = mysqli_connect('us-cdbr-iron-east-05.cleardb.net','bec1a71a767104','9a289f08','heroku_49030ae2f7996af')
or die('Error connecting to MySQL server.');
?>

<html>
<head>
</head>
<body>
<h1>PHP connect to MySQL</h1>

<?php
//Step2
$query = "SELECT * FROM users";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
echo $row['username'] . '<br />';
echo $row['userid'] . '<br />';
echo $row['pwd'] . '<br />';

//Step 4
mysqli_close($db);
?>

</body>
</html>