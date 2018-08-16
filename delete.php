<!DOCTYPE html>
<html>
<head>
    <title> FoodieJournal | Home </title>
</head>

<body>
    <h3>Are you sure you want to delete your account?</h3>
    <form method="post" action="\handle-delete.php" name="delete">
        <input type="submit" name="submit" value="Delete">
    </form>
    <form method="get" action="\account.php" name="goBack">
        <input type="submit" name="submit" value="Cancel">
    </form>

</body>
</html>