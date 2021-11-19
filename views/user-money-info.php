<?php
if (isset($_SESSION['weborderuser'])) {
    $banner7 =  $data->banner(7);
    $dateAdded = isset($_REQUEST['date_added']) ? $_REQUEST['date_added'] : date("Y-m-d", mktime(0, 0, 0, 1, 1, date("Y")));
    $dateModified = isset($_REQUEST['date_modified']) ? $_REQUEST['date_modified'] : date("Y-m-d");
    $transactionList =  $data->getAllTransaction($_SESSION['weborderuser']['id'], $dateAdded,$dateModified);
    // echo $transactionList;
?>
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
        <div class="container">
            <h3>Tài chính</h3>
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="<?= HOME ?>">Trang chủ</a><i>|</i></li>
                        <li>Tài chính</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/contact-->
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div id="">
                <ul class="resp-tabs-list">
                    <a href="user-money">
                        <li> Nạp tiền </li>
                    </a>
                    <a href="user-money-history">
                        <li> Lịch sử nạp tiền</li>
                    </a>
                    <li class="resp-tab-item resp-tab-active"> Thu chi tài chính</li>
                </ul>
                <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <div class="tab1">
                        <div class="border-block">
                            <div id="filter">
                                <div class="block_filter">
                                    <div class="ibox" style="border: none !important; margin-bottom: 0px">
                                        <div class="title-filter uk-flex uk-flex-middle uk-flex-space-between">
                                            <h3><a class="full-search">Tìm kiếm</a></h3>
                                        </div>
                                        <form class="uk-flex mb10 row" action="" method="get">
                                            <div class="col-sm-4 col-md-4 col-xs-4">
                                                <input type="date" name="date_added" value="<?= $dateAdded ?>" class="datetimepicker form-control input-md" placeholder="Từ ngày" autocomplete="off">
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-xs-4">
                                                <input type="date" name="date_modified" value="<?= $dateModified ?>" class="datetimepicker form-control input-md" placeholder="Đến ngày" autocomplete="off">
                                            </div>
                                            <div class="col-sm-1 col-md-1 col-xs-1">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Ngày tạo</th>
                                        <th class="text-center">Nội dung</th>
                                        <th class="text-right">Nạp tiền</th>
                                        <th class="text-right">Thanh toán</th>
                                        <th class="text-center">Số dư</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($transactionList) > 0) {
                                        $i = 1;
                                        foreach ($transactionList as $value) {
                                            $amount1 = ($value['type'] == 1) ? number_format($value['amount']). ' ₫' : "";
                                            $amount2 = ($value['type'] == 0) ? number_format($value['amount']). ' ₫' : "";
                                    ?>
                                            <tr>
                                                <td class="text-center"> <?= $i++ ?> </td>
                                                <td class="text-center"><?= $value['updated'] ?></td>
                                                <td><?= $value['note'] ?></td>
                                                <td class="text-right"><?= $amount1 ?></td>
                                                <td class="text-right"><?= $amount2 ?></td>
                                                <td class="text-right"><?= number_format($value['surplus']) ?> ₫</td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td class="text-center" colspan="5">Không tìm thấy kết quả nào!</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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