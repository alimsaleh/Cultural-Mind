<?php include_once ('header.php')?>
<form id="post_form">
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
        <label for="description">Summary (Minimum 250 characters):</label>
        <textarea class="form-control" name="description" id="description" rows="5" minlength="250" maxlength="500" required></textarea>
    </div>
    <div class="form-group">
        <label for="about">Text:</label>
        <input name="about" type="hidden">
        <div style='height: 500px' id="editor">
        </div>
    </div>
    <div class="form-group">
        <label for="upload">Upload an image:</label>
        <input type="file" accept="image/*" name="fileToUpload" id="fileToUpload class="form-control">
    </div>
    <button id="button" type="submit" class="btn btn-default">Submit</button>
</form>

</body>
<?php include_once ('footer.php')?>

</html>

<script>
    $(document).ready(function () {
        var prev_url = document.referrer;
        code = prev_url.split("regionCode=");

        $.get( "https://restcountries.eu/rest/v2/all", function( data ) {
            for (var i = 0; i < data.length; i++){
                if (code[1] === data[i].alpha2Code){
                    $("#country").append('<option selected="selected" value="' + data[i].alpha2Code + '">' + data[i].name + '</option>');
                }else {
                    $("#country").append('<option value="' + data[i].alpha2Code + '">' + data[i].name + '</option>');
                }
            }
        });
    });
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    var form = document.querySelector('#post_form');
    form.onsubmit = function(event) {
        // Populate hidden form on submit
        var about = document.querySelector('input[name=about]');
        about.value = JSON.stringify(quill.container.firstChild.innerHTML);

        console.log("Submitted", $(form).serialize(), $(form).serializeArray());

        // No back end to actually submit to!
        $.ajax({
            url     : "process_post.php",
            type    : "POST",
            processData: false,
            contentType: false,
            data    : new FormData( form ),
            success : function( data ) {
                var returnMessage = JSON.parse(data);
                console.log(returnMessage);
                if (returnMessage.message === "success"){
                    window.location = "/post.php?postid="+returnMessage.postid;
                } else {
                    alert("Your post could not be created.")
                }
            }
        });
        return false;
    };
    $(window).resize(function(event){
        if (window.matchMedia('(max-width: 767px)').matches) {
            $("#post_form").css("padding-bottom", "150px");
        }
    });
</script>