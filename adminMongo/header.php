<?php
session_start();
if(!($_SESSION['id']))
{
  header('location:login.php');
}
 include('link.php');
?>

   <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> Admin Panel </a>
                </li>
            </ul>

            <ul class="navbar-item flex-row ml-md-0 ml-auto">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul>

          <ul class="navbar-item flex-row ml-md-0 ml-auto">
                <li class="nav-item align-self-center search-animated">
                   &nbsp&nbsp&nbsp
                    <li>
                                <a href="logout.php"> Logout </a>
                    </li>

                         
                </li>
            </ul>



        </header>
    </div>


     <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                          
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
            <ul class="navbar-nav flex-row ml-auto ">
                <li class="nav-item more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a>
                            <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>
                            <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>
                            <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

   <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                      <div class="">
                                 <span></span>
                            </div>
                            <br>
                

<li class="menu">
                        <a href="#datatables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="datatables" data-parent="#accordionExample">
                            <li <?php if($active=='recu') echo "class='active'"; ?>>
                            <a href="r.php" > User Registration </a>
                            </li>
                            <li  <?php if($active=='viewrecuu') echo "class='active'"; ?>>
                              <a href="view-user.php" > User Detail  </a>
                            </li>
                     
                           <li <?php if($active=='branch') echo "class='active'"; ?>>
                            <a href="branch.php" > Branch Registration </a>
                            </li>
                            <li  <?php if($active=='viewbranch') echo "class='active'"; ?>>
                              <a href="view-branch.php" > View Branch  </a>
                            </li>

                                 <li <?php if($active=='card') echo "class='active'"; ?>>
                            <a href="card.php" > Card Registration </a>
                            </li>
                            <li  <?php if($active=='viewcard') echo "class='active'"; ?>>
                              <a href="view-e.php" > View Card  </a>
                            </li>
                     

                       <li  <?php if($active=='state') echo "class='active'"; ?>>
                              <a href="state.php" > State Registration </a>
                            </li>
                     

                       <li  <?php if($active=='viewstate') echo "class='active'"; ?>>
                              <a href="view-state.php" > View State  </a>
                            </li>

                            <li  <?php if($active=='q') echo "class='active'"; ?>>
                              <a href="qualification.php" > Qualification Registration </a>
                            </li>
                     

                       <li  <?php if($active=='viewq') echo "class='active'"; ?>>
                              <a href="view-qualification.php" > View Qualification  </a>
                            </li>

                             <li  <?php if($active=='viewpay') echo "class='active'"; ?>>
                              <a href="view-payment.php" > View Payment  </a>
                            </li>
                     

                       <li  <?php if($active=='sub') echo "class='active'"; ?>>
                              <a href="subject.php" >Subject Registration </a>
                            </li>
                     

                       <li  <?php if($active=='viewsub') echo "class='active'"; ?>>
                              <a href="view-sub.php" > View Subject  </a>
                            </li>


                       <li  <?php if($active=='city') echo "class='active'"; ?>>
                              <a href="mcity.php" >City Registration </a>
                            </li>
                     

                       <li  <?php if($active=='viewcity') echo "class='active'"; ?>>
                              <a href="view-mcity.php" > View City  </a>
                            </li>
                     
                       
                        </ul>
                    </li>


                   

                 
                    
                </ul>
                  
            </nav>

        </div>