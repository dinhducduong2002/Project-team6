<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop nick cùi</title>
  <link href="./mvc/Views/css/bootstrap.min.css" rel="stylesheet">
  <link href="./mvc/Views/css/mystyle.css" rel="stylesheet">
  <script src="./mvc/Views/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./mvc/Views/css/util.css">
  <link rel="stylesheet" type="text/css" href="./mvc/Views/css/main.css">
  <!--===============================================================================================-->
  <script src="./mvc/Views/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="./mvc/Views/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="./mvc/Views/vendor/bootstrap/js/popper.js"></script>
  <!--===============================================================================================-->
  <script src="./mvc/Views/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="./mvc/Views/vendor/daterangepicker/moment.min.js"></script>
  <script src="./mvc/Views/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="./mvc/Views/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="./mvc/Views/js/main.js"></script>

  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php
  require_once("./mvc/Views/inclues/header.php");
  ?>
  <!-- /header -->
  <?php
  //   require_once ("./mvc/Views/inclues/banner.php");
  ?>
  <!-- /banner -->
  <main class="container">

    <?php require_once "./mvc/views/pages/client/" . $data["pages"] . ".php" ?>

  </main>
  <!--/main  -->
  <?php
  require_once("./mvc/Views/inclues/footer.php");
  ?>
</body>

</html>