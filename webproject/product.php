<?php
include "database.php";
session_start();
  
 $user_email = $_SESSION['email'];

if (isset($_POST['upload'])&&($_POST['username']&&$_POST['details']!=null)) :

     $name  =$_POST['username'];
     $avatar=$_FILES['avatar'];
     $details =$_POST['details'];
     

 

  $avatarname=$_FILES['avatar']['name'];
  $avatarsize=$_FILES['avatar']['size'];
  $avatartmp =$_FILES['avatar']['tmp_name'];
  $avatartype=$_FILES['avatar']['type'];

//list type allowed to upload
$avatarAllowedExtension=array("jpeg","jpg","png","gif");
//avatar extension
 $soso=explode('.', $avatarname);
 $samar=end ($soso) ;
 $avatarExtension= strtolower($samar) ;

 //get array of errors
 $formerrors=array();

if(! empty($avatarname)&& ( !in_array($avatarExtension, $avatarAllowedExtension))){
  $formerrors[]='this extension is not <strong>allowed</strong>';
}
if(empty($avatarname)){
   $formerrors[]='avatar is<strong>required</strong>';
}
if($avatarsize>4194304){
   $formerrors[]='avatar cant be larger than <strong>4MB</strong>';
}
foreach ($formerrors as $error) {
  echo '<div class="alert alert-danger">'.$error.'</div>';
}

if(empty($formerrors)){
  
  $avatar= rand(0,100000000).'_'.$avatarname;

  move_uploaded_file($avatartmp, $_SERVER['DOCUMENT_ROOT'].'\webproject\up\\'. $avatar);

$db = mysqli_connect('localhost', 'root', '', 'web');


     $query = " INSERT INTO product (name,avatar, details) VALUES ('$name ', '$avatar', '$details')";
     db_connect($query);
      header( "refresh:2;url=index.php" );
}
/*
/////////////////////
if (mysqli_num_rows($result) > 0) {
                                   // output data of each row
                                   while($row = mysqli_fetch_assoc($result)) {
                                  include 'des.html';
                                
                                    // echo "c-name: " . $row['c_name']. " - city: " . $row['city']. "<br>";
                                                                              }
                                 } else {
                                   echo "0 results";
                                        }
     


////////////////////////*/

endif;



?>
<!DOCTYPE html>
<html>
    <head>
        <title> our product</title>
        <style> 
          body{background: url(image1.jpg);}
          fieldset{border: 1px solid white; padding: 10px;margin-top: 50px;width: 400px;margin-left: 550px;}
          legend{border: 1px solid black; padding: 10px; background-color: white;font-size: 30px; font-weight: bold; font-style: italic;}
          label{display: block; margin-left: 90px;margin-top: 50px; font-style: italic; margin-bottom: 10px; color: white; font-size: 30px;font-weight: bold;}
          select {display: block;}
         .button{margin-left: 80px; font-size: 20px; background-color:royalblue; margin-top: 20px;border-radius: 10px;}
          input{display: block;margin-bottom: 10px;padding: 8px;width: 250px; margin-left: 50px;}
          .d{height: 80px;}
          .l{margin-left: 90px; background-color:royalblue; width: 180px;}
          .d2{margin-left: 130px; margin-top: 50px;}
          .img{height: 70px;width: 150px; margin-left: 60px;margin-top: 20px;}
          .f{margin-top: 0px;}
          </style>
    </head>
    
    <body>
        <img src="logo.jpeg" class="img">
              <form action="product.php" method="post" enctype="multipart/form-data">
                <fieldset class="f">
                  <legend>Your Product</legend>

                  <label> Product Name</label>
                  <input type="text" name="username">

                  <label>Upload the product</label>
                  <input type="file" name="avatar" class="l" required="required">

                  <label class="d2"> Details</label>
                  <input type="text" name="details" class="d">

                  <input type="submit" value="upload" name="upload" class="button">
                  <input type="submit" value="Skip" name="" class="button">
                  

         
    </body>



    </html>