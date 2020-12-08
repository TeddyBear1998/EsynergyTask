<?php // TODO: If have time - ERROR HANDLING for everything!!!!!!!!!!!!!!!! ?>
<?php // TODO: If have time - DATA VALIDATION!!!!!!!!!!!!!!!!!!!!! ?>
<?php session_start(); ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <?php
    if(isset($_GET['data']) && $_GET['data'] == 'incorrect'){
      echo "<p style='color: red'>Login data is incorrect!</p>";
    }
  ?>
  <form name="login_form" action="private/login_verify.php" method="POST">
    <label for="log_username">Username</label>
    <input id="log_username" name="username" type="text" required />
    <label for="log_password">Password</label>
    <input id="log_password" name="password" type="password" required />
    <input id="submit" name="submit" type="submit" value="Submit" />
  </form>
</body>
</html>
