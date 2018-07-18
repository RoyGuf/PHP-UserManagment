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
    <title>Edit User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body class='container-fluid'>
<?php
    include('updateValidation.php')
?>
<h1>Edit User: <i><?php echo $name; ?></i></h1><hr/>
<?php
    include('form.php')
?>
<button class='btn '><a href="select.php">Back</a></button>
</body>
</html>