<?php include_once ('header.php')?>
<style type="text/css">
    .account_content{
        margin: 0 20% 0 20%;
    }
    .success_message{
        text-align: center;
    }
</style>
<div class="account_content">
<form id="create_account_form" action="handle_account_creation.php" method="post">
    <div class="form-group">
        <label for="email">Username:</label>
        <input type="text" class="form-control user" id="username" name="username" required>
    </div>
    <div class="form-group passgroup">
        <label for="pwd">Password (Must be at least 8 characters):</label>
        <input type="password" class="form-control pass" id="pwd" name="password" required>
    </div>
    <div class="form-group passgroup">
        <label for="pwd1">Type in password again:</label>
        <input type="password" class="form-control pass" id="pwd1" name="password1" required>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</body>
<?php include_once ('footer.php')?>
</html>

<script>
    $("#create_account_form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "handle_account_creation.php",
            data: $(this).serialize(),
            success: function(data) {
                var returnMessage = JSON.parse(data);
                if (returnMessage.status === "0"){
                    $("#create_account_form").remove();
                    $('.return_message').remove();
                    $('.account_content').append('<h3 class="success_message">' + returnMessage.message + '</h3>');
                    $('.account_content').append('<h3 class="success_message">You can now log in.</h3>');
                } else if (returnMessage.status === "2") {
                    $('#create_account_form').prepend('<p class="return_message"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + returnMessage.message + '</p>');
                    $('.user').css('border-color', 'red');
                }
                if (returnMessage.status === "1") {
                    $('.passgroup').append('<p class="return_message"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + returnMessage.message + '</p>');
                    $('.pass').css('border-color', 'red');
                }
            }
        })

    })
</script>