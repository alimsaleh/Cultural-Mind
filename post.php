<?php include_once ('header.php');?>
<style type="text/css">
	body {
		background: white;
	}
	.navbar-fixed-top .navbar-nav>li>a {/*need to fix this*/
    	color: #337ab7;
	}
  .main_content {
    border: solid 1px green;
    position: absolute;
    top: 50px;
  }
  .post_content {
    border: solid 1px red;
    text-align: center; /*needed to center content*/
    width: fit-content;
  }
  .post_content > img {
    height: auto;
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
    margin-bottom: 20px;
  }
  .post_content > p {
    width: 60%;
    margin-left: 20%;
    margin-right: 20%;
  }
</style>
<?php
  $postid = strtolower($_GET['postid']);
  //Step1
  $db = mysqli_connect('us-cdbr-iron-east-05.cleardb.net','bec1a71a767104','9a289f08','heroku_49030ae2f7996af')
  or die('Error connecting to MySQL server.');

  //Step2
  $query = "SELECT * FROM posts where postid = '".$postid."';";
  mysqli_query($db, $query) or die('Error querying database.');

  //Step3
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  //echo $row['postid'];
  //echo $row['tag'];
  //echo $row['text'];

  /* free result set */
  mysqli_free_result($result);

  //Step 4
  mysqli_close($db);
 ?>
 <div class="main_content">
   <div class="post_content">
     <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row['title'];?></h3>
     <img src="images/img2.jpeg" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" alt="">
     <p class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   </div>
 </div>
</body>
<?php //include_once ('footer.php')?>
</html>
