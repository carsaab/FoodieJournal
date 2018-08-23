<?php
session_start();

if(isset($_SESSION["userId"])){
    unset($_SESSION["userId"]);
}

?>

<html>
<script>location.href='/login.php'</script>
</html>
