<head><title>GIGABYTE WEB PORTAL</title> 

  <link rel="stylesheet" type="text/css" href="./materialize/css/materialize.min.css">
  <link rel="icon" href="./materialize/favicon.png">
  <!-- Compiled and minified JavaScript -->
  <script src="./materialize/js/materialize.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>         

<style>
div {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -50px;
    margin-left: -300px;
    width: 600px;
    height: 600px;
}
input {display: inline}
</style>
	
<?php
	if(isset($_POST["pass"])){
		if($_POST["pass"] == "shashank123"){
			$files = glob('./myfiles/*'); 
			foreach($files as $file){ // iterate files
			if(is_file($file))
				unlink($file); // delete file
			}
			echo "All files Nuked Successfully";
		}else{
			echo "Wrong password!";
			
		}
	}
	?>
<center>
<div>
<form action="" method="post">
	<input class="btn waves-effect waves-light" type="password" name="pass">
	<input class="btn waves-effect waves-light" type="submit" value="Nuke!">
</form>
</div>
</center>
