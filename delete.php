<?php
require 'auth.php';
    if(isset($_GET['id']) && ctype_digit($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header('Location: select.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<?php
require 'auth.php';
    $db = mysqli_connect('localhost', 'root', '', 'php');
    $sql = "DELETE FROM users WHERE id=$id";
    mysqli_query($db, $sql);
    echo '<p><u><b>User Deleted. </u></b></p>';
    mysqli_close($db);
?>
    <button class='btn'><a href="select.php">Back</a></button>
</body>
</html>