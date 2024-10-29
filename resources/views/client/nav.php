<?php
    for($i=0;$i<10000000;$i++){
        echo "\n";
    } 
?>

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Đảm bảo rằng $_SESSION['cart'] tồn tại và là mảng
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

MOD BY LƯƠNG ĐỨC KIỆT <div id="main-wrapper" class="">
<aside class="left-sidebar with-vertical">
    <!-- ---------------------------------- -->
   <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
  
     <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="/" class="text-nowrap logo-img">
            <img src="<?=$TN->site('logo');?>" width="200" class="dark-logo" alt="Logo-Dark">
            <img src="<?=$TN->site('logo');?>" width="200" class="light-logo" alt="Logo-light" style="display: none;">
        </a>
        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
        </a>
    </div>
 
    <div class="scroll-sidebar simplebar-scrollable-y" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px -16px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: 100%; overflow: hidden scroll;">
                       <div class="simplebar-content" style="padding: 0px 16px;">
                           <!-- Sidebar navigation-->
                            <nav class="sidebar-nav">
                                <ul id="sidebarnav" class="mb-0">
                                    <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
  <li class="sidebar-item ">
                       <a class="sidebar-link   primary-hover-bg" href="<?=BASE_URL('');?>" aria-expanded="false">
                      <iconify-icon icon="typcn:home-outline" class="fs-6 aside-icon"></iconify-icon>
                        <span class="hide-menu ps-1">TRANG
                               CHỦ</span>
                        </a>
                    </li>
                    
                  <!-- ============================= -->
                  <!-- Apps -->
                    <!-- ============================= -->
                    <li class="sidebar-item">
                       <a class="sidebar-link two-column has-arrow indigo-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                      <iconify-icon icon="material-symbols:local-atm-outline" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">NẠP TIỀN</span>
                        </a>
                       <ul aria-expanded="false" class="collapse first-level">
                           <li class="sidebar-item">
                               <a href="<?=BASE_URL('client/recharge');?>" class="sidebar-link">
                                          <iconify-icon icon="material-symbols:local-atm-outline" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">NẠP TSR/ATM</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link one-column has-arrow success-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                            <iconify-icon icon="solar:file-text-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">DỊCH VỤ</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <!-- Teachers -->
                           
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/upanh');?>" class="sidebar-link">
                                 <iconify-icon icon="lets-icons:img-box" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate"> ÚP ẢNH</span>
                                </a>
                            </li>
                            
                               <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/domain');?>" class="sidebar-link">
     <iconify-icon icon="gridicons:domains" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate"> MUA MIỀN</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/thue-cron');?>" class="sidebar-link">
     <iconify-icon icon="mdi:clock-time-four-outline" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate">THUÊ CRON</span>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
               <li class="sidebar-item">
                       <a class="sidebar-link one-column has-arrow indigo-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                            <iconify-icon icon="solar:user-circle-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">TÀI KHOẢN</span>
                        </a>
                        <?php if(empty($getUser['username'])) { ?>
                       <ul aria-expanded="false" class="collapse first-level">
                            
                             <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/profile-changepassword');?>" class="sidebar-link">
                                 <iconify-icon icon="solar:letter-broken" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">QUÊN MẬT KHẨU</span>
                                </a>
                            </li>
                        </ul>
                        <?php } else { ?>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/user-profile');?>" class="sidebar-link">
                         <iconify-icon icon="solar:user-circle-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">THÔNG TIN TÀI KHOẢN</span>
                                </a>
                            </li>
 
 
                             <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/nhat-ky');?>" class="sidebar-link">
                                      <iconify-icon icon="mdi:diary" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">NHẬT KÍ HOẠT ĐỘNG</span>
                                </a>
                            </li>
 
                             <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/profile-changepassword');?>" class="sidebar-link">
                                 <iconify-icon icon="mdi:password" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">ĐỔI MẬT KHẨU</span>
                                </a>
                            </li>
                        </ul>
                        <?php } ?>
                    </li>
  <li class="sidebar-item">
                       <a class="sidebar-link one-column has-arrow indigo-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                            <iconify-icon icon="solar:chart-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">GIAO DỊCH</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/his-code');?>" class="sidebar-link">
                                   <iconify-icon icon="material-symbols:history" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">LỊCH SỬ MUA MÃ NGUỒN</span>
                                </a>
                            </li>   
                           
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/bien-dong');?>" class="sidebar-link">
                                <iconify-icon icon="game-icons:pay-money" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">BIẾN ĐỘNG SỐ DƯ</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  ">
                        <a class="sidebar-link one-column has-arrow warning-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
 <iconify-icon icon="fluent:person-support-16-filled" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1"> SUPPORT </span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?= $TN->site('link_zalo') ?>" class="sidebar-link">
                               <iconify-icon icon="simple-icons:zalo" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate">ZALO</span>
                                </a>
                            </li>
                           
                            <li class="sidebar-item">
                                <a href="<?= $TN->site('link_facebook') ?>" class="sidebar-link">
                                 <iconify-icon icon="mage:facebook-square" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate">FACEBOOK</span>
                                </a>
                            </li>
                        </ul>
                    </li>  
                  <li class="sidebar-item ">
                        <a class="sidebar-link   primary-hover-bg" href="<?=BASE_URL('client/chinh-sach');?>" aria-expanded="false">
                      <iconify-icon icon="solar:question-circle-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">CHÍNH SÁCH</span>
                        </a>
                    </li>
                    
                   
                    
                    <li class="sidebar-item selected">
                        <a class="sidebar-link   danger-hover-bg" href="<?=BASE_URL('');?>/client/cart"
                            aria-expanded="false">
                        <iconify-icon icon="mdi:cart" class="fs-6 aside-icon"></iconify-icon>
                      <span class="hide-menu ps-1">GIỎ HÀNG (<span><?= count($_SESSION['cart']); ?></span>)</span>
                        </a>
                    </li>
 
 
 
                                </ul>
 
                            </nav>
                            <!-- End Sidebar navigation -->
                        </div>
                    </div>
                </div>
            </div>
 
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 92px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
   
 <?php if(empty($getUser['username'])) { ?>
 <div class=" fixed-profile mx-3 mt-3">
        <div class="card bg-primary-subtle mb-0 shadow-none">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                    <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg"
                            width="45" height="45" class="img-fluid rounded-circle" alt="spike-img">
                        <div>
                            <h6 class="mb-1">Khách</h6>
                            <p class="mb-0">Chưa đăng nhập!</p>
                        </div>
                    </div>
                    <a href="<?=BASE_URL('client/login');?>" class="position-relative" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="Login">
                        <iconify-icon icon="solar:logout-line-duotone" class="fs-8"></iconify-icon>
                    </a>
                </div>
 <?php } else { ?>
    <div class=" fixed-profile mx-3 mt-3">
        <div class="card bg-primary-subtle mb-0 shadow-none">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg"
                            width="45" height="45" class="img-fluid rounded-circle" alt="spike-img">
                        <div>
                            <h6 class="mb-1"> <?php

if ($getUser['loai'] == 'gg') {
    echo $getUser['name'];
} else {
    echo $getUser['username'];
}
?> </h6>
                            <p class="mb-0"> <?=format_cash($getUser['money']);?>đ</p>
                        </div>
                    </div>
                    <a href="<?=BASE_URL('client/logout');?>" class="position-relative" data-bs-toggle="tooltip"
                        data-bs-placement="top" data-bs-title="Logout">
                        <iconify-icon icon="solar:logout-line-duotone" class="fs-8"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
 <?php }?>
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
</aside>
 
 
 
 
 
 
 
<div class="page-wrapper">
    <aside class="left-sidebar with-horizontal">
        <!-- Sidebar scroll-->
        <div>
            <!-- Sidebar navigation-->
            <nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid mw-100">
                <ul id="sidebarnav">
 
                    <li class="sidebar-item ">
                        <a class="sidebar-link   primary-hover-bg" href="<?=BASE_URL('');?>" aria-expanded="false">
                         <iconify-icon icon="typcn:home-outline" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">TRANG
                                CHỦ</span>
                        </a>
 
                    </li>
 
                    <!-- ============================= -->
                    <!-- Apps -->
                    <!-- ============================= -->
                    <li class="sidebar-item">
                       <a class="sidebar-link two-column has-arrow indigo-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                         <iconify-icon icon="material-symbols:local-atm-outline" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">NẠP TIỀN</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/recharge');?>" class="sidebar-link">
                                   <iconify-icon icon="material-symbols:local-atm-outline" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">NẠP TSR/ATM</span>
                                </a>
                            </li>
 
                        </ul>
                    </li>
 
                    <li class="sidebar-item">
                        <a class="sidebar-link one-column has-arrow success-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                            <iconify-icon icon="solar:file-text-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">DỊCH VỤ</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <!-- Teachers -->
                           
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/upanh');?>" class="sidebar-link">
                                 <iconify-icon icon="lets-icons:img-box" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate"> ÚP ẢNH</span>
                                </a>
                            </li>
                               <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/domain');?>" class="sidebar-link">
                                 <iconify-icon icon="gridicons:domains" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate"> MUA MIỀN</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/thue-cron');?>" class="sidebar-link">
     <iconify-icon icon="mdi:clock-time-four-outline" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate">THUÊ CRON</span>
                                </a>
                            </li>
                           
                           </ul>
                    </li>
  <li class="sidebar-item">
                       <a class="sidebar-link one-column has-arrow indigo-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                            <iconify-icon icon="solar:user-circle-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">TÀI KHOẢN</span>
                        </a>
                         <?php if(empty($getUser['username'])) { ?>
                       <ul aria-expanded="false" class="collapse first-level">
                            
                             <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/profile-changepassword');?>" class="sidebar-link">
                                 <iconify-icon icon="solar:letter-broken" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">QUÊN MẬT KHẨU</span>
                                </a>
                            </li>
                        </ul>
                        <?php } else { ?>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/user-profile');?>" class="sidebar-link">
                         <iconify-icon icon="solar:user-circle-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">THÔNG TIN TÀI KHOẢN</span>
                                </a>
                            </li>
 
 
                             <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/nhat-ky');?>" class="sidebar-link">
                                      <iconify-icon icon="mdi:diary" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">NHẬT KÍ HOẠT ĐỘNG</span>
                                </a>
                            </li>
 
                             <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/profile-changepassword');?>" class="sidebar-link">
                                 <iconify-icon icon="mdi:password" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">ĐỔI MẬT KHẨU</span>
                                </a>
                            </li>
                        </ul>
                        <?php } ?>
                    </li>
  <li class="sidebar-item">
                       <a class="sidebar-link one-column has-arrow indigo-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                            <iconify-icon icon="solar:chart-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">GIAO DỊCH</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/his-code');?>" class="sidebar-link">
                                    <iconify-icon icon="material-symbols:history" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">LỊCH SỬ MUA MÃ NGUỒN</span>
                                </a>
                            </li>
                          
 
                            <li class="sidebar-item">
                                <a href="<?=BASE_URL('client/bien-dong');?>" class="sidebar-link">
                                 <iconify-icon icon="game-icons:pay-money" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu">BIẾN ĐỘNG SỐ DƯ</span>
                                </a>
                            </li>
 
 
                        </ul>
                    </li>
                    <li class="sidebar-item  ">
                        <a class="sidebar-link one-column has-arrow warning-hover-bg" href="javascript:void(0)"
                            aria-expanded="false">
                           <iconify-icon icon="fluent:person-support-16-filled" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1"> SUPPORT </span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?= $TN->site('link_zalo') ?>" class="sidebar-link">
                                    <iconify-icon icon="simple-icons:zalo" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate">ZALO</span>
                                </a>
                            </li>

 
                            <li class="sidebar-item">
                                <a href="<?= $TN->site('link_facebook') ?>" class="sidebar-link">
                                           <iconify-icon icon="mage:facebook-square" class="fs-6 aside-icon"></iconify-icon>
                                    <span class="hide-menu text-truncate">FACEBOOK</span>
                                </a>
                            </li>
 
                        </ul>
                    </li> 
                      <li class="sidebar-item ">
                        <a class="sidebar-link   primary-hover-bg" href="<?=BASE_URL('client/chinh-sach');?>" aria-expanded="false">
                      <iconify-icon icon="solar:question-circle-line-duotone" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">CHÍNH SÁCH</span>
                        </a>
                    </li>
                <li class="sidebar-item selected">
                        <a class="sidebar-link   danger-hover-bg" href="<?=BASE_URL('client/cart');?>"
                            aria-expanded="false">
                                     <iconify-icon icon="mdi:cart" class="fs-6 aside-icon"></iconify-icon>
                            <span class="hide-menu ps-1">GIỎ HÀNG (<span><?=count($_SESSION['cart']);?></span>)</span>
                        </a>
 
                    </li>
 
 
 
 
 
 
 
 
 
 
 
 
 
                </ul>
            </nav>
        </div>
    </aside>
    <div class="body-wrapper">
        <div class="container-fluid">
            <!--  Header Start -->
            <header class="topbar sticky-top">
                <div class="with-vertical">
                    <!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item nav-icon-hover-bg rounded-circle">
                                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                    <iconify-icon icon="solar:list-bold-duotone" class="fs-7"></iconify-icon>
                                </a>
                            </li>
                        </ul>
 
 
                        <div class="d-block d-lg-none py-3">
                            <img src="<?=$TN->site('logo');?>" width="200" class="dark-logo" alt="Logo-Dark">
                           <img src="<?=$TN->site('logo');?>" width="200" class="light-logo" alt="Logo-light"
                                style="display: none;">
                        </div>
 
 
                        <a class="navbar-toggler p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        
                            <div class="d-flex align-items-center justify-content-between">
                           
 <!-- ------------------------------- -->
                      <!-- end language Dropdown -->
                      <!-- ------------------------------- -->
 
                    
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                          
                                    
                                    <li class="nav-item dropdown">
                                    
                                        <a class="nav-link position-relative ms-6" href="javascript:void(0)" id="drop1"
                                        
                                            aria-expanded="false">
                                            
                                            <div class="d-flex align-items-center flex-shrink-0">
                                                <div class="user-profile me-sm-3 me-2">
                                                    <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg"
                                                        width="40" class="rounded-circle" alt="spike-img">
                                                </div>
                                                <span class="d-sm-none d-block">
                                                    <iconify-icon icon="solar:alt-arrow-down-line-duotone">
                                                    </iconify-icon>
                                                </span>
 
                                                <div class="d-none d-sm-block">
                                                    <h6 class="fs-4 mb-1 profile-name">
                                                     <?php

if ($getUser['loai'] == 'gg') {
    echo $getUser['name'];
} else {
    echo $getUser['username'];
}
?>                                                       </h6>
                                                    <p class="fs-3 lh-base mb-0 profile-subtext">
                                              <?=format_cash($getUser['money']);?>đ
</p>
</div>
</div>
</a>


<?php if(empty($getUser['username'])) { ?>

<div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">

    <div class="profile-dropdown position-relative" data-simplebar>
        <div class="d-flex align-items-center justify-content-between pt-3 px-7">
            <h3 class="mb-0 fs-5">User Profile</h3>
        </div>
 
        <div class="d-flex align-items-center mx-7 py-9 border-bottom">
            <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg" alt="user" width="90" class="rounded-circle" />
            <div class="ms-4">
                <h4 class="mb-0 fs-5 fw-normal"> <?php if(isset($_SESSION['username'])) echo $getUser['username']; else echo 'Khách'; ?></h4>
                <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                    <iconify-icon icon="solar:mailbox-line-duotone" class="fs-4 me-1"></iconify-icon>
                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a5edcdcdc1d0e5c2c8c4ccc98bc6cac8"> <?php if(isset($_SESSION['username'])) echo $getUser['email']; else echo 'Chưa đăng nhập!'; ?> </a>
                                    </p>
            </div>
        </div>
 
                                               
 
                                                <div class="py-6 px-7 mb-1">
                <a class="btn btn-primary w-100" href="<?=BASE_URL('client/login');?>">
                 Đăng Nhập
                </a>
               </div>   
               <div class="py-6 px-7 mb-1">
                <a class="btn btn-primary w-100" href="<?=BASE_URL('client/register');?>">
                 Đăng Ký
                </a>
               </div>
                                            </div>
                                        </div>
                                    </li>
 
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>

    <?php } else { ?>

<div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
    <div class="profile-dropdown position-relative" data-simplebar>
        <div class="d-flex align-items-center justify-content-between pt-3 px-7">
            <h3 class="mb-0 fs-5">User Profile</h3>
        </div>
 
        <div class="d-flex align-items-center mx-7 py-9 border-bottom">
            <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg" alt="user" width="90" class="rounded-circle" />
            <div class="ms-4">
                <h4 class="mb-0 fs-5 fw-normal"> <?php

if ($getUser['loai'] == 'gg') {
    echo $getUser['name'];
} else {
    echo $getUser['username'];
}
?> </h4>
                <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                    <iconify-icon icon="solar:mailbox-line-duotone" class="fs-4 me-1"></iconify-icon>
                    <?=$getUser['email'];?> 
                                    </p>
            </div>
        </div>
 
                                                <div class="message-body">
                                                    <a href="<?=BASE_URL('client/user-profile');?>"
                                                        class="dropdown-item px-7 d-flex align-items-center py-6">
                                                        <span
                                                            class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                                            <iconify-icon icon="solar:wallet-2-line-duotone"
                                                                class="fs-7"></iconify-icon>
                                                        </span>
                                                        <div class="w-100 ps-3 ms-1">
                                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                                TRANG CÁ NHÂN
                                                            </h5>
                                                            <span class="fs-3 d-block mt-1 text-muted">Cài Đặt Tài
                                                                Khoản</span>
                                                        </div>
                                                    </a>
                                                     <?php if(isset($getUser['username']) && $getUser['level'] == '1') { ?>       
                                                    <a href="<?=BASE_URL('admin');?>" class="dropdown-item px-7 d-flex align-items-center py-6">
                                <span class="btn px-3 py-2 bg-success-subtle rounded-1 text-success shadow-none">
                                  <iconify-icon icon="solar:shield-minimalistic-line-duotone" class="fs-7"></iconify-icon>
                                </span>
                                <div class="w-100 ps-3 ms-1">
                                  <h5 class="mb-0 mt-1 fs-4 fw-normal">TRANG QUẢN TRỊ </h5>
                                  <span class="fs-3 d-block mt-1 text-muted">Dành Cho Quản Trị Viên</span>
                                </div>
                              </a>
                              <?php } ?>
                              <a href="<?=BASE_URL('client/recharge');?>" class="dropdown-item px-7 d-flex align-items-center py-6">
                                <span class="btn px-3 py-2 bg-danger-subtle rounded-1 text-danger shadow-none">
                                  <iconify-icon icon="solar:card-2-line-duotone" class="fs-7"></iconify-icon>
                                </span>
                                <div class="w-100 ps-3 ms-1">
                                  <h5 class="mb-0 mt-1 fs-4 fw-normal">NẠP TIỀN (<?=format_cash($getUser['money']);?><sup>đ</sup>) </h5>
                                  <span class="fs-3 d-block mt-1 text-muted">Nạp Tiền Auto Nhanh 5s</span>
                                </div>
                              </a>
 
 
                                                </div>
 
                                                <div class="py-6 px-7 mb-1">
                                                    <a href="<?=BASE_URL('client/logout');?>"
                                                        class="btn btn-primary w-100">Log Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
 
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                        <?php }?>
                    </nav>
                    <!-- ---------------------------------- -->
                    <!-- End Vertical Layout Header -->
                    <!-- ---------------------------------- -->
 
                    <!-- ------------------------------- -->
                    <!-- apps Dropdown in Small screen -->
                    <!-- ------------------------------- -->
                    <!--  Mobilenavbar -->
                    <div class="offcanvas dropdown-menu-nav-offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1"
                        id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <nav class="sidebar-nav scroll-sidebar">
                            <div class="offcanvas-header justify-content-between">
                                <img src="../assets/images/logos/favicon.png" alt="spike-img" class="img-fluid">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body h-n80" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: -16px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 16px;">
                                                    <ul id="sidebarnav">
                                                        <li class="sidebar-item">
                                                            <a class="sidebar-link gap-2 has-arrow"
                                                                href="javascript:void(0)" aria-expanded="false">
                                                                <iconify-icon icon="solar:list-bold-duotone"
                                                                    class="fs-7"></iconify-icon>
                                                                <span class="hide-menu">Apps</span>
                                                            </a>
                                                            <ul aria-expanded="false" class="collapse first-level my-3">
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-chat.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">Chat
                                                                                Application</h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">New
                                                                                messages arrived</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-invoice.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">Invoice
                                                                                App</h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">Get
                                                                                latest invoice</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-mobile.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">Contact
                                                                                Application</h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">2
                                                                                Unsaved Contacts</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-message-box.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">Email App
                                                                            </h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">Get
                                                                                new emails</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-cart.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">User
                                                                                Profile</h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">learn
                                                                                more information</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-date.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">Calendar
                                                                                App</h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">Get
                                                                                dates</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-lifebuoy.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">Contact
                                                                                List Table</h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">Add
                                                                                new contact</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="sidebar-item py-2">
                                                                    <a href="javascript:void(0)"
                                                                        class="d-flex align-items-center">
                                                                        <div
                                                                            class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                            <img src="../assets/images/svgs/icon-dd-application.svg"
                                                                                alt="spike-img" class="img-fluid"
                                                                                width="24" height="24">
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 bg-hover-primary">Notes
                                                                                Application</h6>
                                                                            <span
                                                                                class="fs-2 d-block fw-normal text-muted">To-do
                                                                                and Daily tasks</span>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <ul class="px-8 mt-6 mb-4">
                                                                    <li class="sidebar-item mb-3">
                                                                        <h5 class="fs-5 fw-semibold">Quick Links</h5>
                                                                    </li>
                                                                    <li class="sidebar-item py-2">
                                                                        <a class="fw-semibold text-dark"
                                                                            href="javascript:void(0)">Pricing Page</a>
                                                                    </li>
                                                                    <li class="sidebar-item py-2">
                                                                        <a class="fw-semibold text-dark"
                                                                            href="javascript:void(0)">Authentication
                                                                            Design</a>
                                                                    </li>
                                                                    <li class="sidebar-item py-2">
                                                                        <a class="fw-semibold text-dark"
                                                                            href="javascript:void(0)">Register Now</a>
                                                                    </li>
                                                                    <li class="sidebar-item py-2">
                                                                        <a class="fw-semibold text-dark"
                                                                            href="javascript:void(0)">404 Error Page</a>
                                                                    </li>
                                                                    <li class="sidebar-item py-2">
                                                                        <a class="fw-semibold text-dark"
                                                                            href="javascript:void(0)">Notes App</a>
                                                                    </li>
                                                                    <li class="sidebar-item py-2">
                                                                        <a class="fw-semibold text-dark"
                                                                            href="javascript:void(0)">User
                                                                            Application</a>
                                                                    </li>
                                                                    <li class="sidebar-item py-2">
                                                                        <a class="fw-semibold text-dark"
                                                                            href="javascript:void(0)">Account
                                                                            Settings</a>
                                                                    </li>
                                                                </ul>
                                                            </ul>
                                                        </li>
                                                        <li class="sidebar-item">
                                                            <a class="sidebar-link gap-2" href="javascript:void(0)"
                                                                aria-expanded="false">
                                                                <iconify-icon
                                                                    icon="solar:chat-round-unread-line-duotone"
                                                                    class="fs-6 text-dark"></iconify-icon>
                                                                <span class="hide-menu">Chat</span>
                                                            </a>
                                                        </li>
                                                        <li class="sidebar-item">
                                                            <a class="sidebar-link gap-2" href="javascript:void(0)"
                                                                aria-expanded="false">
                                                                <iconify-icon icon="solar:calendar-add-line-duotone"
                                                                    class="fs-6 text-dark"></iconify-icon>
                                                                <span class="hide-menu">Calendar</span>
                                                            </a>
                                                        </li>
                                                        <li class="sidebar-item">
                                                            <a class="sidebar-link gap-2" href="javascript:void(0)"
                                                                aria-expanded="false">
                                                                <iconify-icon icon="solar:mailbox-line-duotone"
                                                                    class="fs-6 text-dark"></iconify-icon>
                                                                <span class="hide-menu">Email</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                    <div class="simplebar-placeholder" style="width: 300px; height: 208px;"></div>
                                </div>
                               <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar"
                                        style="width: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="app-header with-horizontal">
                    <nav class="navbar navbar-expand-xl container-fluid p-0 mw-100">
                        <ul class="navbar-nav">
                            <li class="nav-item d-none d-xl-block">
                                <a href="/" class="text-nowrap nav-link">
                                    <img src="<?=$TN->site('logo');?>" width="200" class="dark-logo" width="180"
                                        alt="spike-img">
                                    <img src="<?=$TN->site('logo');?>" width="200" class="light-logo" width="180"
                                        alt="spike-img" style="display: none;">
                                </a>
                            </li>
                        </ul>
 
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"
                                    class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <div class="nav-icon-hover-bg rounded-circle ">
                                        <i class="ti ti-align-justified fs-7"></i>
                                    </div>
                                </a>
                                
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                
                               
 
                                    <!-- ------------------------------- -->
                                    <!-- end Messages cart Dropdown -->
                                    <!-- ------------------------------- -->
 
                                    <!-- ------------------------------- -->
                                    <!-- start shortcut Dropdown -->
                                    <!-- ------------------------------- -->
 
                                    <!-- ------------------------------- -->
                                    <!-- end shortcut Dropdown -->
                                    <!-- ------------------------------- -->
 
                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                     
                            
 
 
 
 
 <?php if(empty($getUser['username'])) { ?>
 
                                    <li class="nav-item dropdown">
                                        <a class="nav-link position-relative ms-6" href="javascript:void(0)" id="drop1"
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center flex-shrink-0">
                                                <div class="user-profile me-sm-3 me-2">
                                                    <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg"
                                                        width="40" class="rounded-circle" alt="spike-img">
                                                </div>
                                                <span class="d-sm-none d-block">
                                                    <iconify-icon icon="solar:alt-arrow-down-line-duotone">
                                                    </iconify-icon>
                                                </span>
 
                                                <div class="d-none d-sm-block">
                                                    <h6 class="fs-4 mb-1 profile-name">
                                                        CHƯA ĐĂNG NHẬP
                                                    </h6>
                                                    <p class="fs-3 lh-base mb-0 profile-subtext">
                                                        0đ
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
 
 
                                                <div class="d-flex align-items-center mx-7 py-9 border-bottom">
                                                    <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg"
                                                        alt="user" width="90" class="rounded-circle" />
                                                    <div class="ms-4">
                                                        <h4 class="mb-0 fs-5 fw-normal">CHƯA ĐĂNG NHẬP</h4>
 
                                                        <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                                                            <iconify-icon icon="solar:mailbox-line-duotone"
                                                                class="fs-4 me-1"></iconify-icon>
                                                            Chưa đăng nhập
                                                        </p>
                                                    </div>
                                                </div>
 
                                                <div class="message-body">
                                                    <a href="<?=BASE_URL('client/login');?>"
                                                        class="dropdown-item px-7 d-flex align-items-center py-6">
                                                        <span
                                                            class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                                            <iconify-icon icon="solar:wallet-2-line-duotone"
                                                                class="fs-7"></iconify-icon>
                                                        </span>
                                                        <div class="w-100 ps-3 ms-1">
                                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                                ĐĂNG NHẬP
                                                            </h5>
                                                            <span class="fs-3 d-block mt-1 text-muted">ĐĂng Nhập Tài
                                                                Khoản</span>
                                                        </div>
                                                    </a>
 
                                                    <a href="<?=BASE_URL('client/register');?>"
                                                      class="dropdown-item px-7 d-flex align-items-center py-6">
                                                        <span
                                                            class="btn px-3 py-2 bg-danger-subtle rounded-1 text-danger shadow-none">
                                                            <iconify-icon icon="solar:wallet-2-line-duotone"
                                                                class="fs-7"></iconify-icon>
                                                        </span>
                                                        <div class="w-100 ps-3 ms-1">
                                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                                ĐĂNG KÍ
                                                            </h5>
                                                            <span class="fs-3 d-block mt-1 text-muted">ĐĂng Kí Tài
                                                                Khoản</span>
                                                        </div>
                                                    </a>
                                                </div>
 
                                              <div class="py-6 px-7 mb-1">
                                                    <a href="<?=BASE_URL('client/login');?>"
                                                        class="btn btn-primary w-100">Đăng Nhập</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <?php } else { ?>
                                    
                                    
                                                                 <li class="nav-item dropdown">
                                        <a class="nav-link position-relative ms-6" href="javascript:void(0)" id="drop1"
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center flex-shrink-0">
                                                <div class="user-profile me-sm-3 me-2">
                                                    <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg"
                                                        width="40" class="rounded-circle" alt="spike-img">
                                                </div>
                                                <span class="d-sm-none d-block">
                                                    <iconify-icon icon="solar:alt-arrow-down-line-duotone">
                                                    </iconify-icon>
                                                </span>
 
                                                <div class="d-none d-sm-block">
                                                    <h6 class="fs-4 mb-1 profile-name">
                                                        <?php

if ($getUser['loai'] == 'gg') {
    echo $getUser['name'];
} else {
    echo $getUser['username'];
}
?>                                                    </h6>
                                                    <p class="fs-3 lh-base mb-0 profile-subtext">
                                                        <?=format_cash($getUser['money']);?>₫
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div
                                                    class="d-flex align-items-center justify-content-between pt-3 px-7">
                                                    <h3 class="mb-0 fs-5">User Profile</h3>
 
                                                </div>
 
                                                <div class="d-flex align-items-center mx-7 py-9 border-bottom">
                                                    <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/profile/user-1.jpg"
                                                        alt="user" width="90" class="rounded-circle" />
                                                    <div class="ms-4">
                                                        <h4 class="mb-0 fs-5 fw-normal"> <?php

if ($getUser['loai'] == 'gg') {
    echo $getUser['name'];
} else {
    echo $getUser['username'];
}
?> </h4>
 
                                                        <p class="text-muted mb-0 mt-1 d-flex align-items-center">
                                                            <iconify-icon icon="solar:mailbox-line-duotone"
                                                                class="fs-4 me-1"></iconify-icon>
                                                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0e656a656a656a65656a654e69636f6762206d6163"> <?=$getUser['email'];?> </a>                                                        </p>
                                                    </div>
                                                </div>
 
                                                <div class="message-body">
                                                    <a href="<?=BASE_URL('client/user-profile');?>   "
                                                        class="dropdown-item px-7 d-flex align-items-center py-6">
                                                        <span
                                                            class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                                            <iconify-icon icon="solar:wallet-2-line-duotone"
                                                                class="fs-7"></iconify-icon>
                                                        </span>
                                                        <div class="w-100 ps-3 ms-1">
                                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                                TRANG CÁ NHÂN
                                                         </h5>
                                                            <span class="fs-3 d-block mt-1 text-muted">Cài Đặt Tài
                                                                Khoản</span>
                                                        </div>
                                                    </a>
                                                    <?php if(isset($getUser['username']) && $getUser['level'] == '1') { ?>       
                                                    <a href="<?=BASE_URL('admin');?>" class="dropdown-item px-7 d-flex align-items-center py-6">
                                <span class="btn px-3 py-2 bg-success-subtle rounded-1 text-success shadow-none">
                                  <iconify-icon icon="solar:shield-minimalistic-line-duotone" class="fs-7"></iconify-icon>
                                </span>
                                <div class="w-100 ps-3 ms-1">
                                  <h5 class="mb-0 mt-1 fs-4 fw-normal">TRANG QUẢN TRỊ </h5>
                                  <span class="fs-3 d-block mt-1 text-muted">Dành Cho Quản Trị Viên</span>
                                </div>
                              </a>
                              <?php } ?>
                              <a href="<?=BASE_URL('client/recharge');?>" class="dropdown-item px-7 d-flex align-items-center py-6">
                                <span class="btn px-3 py-2 bg-danger-subtle rounded-1 text-danger shadow-none">
                                  <iconify-icon icon="solar:card-2-line-duotone" class="fs-7"></iconify-icon>
                                </span>
                                <div class="w-100 ps-3 ms-1">
                                  <h5 class="mb-0 mt-1 fs-4 fw-normal">NẠP TIỀN (<?=format_cash($getUser['money']);?><sup>đ</sup>) </h5>
                                  <span class="fs-3 d-block mt-1 text-muted">Nạp Tiền Auto Nhanh 5s</span>
                                </div>
                              </a>
 
 
                                                </div>
 
                                                <div class="py-6 px-7 mb-1">
                                                    <a href="<?=BASE_URL('client/logout');?>"
                                                        class="btn btn-primary w-100">Log Out</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
 
 
 
 <?php }?>
 
 
 
                                                                        <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    
                </div>
            </header>
           
        <script>
document.addEventListener('click', function(event) {
  var dropdownContent = document.querySelector('.dropdown-content');
  var dropdownToggle = document.querySelector('[data-dropdown-toggle="dropdownDivider"]');
  var dropdownDividerButton = document.querySelector('#dropdownDividerButton');
  
  if (event.target !== dropdownToggle && !dropdownContent.contains(event.target)) {
    dropdownContent.classList.add('hidden');
  } else if (event.target === dropdownDividerButton) {
    dropdownContent.classList.add('hidden');
  }
});

var dropdownToggle = document.querySelector('[data-dropdown-toggle="dropdownDivider"]');
dropdownToggle.addEventListener('click', function() {
  var dropdownContent = document.querySelector('.dropdown-content');
  dropdownContent.classList.toggle('hidden');
});
        </script>
        <?php
        if(isset($getUser['username']))
        {
            if($getUser['banned'] == 1)
            {
                session_destroy();
                msg_warning("Tài khoản của bạn đã bị khóa.", "", 5000);
            }
            if($getUser['level'] != '1')
            {

            }
        }
        else
        {

        }