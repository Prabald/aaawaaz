<!DOCTYPE html>
<html>
<head>
	<title> Login || Aawaaj</title>

	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap & other CSS files -->

   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/animate.css">
   <link rel="stylesheet" type="text/css" href="css/aos.css">
   <link rel="stylesheet" type="text/css" href="css/jquery.css">
   <link rel="stylesheet" type="text/css" href="css/custom.css">

</head>



<body>


 <body class="text-center">

 	<div class="container w-50">
 		
    <form class="form-signin" action="login.php" method="POST">
      <img class="mb-4" src="images/navMonk.png" alt="" width="200" height="200">

      <h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
      <div class='alert alert-info knowst' role='alert'>You have to login first</div>
      <br><div class='alert alert-info logout' role='alert'>Successfully Logged Out</div>
      <br>
      <label for="email" class="sr-only">Email address</label> 
      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label><br>
     Don't have an account? <br><a href="signup.php"> Register here</a>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit"> Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
</div>

<form action="login.php" method="GET" class="hiddenvalue">
 <input type="text" name="knowst">
 <input type="text" name="logout">
 <input type="submit" name="submit">
	</form>

	<form action="login.php" method="GET" class="hiddenvalue">
 
 <input type="text" name="logout">
 <input type="submit" name="submitt">
	</form>

  </body>
      
      

 











 <!-- Required Javascript Files -->

 <script type="text/javascript" src="js/aos.js"></script>
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
 

</html>


<?php
          session_start();

           if( isset( $_SESSION['email'] ) && isset($_SESSION['id']) ) {


 
                       header("Location: App_main.php?AlreadyLogged=yes&submit=Submit+Query");

                     


  }


     if ($_SERVER["REQUEST_METHOD"]=="POST") {


     	        require_once("config.php");


                 




     	        $Email = $_POST['email'];
     	        $Password = $_POST['password'];

     	        $Id_query =  mysqli_query($connect, "SELECT id FROM users WHERE email='$Email' LIMIT 1");

     	        while ($row = mysqli_fetch_array($Id_query)) {
                 $Id = $row['id'];
            
                                }
       
                $check_user = mysqli_query($connect, "SELECT id FROM users WHERE email='$Email' AND password='$Password'");
     	         


            
                              if(mysqli_num_rows($check_user) == 1) {

                                 $_SESSION['email'] = $Email;
                                  $_SESSION['id'] = $Id;
                                  header("Location: App_main.php");
                                  
                                   }

                                  else {

                                    	echo "wrong username/password";
                                    }
   








}


  if ( @$_GET['knowst'] == 'loginfirst') {



          
          
           echo " <script> $('.knowst').css('display', 'inline'); </script>";
}


   




if ( @$_GET['logout'] != '') {



          
          
           echo " <script> $('.logout').css('display', 'inline'); </script>";
}





?>