<?php
    session_start();
    $message = '';
    if(isset($_POST['name']) && isset($_POST['password'])){
        $db = mysqli_connect('localhost', 'root', '', 'php');
        $sql = sprintf("SELECT * FROM users WHERE name='%s'",
                    mysqli_real_escape_string($db, $_POST['name']));
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row){
            $hash = $row['password'];
            $isAdmin = $row['isAdmin'];
            
            if(password_verify($_POST['password'], $hash)){
                $message = 'Login Successful.';

                $_SESSION['user'] = $row['name'];
                $_SESSION['isAdmin'] = $isAdmin;

            }else{
                $message = 'Login Failed.';
            }
        }else{
            $message = 'Login Failed.';
        }
        mysqli_close($db);  
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
readfile('navigation.html');
   echo $message;
?>
<h1>Login</h1>
<form method='post' action=""> 
    User name: <input type='text' name='name'><br>
    Password: <input type='password' name='password'><br>
    <input type='submit' value='Login'>
</form> 
</body>
</html>