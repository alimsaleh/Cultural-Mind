<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                    <form id="login_form" method="post">
                        <div class="form-group">
                            <label for="email">Username:</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        <br>
                        <br>
                        <a href="create_account.php">Create an account</a>
                    </form>
            </div>

        </div>
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#login_form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "handlelogin.php",
                data: $(this).serialize(),
                success: function(data) {
                    var returnMessage = JSON.parse(data);
                    $('.return_message').remove();
                    if (returnMessage.message === "success"){
                        window.location.reload();
                    } else {
                        $('.modal-content').prepend('<p class="return_message"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Invalid username or password.</p>');
                        $('.form-control').css('border-color', 'red');
                    }
                }
            })

        })
    })
    $('#myModal').on('hidden.bs.modal', function () {
        $('.return_message').remove();
        $('.form-control').css('border-color', '#ccc');
        $('#username').val('');
        $('#pwd').val('');
    })
</script>