<?php
if (isset($_SESSION['weborderuser'])) {
    $banner7 =  $data->banner(7);
    $notificationList =  $data->getAllNotification($_SESSION['weborderuser']['id']);
?>
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
        <div class="container">
            <h3>Thông báo</h3>
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="<?= HOME ?>">Trang chủ</a><i>|</i></li>
                        <li>Thông báo</li>
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Nội dung</th>
                                <th class="text-center">Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($notificationList) > 0) {
                                $i = 1;
                                foreach ($notificationList as $value) {
                            ?>
                                    <tr>
                                        <td class="text-center"> <?= $i++ ?> </td>
                                        <td><?= $value['content'] ?></td>
                                        <td class="text-center"><?= $value['updated'] ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td class="text-center" colspan="3">Không tìm thấy kết quả nào!</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--//contact-->
<?php } else {
    echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>