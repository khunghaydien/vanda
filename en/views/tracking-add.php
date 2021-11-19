<?php
if (isset($_SESSION['weborderuser'])) {
    $banner7 =  $data->banner(7);
    // echo $orderList;
?>
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
        <div class="container">
            <h3>Tracking</h3>
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="<?= HOME ?>">Home</a><i>|</i></li>
                        <li>Tracking</li>
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
                        <h3 class="agileinfo_sign text-center text-light"><span>THÊM TRACKING</h3>
                        <form id="registerForm" onsubmit="event.preventDefault();">
                            <div class="styled-input agile-styled-input-top">
                                <input type="text" name="trackingNumber" id="trackingNumber" required value="">
                                <label>Tracking Number(*)</label>
                                <span id="trackingNumberErr"></span>
                            </div>
                            <div class="styled-input agile-styled-input-top">
                                <input type="text" name="valuePackage" id="valuePackage" required value="">
                                <label>Giá trị kiện hàng(*)</label>
                                <span id="valuePackageErr"></span>
                            </div>
                            <div class="styled-input agile-styled-input-top">
                                <input type="text" name="nameProduct" id="nameProduct" required value="">
                                <label>Tên sản phẩm(*)</label>
                                <span id="nameProductErr"></span>
                            </div>

                            <div class="styled-input agile-styled-input-top">
                                <input type="text" name="quantity" id="quantity" required value="">
                                <label>Số lượng(*)</label>
                                <span id="quantityErr"></span>
                            </div>

                            <div class="styled-input agile-styled-input-top text-center">
                                <h4>Một số lưu ý</h4>
                            </div>
                            <div style="line-height: 2em;">
                                <div class="col-md-12 col-xs-12 col-sm-12">

                                    <h4><span style="color:#e74c3c;"><strong>&nbsp;1. Quy định vận chuyển : </strong></span></h4>
                                    <ol>
                                        <li>Không nhận vận chuyển mỹ phẩm, nguyên vật liệu mỹ phẩm , điện thoại , linh kiện điện thoại ...</li>
                                        <li>Thực phẩm , thức uống : thực phẩm chức năng,thực phẩm bánh kẹo , trà , sữa bột ...</li>
                                        <li>Thuốc lá, thuốc lá điện tử, tinh dầu, shisha....</li>
                                        <li>Hóa chất, dung dịch, các loại bột.....</li>
                                        <li>Các mặt hàng CẤM NHẬP KHẨU theo quy định pháp luật Việt Nam.</li>
                                        <li>
                                            <font color="red">Khối lượng vận chuyển được tính tối thiểu là 0.5&nbsp;kg&nbsp;</font>
                                        </li>
                                    </ol>

                                    <h4><span style="color:#e74c3c;"><strong>2. Quy định đóng gói hàng hóa :</strong></span></h4>

                                    <ol>
                                        <li>Bắt buộc đóng gỗ đối với hàng hóa : thủy tinh, gốm sứ, hàng dễ vỡ....</li>
                                        <li>Nhận đóng gỗ sản phẩm theo yêu cầu của khách hàng.</li>
                                    </ol>
                                    <h4><span style="color:#e74c3c;"><strong>3. QUY ĐỊNH&nbsp;BẢO HIỂM&nbsp;:</strong></span></h4>
                                    <ol>
                                        <li><span style="color:#2ecc71;"><strong><span style="background-color:#ffffff;">ĐỐI VỚI HÀNG VỠ, HÀNG HỎNG&nbsp;BÊN MINH MIỄN CHỊU TRÁCH NHIỆM</span></strong></span></li>
                                        <li><span style="color:#2ecc71;"><strong><span style="background-color:#ffffff;">ĐỐI VỚI KHÁCH KÝ GỬI MẤT HÀNG ĐỀN BÙ X3&nbsp;TIỀN CƯỚC</span></strong></span></li>
                                        <li><span style="color:#2ecc71;"><strong><span style="background-color:#ffffff;">ĐỂ ĐƯỢC BẢO HIỂM 100% GIÁ TRỊ TIỀN HÀNG XIN VUI LÒNG LIÊN HỆ BÊN MÌNH TRƯỚC PHÍ BẢO HIỂM 2% GIÁ TRỊ HÀNG</span></strong></span></li>
                                        <li>
                                            <font color="#2ecc71"><b>TỪ KHI NHẬP KHO TRUNG ĐẾN KHI VỀ VIỆT NAM THỜI GIAN KHÔNG QUÁ 1 THÁNG NẾU CÓ ĐƠN NÀO QUÁ 1 THÁNG BÁO GẤP CHO BÊN MÌNH ĐẺ KỊP THỜI XỬ LÝ</b></font>
                                        </li>
                                        <li>
                                            <font color="#2ecc71"><b>MIỄN TRỪ TRÁCH NHIỆM ĐỐI VỚI ĐƠN HÀNG QUÁ 1 THÁNG NHẬP KHO TRUNG VÀ 3 THÁNG LƯU KHO VIỆT NAM</b></font>
                                        </li>
                                    </ol>
                                    <p class="text-center" ><span style="color:#e74c3c;"><strong>CẢM ƠN CÁC BẠN ĐANG TIN TƯỞNG VÀ HỢP TÁC</strong></span></p>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" onclick="addTracking()" value="Thêm mới">
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="col-md-3 col-xs-3 col-sm-2">
                                <label>Tracking Number<span class="red">(*)</span></label>
                            </div>
                            <div class="col-md-6 col-xs-9 col-sm-9">
                                <input type="text" name="trackingNumber" value="" class="form-control" placeholder="Tracking Number" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-xs-3 col-sm-2">
                                <label>Giá trị kiện hàng(NDT)<span class="red">(*)</span></label>
                            </div>
                            <div class="col-md-6 col-xs-9 col-sm-9">
                                <input type="text" name="giatriNDT" value="" class="form-control" placeholder="Giá trị kiện hàng(NDT)" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-xs-3 col-sm-2">
                                <label>Tên sản phẩm<span class="red">(*)</span></label>
                            </div>
                            <div class="col-md-6 col-xs-9 col-sm-9">
                                <input type="text" name="tenSanpham" value="" class="form-control" placeholder="Tên sản phẩm" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-xs-3 col-sm-2">
                                <label>Số lượng<span class="red">(*)</span></label>
                            </div>
                            <div class="col-md-6 col-xs-9 col-sm-9">
                                <input type="text" name="soluongSanpham" value="" class="form-control" placeholder="Số lượng" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <div class="col-md-3 col-xs-3 col-sm-2">
                                <label>Cân nặng (kg)<span class="red">(*)</span></label>
                            </div>
                            <div class="col-md-6 col-xs-9 col-sm-9">
                                <input type="text" name="cannangKG" value="" class="form-control" placeholder="Cân nặng (kg)" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <p><span style="color:#e74c3c;"><strong>&nbsp;1. Quy định vận chuyển : </strong></span></p>
                                <ol>
                                    <li>Không nhận vận chuyển mỹ phẩm, nguyên vật liệu mỹ phẩm , điện thoại , linh kiện điện thoại ...</li>
                                    <li>Thực phẩm , thức uống : thực phẩm chức năng,thực phẩm bánh kẹo , trà , sữa bột ...</li>
                                    <li>Thuốc lá, thuốc lá điện tử, tinh dầu, shisha....</li>
                                    <li>Hóa chất, dung dịch, các loại bột.....</li>
                                    <li>Các mặt hàng CẤM NHẬP KHẨU theo quy định pháp luật Việt Nam.</li>
                                    <li>
                                        <font color="red">Khối lượng vận chuyển được tính tối thiểu là 0.5&nbsp;kg&nbsp;</font>
                                    </li>
                                </ol>
                                <p><span style="color:#e74c3c;"><strong>2. Quy định đóng gói hàng hóa :</strong></span></p>
                                <ol>
                                    <li>Bắt buộc đóng gỗ đối với hàng hóa : thủy tinh, gốm sứ, hàng dễ vỡ....</li>
                                    <li>Nhận đóng gỗ sản phẩm theo yêu cầu của khách hàng.</li>
                                </ol>
                                <p>&nbsp;</p>
                                <p><span style="color:#e74c3c;"><strong>3. QUY ĐỊNH&nbsp;BẢO HIỂM&nbsp;:</strong></span></p>
                                <ol>
                                    <li><span style="color:#2ecc71;"><strong><span style="background-color:#ffffff;">ĐỐI VỚI HÀNG VỠ, HÀNG HỎNG&nbsp;BÊN MINH MIỄN CHỊU TRÁCH NHIỆM</span></strong></span></li>
                                    <li><span style="color:#2ecc71;"><strong><span style="background-color:#ffffff;">ĐỐI VỚI KHÁCH KÝ GỬI MẤT HÀNG ĐỀN BÙ X3&nbsp;TIỀN CƯỚC</span></strong></span></li>
                                    <li><span style="color:#2ecc71;"><strong><span style="background-color:#ffffff;">ĐỂ ĐƯỢC BẢO HIỂM 100% GIÁ TRỊ TIỀN HÀNG XIN VUI LÒNG LIÊN HỆ BÊN MÌNH TRƯỚC PHÍ BẢO HIỂM 2% GIÁ TRỊ HÀNG</span></strong></span></li>
                                    <li>
                                        <font color="#2ecc71"><b>TỪ KHI NHẬP KHO TRUNG ĐẾN KHI VỀ VIỆT NAM THỜI GIAN KHÔNG QUÁ 1 THÁNG NẾU CÓ ĐƠN NÀO QUÁ 1 THÁNG BÁO GẤP CHO BÊN MÌNH ĐẺ KỊP THỜI XỬ LÝ</b></font>
                                    </li>
                                    <li>
                                        <font color="#2ecc71"><b>MIỄN TRỪ TRÁCH NHIỆM ĐỐI VỚI ĐƠN HÀNG QUÁ 1 THÁNG NHẬP KHO TRUNG VÀ 3 THÁNG LƯU KHO VIỆT NAM</b></font>
                                    </li>
                                </ol>
                                <p><span style="color:#e74c3c;"><strong>CẢM ƠN CÁC BẠN ĐANG TIN TƯỞNG VÀ HỢP TÁC</strong></span></p>
                            </div>
                        </div>
                        <div class="clearfix-10"></div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!--//contact-->
<?php } else {
    echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>