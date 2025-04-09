<header>
    <title><?php echo $title ? $title : 'My Website'; ?></title>
</header>
<main>

<div class="container-fluid my-1 text-center">
        <h4><a class="navbar-brand" href="#"><?php echo $title ? $title : 'My Website'; ?></a></h>
            <div class="dropdown d-flex justify-content-end ">
                <a href="#" class="d-block text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="<?php $image ? $image : '../assets/images/user.png'; ?>" alt="mdo" width="32" height="32" class="rounded-circle mx-3">
                </a>
                <ul class="dropdown-menu bg-transparent border-0 text-end mx-2" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Profile Information</a></li>
                    <li><a class="dropdown-item" href="#">Acccount Setting</a></li>
                    
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>
                </ul>
            </div>
    </div>
</main>