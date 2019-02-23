<?php

  $DB_SERVER = 'localhost';
  $database_user = 'root';
  $DB_PASSWORD = '';
  $DB_NAME = 'hts';

      
      $connect = mysqli_connect($DB_SERVER, $database_user, $DB_PASSWORD, $DB_NAME) or die("Failed to connect to the database.");




?>