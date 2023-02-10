<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/particles.js-master/demo/css/style.css">
<link rel="stylesheet" href="assets/css/particlesjs.css">
<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="w3-container " id="particles-js">
  <div class=" w3-display-middle w3-round ">
    <div class="">
      <h2 class="w3-black w3-border-aqua w3-round-large w3-center w3-xlarge w3-poppins w3-serif">Pembayaran Spp</h2>
    </div>
    <br>
    <form action="proses/proses_login.php" method="post">
      <p>
      <input class="w3-input w3-round-xxlarge w3-black w3-hover-light-grey w3-border-aqua " type="text" placeholder="Username" name="username">
      </p>
      <br>
      <i>    
      <input class="w3-input w3-round-xxlarge w3-black w3-hover-light-grey w3-border-aqua" type="password" placeholder="Password" name="password">
      </p>
      <br>
      <button class="w3-button w3-round-xlarge w3-hover-aqua w3-black w3-border w3-border-aqua w3-right"><i class="fa fa-sign-in fa-1g"></i> login </button>
    </form>
  </div>
  <script src="assets/particles.js-master/particles.js"></script>
<script src="assets/particles.js-master/demo/js/app.js"></script>
</div>
</body>
</html>