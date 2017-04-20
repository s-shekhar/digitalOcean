<?php
$username = "root";
$password = "shashank123";
$nonsense = "supercalifragilisticexpialidocious";

if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
?>

    <head><title>GIGABYTE WEB PORTAL</title> 

  <link rel="stylesheet" type="text/css" href="./materialize/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="./materialize/css/shashank.css">  
<link rel="icon" href="./materialize/favicon.png">
  <!-- Compiled and minified JavaScript -->
  <script src="./materialize/js/materialize.min.js"></script>
          
<center>
<style>
div {
    width:700px;
    margin: auto;
}
input {display: inline}
</style>


</head>


<h4>Paste the Download Link Below and Hit "StoreIt!"</h4>
</br>

<form method="post">
<div>
<input name="url" size="50" />
<input class="btn waves-effect waves-light" name="submit" value="StoreIt!" type="submit"/>
<INPUT class="btn waves-effect waves-light" type="submit" action="<?php echo $PHP_SELF; ?>" VALUE="Refresh">
</form>

</br></br></br>
</div>


<?php
  if ($handle = opendir('./myfiles')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        $thelist .= '<li><a href="myfiles/'.$file.'">'.$file.'</a></li>';
	}
    }



    closedir($handle);
  }
?>

<br><br>
<h4>Download From Below:</h4>
<ul><?php echo $thelist; ?></ul>

<?php
  if ($handle = opendir('./myfiles')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {

	echo "<br>";
	echo "<a href='?delete=./myfiles/$file'>Delete $file</a>";
	}
    }

    closedir($handle);
  }

if (isset($_GET['delete'])) {
        unlink($_GET['delete']);
    }
	
	echo $file;
?>





<?php
foreach ($handle as $name) {echo $name;}
?>



<?php

// maximum execution time in seconds
set_time_limit (24 * 60 * 60);

if (!isset($_POST['submit'])) die();

// folder to save downloaded files to. must end with slash
$destination_folder = 'myfiles/';

$url = $_POST['url'];
$newfname = $destination_folder . basename($url);

$file = fopen ($url, "rb");
if ($file) {
  $newf = fopen ($newfname, "wb");

  if ($newf)
  while(!feof($file)) {
    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
  }
}

if ($file) {
  fclose($file);
}

if ($newf) {
  fclose($newf);
}

?>
</center>


<?php
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }
}

if (isset($_GET['p']) && $_GET['p'] == "login") {
   if ($_POST['user'] != $username) {
      echo "Sorry, that username does not match.";
      exit;
   } else if ($_POST['keypass'] != $password) {
      echo "Sorry, that password does not match.";
      exit;
   } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
      setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
      header("Location: $_SERVER[PHP_SELF]");
   } else {
      echo "Sorry, you could not be logged in at this time.";
   }
}
?>

    

<body>
<div id="parent">
    <form id="form_login" action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">
<label><input type="text" name="user" id="user" /> Name</label><br />
<label><input type="password" name="keypass" id="keypass" /> Password</label><br />
<input type="submit" id="submit" value="Login" />
</form>
</div>
</body>
