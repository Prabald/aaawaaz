<?php
session_start();
 // database connection
      include("config.php");
       $db = mysqli_connect("localhost", "root", "", "hts");

  if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {
 
                       $Session_id = $_SESSION['id'];
                      
                       $email = $_SESSION['email'];

                       $first_query =  mysqli_query($connect, "SELECT first_name FROM users WHERE email='$email' LIMIT 1");
                       $second_query =  mysqli_query($connect, "SELECT last_name FROM users WHERE email='$email' LIMIT 1");
                      
                      while ($row = mysqli_fetch_array($first_query)) {
                 $firstname = $row['first_name'];
                                                }

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

                   if (@$_GET['AlreadyLogged'] == 'yes') {
                      
                     

                     echo "<center><p class='alert alert-info' id='notice'>You are already logged In.  <a href='logout.php'>Logout First</a></p></center>";
                    
                    
   }




  }


 
  



else {
                
             header("location: login.php?knowst=loginfirst&submit=Submit+Query");



}


?>
<?php 
                      $finalcode = mysqli_query($db, "SELECT pin FROM users WHERE id='$Session_id'");
                       while ($row = mysqli_fetch_array($finalcode)) {
                 $final_code = $row['pin'];
            
                                }

                            /*    $Name1_query = mysqli_query($db, "SELECT uID FROM activity WHERE");
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
  <img src="images/navMonk.png" style="width: 70px; height: 70px;">
 
 <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" style="padding-right: 200px;" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
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
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" style="font-size:13px;" href="#"><?php echo   $firstname." ".$lastname; ?></a>
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
<!-- container start-->
<div class="container-fluid">
<!--open row -->
  <div class="row">
    <!--raise an issue field -->
  <!--  <div class="col-sm-2"> </div> -->
  <div class="col-sm-6 ml-4 mr-4">
     <div class="container">
<!-- raise an issue -->

 


<!-- this is dynamic data  -->


<?php
  // Create database connection
 

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

     $pinC = $_POST['pinn'];
     $u_ID = $_POST['uID'];
     $heading= $_POST['heading'];
    $sql = "INSERT INTO activity (file,text, pincode, u_ID,heading) VALUES ('$file', '$text_t','$pinC','$u_ID','$heading')";
    // execute query
    
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
    
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($db, "SELECT * FROM activity WHERE pincode=$final_code");

?>

 



    <div class="card">
      <div class="card-header"><p><b>Raise An Issue</b></p></div>
      <div class="card-body">
        <form method="POST" action="App_main.php" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">


          
          <input type="hidden" name="pinn" value="<?php echo $final_code;?>">
          <input type="hidden" name="uID" value="<?php echo $Session_id;?>">
          <input type="text" class="form-control" name="heading" placeholder="Enter Heading"><br>
          <textarea 
              id="text" 
             
              name="text" 
              placeholder="Type here..."
              class="form-control">
            </textarea>
            <input type="file" name="file" class="form-control">
       </div> 
      <div class="card-footer">
        <button class="btn-primary" type="submit" name="upload">Post</button>
        </form>
      </div>
      
      <!--raise an issue field end -->
    </div><br><br>
    <!-- post field -->
  
    <!-- post field end -->
    <!-- dynamically generating post from data base start-->
  <?php
    while ($row = mysqli_fetch_array($result)) {
  

    /*   $first_name =  mysqli_query($connect,"SELECT first_name FROM users WHERE id={$row['u_ID']}");
       //print_r($first_name);
       while ($row1 = mysqli_fetch_array($first_name)) {
                 $first_name1 = $row1['first_name'];
                // print_r($row1);
            
                                }*/
      echo "<div class='container'>";
        echo "<div class='card'>";
        echo "<div class='card-header'>";
       // this is header
        echo `         

            <b> `.$row['heading'].`</b>


        `;



       // echo  "<h3><b>". $first_name1." ".$last_name."</b></h3>";
        echo "</div>";
        echo "<div class='card-body'>";
        //this is content
      
        echo "<center><img style='width:auto;height:300px;' src='images/".$row['file']."' ></center>";
        echo "</div>";
        echo "<div class='card-footer'>";
 
       // this is footer
        echo "<br><p>".$row['text']."</p>";
        $pid = $row['a_id'];


          $score = mysqli_query($connect, "SELECT rate FROM activity WHERE a_id='$pid'");

          while ($row = @mysqli_fetch_array($score)) {  

                  $score = $row['rate'];
          }

         
       echo " <form action='App_main.php' method='POST' class='form-control'>
                    
                    <input  class='form-control' type='number'  max='5' min='0' name='rating' placeholder='On a scale of 0-5, how much does this bother you?'>
                    <input type='hidden' value=".$pid." name='pid'><br>
                    <input type='submit' value='submit' class='btn-primary'><br><br> <div class='alert alert-danger'>
  <strong>Severity Rating : </strong> <b>".$score."</b>
</div> 


       </form>";
        echo "</div> </div> </div><br><br>";
 


    }
  ?>

 <?php 


   $rating = $_POST['rating'];
   $p_id = $_POST['pid'];



  

$Nvotes = "SELECT Nvotes FROM activity WHERE a_id='$p_id'";

   //echo $pid;

$run_query1 = mysqli_query($connect, $Nvotes);

$sum = "SELECT sum FROM activity WHERE a_id='$p_id'";
$run_query = mysqli_query($connect, $sum);

 while ($row = mysqli_fetch_array($run_query1)) { 

             $votes = $row['Nvotes'];


  }


//echo "VOTES : ".$votes;
  while ($row = mysqli_fetch_array($run_query)) { 

             $sum = $row['sum'];


  }

//echo "Sum : ".$sum;
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
<!-- container start end-->
<!-- right sidebar start-->
<?php
$location=mysqli_query($db, "SELECT * FROM users WHERE email=$email");
  
?>

  <div class="col-sm-4">


    <div class="row">
        <h4>Showing the issues raised around PIN : <?php echo $location; ?><a href="#"><?php echo $final_code;?></a></h4>
    </div>
    <br>
    <div class="row">
<?php 
$result = mysqli_query($db, "SELECT * FROM activity WHERE pincode=$final_code");

 $i =0;
while($row = mysqli_fetch_array($result)) {
        
        $i = $i +1;

}
?>
        <h6>Number of issues raised in your area : <b><?php echo $i;?> </b></h6>
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

    <script type="text/javascript">

      $('#loading-image').hide();
      
      $('#sub-form').submit(function(e){

        
    
    e.preventDefault(); // Prevent Default Submission
    
    $.post('dataget.php', $(this).serialize() )
    .done(function(data){
      $('#loading-image').hide();
      $('#form-content').fadeOut('slow', function(){
        $('#form-content').fadeIn('slow').html(data);
      });
    })
    .fail(function(){
      alert('Ajax Submit Failed ...');
      $('#form-content').show();
        $('#loading-image').hide();
    });
    
  });
    </script>

   

</html>