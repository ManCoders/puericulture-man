<?php
include 'header.php';
require_once '../include/session.php';

isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no user_id";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payroll Dashboard</title>

</head>

<body>
<?php include "navbar.php"; ?>
  <main id="view-panel">
  
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php include './pages/' . $page . '.php' ?>
  </main>


  <!-- <?php include "footer.php"; ?> -->

</body>

</html>