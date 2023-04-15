<?php

session_start();

include_once 'config.php';

if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) || empty($password))
  {
    echo "Fill all the fields!";
    header( "refresh:2; url=login.php" ); 
  }else{
    $sql = "SELECT * FROM users WHERE username=:username";
    $selectSql = $conn->prepare($sql);
    $selectSql->bindParam(':username', $username);
    $selectSql->execute();

    if($selectSql->rowCount() > 0) {
        $data=$selectSql->fetch();
        if(password_verify($password,$data['password'])){
          $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['email']= $data['email'];
            $_SESSION['emri']= $data['emri'];
            $_SESSION['is_admin']= $data['is_admin'];
            header("Location: dashboard.php");
        } else {
            echo "Wrong password, try again !";
            header( "refresh:2; url=login.php" ); 
        }

    } else {
        echo "User not found !";
        header( "refresh:2; url=login.php" ); 
    }
  }
}

?>