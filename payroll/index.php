<?php
include 'header.php';
require_once '../include/session.php';

isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no user_id";

?>

<!DOCTYPE html>
<html lang="en">

<?php
$title = "Puericulture Emergency Hospital";
$image = "./assets/images/user-avatar.png";
?>

<header>
    <title><?php echo $title ? $title : 'My Website'; ?></title>
</header>

<body>
<?php include "navbar.php"; ?>
  <main id="view-panel">
  
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php include './pages/' . $page . '.php' ?>
  </main>


  <!-- <?php include "footer.php"; ?> -->

</body>

</html>