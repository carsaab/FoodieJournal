<?php
function handleLoginRequest(){
    if (!isset($_POST["submit"])){
        return;
    }

    $UsersCrud = new usersCrud();
    $userId = $UsersCrud->fetchUserId($_POST["username"]);
    if ($userId === 0){
        echo "Email Address and/or Password incorrect. Please try again.";
        return;
    }
    else{
        $_SESSION["userId"] = $userId;
        echo "<script>location.href='\index.php'</script>";
    }
}
?>