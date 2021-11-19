<?php
if (isset($_SESSION['weborderuser'])) {
    $banner7 =  $data->banner(7);
    $trackingNumber = isset($_REQUEST['tracking_number']) ? $_REQUEST['tracking_number'] : "";
    $dateAdded = isset($_REQUEST['date_added']) ? $_REQUEST['date_added'] : date("Y-m-d", mktime(0, 0, 0, 1, 1, date("Y")));
    $dateModified = isset($_REQUEST['date_modified']) ? $_REQUEST['date_modified'] : date("Y-m-d");

    $trackingList = $data->getAllTracking($_SESSION['weborderuser']['id'], $trackingNumber, $dateAdded, $dateModified);
?>
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
        <div class="container">
            <h3>Tracking</h3>
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="<?= HOME ?>">Trang chủ</a><i>|</i></li>
                        <li>Tracking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/contact-->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div id="filter">
                <div class="block_filter">
                    <div class="ibox" style="border: none !important; margin-bottom: 0px">
                        <div class="title-filter uk-flex uk-flex-middle uk-flex-space-between">
                            <h3><a class="full-search">Tìm kiếm</a></h3>
                        </div>
                        <form class="uk-flex mb10 row" action="" method="post">
                            <div class="col-sm-4 col-md-3 col-xs-12 mb-1">
                                <input type="text" name="tracking_number" value="<?= $trackingNumber ?>" class=" form-control input-md" placeholder="Tracking Number...." autocomplete="off">
                            </div>
                            <div class="col-sm-4 col-md-3 col-xs-6 mb-1">
                                <input type="date" name="date_added" value="<?= $dateAdded ?>" class="datetimepicker form-control input-md" placeholder="Từ ngày" autocomplete="off">
                            </div>
                            <div class="col-sm-4 col-md-3 col-xs-6 mb-1">
                                <input type="date" name="date_modified" value="<?= $dateModified ?>" class="datetimepicker form-control input-md" placeholder="Đến ngày" autocomplete="off">
                            </div>
                            <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-3 col-sm-offset-0 d-flex">
                                <button style="margin-right:10px;" type="submit" class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                                <a href="tracking-add"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="border-block">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Ngày tạo</th>
                            <th class="text-center">Tracking Number</th>
                            <th class="text-center">Giá trị kiện hàng</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Cân nặng (kg)</th>
                            <th class="text-center">Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($trackingList) > 0) {
                            $i = 1;
                            foreach ($trackingList as $value) {
                                $status = ($value['status'] == 1) ? "Đang xử lý" : "Đã xử lý";
                        ?>
                                <tr>
                                    <td class="text-center"> <?= $i++ ?> </td>
                                    <td class="text-center"><?= $value['updated'] ?></td>
                                    <td class="text-center" style="color: red;font-weight: bold"><?= $value['tracking_number'] ?></td>
                                    <td class="text-center"><?= $value['value_package'] ?></td>
                                    <td class="text-center"><?= $value['name_product'] ?></td>
                                    <td class="text-center"><?= number_format($value['quantity']) ?></td>
                                    <td class="text-center"><?= number_format($value['weight'], 1) ?></td>
                                    <td class="text-center"><?= $status ?></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td class="text-center" colspan="8">Không tìm thấy kết quả nào!</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--//contact-->
<?php } else {
    echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>