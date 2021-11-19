<?php
if (isset($_SESSION['weborderuser'])) {
   $typeOrder = isset($_POST['typeOrder']) ? $_POST['typeOrder'] : 0;
   if ($typeOrder == 0) {
      $order =  $data->getAllOrder($_SESSION['weborderuser']['id']);
      $banner7 =  $data->banner(7);
      $total = count($order);
      $limit = 10;
      $currentPage = isset($_GET['p']) ? $_GET['p'] : 1;
      $pages = ceil($total / $limit);
      $orderList =  $data->getOrderPage($_SESSION['weborderuser']['id'], $currentPage, $limit);

?>
      <link rel="stylesheet" href="template/css/listcart.css">
      <!-- /banner_bottom_agile_info -->
      <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
         <div class="container">
            <h3>Danh sách đơn hàng nội địa</h3>
            <div class="services-breadcrumb">
               <div class="agile_inner_breadcrumb">
                  <ul class="w3_short">
                     <li><a href="<?= HOME ?>">Trang chủ</a><i>|</i></li>
                     <li>Danh sách đơn hàng nội địa</li>
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
                        <h3><a class="full-search">Bộ lọc đơn hàng</a></h3>
                     </div>
                     <form class="uk-flex mb10 row" action="listcart" method="POST" id="formFilter">
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <select name="typeOrder" class="form-control input-md">
                              <option value="0" selected="selected">Đơn nội địa</option>
                              <option value="1">Đơn ngoại địa</option>
                           </select>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <input type="date" name="date_added" value="<?= date("Y-m-d") ?>" class="datetimepicker form-control input-md" placeholder="Từ ngày" autocomplete="off">
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <input type="date" name="date_modified" value="<?= date("Y-m-d") ?>" class="datetimepicker form-control input-md" placeholder="Đến ngày" autocomplete="off">
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <select name="status" class="form-control input-md">
                              <option value="" selected="selected">Tất cả trạng thái</option>
                              <option value="0">Đang xử lý</option>
                              <option value="1">Đã xử lý</option>
                              <option value="2">Đã đặt hàng</option>
                              <option value="3">Đã phát hàng</option>
                              <option value="4">Kí nhận kho trung</option>
                              <option value="5">Đã về kho Việt Nam</option>
                              <option value="6">Đã giao</option>
                              <option value="7">Hết hàng</option>
                              <option value="8">Đơn hàng đã hủy</option>
                           </select>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <select name="datcoc" class="form-control input-md">
                              <option value="" selected="selected">Tất cả tình trạng</option>
                              <option value="0">Chưa đặt cọc</option>
                              <option value="1">Đã đặt cọc</option>
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
            <div class="table-cart">
               <div class="table-cart__title">
                  <div class="col col-xs-2 col-sm-1 px-0">STT</div>
                  <div class="col col-xs-10 col-sm-5 th-left">Thông tin khách hàng</div>
                  <div class="col col-sm-2 show--pc">Tổng tiền</div>
                  <div class="col col-sm-2 show--pc">Ngày tạo</div>
                  <div class="col col-sm-2 show--pc">Tình trạng</div>
                  <div class="clearfix"> </div>
               </div>
               <div class="table-cart__body">
                  <?php if (count($orderList) > 0) {
                     $i = 0;
                     foreach ($orderList as $value) {
                        $i++;
                  ?>
                        <div class="table-cart__row">
                           <div class="col-xs-2 col-sm-1 px-0"><?= ($currentPage - 1) * $limit + $i ?></div>
                           <div class="col-xs-10 col-sm-5 td-left cart__info">
                              <div class="cart__info--user">
                                 <p>Họ tên: <b><?= $value['name'] ?></b></p>
                                 <p>Điện thoại: <b><?= $value['phone'] ?></b></p>
                                 <p>Email: <b><?= $value['email'] ?></b></p>
                                 <p>Địa chỉ: <b><?= $value['address'] ?></b></p>
                                 <p>Ghi chú: <?= $value['note'] ?></p>
                              </div>
                              <div class="show--mobile cart__info--total">
                                 <p>Ngày tạo: <?= $value['updated'] ?></p>
                                 <p>Tổng tiền: <b><?= number_format($value['total']) ?>₫</b></p>
                                 <p>Tình trạng: <?= functions::generateTypeCart($value['status']); ?></p>
                                 <button class="btn btn-info mt-1" data-toggle="collapse" data-target="#detail<?= $value['id'] ?>">Chi tiết</button>
                              </div>
                           </div>
                           <div class="col-sm-2 show--pc">
                              <?= number_format($value['total']) ?>₫ <br>
                              <button class="btn-cart-primary mt-1" data-toggle="collapse" data-target="#detail<?= $value['id'] ?>">Chi tiết</button>
                           </div>
                           <div class="col-sm-2 show--pc"><?= $value['updated'] ?></div>
                           <div class="col-sm-2 show--pc">
                              <?php echo functions::generateTypeCart($value['status']);
                              if ($value['status'] == 1) { ?>
                                 <button class="btn-cart-primary btn-cart-info mt-1" onclick="cancelOrder(<?= $value['id'] ?>)">Hủy đơn</button>
                              <?php } ?>
                           </div>
                           <!-- chi tiết đơn hàng -->
                           <div id="detail<?= $value['id'] ?>" class="collapse col-xs-12">
                              <div class="table-detail-cart">
                                 <div class="table-detail-cart__title">
                                    <div class="col col-xs-2 col-sm-1 px-0">STT</div>
                                    <div class="col col-xs-6 col-sm-5 th-left">Tên sản phẩm</div>
                                    <div class="col col-sm-2 show--pc">Đơn giá</div>
                                    <div class="col col-sm-2 show--pc">Số lượng</div>
                                    <div class="col col-xs-4 col-sm-2">Thành tiền</div>
                                    <div class="clearfix"> </div>
                                 </div>
                                 <div class="table-detail-cart__body">
                                    <?php $i = 0;
                                    foreach ($data->getDetailsOrder($value['id']) as $detailsItem) {
                                       $i++;
                                    ?>
                                       <div class="table-detail-cart__row">
                                          <div class="col-xs-2 col-sm-1 px-0"><?= ($currentPage - 1) * $limit + $i ?></div>
                                          <div class="col-xs-6 col-sm-5 td-left cart__info">

                                             <div class="d-flex">
                                                <a href="product/<?= $detailsItem['url_product'] ?>">
                                                   <img src="<?= $detailsItem['image_product'] ?>" alt="<?= $detailsItem['name_product'] ?>" class="cart__body--image">
                                                </a>
                                                <div>
                                                   <a href="product/<?= $detailsItem['url_product'] ?>">
                                                      <p><?= $detailsItem['name_product'] ?></p>
                                                   </a>
                                                   <?php if ($detailsItem['count_type_product'] > 1) { ?>
                                                      <p>( Size: <?= $detailsItem['name_type_product'] ?> )</p>
                                                   <?php } ?>
                                                   <p class="show--mobile"><?= number_format($detailsItem['price']) ?>₫ x <?= $detailsItem['quantity'] ?></p>
                                                </div>
                                             </div>

                                          </div>
                                          <div class="col-sm-2 show--pc">
                                             <?= number_format($detailsItem['price']) ?>₫ <br>
                                          </div>
                                          <div class="col-sm-2 show--pc"><?= $detailsItem['quantity'] ?></div>
                                          <div class="col-xs-4 col-sm-2"><?= number_format($detailsItem['price'] * $detailsItem['quantity']) ?>₫</div>
                                          <div class="clearfix"> </div>
                                       </div>
                                    <?php } ?>

                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"> </div>
                        </div>
                     <?php }
                  } else { ?>
                     <div>
                        <div class="col-xs-12 text-center">Bạn chưa có đơn hàng nào</div>
                     </div>
                  <?php } ?>
               </div>
            </div>
            <div class="pagination-block text-center border-t-1">
               <ul class="pagination">
                  <?php
                  if ($currentPage > 1 && $pages > 1)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=1"><<</a></li>';
                  if ($currentPage > 1 && $pages > 1)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($currentPage - 1) . '"><</a></li>';
                  if ($currentPage > 3)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=1">1</a></li>';
                  if ($currentPage > 4)
                     echo '<li class="page-item"><a class="page-link">...</a></li>';

                  for ($i = 1; $i <= $pages; $i++) {
                     if ($i >= $currentPage - 2 && $i <= $currentPage + 2) {
                        if ($i == $currentPage) {
                           echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
                        } else {
                           echo '<li class="page-item"><a class="page-link" href="listcart?p=' . $i . '">' . $i . '</a></li>';
                        }
                     }
                  }
                  if ($currentPage < $pages - 3)
                     echo '<li class="page-item"><a class="page-link">...</a></li>';

                  if ($currentPage < $pages - 2)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($pages) . '">' . ($pages) . '</a></li>';

                  if ($currentPage < $pages)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($currentPage + 1) . '">></a></li>';

                  if ($currentPage < $pages)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($pages) . '">>></a></li>';
                  ?>
               </ul>
            </div>
         </div>
      </div>
      <!--//contact-->
   <?php
   } else {
      $order =  $data->getAllOrder($_SESSION['weborderuser']['id']);
      $banner7 =  $data->banner(7);
      $total = count($order);
      $limit = 10;
      $currentPage = isset($_GET['p']) ? $_GET['p'] : 1;
      $pages = ceil($total / $limit);
      $orderList =  $data->getOrderPage($_SESSION['weborderuser']['id'], $currentPage, $limit);

?>
      <link rel="stylesheet" href="template/css/listcart.css">
      <!-- /banner_bottom_agile_info -->
      <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
         <div class="container">
            <h3>Danh sách đơn hàng ngoại địa</h3>
            <div class="services-breadcrumb">
               <div class="agile_inner_breadcrumb">
                  <ul class="w3_short">
                     <li><a href="<?= HOME ?>">Trang chủ</a><i>|</i></li>
                     <li>Danh sách đơn hàng ngoại địa</li>
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
                        <h3><a class="full-search">Bộ lọc đơn hàng</a></h3>
                     </div>
                     <form class="uk-flex mb10 row" action="" method="POST" id="formFilter">
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <select name="typeOrder" class="form-control input-md">
                              <option value="0">Đơn nội địa</option>
                              <option value="1" selected="selected">Đơn ngoại địa</option>
                           </select>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <input type="date" name="date_added" value="<?= date("Y-m-d") ?>" class="datetimepicker form-control input-md" placeholder="Từ ngày" autocomplete="off">
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <input type="date" name="date_modified" value="<?= date("Y-m-d") ?>" class="datetimepicker form-control input-md" placeholder="Đến ngày" autocomplete="off">
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <select name="status" class="form-control input-md">
                              <option value="" selected="selected">Tất cả trạng thái</option>
                              <option value="0">Đang xử lý</option>
                              <option value="1">Đã xử lý</option>
                              <option value="2">Đã đặt hàng</option>
                              <option value="3">Đã phát hàng</option>
                              <option value="4">Kí nhận kho trung</option>
                              <option value="5">Đã về kho Việt Nam</option>
                              <option value="6">Đã giao</option>
                              <option value="7">Hết hàng</option>
                              <option value="8">Đơn hàng đã hủy</option>
                           </select>
                        </div>
                        <div class="col-sm-4 col-md-4 col-xs-4">
                           <select name="datcoc" class="form-control input-md">
                              <option value="" selected="selected">Tất cả tình trạng</option>
                              <option value="0">Chưa đặt cọc</option>
                              <option value="1">Đã đặt cọc</option>
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
            <div class="table-cart">
               <div class="table-cart__title">
                  <div class="col col-xs-2 col-sm-1 px-0">STT</div>
                  <div class="col col-xs-10 col-sm-5 th-left">Thông tin khách hàng</div>
                  <div class="col col-sm-2 show--pc">Tổng tiền</div>
                  <div class="col col-sm-2 show--pc">Ngày tạo</div>
                  <div class="col col-sm-2 show--pc">Tình trạng</div>
                  <div class="clearfix"> </div>
               </div>
               <div class="table-cart__body">
                  <?php if (count($orderList) > 0) {
                     $i = 0;
                     foreach ($orderList as $value) {
                        $i++;
                  ?>
                        <div class="table-cart__row">
                           <div class="col-xs-2 col-sm-1 px-0"><?= ($currentPage - 1) * $limit + $i ?></div>
                           <div class="col-xs-10 col-sm-5 td-left cart__info">
                              <div class="cart__info--user">
                                 <p>Họ tên: <b><?= $value['name'] ?></b></p>
                                 <p>Điện thoại: <b><?= $value['phone'] ?></b></p>
                                 <p>Email: <b><?= $value['email'] ?></b></p>
                                 <p>Địa chỉ: <b><?= $value['address'] ?></b></p>
                                 <p>Ghi chú: <?= $value['note'] ?></p>
                              </div>
                              <div class="show--mobile cart__info--total">
                                 <p>Ngày tạo: <?= $value['updated'] ?></p>
                                 <p>Tổng tiền: <b><?= number_format($value['total']) ?>₫</b></p>
                                 <p>Tình trạng: <?= functions::generateTypeCart($value['status']); ?></p>
                                 <button class="btn btn-info mt-1" data-toggle="collapse" data-target="#detail<?= $value['id'] ?>">Chi tiết</button>
                              </div>
                           </div>
                           <div class="col-sm-2 show--pc">
                              <?= number_format($value['total']) ?>₫ <br>
                              <button class="btn-cart-primary mt-1" data-toggle="collapse" data-target="#detail<?= $value['id'] ?>">Chi tiết</button>
                           </div>
                           <div class="col-sm-2 show--pc"><?= $value['updated'] ?></div>
                           <div class="col-sm-2 show--pc">
                              <?php echo functions::generateTypeCart($value['status']);
                              if ($value['status'] == 1) { ?>
                                 <button class="btn-cart-primary btn-cart-info mt-1" onclick="cancelOrder(<?= $value['id'] ?>)">Hủy đơn</button>
                              <?php } ?>
                           </div>
                           <!-- chi tiết đơn hàng -->
                           <div id="detail<?= $value['id'] ?>" class="collapse col-xs-12">
                              <div class="table-detail-cart">
                                 <div class="table-detail-cart__title">
                                    <div class="col col-xs-2 col-sm-1 px-0">STT</div>
                                    <div class="col col-xs-6 col-sm-5 th-left">Tên sản phẩm</div>
                                    <div class="col col-sm-2 show--pc">Đơn giá</div>
                                    <div class="col col-sm-2 show--pc">Số lượng</div>
                                    <div class="col col-xs-4 col-sm-2">Thành tiền</div>
                                    <div class="clearfix"> </div>
                                 </div>
                                 <div class="table-detail-cart__body">
                                    <?php $i = 0;
                                    foreach ($data->getDetailsOrder($value['id']) as $detailsItem) {
                                       $i++;
                                    ?>
                                       <div class="table-detail-cart__row">
                                          <div class="col-xs-2 col-sm-1 px-0"><?= ($currentPage - 1) * $limit + $i ?></div>
                                          <div class="col-xs-6 col-sm-5 td-left cart__info">

                                             <div class="d-flex">
                                                <a href="product/<?= $detailsItem['url_product'] ?>">
                                                   <img src="<?= $detailsItem['image_product'] ?>" alt="<?= $detailsItem['name_product'] ?>" class="cart__body--image">
                                                </a>
                                                <div>
                                                   <a href="product/<?= $detailsItem['url_product'] ?>">
                                                      <p><?= $detailsItem['name_product'] ?></p>
                                                   </a>
                                                   <?php if ($detailsItem['count_type_product'] > 1) { ?>
                                                      <p>( Size: <?= $detailsItem['name_type_product'] ?> )</p>
                                                   <?php } ?>
                                                   <p class="show--mobile"><?= number_format($detailsItem['price']) ?>₫ x <?= $detailsItem['quantity'] ?></p>
                                                </div>
                                             </div>

                                          </div>
                                          <div class="col-sm-2 show--pc">
                                             <?= number_format($detailsItem['price']) ?>₫ <br>
                                          </div>
                                          <div class="col-sm-2 show--pc"><?= $detailsItem['quantity'] ?></div>
                                          <div class="col-xs-4 col-sm-2"><?= number_format($detailsItem['price'] * $detailsItem['quantity']) ?>₫</div>
                                          <div class="clearfix"> </div>
                                       </div>
                                    <?php } ?>

                                 </div>
                              </div>
                           </div>
                           <div class="clearfix"> </div>
                        </div>
                     <?php }
                  } else { ?>
                     <div>
                        <div class="col-xs-12 text-center">Bạn chưa có đơn hàng nào</div>
                     </div>
                  <?php } ?>
               </div>
            </div>
            <div class="pagination-block text-center border-t-1">
               <ul class="pagination">
                  <?php
                  if ($currentPage > 1 && $pages > 1)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=1"><<</a></li>';
                  if ($currentPage > 1 && $pages > 1)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($currentPage - 1) . '"><</a></li>';
                  if ($currentPage > 3)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=1">1</a></li>';
                  if ($currentPage > 4)
                     echo '<li class="page-item"><a class="page-link">...</a></li>';

                  for ($i = 1; $i <= $pages; $i++) {
                     if ($i >= $currentPage - 2 && $i <= $currentPage + 2) {
                        if ($i == $currentPage) {
                           echo '<li class="page-item active"><a class="page-link">' . $i . '</a></li>';
                        } else {
                           echo '<li class="page-item"><a class="page-link" href="listcart?p=' . $i . '">' . $i . '</a></li>';
                        }
                     }
                  }
                  if ($currentPage < $pages - 3)
                     echo '<li class="page-item"><a class="page-link">...</a></li>';

                  if ($currentPage < $pages - 2)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($pages) . '">' . ($pages) . '</a></li>';

                  if ($currentPage < $pages)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($currentPage + 1) . '">></a></li>';

                  if ($currentPage < $pages)
                     echo '<li class="page-item"><a class="page-link" href="listcart?p=' . ($pages) . '">>></a></li>';
                  ?>
               </ul>
            </div>
         </div>
      </div>
      <!--//contact-->
   <?php
   }
} else {
   echo '<script>window.location.replace("' . HOME . '")</script>';
} ?>