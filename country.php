<?php include_once ('header.php');?>
<style type="text/css">
	body {
		background: white;
	}
	.navbar-fixed-top .navbar-nav>li>a {/*need to fix this*/
    	color: #337ab7;
	}

	.content {
		border: solid 1px green;
		position: absolute;
		top: 50px;
		width: 100%;
	}
	.filters {
		border: solid 1px red;
	}
	.all_posts {
		border: solid 1px yellow;
		margin-top: 50px;
		text-align: center;/*needed to center posts*/
	}
	.post_content {
		border: solid 1px #EFEFEF;
		margin: auto; /*needed to center posts*/
		padding: 0;
		/*margin-right: 10px;*/
		width: fit-content;
		margin-bottom: 15px; /*double check nothing else gets affected*/
	}
	.post_content:hover {
    	border: solid 1px #CCC;
	    -moz-box-shadow: 1px 1px 5px #999;
	    -webkit-box-shadow: 1px 1px 5px #999;
	        box-shadow: 1px 1px 5px #999;
	}
</style>
<script>
	$(document).ready(function(){
	   $("#all_btn").click(function(event){
	     //alert('all btn clicked');
	     $(".cloth").show();
	     $(".event").show();
	     $(".food").show();
	     $(".place").show();
	     $(".other").show();
	   });
	   $("#clothes_btn").click(function(event){
	     //alert('clothes btn clicked');
	     $(".cloth").show();
	     $(".event").hide();
	     $(".food").hide();
	     $(".place").hide();
	     $(".other").hide();
	   });
	   $("#events_btn").click(function(event){
	     //alert('events btn clicked');
	     $(".cloth").hide();
	     $(".event").show();
	     $(".food").hide();
	     $(".place").hide();
	     $(".other").hide();
	   });
	   $("#food_btn").click(function(event){
	     //alert('food btn clicked');
	     $(".cloth").hide();
	     $(".event").hide();
	     $(".food").show();
	     $(".place").hide();
	     $(".other").hide();
	   });
	   $("#places_btn").click(function(event){
	     //alert('places btn clicked');
	     $(".cloth").hide();
	     $(".event").hide();
	     $(".food").hide();
	     $(".place").show();
	     $(".other").hide();
	   });
	   $("#other_btn").click(function(event){
	     //alert('other btn clicked');
	     $(".cloth").hide();
	     $(".event").hide();
	     $(".food").hide();
	     $(".place").hide();
	     $(".other").show();
	   });
		 $(".post_content").click(function (event){
			 //alert('clicked on post');
			 var postid = event.target.id.match(/\d+/)[0];
			 window.location.href = "post.php?postid=" + postid;
		 });
	 });
</script>

<div class="content">
	<div class="filters">
  		<button type="button" id="all_btn" class="btn btn-primary col-lg-2 col-md-4 col-sm-4 col-xs-12" value = "all">All<img style="visibility: hidden;" src="images/favorites24.png" alt=""></button>
  		<button type="button" id="clothes_btn" class="btn btn-primary col-lg-2 col-md-4 col-sm-4 col-xs-12" value = "clothes">Clothes<img style="margin-left:10px;" src="images/hoodie24.png" alt=""></button>
  		<button type="button" id="events_btn" class="btn btn-primary col-lg-2 col-md-4 col-sm-4 col-xs-12" value = "events">Events<img style="margin-left:10px;" src="images/calendar24.png" alt=""></button>
  		<button type="button" id="food_btn" class="btn btn-primary col-lg-2 col-md-4 col-sm-4 col-xs-12" value = "food">Food<img style="margin-left:10px;" src="images/food24.png" alt=""></button>
  		<button type="button" id="places_btn" class="btn btn-primary col-lg-2 col-md-4 col-sm-4 col-xs-12" value = "places">Places<img style="margin-left:10px;" src="images/place24.png" alt=""></button>
  		<button type="button" id="other_btn" class="btn btn-primary col-lg-2 col-md-4 col-sm-4 col-xs-12" value = "other">Other<img style="margin-left:10px;" src="images/favorites24.png" alt=""></button>
	</div>
	<div></div>
	<div class="all_posts">
		<?php
			$country = strtolower($_GET['regionCode']);
			//Step1
			$db = mysqli_connect('us-cdbr-iron-east-05.cleardb.net','bec1a71a767104','9a289f08','heroku_49030ae2f7996af')
			or die('Error connecting to MySQL server.');

			//Step2
			$query = "SELECT * FROM posts where country = '".$country."';";
			mysqli_query($db, $query) or die('Error querying database.');

			//Step3
			$result = mysqli_query($db, $query);
			//$row = mysqli_fetch_array($result);
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		    	echo '<div id="post'.$row['postid'].'" class="post '.$row['tag'].' col-lg-3 col-md-4 col-sm-6 col-xs-12">';
						echo '<div id="post'.$row['postid'].'_content" class="post_content">';
							echo'<img id="post'.$row['postid'].'_img" style="width: 100%; height:250px;"src="images/img1.jpg">';
							echo'<img id="post'.$row['postid'].'_tag" style="margin-top:5px;" src="images/'.$row['tag'].'.png" alt="">';
							// echo'<p id="post'.$row['postid'].'_text">'.$row['text'].'</p>';
							echo'<p id="post'.$row['postid'].'_text">Madagascar. It’s more than an incorrect (but fun) DreamWorks movie. Located off the eastern coast of Africa, this island, nearly the size of France and the third largest in the world, has a population over 20 million but sees only about 325,000 tourists a year.1 I spent two weeks there with Intrepid Travel Travel and ... <button type="button" id="post'.$row['postid'].'_btn" class="btn btn-default">Read More</button></p>';
						echo'</div>';
		    	echo '</div>';
			}

			/* free result set */
			mysqli_free_result($result);

			//Step 4
			mysqli_close($db);
		 ?>
		<div id="post6" class="post other col-lg-3 col-md-4 col-sm-6 col-xs-12">
			<div id="post6_content" class="post_content">
				<img id="post6_img" style="width: 100%; height:250px;"src="images/img1.jpg">
				<img id="post6_tag" style="margin-top:5px;" src="images/other.png" alt="">
				<p id="post6_text">Madagascar. It’s more than an incorrect (but fun) DreamWorks movie. Located off the eastern coast of Africa, this island, nearly the size of France and the third largest in the world, has a population over 20 million but sees only about 325,000 tourists a year.1 I spent two weeks there with Intrepid Travel Travel and ... <button type="button" id="post6_btn" class="btn btn-default">Read More</button></p>
			</div>
		</div>
	</div>
</div>
<!-- change what is below to be in the footer -->
</body>
<?php //include_once ('footer.php')?>
</html>
