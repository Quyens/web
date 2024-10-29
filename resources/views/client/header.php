<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
?>

<!DOCTYPE html>
<head>
      <meta charset="utf-8">
    <title><?=$title?></title
        <meta name="description" content="<?=$TN->site('description');?>">
        <meta name="keywords" content="<?=$TN->site('keywords');?>">
        <!-- Open Graph data -->
        <meta property="og:title" content="<?=$TN->site('title');?>">
        <meta property="og:type" content="Website">
        <meta property="og:url" content="<?=BASE_URL('');?>">
        <meta property="og:image" content="<?=$TN->site('anhbia');?>">
        <meta property="og:description" content="<?=$TN->site('description');?>">
        <meta property="og:site_name" content="<?=$TN->site('title');?>">
        <meta property="article:section" content="<?=$TN->site('description');?>">
        <meta property="article:tag" content="<?=$TN->site('keywords');?>">
        <meta name="author" content="KietRight">
        <link rel="shortcut icon" href="<?=$TN->site('favicon');?>">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="<?=$TN->site('anhbia');?>">
        <meta name="twitter:site" content="@nlcgaming">
        <meta name="twitter:title" content="<?=$TN->site('title');?>">
        <meta name="twitter:description" content="<?=$TN->site('description');?>">
        <meta name="twitter:creator" content="@nlcgaming">
        <meta name="twitter:image:src" content="<?=$TN->site('anhbia');?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Goldman&amp;display=swap">
        <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Goldman&amp;display=swap">
        <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&amp;family=Roboto:wght@900&amp;display=swap">
        <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&amp;family=Roboto:wght@900&amp;display=swap">
        <link data-n-head="ssr" rel="preconnect" href="https://fonts.gstatic.com">
        <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Goldman&amp;display=swap">
        <link data-n-head="ssr" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&amp;family=Roboto:wght@900&amp;display=swap">
        <!-- Script data -->
        <script src="<?=BASE_URL('')?>public/assets/cute/cute-alert.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.2/dist/lazyload.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="./public/assets/js/lebao.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
        <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool@x.x.x'></script>
        <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool@latest'></script>
        <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool'></script>
        <!-- Styles data -->
        <link href="<?=BASE_URL('')?>public/assets/cute/cute-alert.css" rel="stylesheet">
        <link rel="stylesheet" href="<?=BASE_URL('')?>public/assets1/css/styles.css" />
        <link rel="stylesheet" href="<?=BASE_URL('')?>public/assets1/libs/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="<?=BASE_URL('')?>public/assets/css/dichvulightbao.css">
        <link href="<?=BASE_URL('')?>public/assets/css/lebao.css" rel="stylesheet">
     
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

 
        <?=$body['header'];?> 
</head>
<body >
  <!-- Preloader -->
    <div class="preloader">
        <img src="https://bootstrapdemos.wrappixel.com/spike/dist/assets/images/logos/loader.svg" alt="loader" class="lds-ripple img-fluid" />
    </div>
 <script id="tiencoder-antif2">
        console.log("%c Xin chào các cao thủ F12 %c",
            'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:50px;color:#FF0000;-webkit-text-fill-color:#FF0000;-webkit-text-stroke: 1px #FF0000;',
            "font-size:12px;color:#999999;");
        console.log("%c HEXURY.TOP %c",
            'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:50px;color:#FF0000;-webkit-text-fill-color:#FF0000;-webkit-text-stroke: 1px #FF0000;',
            "font-size:12px;color:#999999;");
        setInterval(function() {
            var before = new Date().getTime();
            debugger;
            var after = new Date().getTime();
            if (after - before > 200) {
                document.querySelector("html").innerHTML = "";
                window.location.reload(true);
            }
        }, 100);
        document.getElementById("tiencoder-antif2").remove();
    </script>
    <script type=”text/JavaScript”>
        function killCopy(e){ 
            return false } 
        function reEnable(){ 
            return true } 
        document.onselectstart = new Function (“return false”) 
 
        if (window.sidebar){  
            document.onmousedown=killCopy 
            document.onclick=reEnable 
        }
    </script>
 
    <script language="JavaScript">
        window.onload = function() {
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            }, false);
            document.addEventListener("keydown", function(e) {
 
                if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                    disabledEvent(e);
                }
                if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                    disabledEvent(e);
                }
                if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                    disabledEvent(e);
                }
                if (e.ctrlKey && e.keyCode == 85) {
                    disabledEvent(e);
                }
                // "F12" key
                if (event.keyCode == 123) {
                    disabledEvent(e);
                }
            }, false);
 
            function disabledEvent(e) {
                if (e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
                e.preventDefault();
                return false;
            }
        };
    </script>
   <style>
    .new-icons {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 20;
    }
 
    .button-spacing .btn {
     margin-right: 10px;
    }
 
    .button-spacing .btn:last-child {
      margin-right: 0;
    }
 
    .btn-outline-success {
      margin-right: 10px;
    }
 
    .flash-sale-02 {
      padding: 1px 10px;
      background: linear-gradient(90deg, #f63, #f53d2d);
      font-weight: 600;
      display: inline-block;
      position: absolute;
      top: 5px;
      left: -8px;
      box-shadow: rgba(60, 64, 67, 0.1) 0px 1px 0px 0px, rgba(60, 64, 67, 0.15) 0px 2px 3px 2px;
      color: #fff;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      border-top-left-radius: 8px;
      font-weight: bold;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
      z-index: 1;
    }
 
    .bg-flash-sale {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      background-image: url('https://shopnick.fteach.site/assets/images/background-flashsale.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 20px;
      color: white;
    }
 
    .dichvuright {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      display: block;
    }
 
    .swiper-slide {
      width: 400px;
    }
 
    .swiper-slide {
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
 
    .dichvurightvn.dis {
      transition: transform 0.3s, box-shadow 0.3s;
    }
 
    .dichvurightvn:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
 
    .dichvurightvn img {
      transition: transform 0.3s;
    }
 
    .dichvurightvn.dis:hover img {
      transform: scale(1.1);
    }
 
    .slide-container {
      width: 100%;
      margin: 0 auto;
      display: flex;
      justify-content: center;
    }
 
    .slide-container .card {
      width: 300px;
      margin: 0 30px;
      overflow: hidden;
    }
 
    .slide-container .card img {
      width: 100%;
      height: auto;
    }
 
    @media (max-width: 576px) {
      .slide-container .card {
        width: 100%;
        margin: 0 auto;
        overflow: hidden;
      }
 
      .slide-container .card img {
        width: 100%;
        height: auto;
      }
    }
    .navbar-icons img {
            width: 24px;
            height: 24px;
        }
        .navbar {
            padding-bottom: 10px; 
        }
        .nav-item .nav-link {
            padding-top: 4px; 
            padding-bottom: 4px; 
            margin-bottom: 0;
        }
        .nav-item .nav-link br {
            display: none;
        }
  </style>