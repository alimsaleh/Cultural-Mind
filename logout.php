<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>
<?php include_once ('header.php')?>
<?php
echo '<h3 class="log_message">Successfully logged out.</h3>';
echo "<h3 class='log_message'>Redirecting to home page in 3 seconds.</h3>";
echo "<script>setTimeout(function () {
            window.location = '/';
        },3000);</script>";

?>
</body>
<?php include_once ('footer.php')?>

</html>
