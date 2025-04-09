<?php
include 'header.php';
require_once '../include/session.php';

/* isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] :"No User found";
 */
?>

<!DOCTYPE html>
<html lang="en">

<?php
$title = isset($_SESSION["user_id"]) ? ' Welcome to Puericulture Emergency Hospital, '.$_SESSION['user_id'].'' : 'Invalid';
$image = "./assets/images/user-avatar.png";
?>

<header>
  <link rel="stylesheet" href="./assets/css/style.css">
    <title><?php echo $title ? $title : 'My Website'; ?></title>
</header>

<body>
<?php include "navbar.php"; ?>
  <main id="view-panel">
  
  <!-- PASSING PAGE INTO OTHER -->
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php include './pages/' . $page . '.php' ?>

  </main>



</body>

</html>