<!DOCTYPE html>
<html>
<head><title>Logout</title></head>

<body>
<?php session_start(); ?>

<?php    if(isset($_SESSION["userId"])){
        unset($_SESSION["userId"]);
    }
?>

<?php if(isset($_SESSION["userId"])): ?>
        Logout failed
<?php else: ?>
        <script>location.href='/login.php'</script>
<?php endif ?>

</body>
</html>
