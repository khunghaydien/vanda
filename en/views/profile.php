<?php
if (isset($_SESSION['weborderuser'])) {
    $banner7 =  $data->banner(7);
    // echo $orderList;
?>
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
        <div class="container">
            <h3>Thông tin cá nhân</h3>
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="<?= HOME ?>">Home</a><i>|</i></li>
                        <li>Thông tin cá nhân</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/contact-->
    <div class="banner_bottom_agile_info">
        <div class="container">
        <div class="modal-content">
                <div class="modal-body modal-body-sub_agile">
                    <div class="col-md-8 col-md-offset-2">
                    <h3 class="agileinfo_sign text-center text-light"><span>MÃ KHÁCH HÀNG:</span> WO<?= $_SESSION['weborderuser']['id'] ?></h3>
                    <form id="registerForm" onsubmit="event.preventDefault();">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="txtProfileName" id="txtProfileName" required value="<?= $_SESSION['weborderuser']['name'] ?>">
                            <label>Full name</label>
                            <span id="profileName"></span>
                        </div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="txtProfilePhone" id="txtProfilePhone" required value="<?= $_SESSION['weborderuser']['phone'] ?>">
                            <label>Phone number</label>
                            <span id="profilePhone"></span>
                        </div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="txtProfileEmail" id="txtProfileEmail" required value="<?= $_SESSION['weborderuser']['email'] ?>">
                            <label>Email</label>
                            <span id="profileEmail"></span>
                        </div>

                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="txtProfileAddress" id="txtProfileAddress" required value="<?= $_SESSION['weborderuser']['address'] ?>">
                            <label>Địa chỉ</label>
                            <span id="profileAddress"></span>
                        </div>

                        <div class="form-group ">
                            <label class="control-label wb-form-label" for="txtProfileProvince">Tình / thành phố</label>
                            <select class="form-control" name="txtProfileProvince" id="txtProfileProvince" aria-describedby="profileProvince">
                                <option value="0">Chọn tỉnh / thành phố</option>
                                <?php foreach ($data->getProvince() as $item) { ?>
                                    <option <?php if ($_SESSION['weborderuser']['province'] == $item['id']) echo "selected" ?> value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                            <span id="profileProvince"></span>
                        </div>

                        <div class="form-group hidden">
                            <label class="control-label wb-form-label" for="txtProfileDistrict">Tình thành phố</label>
                            <select class="form-control" name="txtProfileDistrict" id="txtProfileDistrict" aria-describedby="profileDistrict">
                                <option value="0" selected>Chọn huyện</option>
                            </select>
                            <span id="profileDistrict"></span>
                        </div>
                        <div class="styled-input agile-styled-input-top text-center">
                            <p>Để trống nếu không muốn cập nhật mật khẩu</p>
                        </div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="password" name="txtProfileNewPassword" id="txtProfileNewPassword" value="" autocomplete="new-password">
                            <label>Mật khẩu mới</label>
                            <span id="profileNewPassword"></span>
                        </div>
                        <div class="styled-input agile-styled-input-top mb-2">
                            <input type="password" name="txtProfileReNewPassword" id="txtProfileReNewPassword" value="" autocomplete="new-password">
                            <label>Nhập lại mật khẩu mới</label>
                            <span id="profileReNewPassword"></span>
                        </div>

                        <div class="text-center">
                            <input type="submit" onclick="updateProfile()" value="Cập nhật thông tin">
                        </div>
                    </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--//contact-->
<?php } else {
    echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>