<?php

if($_SERVER['REQUEST_METHOD']=='POST'):

//setting errors array
	$errors=array();

//setting database image name
$all_images=array();

$uploaded_files=$_FILES['my_work'];

//get info from the form
$image_name  = $uploaded_files['name'];
$image_type  = $uploaded_files['type'];
$image_tmp   = $uploaded_files['tmp_name'];
$image_size  = $uploaded_files['size'];
$image_error = $uploaded_files['error'];

//set allowed file extension
$allowedextension=array('jpg','gif','jpeg','png');
//get file extension



//check if file is uploaded
if($image_error[0] ==4):
	echo '<div>no file uploaded</div>';

      else:
      	$files_count = count($image_name);

for($i=0 ; $i< $files_count ;$i++){
	//setting erorr array
	$errors=array();

	$soso=explode('.', $image_name[$i] );
	$samar=end ($soso) ;
	$imageextension[$i]= strtolower($samar) ;

    //get random name for file
     $image_random[$i]=rand(0,100000000000) .".". $imageextension[$i];


	        //check file size
			if($image_size[$i]>200000):
				$errors[]='<div>file cant be more than x</div>';
			endif;
            //check file extension
			if(! in_array($imageextension[$i],$allowedextension)):
			$errors[]='<div>file is not valid</div>';
			endif;

			//check if has error
			if(empty($errors)):

				move_uploaded_file($image_tmp[$i],$_SERVER['DOCUMENT_ROOT'].'\webproject\up\\'.$image_random[$i]);

				echo '<div style="background-color:#EEE;padding:10px;margin-bottom:20px">';
				echo "<div>file number".($i + 1)."</div> uploaded";
				echo '<div>file name:'.$image_name[$i] .'</div>';
				echo '<div>new name:'.$image_random[$i] .'</div>';
				echo '</div>';

                      $all_images[]=$image_random[$i];


					else:

                        echo '<div style="background-color:#EEE;padding:10px;margin-bottom:20px">';
						echo "errors for file number".($i+1);
						echo 'file name:'.$image_name[$i];


						//loop throw errors
						foreach ($errors as $error):
							echo $error;
						endforeach;

						echo '</div>';

            endif;
				

	
}

endif;	

$img_field= implode(',', $all_images);
echo $img_field;

endif;
/*
//set allowed file extension
$allowedextension=array('jpg','gif','jpeg','png');
//get file extension
$soso=explode('.', $image_name );
$samar=end ($soso) ;
$imageextension= strtolower($samar) ;

//check if file is uploaded
if($image_error ==4):
$errors[]='<div>no file uploaded</div>';

	else:
			//check file size
			if($image_size>200000):
				$errors[]='<div>file cant be more than x</div>';
			endif;
			//check if file is valid
			if(! in_array($imageextension,$allowedextension)):
			$errors[]='<div>file is not valid</div>';
			endif;

endif;

//check if has error
if(empty($errors)):

	move_uploaded_file($image_tmp,$_SERVER['DOCUMENT_ROOT'].'\webproject\up\\'.$image_name);
	echo "image uploaded";

else:
	//loop throw errors
	foreach ($errors as $error):
		echo $error;
	endforeach;

	endif;



 endif;
 $errors=array();






*/
?>
<form class="" action="" method="post" enctype="multipart/form-data">
	<input type="file" name="my_work[]" value="" multiple="multiple"><br><br>
	<input type="submit" name="" value="upload">
</form>