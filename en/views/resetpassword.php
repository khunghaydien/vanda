<?php
$actioncode = (isset($_REQUEST['actioncode'])) ? $_REQUEST['actioncode'] : "";
if ($actioncode == "") {
   echo '<script>window.location.replace("' . HOME . '")</script>';
}
$indexIdUser = strripos($actioncode, '-');
$id = substr($actioncode, $indexIdUser + 1);
$userRepass = $data->getUserActionCode($id, $actioncode);
if (count($userRepass) > 0) {
   if (isset($_SESSION['weborderuser'])) {
      unset($_SESSION['weborderuser']);
      echo '<script>window.location.reload();</script>';
   }
   $banner7 =  $data->banner(7);
?>
   <!-- /banner_bottom_agile_info -->
   <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
      <div class="container">
         <h3>Thiết lập mật khẩu</h3>
         <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

               <ul class="w3_short">
                  <li><a href="<?= HOME ?>">Home</a><i>|</i></li>
                  <li>Thiết lập mật khẩu</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!--/contact-->
   <div class="banner_bottom_agile_info">
      <div class="container">
         <div class="agile-contact-grids">
            <div class="agile-contact-left">
               <div class="col-md-6 address-grid">
                  <h4><span>Thông tin cá nhân</span></h4>
                  <div class="mail-agileits-w3layouts mt-2">
                     <i class="fa fa-user" aria-hidden="true"></i>
                     <div class="contact-right">
                        <p>Full name </p><span><?= $userRepass[0]['name'] ?></span>
                     </div>
                     <div class="clearfix"> </div>
                  </div>
                  <div class="mail-agileits-w3layouts mt-1">
                     <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                     <div class="contact-right">
                        <p>Phone number </p><span><?= $userRepass[0]['phone'] ?></span>
                     </div>
                     <div class="clearfix"> </div>
                  </div>
                  <div class="mail-agileits-w3layouts mt-1">
                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                     <div class="contact-right">
                        <p>Mail </p><?= $userRepass[0]['email'] ?>
                     </div>
                     <div class="clearfix"> </div>
                  </div>
                  <div class="mail-agileits-w3layouts mt-1">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                     <div class="contact-right">
                        <p>Address</p><span><?= $userRepass[0]['address'] ?></span>
                     </div>
                     <div class="clearfix"> </div>
                  </div>
               </div>
               <div class="col-md-6 contact-form">
                  <h4 class="white-w3ls">Cập nhật mật khẩu</h4>
                  <form id="rePassForm" onsubmit="event.preventDefault();">
                     <div class="styled-input agile-styled-input-top">
                        <input type="password" name="txtSetPassPassword" id="txtSetPassPassword" required="" autocomplete="new-password">
                        <label>Mật khẩu</label>
                        <span id="setPassPassword"></span>
                     </div>
                     <div class="styled-input">
                        <input type="password" name="txtSetPassRePass" id="txtSetPassRePass" required="" autocomplete="new-password">
                        <label>Nhập lại mật khẩu</label>
                        <span id="setPassRePass"></span>
                     </div>
                     <div style="margin-top: 2em;">
                        <input type="submit" onclick="setPasswordSubmit(<?= $id ?>)" value="GỬI">
                     </div>
                  </form>
               </div>
            </div>
            <div class="clearfix"> </div>
         </div>
      </div>
   </div>
   <!--//contact-->
<?php } else {
   echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>