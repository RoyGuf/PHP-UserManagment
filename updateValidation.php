<?php
    $name = '';
    $password = '';
    $gender = '';
    $tc = '';
    $comments = '';
    $color = '';
    $languages = array();

    if(isset($_POST['submit'])){
        $ok = true;
        if(!isset($_POST['name']) || $_POST['name'] === ''){
            $ok = false;
            echo 'Format ERROR';
        }else{
            $name = $_POST['name'];
        }
        if(!isset($_POST['password']) || $_POST['password'] === ''){
            $ok = false;
            echo 'Format ERROR';
        }else{
            $password = $_POST['password'];
        }
        if(!isset($_POST['comments']) || $_POST['comments'] === ''){
            $ok = false;
            echo 'Format ERROR';
        }else{
            $comments = $_POST['comments'];
        }
        if(!isset($_POST['gender']) || $_POST['gender'] === ''){
            $ok = false;
            echo 'Format ERROR';
        }else{
            $gender = $_POST['gender'];
        }
        if(!isset($_POST['color']) || $_POST['color'] === ''){
            $ok = false;
            echo 'Format ERROR';
        }else{
            $color = $_POST['color'];
        }
        if(!isset($_POST['tc']) || $_POST['tc'] === ''){
            $ok = false;
            echo 'Format ERROR';
        }else{
            $tc = $_POST['tc'];
        }
        if(!isset($_POST['languages']) || !is_array($_POST['languages']) 
        || !count($_POST['languages']) === 0){
            $ok = false;
            echo 'Format ERROR';
        }else{
            $languages = $_POST['languages'];
        }
        if($ok){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $db = mysqli_connect('localhost', 'root', '', 'php');
            $sql = sprintf("UPDATE users SET name='%s',password='%s', gender='%s', color='%s' 
                    WHERE id ='%s'", 
                mysqli_real_escape_string($db, $name),
                mysqli_real_escape_string($db, $hash),
                mysqli_real_escape_string($db, $gender),
                mysqli_real_escape_string($db, $color),
                $id);
            mysqli_query($db, $sql);
            echo '<p><u><b>User Updated. </u></b></p>';
            mysqli_close($db);
        }
    }else{
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = sprintf("SELECT * FROM users WHERE id=%s", $id) ;
        $results = mysqli_query($db, $sql);
        foreach($results as $row){
            $name = $row['name'];
            $gender = $row['gender'];
            $color = $row['color'];
        }
        mysqli_close($db);
    }
?>