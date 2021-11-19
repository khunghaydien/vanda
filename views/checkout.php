<?php
$banner7 =  $data->banner(7);
?>
   <link rel="stylesheet" href="template/css/checkout.css">
   <div class="page-head_agile_info_w3l" <?php if (isset($banner7) && count($banner7) > 0) { ?>style="background: url(<?= $banner7[0]["image"] ?>) no-repeat 0px 0px; background-size: cover;" <?php } ?>>
      <div class="container">
         <h3>Đặt hàng</h3>
         <!--/w3_short-->
         <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
               <ul class="w3_short">
                  <li><a href="<?= HOME ?>">Trang chủ</a><i>|</i></li>
                  <li>Đặt hàng</li>
               </ul>
            </div>
         </div>
         <!--//w3_short-->
      </div>
   </div>

   <!-- banner-bootom-w3-agileits -->
   <div class="banner-bootom-w3-agileits">
      <form onsubmit="event.preventDefault();" class="checkout">
         <div class="container">
            <!-- mens -->
            <div class="col-md-4 checkout__information">
               <h3 class="bars">Thông tin khách hàng</h3>
               <div class="styled-input agile-styled-input-top">
                  <input type="text" name="name" id="txtCheckoutName" maxlength="255" value="">
                  <label>Họ và tên</label>
                  <span class="text-danger" id="checkoutName"></span>
               </div>
               <div class="styled-input agile-styled-input-top">
                  <input type="text" name="phone" id="txtCheckoutPhone" maxlength="15" value="">
                  <label>Số điện thoại</label>
                  <span class="text-danger" id="checkoutPhone"></span>
               </div>
               <div class="styled-input agile-styled-input-top">
                  <input type="text" name="email" id="txtCheckoutEmail" value="">
                  <label>Email</label>
                  <span class="text-danger" id="checkoutEmail"></span>
               </div>
               <div class="styled-input agile-styled-input-top">
                  <input type="text" name="address" id="txtCheckoutAddress" maxlength="300" value="">
                  <label>Địa chỉ nhận hàng</label>
                  <span class="text-danger" id="checkoutAddress"></span>
               </div>
               <div class="styled-input agile-styled-input-top">
                  <input type="text" name="note" id="txtCheckoutNote" value="">
                  <label>Ghi chú</label>
                  <span class="text-danger" id="checkoutNote"></span>
               </div>
               <div class="styled-input agile-styled-input-top">
                  <div class="content-box">
                     <div class="content-box__row">
                        <div class="radio-wrapper">
                           <div class="radio__input">
                              <input name="paymentMethod" id="paymentMethod-0" type="radio" class="input-radio" value="0" checked="">
                           </div>
                           <label for="paymentMethod-0" class="radio__label">
                              <span class="radio__label__primary">Thanh toán khi nhận hàng</span>
                           </label>
                        </div>
                     </div>
                     <div class="content-box__row">
                        <div class="radio-wrapper">
                           <div class="radio__input">
                              <input name="paymentMethod" id="paymentMethod-1" type="radio" class="input-radio" value="1">
                           </div>
                           <label for="paymentMethod-1" class="radio__label">
                              <span class="radio__label__primary">Thanh toán hình thức khác</span>
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="col-md-8 checkout__product">
               <div id="checkoutProduct">
                  <h3 class="bars">Giỏ hàng</h3>
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Tên sản phẩm</th>
                           <th class="text-center hide-mobile">Giá</th>
                           <th>Số lượng</th>
                           <th class="text-center">Tổng</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $tong = 0;
                        $i = 1;
                        if (isset($_SESSION['weborderCart']) && count($_SESSION['weborderCart']) > 0) { ?>
                           <?php foreach ($_SESSION['weborderCart'] as $product) {
                              foreach ($product as $value) { ?>
                                 <tr class="checkout-item checkout-item-changed">
                                    <td class="checkout-details-no"><?= ($i) ?></td>
                                    <td class="checkout-details-name ">
                                       <div class="d-flex">
                                          <button type="button" class="checkout-remove" onclick="removeCart(<?= $value['id'] ?>,<?= $value['idType'] ?>)">×</button>
                                          <a class="checkout-name" href="product/<?= $value['url'] ?>">
                                             <?= $value['name'] ?>
                                          </a>
                                       </div>
                                       <ul class="checkout-attributes">
                                          <?php if ($value['countType'] > 1) {
                                             echo "( Size: " . $value['nameType'] . " )";
                                          } ?>
                                       </ul>
                                    </td>
                                    <td class="checkout-details-price hide-mobile">
                                       <span class="checkout-price"><?= number_format($value['price']) ?> ₫</span>
                                    </td>
                                    <td class="checkout-details-quantity">
                                       <input class="checkout-quantity" name="quantity<?= $value['idType'] ?>" id="txtQtyCart<?= $value['idType'] ?>" onchange="updateCart(<?= $value['id'] ?>,<?= $value['idType'] ?>)" type="text" pattern="[0-9]*" value="<?= $value['qty'] ?>" autocomplete="off">
                                    </td>

                                    <td class="checkout-details-price">
                                       <span class="checkout-price"><?= number_format($value['price'] * $value['qty']) ?> ₫</span>
                                    </td>
                                 </tr>
                           <?php
                                 $tong += $value['price'] * $value['qty'];
                                 $i++;
                              }
                           } ?>
                        <?php } else { ?>
                           <tr class="checkout-item checkout-item-changed">
                              <td colspan="5" class="text-center">Không có sản phẩm nào trong giỏ hàng !</td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <div class="checkout-footer">
                     <a href="product" class="btn-modal-submit">Tiếp tục mua hàng</a>
                     <div class="checkout-subtotal"> Thành tiền: <b><?= number_format($tong) ?> ₫</b> </div>
                  </div>
                  <?php if (isset($_SESSION['weborderCart']) && count($_SESSION['weborderCart']) > 0) { ?>
                     <div class="checkout__submit">
                        <input type="submit" class="btn-submit" onclick="checkout()" value="Đặt hàng">
                     </div>
                  <?php } ?>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

         </div>
      </form>
   </div>
   <!-- //mens -->