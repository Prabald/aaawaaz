<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
 // database connection
include("config.php");
$db = mysqli_connect("localhost", "root", "", "hts");
// validation
if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {
  
  $Session_id = $_SESSION['id'];
  $email = $_SESSION['email'];
  
  $first_query =  mysqli_query($connect, "SELECT first_name FROM users WHERE email='$email' LIMIT 1");
  $second_query =  mysqli_query($connect, "SELECT last_name FROM users WHERE email='$email' LIMIT 1");
  //getting first name of user
  while ($row = mysqli_fetch_array($first_query)) {
    $firstname = $row['first_name'];
  }
  //getting last name of user
  while ($row = mysqli_fetch_array($second_query)) {
  $lastname = $row['last_name'];
  }
  
  /* $url = "http://postalpincode.in/api/pincode";
  $pincode =  mysqli_query($connect, "SELECT pin FROM users WHERE email='$email' LIMIT 1");
  while ($row = mysqli_fetch_array($pincode)) {
  $pincode = $row['pin'];
  }
  $url = $url."/".$pincode;
  $location = file_get_contents($url);
  $location = json_decode($location,true);
  $location = json_encode($location, true);
  print_r($location);
  */
  //Checking if someone is already logged in or not
  if (@$_GET['AlreadyLogged'] == 'yes') {
  echo "<center><p class='alert alert-info' id='notice'>You are already logged In.  <a href='logout.php'>Logout First</a></p></center>";}
}
else {header("location: login.php?knowst=loginfirst&submit=Submit+Query");}
?>

<?php 
// getting pincode of user
$finalcode = mysqli_query($db, "SELECT pin FROM users WHERE id='$Session_id'");

while ($row = mysqli_fetch_array($finalcode)){
  $final_code = $row['pin'];
}
/*$Name1_query = mysqli_query($db, "SELECT uID FROM activity WHERE");
$Name2_query = mysqli_query($db, "SELECT last_name FROM users WHERE id='$Session_id'");
while ($row = mysqli_fetch_array($Name1_query)) {
$first_name = $row['first_name'];
}
*/
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome || Dashboard</title>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap & other CSS files -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/animate.css">
   <link rel="stylesheet" type="text/css" href="css/aos.css">
   <link rel="stylesheet" type="text/css" href="css/jquery.css">
   <link rel="stylesheet" type="text/css" href="css/custom.css">
   <link rel="stylesheet" href="css/normalize.min.css">
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/examples.css">
</head>
<body>
<!-- this is header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!--logo-->
  <img src="images/navMonk.png" style="width: 70px; height: 70px;">
  <!-- this is Search bar start -->
  <form class="form-inline my-2 my-lg-0" action="App_main.php" method="GET">
      <input class="form-control mr-sm-2" style="padding-right: 200px;" type="search" placeholder="Search" aria-label="Search" name='searchQ'>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <!-- this is search bar end-->
  <!-- this is menu bar start -->
  <div class="collapse navbar-collapse" style="padding-left:160px;" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-right" style="font-size:18px;" href="App_main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:18px;" href="faq.php">FAQs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-size:18px;" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="font-size:18px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="images/user.svg">
        </a>
        <!-- print user name -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" style="font-size:13px;" href="#"><?php echo   $firstname." ".$lastname; ?></a>
          <!-- print user session id-->
          <a class="dropdown-item" style="font-size:13px;" href="#">session id <?php echo $Session_id; ?></a>
          <a class="dropdown-item" style="font-size:10px;" href="tnc.php">Terms And Conditions</a>
          <a class="dropdown-item" style="font-size:10px;" href="privacypolicy.php">Privacy Policy</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="font-size:13px;" href="logout.php">  Logout</a>
        </div>
      </li>  
    </ul>
  </div>
</nav>
<!-- main body start-->
<div class="container-fluid">
<!--open row -->
  <div class="row">
  <!--raise an issue field -->
  <div class="col-sm-6 ml-4 mr-4">
  <!--uploading an issue in database -->

<?php
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

    // Get image name
    $file = $_FILES['file']['name'];
    // Get text
    $text_t = mysqli_real_escape_string($db, $_POST['text']);

    // image file directory
    $target = "images/".basename($file);
    // user pincode
    $pinC = $_POST['pinn'];
    // user id
    $u_ID = $_POST['uID'];
    // user post heading
    $heading= $_POST['heading'];
    // inserting user post in database
    $sql = "INSERT INTO activity (file,text, pincode, u_ID,heading) VALUES ('$file', '$text_t','$pinC','$u_ID','$heading')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
     //$msg = "Image uploaded successfully";
    }else{
      //$msg = "Failed to upload image";
    }
  }

?>
<div class="container">
  <div class="card">
    <div class="card-header"><p><b>Raise An Issue</b></p></div>
      <div class="card-body">
        <form method="POST" action="App_main.php" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <input type="hidden" name="pinn" value="<?php echo $final_code;?>">
          <input type="hidden" name="uID" value="<?php echo $Session_id;?>">
          <input type="text" class="form-control" name="heading" placeholder="Enter Heading"><br>
          <textarea id="text" name="text" placeholder="Type here..."class="form-control">
          </textarea>
          <input type="file" name="file" class="form-control">
      </div> 
      <div class="card-footer">
        <button class="btn-primary" type="submit" name="upload">Post</button>
      </form>
      </div>
<!--raise an issue field end -->
</div><br><br>
<!-- dynamically generating post from data base start-->
<?php
//Searching Process Through Data

$number_of_issues = 0;  //intialising number of issues for counting

// searching in database
if (isset($_GET['searchQ'])) {
  // search query from input field
  $searchQ = $_GET['searchQ'];
  // fetching search query
  $Returned_value = mysqli_query($connect,"SELECT * FROM activity WHERE heading LIKE '%$searchQ%' ");
 $keyword = "Number of issues related to '".$searchQ."' in your area : ";
 echo "<h2> Searched Results : </h2><br>";
 //counting number of issues
 while ($row = mysqli_fetch_array($Returned_value)){
  $number_of_issues++;  
  
  $first_name =  mysqli_query($connect,"SELECT first_name FROM users WHERE id={$row['u_ID']}");

  while ($row1 = mysqli_fetch_array($first_name)) {
  $first_name1 = $row1['first_name'];
  }

  echo "<div class='container'>";
  echo "<div class='card'>";
  echo "<div class='card-header'>";
  // this is heading section
  echo "<b>".$row['heading']."</b>";
  echo "</div>";
  echo "<div class='card-body'>";
  //this is Image file area
  echo "<center><img style='width:100%;height:auto;' src='images/".$row['file']."' ></center>";
  echo "</div>";
  echo "<div class='card-footer'>";
  // this is Text area
 echo "<br><p>".$row['text']."</p>";
 $pid = $row['a_id'];
 //getting rate from database
 $score = mysqli_query($connect, "SELECT rate FROM activity WHERE a_id='$pid'");
 //fetching rate from database
 while ($row = mysqli_fetch_array($score)) {  
  $score = $row['rate'];
 }
 //rating section of each post
 echo " <form action='App_main.php' method='POST' class='form-control'>
          <input  class='form-control' type='number'  max='5' min='0' name='rating' placeholder='On a scale of 0-5, how much does this bother you?'>
          <input type='hidden' value=".$pid." name='pid'><br>
          <input type='submit' value='submit' class='btn-primary'><br><br>
          <div class='alert alert-danger'><strong>Severity Rating : </strong> <b>".$score."</b>
          </div> 
        </form>";
echo "</div> </div> </div><br><br>";
}

}
else {
  $keyword = 'Total Number of issues in your area : ';
// fetching all posts from pincode
$result = mysqli_query($db, "SELECT * FROM activity WHERE pincode=$final_code");

while ($row = mysqli_fetch_array($result)) {
  $number_of_issues++;
/*   $first_name =  mysqli_query($connect,"SELECT first_name FROM users WHERE id={$row['u_ID']}");
//print_r($first_name);
while ($row1 = mysqli_fetch_array($first_name)) {
$first_name1 = $row1['first_name'];
// print_r($row1);
}*/
echo "<div class='container'>";
echo "<div class='card'>";
echo "<div class='card-header'>";
// this is heading area
echo "<b><span style='color:black;'>".$row['heading']."</span></b>";
echo "</div>";
echo "<div class='card-body'>";
//this is image area
echo "<center><img style='width:100%;height:auto;' src='images/".$row['file']."' ></center>";
echo "</div>";
echo "<div class='card-footer'>";
// this is footer
echo "<br><p>".$row['text']."</p>";
$pid = $row['a_id'];
//fetching rate from database
$score = mysqli_query($connect, "SELECT rate FROM activity WHERE a_id='$pid'");

while ($row = @mysqli_fetch_array($score)) {  
  $score = $row['rate'];
}
echo " <form action='App_main.php' method='POST' class='form-control'>
        <input  class='form-control' type='number'  max='5' min='0' name='rating' placeholder='On a scale of 0-5, how much does this bother you?'>
        <input type='hidden' value=".$pid." name='pid'><br>
        <input type='submit' value='submit' class='btn-primary'><br><br>
        <div class='alert alert-danger'><strong>Severity Rating : </strong> <b>".$score."</b>
        </div> 
       </form>";
echo "</div> </div> </div><br><br>";
}
}
?>
<?php 
//getting rate from user input field
  $rating = $_POST['rating'];
//getting post id from user input field  
  $p_id = $_POST['pid'];
//fetching Nvotes from database
  $Nvotes = "SELECT Nvotes FROM activity WHERE a_id='$p_id'";
  $run_query1 = mysqli_query($connect, $Nvotes);

  while ($row = mysqli_fetch_array($run_query1)) { 
   $votes = $row['Nvotes'];
}
//fetching sum from database
  $sum = "SELECT sum FROM activity WHERE a_id='$p_id'";
  $run_query = mysqli_query($connect, $sum);

while ($row = mysqli_fetch_array($run_query)) { 
  $sum = $row['sum'];
}

$votes = $votes +1;
$Tvotes = ($votes)*5;
$sum = (double)($sum + $rating);

$score = (double)($sum/$Tvotes)*100;  

$query =mysqli_query($connect, "UPDATE activity  SET sum='$sum' WHERE a_id='$p_id'"); 
$query =mysqli_query($connect, "UPDATE activity  SET Nvotes='$votes' WHERE a_id='$p_id'");
$query =mysqli_query($connect, "UPDATE activity  SET rate='$score' WHERE a_id='$p_id'"); 

?>
<!-- dynamically generating post from data base end-->
</div>
<!-- row close -->
</div>
<!--main body end-->
<!-- right sidebar start-->
<div class="col-sm-4">
  <div class="row">
  <h4>Showing the issues raised around PIN : <a href="#"><?php echo $final_code;?></a></h4>
  </div><br>
    <div class="row">

        <h6> <?php echo $keyword; ?> <b><?php echo $number_of_issues;?> </b></h6>
    </div><br>
    <div class="row">
        <img src="images/navMonk.png" style="width: 400px; height: 400px; position: fixed; ">
    </div>

  </div>
</div>
</div>

<form action="App_main.php" method="GET" class="hiddenvalue">
 <input type="text" name="AlreadyLogged">
 <input type="submit" name="submit">
</form>
</body>
<!-- Required Javascript Files -->
<script type="text/javascript" src="js/aos.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
//This script is a extra of AOS 
      AOS.init({
        easing: 'ease-out-back',
        duration: 1000
      });
    </script>
</html>