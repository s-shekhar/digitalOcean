<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
       
      if($file_size > 52428800){
         $errors[]='File size must be less than 50 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
    //     echo "Success";
header("Location: http://139.59.41.191/uploads");
die();
      }else{
         print_r($errors);
      }
   }
?>

<html>
	<head>
	<script type="text/javascript">
	function showme(){
	var ans = confirm("File uploaded Successfully! Show it now?");
	if(ans == true){	
        window.location.href = "http://139.59.41.191/uploads";
	}
	
	}
	</script>
</head>  
 <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit" value="Upload"/>
      </form>
      
   </body>
</html>
