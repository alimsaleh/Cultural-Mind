<?php include_once ('header.php')?>
<form id="post_form" action="process_post.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="tag">Tag:</label>
        <select class="form-control" id="tag" name="tag" required>
            <option value="food">Food</option>
            <option value="place">Places</option>
            <option value="cloth">Clothes</option>
            <option value="event">Event</option>
            <option value="other">Other</option>

        </select>
    </div>
    <div class="form-group">
        <label for="country">Country:</label>
        <select id="country" class="form-control" id="country" name="country" required>

        </select>
    </div>
    <div class="form-group">
        <label for="text">Text:</label>
        <textarea class="form-control" name="text" id="text" rows="15" minlength="250" maxlength="10000" required></textarea>
    </div>
    <div class="form-group">
        <label for="upload">Upload an image:</label>
        <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload class="form-control" required>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

</body>
<?php include_once ('footer.php')?>

</html>

<script>
    $(document).ready(function () {
        $.get( "https://restcountries.eu/rest/v2/all", function( data ) {
            for (var i = 0; i < data.length; i++){
                $("#country").append('<option value="'+data[i].alpha2Code+'">' + data[i].name + '</option>');
            }
        });
    });
</script>