<?php include_once ('header.php');?>
<style type="text/css">
	.content {
    /*border: solid 1px red;*/
		/*position: absolute;*/
		/*top: 50px;*/
		width: 100%;
	}
    .post {
        /*border: solid 1px blue;*/
				padding-top: 15px;
    		padding-bottom: 35px;
    }
    .filters > button {
        /*margin-bottom: 50px;*/
				border-radius: 0;
    }

	.all_posts {
		/*margin-top: 50px;*/
        /*padding-top: 50px;*/
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
      cursor: pointer;
    	border: solid 1px #CCC;
	    -moz-box-shadow: 1px 1px 5px #999;
	    -webkit-box-shadow: 1px 1px 5px #999;
	        box-shadow: 1px 1px 5px #999;
	}
	@media (max-width: 767px) { /*xs screen*/
		.post:last-child {
			/*border: solid 1px green;*/
			padding-bottom: 150px;
		}
	}
</style>
<script>
	$(document).ready(function(){
		$(window).resize(function(event){
			if (window.matchMedia('(max-width: 767px)').matches) {
				$(".post:visible:last").css("padding-bottom", "150px");
			}
		});
	   $("#all_btn").click(function(event){
	     //alert('all btn clicked');
	     $(".cloth").show();
	     $(".event").show();
	     $(".food").show();
	     $(".place").show();
	     $(".other").show();
			 if (window.matchMedia('(max-width: 767px)').matches) {
				 $(".post").css("padding-bottom", "35px");
				 $(".post:visible:last").css("padding-bottom", "150px");
			 }
	   });
	   $("#clothes_btn").click(function(event){
	     //alert('clothes btn clicked');
	     $(".cloth").show();
	     $(".event").hide();
	     $(".food").hide();
	     $(".place").hide();
	     $(".other").hide();
			 if (window.matchMedia('(max-width: 767px)').matches) {
				 $(".post").css("padding-bottom", "35px");
				 $(".post:visible:last").css("padding-bottom", "150px");
			 }
	   });
	   $("#events_btn").click(function(event){
	     //alert('events btn clicked');
	     $(".cloth").hide();
	     $(".event").show();
	     $(".food").hide();
	     $(".place").hide();
	     $(".other").hide();
			 if (window.matchMedia('(max-width: 767px)').matches) {
				 $(".post").css("padding-bottom", "35px");
				 $(".post:visible:last").css("padding-bottom", "150px");
			 }
	   });
	   $("#food_btn").click(function(event){
	     //alert('food btn clicked');
	     $(".cloth").hide();
	     $(".event").hide();
	     $(".food").show();
	     $(".place").hide();
	     $(".other").hide();
			 if (window.matchMedia('(max-width: 767px)').matches) {
				 $(".post").css("padding-bottom", "35px");
				 $(".post:visible:last").css("padding-bottom", "150px");
			 }
	   });
	   $("#places_btn").click(function(event){
	     //alert('places btn clicked');
	     $(".cloth").hide();
	     $(".event").hide();
	     $(".food").hide();
	     $(".place").show();
	     $(".other").hide();
			 if (window.matchMedia('(max-width: 767px)').matches) {
				 $(".post").css("padding-bottom", "35px");
				 $(".post:visible:last").css("padding-bottom", "150px");
			 }
	   });
	   $("#other_btn").click(function(event){
	     //alert('other btn clicked');
	     $(".cloth").hide();
	     $(".event").hide();
	     $(".food").hide();
	     $(".place").hide();
	     $(".other").show();
			 if (window.matchMedia('(max-width: 767px)').matches) {
				 $(".post").css("padding-bottom", "35px");
				 $(".post:visible:last").css("padding-bottom", "150px");
			 }
	   });
		 $(".post_content").click(function (event){
			 //alert('clicked on post');
			 var postid = event.target.id.match(/\d+/)[0];
			 window.location.href = "post.php?postid=" + postid;
		 });
		 $( window ).resize(function() {
			 if (window.matchMedia('(min-width: 768px)').matches){
				$(".post").css("padding-top", "15px");
				$(".post").css("padding-bottom", "35px");
 			}
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
			$posts_found = 0;
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					$posts_found = 1;
		    	echo '<div id="post'.$row['postid'].'" class="post '.$row['tag'].' col-lg-3 col-md-4 col-sm-6 col-xs-12">';
						echo '<div id="post'.$row['postid'].'_content" class="post_content">';
							echo'<img id="post'.$row['postid'].'_img" style="width: 100%; height:250px;"src="images/'.$row['imgname'].'">';
							echo'<img id="post'.$row['postid'].'_tag" style="margin-top:5px;" src="images/'.$row['tag'].'.png" alt="">';
							// echo'<p id=g"post'.$row['postid'].'_text">'.$row['text'].'</p>';
							echo'<p id="post'.$row['postid'].'_text">'.substr($row['text'],0,250).'... <button type="button" id="post'.$row['postid'].'_btn" class="btn btn-default">Read More</button></p>';
						echo'</div>';
		    	echo '</div>';
			}
			if (!$posts_found) {
				echo "<br><br><br><h2>Sorry! No one has posted anything for this country :(</h2>";
			}

			/* free result set */
			mysqli_free_result($result);

			//Step 4
			mysqli_close($db);
		 ?>
	</div>
</div>
<?php include_once ('footer.php')?>
</body>
</html>
