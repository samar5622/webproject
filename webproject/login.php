<?php
session_start();
include "database.php";


$db = mysqli_connect('localhost', 'root', '', 'web');

if (isset($_POST['login'])) {

     $name  =$_POST['username'];
     $email =$_POST['email'];
     $pass  =$_POST['password'];

     $query = " INSERT INTO login (name,email,password) VALUES ('$name', '$email', '$pass')";
     db_connect($query);
     
     $sql_u = "SELECT * FROM signup WHERE email='$email' AND password='$pass' ";
    $res_u = mysqli_query($db, $sql_u);
    if (mysqli_num_rows($res_u) > 0) {
        $_SESSION["logged_in"] = true;
        $_SESSION["email"] = $email;
        header( "refresh:2;url=product.php" );
       // include '../profile.php';
    }else{
        echo "<script>"."alert('Please check your information');" . "</script>";
    }
}

?>
<!DOCTYPE html>
<html> 
    <head>
      <meta charset="utf-8">
        <title> log in</title>
        <style>
          body{background: url(mo.jpeg);}
          fieldset{border: 1px solid white; padding: 10px;margin-top: 50px;width: 400px;margin-left: 550px;}
          legend{border: 1px solid black; padding: 10px; background-color: white;font-size: 30px; font-weight: bold; font-style: italic;}
          label{display: block;}
          input{display: block;}
          select {display: block;}
          label{margin-bottom: 10px; color: white; font-size: 30px;font-weight: bold; font-style: italic;margin-left: 100px;font-style: oblique;}
          input{margin-bottom: 10px;padding: 8px;width: 300px;}
          .submit{font-size: 20px; background-color: royalblue; margin: 10px;border-radius: 15px; width: 100px; margin-left: 120px;}
          
          
          </style>
     </head> 
     <body>
      <img src="logo.jpeg" class="img">
           <form action ="login.php" method="POST">
              <fieldset>
                <legend>log in</legend>

                <label>Name</label>
                <input type="text" name="username">

                <label>E-mail</label>
                <input type="email" name="email">

                <label>Password</label>
                <input type="password" name="password">
                <br>
                <br>
                <input type="submit" name="login" value="login "class="submit">  
            </form>   
     </body>

     </html>