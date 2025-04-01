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
            </div>
            <div class="profile-contents" id="profile-contents">
                <div class="pds" id="pds" style="display: block;">
                    <div class="tabtns">
                        <h4>PERSONAL DATA SHEET</h4>
                        <button type="submit" id="fillUpBtn" onclick="fill_Up()">FILL UP</button>
                    </div>
                    <div class="buttons-navs">
                        <li><button>Personal Information</button></li>
                        <li><button>Family Background</button></li>
                        <li><button>Educational Background</button></li>
                        <li><button>CSE & WE</button></li>
                        <li><button>OTHERS</button></li>
                    </div>
                    <div class="fields" id="fields">
                        <div class="name">
                                <li><p><?php echo !empty(isset($result["first_name"])) ? $result["first_name"] : "N/A" ?></p><label for="">FIRST NAME</label></li>
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
                                <h3 id="ra">perma ADDRESS</h3>
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
            </div>
        <!-- ========================================= FILL UP ======================================== -->
        <div class="fill-up" id="fill-up" style="display: none;">
            <div class="header-fill_up">
                <div class="back-button">
                    <button type="submit" id="gbtinfo" onclick="gbtInfo()">BACK</button>
                </div>
                <div class="active-button">
                    <button type="submit" id="headerBtn" onclick="HeaderButton()"><h4>PERSONAL INFORMATION v</h4></button>
                </div>
                <div class="inactive-buttons" id="inactive-buttons" style="display: none;">
                    <button id="b">FAMILY BACKGROUND</button>
                    <button>EDUCATIONAL BACKGROUND</button>
                    <button>CSE & WE</button>
                    <button>OTHERS</button>
                </div>
            </div>
            <div class="body-fill_up">
                <form action="../auth/function.php" method="post">
                    <div class="first-tab">
                        <input type="hidden" name="personal_information" value="personal">
                        <button id="update_button">update</button>
                        <li><p id="dnt"><?php echo $result["first_name"]; ?></p><label for="">FIRST NAME</label></li>
                        <li><p id="dnt"><?php echo $result["Middle_name"]; ?></p><label for="">MIDDLE NAME</label></li>
                        <li><p id="dnt"><?php echo $result["Last_name"]; ?></p><label for="">SURNAME</label></li>
                        <li><input type="text" name="name_extension" id="small"><label for="">SUFFIX</label></li>
                        <li><p id="dnt"><?php echo $result["email"]; ?></p><label for="">EMAIL</label></li>
                        <li><input type="text" name="sex"><label for="sex">Sex</label></li>
                        <li><input type="text" name="date_of_birth"><label for="date_of_birth">Date of Birth</label></li>
                        <li><input type="text" name="place_of_birth"><label for="place_of_birth">Place of Birth</label></li>
                        <li><input type="text" name="telephone_no"><label for="telephone_no">Telephone No.</label></li>
                        <li><input type="text" name="mobile_no"><label for="mobile_no">Mobile No.</label></li>
                        <li><input type="text" name="civil_status"><label for="civil_status">Civil Status</label></li>
                        <li><input type="text" name="height"><label for="height">Height</label></li>
                        <li><input type="text" name="weight"><label for="weight">Weight</label></li>
                        <li><input type="text" name="blood_type" id="small"><label for="blood_type">Blood Type</label></li>
                        <li><input type="text" name="gsis_id_no"><label for="gsis_id_no">GSIS ID No.</label></li>
                        <li><input type="text" name="pagibig_id_no"><label for="pagibig_id_no">Pag-ibig ID No.</label></li>
                        <li><input type="text" name="philhealth_no"><label for="philhealth_no">Philhealth No.</label></li>
                        <li><input type="text" name="sss_no"><label for="sss_no">SSS No.</label></li>
                        <li><input type="text" name="tin_no"><label for="tin_no">TIN No.</label></li>
                        <li><input type="text" name="agency_no"><label for="agency_no">Agency No.</label></li>
                        <li><input type="text" name="citizenship"><label for="citizenship">Citizenship</label></li>
                        <h3 id="ra">RESIDENTIAL ADDRESS</h3>
                        <li><input type="text" name="house_block"><label for="house_block">House/Block</label></li>
                        <li><input type="text" name="street"><label for="street">Street</label></li>
                        <li><input type="text" name="subdivision"><label for="subdivision">Subdivision</label></li>
                        <li><input type="text" name="barangay"><label for="barangay">Barangay</label></li>
                        <li><input type="text" name="city_muntinlupa"><label for="city_muntinlupa">City/Municipality</label></li>
                        <li><input type="text" name="province"><label for="province">Province</label></li>
                        <li><input type="text" name="zip_code"><label for="zip_code">Zip Code</label></li>
                        <h3 id="ra">PERMANENT ADDRESS</h3>
                        <li><input type="text" name="perma_house_block"><label for="perma_house_block">House/Block</label></li>
                        <li><input type="text" name="perma_street"><label for="perma_street">Street</label></li>
                        <li><input type="text" name="perma_subdivision"><label for="perma_subdivision">Subdivision</label></li>
                        <li><input type="text" name="perma_barangay"><label for="perma_barangay">Barangay</label></li>
                        <li><input type="text" name="perma_city_muntinlupa"><label for="perma_city_muntinlupa">City/Municipality</label></li>
                        <li><input type="text" name="perma_province"><label for="perma_province">Province</label></li>
                        <li><input type="text" name="perma_zip_code"><label for="perma_zip_code">Zip Code</label></li>
                    </div>
                </form>
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

        function fill_Up(){
            const fields = document.getElementById("profile-contents");
            const fill_Up = document.getElementById("fill-up");

            console.log("button click")

            if(fill_Up.style.display == 'none'){
                fill_Up.style.display = 'flex';
                fields.style.display = 'none';
            }else{
                fields.style.display = 'flex';
                fill_Up.style.display = 'none';
            }
        }

        function gbtInfo(){
            const fields = document.getElementById("profile-contents");
            const fill_Up = document.getElementById("fill-up");

            console.log("button click")

            if(fill_Up.style.display == 'flex'){
                fill_Up.style.display = 'none';
                fields.style.display = 'flex';
            }else{
                fields.style.display = 'none';
                fill_Up.style.display = 'flex';
            }
        }

        function HeaderButton(){
            const header = document.getElementById("inactive-buttons");

            if(header.style.display == 'none'){
                header.style.display = 'flex';
            }else{
                header.style.display = 'none';
            }
        }
    </script>
</body>
</html>