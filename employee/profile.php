<?php

require_once '../include/config.php';
require_once '../include/session.php';

isset($_SESSION["user_id"]) ? $users_id = $_SESSION["user_id"] : "no user_id";

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
    <title>PROFILE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <style>
      @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    </style>
    <link rel="stylesheet" href="../css/default.css?=v<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/employee_profile.css?=v<?php echo time(); ?>">
</head>
<body>
    <div class="navigation">
        <div class="logo">
            <img src="../images/pueri-logo.png" alt="LOGO">
        </div>
        <div class="navigations">
            <ul>
                <li><a href="dashboard.php"><i class="fa-solid fa-house-user"></i> DASHBOARD</a></li>
                <li><a href=""><i class="fa-solid fa-house-user"></i> DASHBOARD</a></li>
                <li><a href=""><i class="fa-solid fa-house-user"></i> DASHBOARD</a></li>
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
                    <p><?php echo $result["Last_name"] ?> <i class="fa-solid fa-v" id="iUser"></i></p>
                </button>
                <div class="psl" id="psl" style="display: none;">
                    <a href="profile.php"><i class="fa-solid fa-user"></i> PROFILE</a>
                    <a href="settings.php"><i class="fa-solid fa-gear"></i> SETTINGS</a>
                    <a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
                </div>
            </div>
        </div>
        <div class="main-title">
            <h3>PROFILE</h3>
        </div>
        <div class="contents">
            <div class="profiling">
                <img src="../upload_image/<?php echo $result["user_profile"] ?>" alt="">
                <p><?php echo $result["first_name"] . " " . $result["Middle_name"] . " " . $result["Last_name"]; ?></p>
                <p id="mt"><?php echo $result["id"]; ?></p>
                <p id="mt"><?php echo $result["user_role"]; ?></p>
                <button type="submit" id="pdsbtn" onclick="gtpds()">PERSONAL DATASHEET</button>
                <button type="submit" id="dcbtn" onclick="gtc()">CATEGORY</button>
                <button type="submit" id="jdbtn" onclick="gtjd()">JOB DETAILS</button>
                <button type="submit" id="dbtn" onclick="gtd()">DOCUMENTS</button>
                <button type="submit" id="albtn" onclick="gtal()">ATTENDANCE & LEAVE</button>
                <button type="submit" id="pbbtn" onclick="gtpb()">PAYROLL & BENEFITS</button>
            </div>
            <div class="profile-contents">
                <div class="pds" id="pds" style="display: block;">
                    <div class="tabtns">
                        <h4>PERSONAL DATA SHEET</h4>
                    </div>
                    <div class="buttons-navs">
                        <li><button>Personal Information</button></li>
                        <li><button>Family Background</button></li>
                        <li><button>Educational Background</button></li>
                        <li><button>CSE & WE</button></li>
                        <li><button>OTHERS</button></li>
                    </div>
                    <div class="fields">
                        <div class="name">
                                <li><p><?php echo $result["first_name"]; ?></p><label for="">FIRST NAME</label></li>
                                <li><p><?php echo $result["Middle_name"]; ?></p><label for="">MIDDLE NAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li id="small"><p id="small">N/A</p><label for="" id="small">SUFFIX</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li id="small"><p id="small"><?php echo $result["Last_name"]; ?></p><label for="" id="small-l">BLOOD TYPE</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <h3 id="ra">RESIDENTIAL ADDRESS</h3>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <h3 id="ra">PERMANENT ADDRESS</h3>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                                <li><p><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                        </div>
                    </div>
                </div>
                <div class="category" id="c" style="display: none;">
                    <h1>category na bilat</h1>
                </div>
                <div class="job-details" id="jd" style="display: none;">
                    <h1>job details na bilat</h1>
                </div>
                <div class="documents" id="d" style="display: none;">
                    <h1>documents na bilat</h1>
                </div>
                <div class="attendance-leave" id="al" style="display: none;">
                    <h1>attendance leave na bilat</h1>
                </div>
                <div class="payroll-benefits" id="pb" style="display: none;">
                    <h1>payroll benefits na bilat</h1>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/profile.js"></script>
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