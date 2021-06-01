<?php
session_start();
include "database.php";
   $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";


    $conn = mysqli_connect($servername, $username, $password, $dbname);

if((isset($_POST['signup'] )&&($_POST['username']&&$_POST['email']&&$_POST['password']&&$_POST['re_password']&&$_POST['Phone_number']!=null) )) {

    $name   = $_POST['username'];
    $email  = $_POST['email'];
    $pass   = $_POST['password'];
    $re_pass= $_POST['re_password'];
    $phone  = $_POST['Phone_number'];

    if(($pass === $re_pass)){

                   $query = "SELECT   email FROM signup WHERE   email = '$email'";
                   $result = mysqli_query($conn,$query);
                   if ($result) {
                     if (mysqli_num_rows($result) > 0) {
                        echo "<script>"."alert('this email already found please enter another one');" . "</script>";
                       
                    }
                     else {
                       
                                      db_connect(  "INSERT INTO signup (name,email,password,re,phone) VALUES ('$name', '$email', '$pass','$re_pass','$phone')");
                                     $_SESSION["logged_in"] = true;
                                     $_SESSION['email'] = $email;
                                  {
                            
                                     header( "refresh:2;url=product.php" );}
                                     
                          }
                 }  
         

        
     
                            }else{ echo "<script>"."alert('Please check your password');" . "</script>";}
       
}
?>
<!DOCTYPE html>
<html> 
    <head>
      <meta charset="utf-8">
        <title> sign up</title>
        <style>
          body{background: url(samar.jpeg);}
          fieldset{border: 1px solid white; padding: 10px;margin-top: 50px;width: 400px;margin-left: 550px;}
          legend{border: 1px solid black; padding: 10px; background-color: white;font-size: 30px; font-weight: bold; font-style: italic;}
          input{display: block;}
          select {display: block;}
          label{display: block;margin-bottom: 10px; color: white; font-size: 30px;font-weight: bold; font-style: italic;margin-left: 100px;font-style: oblique;}
          input{margin-bottom: 10px;padding: 8px;width: 300px;}
          .submit{font-size: 20px; background-color: royalblue; margin: 10px;border-radius: 15px; width: 100px; margin-left: 120px;}
          .img{height: 70px;width: 150px; margin-left: 60px;margin-top: 20px;}
          
          </style>
     </head> 
     <body>
      <img src="logo.jpeg" class="img">
      <form action="signup.php" method="POST" >
        <fieldset>
          <legend>sign up</legend>
          <label>Username</label>
          <input type="text" name="username">

           <label>E-mail</label>
          <input type="email" name="email">

          <label>Password</label>
          <input type="password" name="password">

          <label>reapet Password</label>
          <input type="password" name="re_password">

          <label>Phone number</label>
          <input type="text" name="Phone_number">

         
          <br>
          <br>
          <input type="submit" name="signup" value="sign up"class="submit">  
          </form>   
     </body>

     </html>