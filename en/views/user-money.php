<?php
if (isset($_SESSION['weborderuser'])) {
    $banner7 =  $data->banner(7);
    $dateAdded = isset($_REQUEST['date_added']) ? $_REQUEST['date_added'] : date("Y-m-d", mktime(0, 0, 0, 1, 1, date("Y")));
    $dateModified = isset($_REQUEST['date_modified']) ? $_REQUEST['date_modified'] : date("Y-m-d");
?>
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
        <div class="container">
            <h3>Tài chính</h3>
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="<?= HOME ?>">Home</a><i>|</i></li>
                        <li>Tài chính</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/contact-->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li> Nạp tiền </li>
                    <a href="user-money-history"><li> Lịch sử nạp tiền</li></a>
                    <a href="user-money-info"><li> Thu chi tài chính</li></a>
                </ul>
                <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <div class="tab1">
                        <div class="border-block">
                            <h3 class="mt-1">Nạp tiền vào tài khoản</h3>
                            <div class="content" style="line-height: 25px;">
                                <p>Nhằm tiết kiệm thời gian cho quý khách , Khi Quý khách hoàn thành bước nộp tiền tại văn phòng hoặc chuyển khoản qua ngân hàng . Hãy nhắn tin hoặc gọi điện cho Tuấn Thành , Tuấn Thành sẽ xác nhận và chuyển tiền vào tài khoản Quý khách trên hệ thống Tuấn Thành trong thời gian sớm nhất</p>
                                <br>
                                <p>HOTLINE:<br>
                                    0968.961.962</p>
                                <br>
                                <p>Thông tin ngân hàng:</p>
                                <br>
                                <ul>
                                    <li>Ngân Hàng Quân Đội MB BANK</li>
                                    <li>0290177771994</li>
                                    <li>DƯƠNG VĂN THÀNH</li>
                                </ul>
                                <br>
                                <div class="tooltip_templates">
                                    <div id="content_message">
                                        <p>Cú pháp tin nhắn (gửi đến 0968.961.962)</p>

                                        <p>Họ và tên : NGUYEN VAN A</p>

                                        <p>Mã khách hàng : TT-1</p>

                                        <p>Số tiền đã nạp : 200.000 đ</p>

                                        <p>Ghi chú (nếu có)</p>
                                    </div>
                                    <br>
                                    <div id="content_phone">
                                        <p>Phone number : 0123456789</p>

                                        <p>HÃY LIÊN HỆ TRỰC TIẾP CHO CHÚNG TÔI ĐỀ ĐƯỢC PHỤC VỤ CÁC BẠN TỐT NHẤT</p>

                                        <p>XIN CẢM ƠN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--//tab_one-->
                </div>
            </div>
        </div>
    </div>
    <!--//contact-->
<?php } else {
    echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>