<?= $body['footer']; ?>

<script type="text/javascript">
    $('#datatable').DataTable({
        language: {
          url: "/public/assets/Vietnamese.json"
       },
    });
</script> 
 
 
 <script>
  function handleColorTheme(e) {
    document.documentElement.setAttribute("data-color-theme", e);
  }
</script>

 
      <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
          <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
            Cài đặt
         </h4>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
       </div>
        <div class="offcanvas-body h-n80 simplebar-scrollable-y" data-simplebar="init"><div class="simplebar-wrapper" style="margin: -16px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 16px;">
          <h6 class="fw-semibold fs-4 mb-2">Chủ đề</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="light-layout">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m21.067 11.857l-.642-.388zm-8.924-8.924l-.388-.642zM21.25 12A9.25 9.25 0 0 1 12 21.25v1.5c5.937 0 10.75-4.813 10.75-10.75zM12 21.25A9.25 9.25 0 0 1 2.75 12h-1.5c0 5.937 4.813 10.75 10.75 10.75zM2.75 12A9.25 9.25 0 0 1 12 2.75v-1.5C6.063 1.25 1.25 6.063 1.25 12zm12.75 2.25A5.75 5.75 0 0 1 9.75 8.5h-1.5a7.25 7.25 0 0 0 7.25 7.25zm4.925-2.781A5.746 5.746 0 0 1 15.5 14.25v1.5a7.247 7.247 0 0 0 6.21-3.505zM9.75 8.5a5.747 5.747 0 0 1 2.781-4.925l-.776-1.284A7.246 7.246 0 0 0 8.25 8.5zM12 2.75a.384.384 0 0 1-.268-.118a.285.285 0 0 1-.082-.155c-.004-.031-.002-.121.105-.186l.776 1.284c.503-.304.665-.861.606-1.299c-.062-.455-.42-1.026-1.137-1.026zm9.71 9.495c-.066.107-.156.109-.187.105a.285.285 0 0 1-.155-.082a.384.384 0 0 1-.118-.268h1.5c0-.717-.571-1.075-1.026-1.137c-.438-.059-.995.103-1.299.606z"></path></svg>Sáng
            </label>
           <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="dark-layout">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="5"></circle><path stroke-linecap="round" d="M12 2v2m0 16v2M4 12H2m20 0h-2"></path><path stroke-linecap="round" d="m19.778 4.223l-2.222 2.031M4.222 4.223l2.222 2.031m0 11.302l-2.222 2.222m15.556-.001l-2.222-2.222" opacity=".5"></path></g></svg> Tối
            </label>
          </div>
          <h6 class="mt-5 fw-semibold fs-4 mb-2">Hướng chủ đề</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="ltr-layout">
              Phải
           </label>
            <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="rtl-layout">
              Trái
            </label>
          </div>
          <h6 class="mt-5 fw-semibold fs-4 mb-2">Chỉnh màu</h6>
          <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
            <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off">
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME" data-original-title="" title="">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
 
              </div>
            </label>
            <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off">
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME" data-original-title="" title="">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
 
              </div>
            </label>
            <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off">
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME" data-original-title="" title="">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
 
              </div>
            </label>
            <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME" data-original-title="" title="">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
 
              </div>
            </label>
            <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME" data-original-title="" title="">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
 
              </div>
            </label>
            <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME" data-original-title="" title="">
              <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
 
              </div>
            </label>
          </div>
          <h6 class="mt-5 fw-semibold fs-4 mb-2">Kiểu bố cục</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <div>
              <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off">
              <label class="btn p-9 btn-outline-primary" for="vertical-layout">
                Thẳng đứng
              </label>
            </div>
            <div>
              <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off">
              <label class="btn p-9 btn-outline-primary" for="horizontal-layout">
                Nằm ngang
              </label>
            </div>
          </div>
          <h6 class="mt-5 fw-semibold fs-4 mb-2">Tùy chọn vùng chứa</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="boxed-layout">
              Gọn
            </label>
 
            <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="full-layout">
             Mở rộng
            </label>
          </div>
 
          <h6 class="fw-semibold fs-4 mb-2 mt-5">Loại thanh bên</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <a href="javascript:void(0)" class="fullsidebar">
              <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off">
              <label class="btn p-9 btn-outline-primary" for="full-sidebar">
                Mở rộng
              </label>
            </a>
            <div>
              <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off">
              <label class="btn p-9 btn-outline-primary" for="mini-sidebar">
                Gọn
              </label>
            </div>
          </div>
          <h6 class="mt-5 fw-semibold fs-4 mb-2">Khung</h6>
          <div class="d-flex flex-row gap-3 customizer-box" role="group">
            <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="card-with-border">
             To
            </label>
            <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off">
            <label class="btn p-9 btn-outline-primary" for="card-without-border">
              Nhỏ
            </label>
          </div>
        </div></div></div></div><div class="simplebar-placeholder" style="width: 320px; height: 1044px;"></div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 481px; transform: translate3d(0px, 0px, 0px); display: block;">
 
        </div></div></div>
</div>
      </div>
    </div>
    <div class="dark-transparent sidebartoggler">
</div>
</div>

    <script src="https://cdn.gtranslate.net/widgets/latest/globe.js" defer></script>

   <script src="<?=BASE_URL('')?>public/assets1/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=BASE_URL('')?>public/assets1/libs/simplebar/dist/simplebar.min.js"></script>
  <script src="<?=BASE_URL('')?>public/assets1/js/theme/app.init.js"></script>
  <script src="<?=BASE_URL('')?>public/assets1/js/theme/theme.js"></script>
  <script src="<?=BASE_URL('')?>public/assets1/js/theme/app.min.js"></script>
  <script src="<?=BASE_URL('')?>public/assets1/js/theme/sidebarmenu.js"></script>
  <script src="<?=BASE_URL('')?>public/assets1/js/theme/feather.min.js"></script>
 
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
<script>
new ClipboardJS('.copy');
</script>
 
<script type="text/javascript">
 
  const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    </script>
 <footer> 
        </div>
        </div>
    </div>
</div>
<section class="bg-dark pt-5 pb-8">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-7 col-xl-5 ">
              <div class="d-sm-flex align-items-center text-center justify-content-center justify-content-lg-start gap-3 mb-3">
              <img src="<?=$TN->site('logo');?>" width="200" height="45" alt="matdash-img">
              </div>
              <span class="fs-5 text-white text-center text-lg-start fw-bolder mb-7">
              Dịch vụ thiết kế website theo yêu cầu, mua bán mã nguồn, dịch vụ uy tín, hỗ trợ nhiệt tình. Đội ngũ chăm sóc khách hàng 24/24
</span>
 
            </div>
            <div class="col-lg-7 col-xl-5 ">
            <div class="d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3 mb-2">
            <h2 class="fs-8 text-white text-center text-lg-start fw-bolder mb-3">
               Liên Hệ Hỗ Trợ
              </h2>
              </div>
              <h2 class="fs-5 text-white text-center text-lg-start fw-bolder mb-7">
              Liên hệ ngay bộ phận CSKH nếu cần sự hỗ trợ. Chúng tôi sẽ hỗ trợ và giải đáp yêu cầu của bạn sớm nhất có thể!
              </h2>
              <div class="d-sm-flex align-items-center text-center justify-content-center justify-content-lg-start gap-3 mb-2 button-spacing">
                <a href="<?= $TN->site('link_facebook') ?>" class="btn btn-sm btn-outline-light"><i class="ti ti-brand-facebook"></i> <?= $TN->site('author') ?> </a>
                <a href="<?= $TN->site('link_zalo') ?>" class="btn btn-sm btn-outline-light"><i class="ti ti-phone"></i> <?= $TN->site('hotline') ?> </a>
              </div>
            </div>
            <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="text-center">
 
              <p class="mb-0 text-white">
               All rights reserved by <?= $TN->site('author') ?>
              </p>
            </div>
          </div>
        </div>
          </div>
        </div>
      </section>
    </footer> 
 
</html>
</body>
 <style>
	html,body{cursor:url("https://1.bp.blogspot.com/-qbWo9mPKO2Y/YL9utYdQBdI/AAAAAAAAFs4/mtjGu6u2uGwtJsT4gZG4lbhLV1a5lG6OQCLcBGAsYHQ/s0/mouse-f1.png"), auto;}
	a:hover{cursor:url("https://1.bp.blogspot.com/-nYv2dLl3oXY/YL9utYBCh8I/AAAAAAAAFtA/wII4lVw5w4k-4isGMY41heTqk8U4TJujgCLcBGAsYHQ/s0/mouse-f2.png"), auto;}
</style>
 
</html>
