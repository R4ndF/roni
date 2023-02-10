<?php
  session_start();
require_once "../inc/d_auth.php";
?>
<html lang="en" class="w3-cyan">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $url?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0//css/font-awesome.min.css">
</head>
<body>
    <div class ="w3-sidebar w3-black">
      <img src="../assets/img/logo spp.png" alt="">
      <?php include '../inc/d_nav.php' ?>    
       <?= $level ?>   
       <?= $_SESSION['level'] ?>
       <?= $url ?>
    </div>
    <div style="margin-left:210px">
    <?php include '../inc/d_load.php' ?>
    </div>
                                
</body>
</html>