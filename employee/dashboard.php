<?php

require_once '../include/config.php';
require_once '../include/session.php';



/* Change mo nalng pag ok na para hind kana mag login login Hahahah */
isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no user_id";

if($users_id == null){
    header("Location: ../index.php");
}

    $query = "SELECT users.*, personal_information_st.*, pds_pi.* FROM pds_pi
        INNER JOIN users ON pds_pi.users_id = users.id
        INNER JOIN personal_information_st ON pds_pi.pdspi_id = personal_information_st.pdspis_id
        WHERE users.id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $users_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <style>
      @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    </style>
    <link rel="stylesheet" href="../css/default.css?=v<?php echo time(); ?>">
    <script src="../js/dashboard.js"></script>
</head>
<body>
    <div class="navigation">
        <div class="logo">
            <img src="../images/pueri-logo.png" alt="LOGO">
        </div>
        <div class="navigations">
            <ul>
                <li><a href="dashboard.php"><i class="fa-solid fa-house-user"></i> DASHBOARD</a></li>
                <li><a href="payroll.php"><i class="fa-solid fa-house-user"></i> PAYROLL</a></li>
                <li><a href="attendance_Leave.php"><i class="fa-solid fa-house-user"></i> ATTENDANCE</a></li>
            </ul>
        </div>
    </div>
    <div class="column">
        <div class="header">
            <div class="title">
                <h2>ZAMBOANGA PUERICULTURE CENTER ORG. NO. 144</h2>
            </div>
            <div class="user">
                <button type="submit" id="cbtn" onclick="pslbtn()">
                    <img src="../upload_image/<?php echo $result["user_profile"] ?>" alt="">
                    <p><?php echo isset($result["Last_name"]) ? $result["Last_name"] : null; ?> <i class="fa-solid fa-v"></i></p>
                </button>
                <div class="psl" id="psl" style="display: none;">
                    <a href="profile.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                    <a href="settings.php"><i class="fa-solid fa-gear"></i> SETTINGS</a>
                    <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
                </div>
            </div>
        </div>
        <div class="main-title">
                <h3>DASHBOARD</h3>
            </div>
        <div class="contents">
            <h1></h1>
        </div>
    </div>
    <script>
        function pslbtn(){
            const getChoices = document.getElementById("psl");

            console.log("button clicked!")

            if(getChoices.style.display == 'none'){
                getChoices.style.display = 'flex';
            }else{
                getChoices.style.display = 'none';
            }
        }
    </script>
</body>
</html>