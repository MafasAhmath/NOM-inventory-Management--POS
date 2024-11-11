<?php
include("forms/db.php");

//Update statment

//Delete statment

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>New Oil Mart</title>

    <!-- <meta http-equiv="refresh" content="10">  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">


</head>

<body id='indexbode' class="modal-open">
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar ">
            <!-- Content For Sidebar -->
            <div class="">
                <div class="sidebar-logo m-5 logoname">
                    <a id="logoname">NEW OIL MART</a>
                </div>
                <ul class="sidebar-nav">
                    <!-- <li class="sidebar-header">
                        Admin Elements
                    </li> -->
                    <li class="sidebar-item ">
                        <a class="sidebar-link " id="btnDashboard" data-url="./dashboard.php">
                            <!-- <i class="fa-solid fa-border-all "></i> -->
                            <!-- <i class="bi bi-grid-1x2 "></i> -->
                            <i class="bi bi-grid-1x2-fill pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link " id="btnPOS" data-url="./pos.php">
                            <i class="bi bi-receipt-cutoff pe-2"></i>
                            POS
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" id="btnSales" data-url="./sales.php">
                            <i class="bi bi-bag pe-2"></i>
                            Sales
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-boxes pe-2"></i>
                            Products
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item ms-4" id="btnAllProduct">
                                <a class="sidebar-link" data-url="./allProduct.php">All Product</a>
                            </li>
                            <li class="sidebar-item ms-4" id="btnStkIn">
                                <a class="sidebar-link" data-url="./stockin.php">Stock in</a>
                            </li>
                            <li class="sidebar-item ms-4" id="btnStkOut">
                                <a class="sidebar-link" data-url="./stockout.php">Stock out</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" id="btnCredit" data-url="./credit.php">
                            <i class="bi bi-credit-card-2-back pe-2"></i>
                            Credit
                        </a>

                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link " id="btnReport" data-url="./report.php">
                            <i class="bi bi-journal-text pe-2"></i>
                            Report
                        </a>
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link " id="btnOthers" data-url="./others.php">
                            <i class="bi bi-three-dots pe-2"></i>
                            Others
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main ">

            <header class="sticky-top">

                <nav class="navbar navbar-expand px-md-2 py-0 border-bottom ">

                    <button class="btn " id="sidebar-toggle" type="button">
                        <span class="navbar-toggler-icon "></span>
                    </button>

                    <!-- || Time Date || -->

                    <!-- <span class="b" id="week"></span> -->
                    <strong class="datetime" id="datetime">
                    </strong>


                    <div class="navbar-collapse navbar">
                        <ul class="navbar-nav ">
                            <li class="nav-link">
                                <i class="bi bi-bell-fill"></i>
                            </li>
                            <li class="nav-item dropdown">
                                <a data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item">Profile</a>
                                    <a class="dropdown-item">Setting</a>
                                    <a class="dropdown-item">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <main class="content  px-md-2 py-2 position-relative">
                <div id="messageBox" class="  text-center rounded py-2 px-5 z-3 position-absolute top-7 start-50 translate-middle-x" style="display: none;"></div>

                <div class="container-fluid scrollarea" id="content-section">


                    <!-- dashboard -->
                    <?php //include("dashboard.php") 
                    ?>

                    <!-- POS -->
                    <?php //include("pos.php") 
                    ?>

                    <!-- Sales -->
                    <?php //include("sales.php") 
                    ?>

                    <!-- All Product -->
                    <?php //include("allProduct.php") 
                    ?>

                    <!-- Stock in -->
                    <?php //include("stockin.php") 
                    ?>

                    <!-- Stock out -->
                    <?php //include("stockout.php") 
                    ?>

                    <!-- credit -->
                    <?php //include("credit.php") 
                    ?>

                    <!-- report -->
                    <?php //include("report.php") 
                    ?>

                    <!-- report -->
                    <?php //include("others.php") 
                    ?>


                    <!-- Form Modals -->

                </div>

            </main>

            <!-- <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a> -->
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>New Oil Mart</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- <script src="js/ajax.js"></script> -->
    <script src="js/index.js"></script>
    <script src="js/pageload.js"></script>
    <script src="js/ajax.js"></script>


</body>

</html>