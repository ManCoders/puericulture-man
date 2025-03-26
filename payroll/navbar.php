<script></script>
<link rel="stylesheet" href="./assets/css/style.css">

<div class="nav_main_bar">
    <nav class="nav" id="sidebar">
       
           <div class="nav-item"> <img src="./assets/images/logo-sm.png" alt="Logo"></div>

            <div class="nav-item">
                <a href="" class="nav-link">
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">
                    <span>Employee Management</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">
                    <span>PayRoll Process</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="" class="nav-link">
                    <span>Salary Reports</span>
                </a>
            </div>
            <div class="nav-item" style="background-color: #fa8282;">
                <a href="" class="nav-link">
                    <span>Setting</span>
                </a>
            </div>

        </div>
    </nav>
</div>

</div>


<script>

    $('.nav-<?php echo $_GET['page'] ?>').addClass('active');


    if ($('.nav-<?php echo $_GET['page'] ?>').parent().hasClass('collapse')) {
        const parentID = $('.nav-<?php echo $_GET['page'] ?>').parent().attr('id');
        $(`a[href="#${parentID}"]`)
            .removeClass('collapsed')
            .attr('aria-expanded', true);
        $('.nav-<?php echo $_GET['page'] ?>').parent().addClass('show');
    }

    // Toggle sidebar on small screens
    const sidebar = document.getElementById('sidebar');
    const sidebarToggleRight = document.getElementById('sidebarToggleRight');
    const sidebarToggleLeft = document.getElementById('sidebarToggleLeft');


    sidebarToggleRight.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        sidebarToggleRight.style.display = 'none';
        sidebarToggleLeft.style.display = 'block';
    });

    sidebarToggleLeft.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        sidebarToggleRight.style.display = 'block';
        sidebarToggleLeft.style.display = 'none';
    });
</script>