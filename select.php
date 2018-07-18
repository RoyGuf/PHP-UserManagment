<?php
require 'auth.php';
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP Users list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body class='container-fluid'>
    <h1>Users List</h1><hr/>
    <ul>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = 'SELECT * FROM users';
        $results = mysqli_query($db, $sql);

        foreach($results as $row){
            printf('<li><span style="color: %s">%s (%s)</span>
                    <a href="updateForm.php?id=%s">edit</a>
                    <a href="delete.php?id=%s">delete</a></li>',
            htmlspecialchars($row['color']),
            htmlspecialchars($row['name']),
            htmlspecialchars($row['gender']),
            htmlspecialchars($row['id']),
            htmlspecialchars($row['id']));
        }
        mysqli_close($db);
        ?>


    </ul>
    <hr/>
    <button class='btn '><a href="addForm.php">Add new User</a></button>
</body>
</html>