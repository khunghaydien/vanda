<?php
if (isset($_SESSION['weborderuser'])) {
   $orderId = isset($_REQUEST['order_id']) ? $_REQUEST['order_id'] : "";
   $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 0;
   $active = isset($_REQUEST['active']) ? $_REQUEST['active'] : 0;
   $dateAdded = isset($_REQUEST['date_added']) ? $_REQUEST['date_added'] : date("Y-m-d", mktime(0, 0, 0, 1, 1, date("Y")));
   $dateModified = isset($_REQUEST['date_modified']) ? $_REQUEST['date_modified'] : date("Y-m-d");

   $orderList =  $data->getAllOrder($_SESSION['weborderuser']['id'], $orderId, $status, $active, $dateAdded, $dateModified);
   $banner7 =  $data->banner(7);
   // echo $orderList;
?>
   <!-- /banner_bottom_agile_info -->
   <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
      <div class="container">
         <h3>Danh sách đơn hàng</h3>
         <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
               <ul class="w3_short">
                  <li><a href="<?= HOME ?>">Trang chủ</a><i>|</i></li>
                  <li>Danh sách đơn hàng</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!--/contact-->
   <div class="banner_bottom_agile_info">
      <div class="container">
         <!-- bộ lọc đơn hàng -->
         <div id="filter">
            <div class="block_filter">
               <div class="ibox" style="border: none !important; margin-bottom: 0px">
                  <div class="title-filter uk-flex uk-flex-middle uk-flex-space-between">
                     <h3><a class="full-search">Tìm kiếm</a></h3>
                  </div>
                  <form class="uk-flex mb10 row" action="orderlist" method="POST" id="formFilter">
                     <div class="col-sm-4 col-md-4 col-xs-4">
                        <input type="text" name="order_id" value="<?= $orderId ?>" class="form-control input-md" placeholder="Mã đơn hàng">
                     </div>
                     <div class="col-sm-4 col-md-4 col-xs-4">
                        <input type="date" name="date_added" value="<?= $dateAdded ?>" class="datetimepicker form-control input-md" placeholder="Từ ngày" autocomplete="off">
                     </div>
                     <div class="col-sm-4 col-md-4 col-xs-4">
                        <input type="date" name="date_modified" value="<?= $dateModified ?>" class="datetimepicker form-control input-md" placeholder="Đến ngày" autocomplete="off">
                     </div>
                     <div class="col-sm-4 col-md-4 col-xs-4">
                        <select name="status" class="form-control input-md">
                           <option <?php if ($status == 0) echo 'selected="selected""'; ?> value="0">Tất cả trạng thái</option>
                           <option <?php if ($status == 1) echo 'selected="selected""'; ?> value="1">Đang xử lý</option>
                           <option <?php if ($status == 2) echo 'selected="selected""'; ?> value="2">Đã xử lý</option>
                           <option <?php if ($status == 3) echo 'selected="selected""'; ?> value="3">Đã đặt hàng</option>
                           <option <?php if ($status == 4) echo 'selected="selected""'; ?> value="4">Đã phát hàng</option>
                           <option <?php if ($status == 5) echo 'selected="selected""'; ?> value="5">Kí nhận kho trung</option>
                           <option <?php if ($status == 6) echo 'selected="selected""'; ?> value="6">Đã về kho Việt Nam</option>
                           <option <?php if ($status == 7) echo 'selected="selected""'; ?> value="7">Đã giao</option>
                           <option <?php if ($status == 8) echo 'selected="selected""'; ?> value="8">Hết hàng</option>
                           <option <?php if ($status == 9) echo 'selected="selected""'; ?> value="9">Đơn hàng đã hủy</option>
                        </select>
                     </div>
                     <div class="col-sm-4 col-md-4 col-xs-4">
                        <select name="active" class="form-control input-md">
                           <option <?php if ($active == 0) echo 'selected="selected""'; ?> value="0">Tất cả tình trạng</option>
                           <option <?php if ($active == 1) echo 'selected="selected""'; ?> value="1">Chưa đặt cọc</option>
                           <option <?php if ($active == 2) echo 'selected="selected""'; ?> value="2">Đã đặt cọc</option>
                        </select>
                     </div>
                     <div class="col-sm-1 col-md-1 col-xs-1">
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- Kết thúc bộ lọc đơn hàng -->
         <!-- Danh sách đơn hàng -->
         <div id="orderslist">
            <ul class="tabs">
               <li><a <?php if ($status == 0) echo 'class="active"'; ?> href="orderlist">Tất cả</a></li>
               <li><a <?php if ($status == 2) echo 'class="active"'; ?> href="orderlist?status=2">Đã xử lý</a></li>
               <li><a <?php if ($status == 3) echo 'class="active"'; ?> href="orderlist?status=3">Đã đặt hàng</a></li>
               <li><a <?php if ($status == 4) echo 'class="active"'; ?> href="orderlist?status=4">Đã phát hàng</a></li>
               <li><a <?php if ($status == 5) echo 'class="active"'; ?> href="orderlist?status=5">Kí nhận kho trung</a></li>
               <li><a <?php if ($status == 6) echo 'class="active"'; ?> href="orderlist?status=6">Đã về kho Việt Nam</a></li>
               <li><a <?php if ($status == 7) echo 'class="active"'; ?> href="orderlist?status=7">Đã giao</a></li>
               <li><a <?php if ($status == 8) echo 'class="active"'; ?> href="orderlist?status=8">Hết hàng</a></li>
               <li><a <?php if ($status == 9) echo 'class="active"'; ?> href="orderlist?status=9">Đơn hàng đã hủy</a></li>
            </ul>
            <span style="clear: both;"></span>
            <div class="orderslist-ct">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th class="w100">Ngày tạo</th>
                        <th class="w100">Mã đơn hàng</th>
                        <th class="w100">Sản phẩm</th>
                        <th class="w100">Đơn giá</th>
                        <th class="w100">Số lượng sp</th>
                        <th class="w100">Tổng tiền</th>
                        <th class="w100">Trạng thái</th>
                        <th class="w100">Tình trạng</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        if (count($orderList) > 0) {
                            $i = 1;
                            foreach ($orderList as $value) { ?>
                              <tr>
                                 <td class="w100"><?= $value['updated'] ?></td>
                                 <td class="w100"><?= $value['id'] ?></td>
                                 <td class="w100">
                                    <div class="d-flex">
                                       <a href="<?= $value['item_link'] ?>" target="_blank">
                                          <img class="order-img" src="<?= $value['item_image'] ?>" alt="<?= $value['item_title'] ?>">
                                       </a>
                                       <div class="order-title">
                                          <a href="<?= $value['item_link'] ?>" target="_blank">
                                             <?= $value['item_title'] ?>
                                          </a>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="w100"><?= number_format($value['item_price'], 2) ?> <?= $value['currency'] ?></td>
                                 <td class="w100"><?= number_format($value['quantity']) ?></td>
                                 <td class="w100"><?= number_format($value['item_price'] * $value['quantity'], 2) ?> <?= $value['currency'] ?></td>
                                 <td class="w100">
                                    <?php echo functions::generateStatusOrder($value['status']);
                                    if ($value['status'] == 1) { ?>
                                       <div>
                                          <button class="btn-cart-primary mt-1" onclick="cancelOrder(<?= $value['id'] ?>)">Hủy đơn</button>
                                       </div>
                                    <?php } ?>
      
                                 </td>
                                 <td class="w100">
                                    <?= functions::generateActiveOrder($value['active']) ?>
                                 </td>
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
            <div class="clearfix"></div>
            <div class="textcenter" style="text-align: center;margin: 0px auto">
            </div>
         </div>
         <!-- <div class="pagination-block text-center border-t-1">
            <ul class="pagination">
               <?php
               if ($currentPage > 1 && $pages > 1)
                  echo '<li class="page-item"><a class="page-link" href="orderlist?p=1"><<</a></li>';
               if ($currentPage > 1 && $pages > 1)
                  echo '<li class="page-item"><a class="page-link" href="orderlist?p=' . ($currentPage - 1) . '"><</a></li>';
               if ($currentPage > 3)
                  echo '<li class="page-item"><a class="page-link" href="orderlist?p=1">1</a></li>';
               if ($currentPage > 4)
                  echo '<li class="page-item"><a class="page-link">...</a></li>';

               for ($i = 1; $i <= $pages; $i++) {
                  if ($i >= $currentPage - 2 && $i <= $currentPage + 2) {
                     if ($i == $currentPage) {
                        echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
                     } else {
                        echo '<li class="page-item"><a class="page-link" href="orderlist?p=' . $i . '">' . $i . '</a></li>';
                     }
                  }
               }
               if ($currentPage < $pages - 3)
                  echo '<li class="page-item"><a class="page-link">...</a></li>';

               if ($currentPage < $pages - 2)
                  echo '<li class="page-item"><a class="page-link" href="orderlist?p=' . ($pages) . '">' . ($pages) . '</a></li>';

               if ($currentPage < $pages)
                  echo '<li class="page-item"><a class="page-link" href="orderlist?p=' . ($currentPage + 1) . '">></a></li>';

               if ($currentPage < $pages)
                  echo '<li class="page-item"><a class="page-link" href="orderlist?p=' . ($pages) . '">>></a></li>';
               ?>
            </ul>
         </div> -->
      </div>
   </div>
   <!--//contact-->
<?php } else {
   echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>