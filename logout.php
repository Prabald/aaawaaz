
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap & other CSS files -->

   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/animate.css">
   <link rel="stylesheet" type="text/css" href="css/aos.css">
   <link rel="stylesheet" type="text/css" href="css/jquery.css">
   <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
           <form action="logout.php" method="GET" class="hiddenvalue">
           	 <input type="text" name="knowst">
           	 <input type="submit" name="submit">

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
 

                            session_destroy();

                            if($_GET['knowst'] == 'admin')
                            {
                                       
                                       header("Location: panel.php?knowst=panel&submit=Submit+Query");
                                       # ?knowst=panel&submit=Submit+Query
                                  
                            }

                            else {

                            header("Location: login.php?logout=done&submitt=Submit+Query");
                   }


  }


  else {

               header("Location: login.php?knowst=done&submit=Submit+Query");



  }











?>