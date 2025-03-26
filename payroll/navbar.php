<script></script>
<link rel="stylesheet" href="./assets/css/style.css">

<div class="nav_main_bar">
    <nav class="nav" id="sidebar">
       
           <div class="nav-item"> <img style="width:100px; border-radius:50%;" src="./assets/images/puericulture_logo.jpg" alt="Logo"></div>

            <div class="nav-item">
                <a href="index.php?page=home" class="nav-home">
                    <span>Dashboard</span>
                </a>
            </div>
            
            <div class="nav-item">
                <a href="index.php?page=payroll" class="nav-payroll">
                    <span>Payroll Process</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="index.php?page=salary" class="nav-salary">
                    <span>Salary Reports</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="index.php?page=employee" class="nav-employee">
                    <span>Files 201</span>
                </a>
            </div>
            <div class="nav-item" style="">
                <a href="index.php?page=setting" class="nav-setting">
                    <span>Setting</span>
                </a>
            </div>

        </div>
    </nav>
</div>

</div>


<script>
$('.nav-<?php echo $_GET['page'] ?>').addClass('active');
$('.nav-<?php echo $_GET['page'] ?>').css('background-color', '#007bff');
$('.nav-<?php echo $_GET['page'] ?>').css('color', '#fff');

$('.nav-item a').click(function() {
    $('.nav-item a').removeClass('active');
    $(this).addClass('active');
    $(this).css('background-color', '#007bff');
    $(this).css('color', '#fff');
    $(this).siblings().css('background-color', '');
    $(this).siblings().css('color', '');
});

if ($('.nav-<?php echo $_GET['page'] ?>').parent().hasClass('collapse')) {
    const parentID = $('.nav-<?php echo $_GET['page'] ?>').parent().attr('id');
    $(`a[href="#${parentID}"]`)
        .removeClass('collapsed')
        .attr('aria-expanded', true);
    $('.nav-<?php echo $_GET['page'] ?>').parent().addClass('show');
}


</script>