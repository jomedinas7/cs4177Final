<?php
  require './config.php';

  if(isset($_POST['submit'])){
    $uName = $_POST['uname'];
    $pass = $_POST['psw'];

    $query = "SELECT * FROM students WHERE userName = '$uName' AND psw = '$pass';";
    $result = mysqli_query($conn,$query);
    
    if($result == false){
      echo(mysqli_error($conn));
    }else{
      $user = $result->fetch_assoc();
      header('location: landing.php');
    }
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
    <div class='title'>
      <h2>CS4177 <br> Dr. Robotnik</h2>
    </div>
    <div class ='ribbon'>
      <ul class='horizontal'>
          <li><a class='active' href='adminLanding.php'>Grades</a></li>
          <li><a href='adminIntel.php'>Intel</a></li>
        </ul>
    </div>
    <hr>
  </div>
  <img src='egg.png' alt='Either Sonic stole my logo, or you are incapable of seeing how awesome it is!'>
  <!-- <p> User: <?php echo $_SESSION['userName'] ?> </p> -->
  <table id='bois'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Submission</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $results = mysqli_query($conn,"SELECT * FROM students LIMIT 10");
            while($row = mysqli_fetch_array($results)) {
            ?>
                <tr>
                    <td><?php if($row['userName'] != 'eggman'){ echo $row['userName']; }?></td>
                    <td><?php if (file_exists('./submissions/' .$row['userName'] . '_assignment.txt')) {
                        echo "<a href='./submissions/" . $row['userName'] .
                        "_assignment.txt' download>
                        <button type='button'>Download</button>
                      </a>";
                    } else if($row['userName'] != 'eggman'){
                        echo "Not yet submitted.";
                        
                    }?>
                    </td>
                </tr>

            <?php
            }
            ?>
            </tbody>
    </table>
</body>
</html>
