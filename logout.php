<!DOCTYPE html>
<html>
<head><title>Logout</title></head>

<body>
<?php session_start(); ?>

<?php    if(isset($_SESSION["userID"])){
        unset($_SESSION["userID"]);
    }
?>

<?php if(isset($_SESSION["userID"])): ?>
        Logout failed
<?php else: ?>
        <script>location.href='/login.php'</script>
<?php endif ?>

</body>
</html>
