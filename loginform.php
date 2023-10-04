<?php 
    $title = "Login";
    include("header.php");
    echo "<script>document.getElementById('logout-nav').style='display: none'</script>";
?>

<style>
    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
        color: #017572;
    }
    .button-row {
        margin-top: 10px;
    }
</style>
   
<div class = "container">
        
    <form method="post" action="index.php?mode=login" class="form-signin">
        <h3>Sign in</h3>
        <input type = "text" class = "form-control" name = "adminID" placeholder = "username" required autofocus></br>
        <input type = "password" class = "form-control" name = "password" placeholder = "password" required>
        <p class="button-row"><button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Login</button></p>
    </form>

</div>

<?php
    include("footer.html");
?>