<?php
  require './config.php';
  session_start();

  if(isset($_POST['submit'])){
    $target_dir = "./submissions/";
    $target_file = $target_dir . basename($_FILES["subFile"]["name"]);
    if (move_uploaded_file($_FILES["subFile"]["tmp_name"],$target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["subFile"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
    // $query = "INSERT INTO submissions VALUES $file";
    // $result = mysqli_query($conn,$query);
    // if($result == false){
    //   echo(mysqli_error($conn));
    // }else{
    //   echo 'uhoh';
    // }
  }
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='login.css'> 
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>
<body>
  <div class='header'>
    <h2>CS4177 <br> Dr. Robotnik</h2>
    <hr>
  </div>
  <img src='egg.png' alt='Either Sonic stole my logo, or you are incapable of seeing how awesome it is!'>
  <h2> Student: <?php echo($_SESSION['grade']); ?>  </h2>
  <h2> Your grade: <?php echo($_SESSION['grade']); ?> </h2>
  <form class="login-content" method="POST" action="" enctype="multipart/form-data">
    <div class="container">
      <a href='encrypt.exe' download>
        <button type='button'>Download Encryption.exe</button>
      </a>
        <h1> Submit your "Hedgehog Intel Assignment", due 4/28 6:00PM </h1>
        <h3> Your submission MUST be a .txt and MUST be encrypted.
         Non-encrypted and non-txt files will receive NO CREDIT.
        Name your file as 'username_assignment.txt' </h3>
        <input type='file' name="subFile">
        <button type='submit' name='submit'>Submit</button>
    </div>
  </form>
</body>
</html>
