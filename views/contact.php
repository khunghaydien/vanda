<?php
$categoryParent = $data->getProductCategoryParent(1000);
$newProduct = $data->getNewProduct(5);
?>
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-large">
                <nav class="woocommerce-breadcrumb breadcrumbs"><a href="<?= HOME ?>">Trang chủ</a> <span class="divider">&#47;</span> Liên hệ</nav>
            </div>
        </div><!-- .flex-left -->
    </div><!-- flex-row -->
</div><!-- .page-title -->

<main id="main" class="">
    <div id="content" class="blog-wrapper blog-archive page-wrapper">
        <div class="row row-large row-divided ">
            <div class="post-sidebar large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
                    <aside id="woocommerce_product_categories-3" class="widget woocommerce widget_product_categories"><span class="widget-title">DANH MỤC SẢN PHẨM</span>
                        <div class="is-divider small"></div>
                        <ul class="product-categories">
                            <?php foreach ($categoryParent as $key => $parent) {
                                $categoryChild = $data->getProductCategoryChild($parent['id'],1000);
                                if (count($categoryChild) > 0) { ?>
                                <li class="cat-item cat-item-431 cat-parent"><a href="product/1/<?= $parent['url'] ?>"><?= $parent['name'] ?></a>
                                <ul class='children'>
                                    <?php foreach ($categoryChild as $key => $value) {
                                        echo '<li class="cat-item cat-item-432"><a href="product/1/' . $value['url'] . '">' . $value['name'] . '</a></li>';
                                    } ?>
                                    
                                </ul>
                            </li>
                                <?php } else { ?>
                                        <li class="cat-item cat-item-438"><a href="product/1/<?= $parent['url'] ?>"><?= $parent['name'] ?></a></li>
                                    <?php } ?>
                                <?php } ?>
                        </ul>
                    </aside>
                    <aside id="woocommerce_products-5" class="widget woocommerce widget_products"><span class="widget-title "><span>Sản phẩm mới nhất</span></span>
                        <div class="is-divider small"></div>
                        <ul class="product_list_widget">
                            <?php foreach ($newProduct as $value) { ?>
                                <li>
                                    <a href="product/<?= $value['url'] ?>">
                                        <img width="247" height="300" src="<?= $value['image'] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="<?= $value['name'] ?>" loading="lazy" />
                                        <div class="new-product-title"><?= functions::textLimit($value['name'], 14) ?></div>
                                        <small><i class="fa fa-calendar"></i> <?= $value['updated'] ?></small>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </aside>
                </div><!-- #secondary -->
            </div><!-- .post-sidebar -->

            <div class="large-9 col medium-col-first pt-0">
            <div class="page-inner">
               <div class="gmail_default">
                  <h4 style="text-align: center;"></h4>
                  <p style="text-align: center;"><strong><?=$info['ten-cong-ty']?></strong></p>
                  <h3 style="text-align: center;"></h3>
                  <p style="text-align: left; margin-left: 10%;">
                     <strong><em>Địa chỉ: <?=$info['dia-chi']?></em></strong> <br>
                     <strong><em>Địa chỉ văn phòng đại diện: <?=$info['dia-chi-2']?></em></strong>
                     <strong>
                        <em><br />
                           Hotline: <?php echo functions::convertPhone($info['dien-thoai']);?> / <?php echo functions::convertPhone($info['dien-thoai-2']);?>                Email:  <?=$info['email']?><br />
                           </em>
                     </strong>
                  </p>
               </div>
               <h1 style="text-align: center;"></h1>
               <p style="text-align: center; width: 100%;"><?=$info['map']?></p>
               <div id="comments" class="comments-area">
                  <div id="respond" class="comment-respond">
                     <h3 id="reply-title" class="comment-reply-title">Phản hồi <small><a rel="nofollow" id="cancel-comment-reply-link" href="lien-he.html#respond" style="display:none;">Hủy</a></small></h3>
                     <form  onsubmit="event.preventDefault();" class="comment-form" novalidate>
                        <p class="comment-notes"><span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span></p>
                        <p class="comment-form-comment">
                           <label for="txtContactTitle">Tiêu đề <span class="required">*</span></label>
                           <input class="mb-0" id="txtContactTitle" name="txtContactTitle" type="text" value="" size="30" maxlength="65525" required='required' />
                           <small id="spanContactTitle" style="min-height: 10px; color:red;"></small>
                        </p>
                        <p class="comment-form-comment">
                           <label for="txtContactContent">Nội dung <span class="required">*</span></label> 
                           <textarea class="mb-0" id="txtContactContent" name="txtContactContent" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                           <small id="spanContactContent" style="min-height: 10px; color:red;"></small>
                        </p>
                        <p class="comment-form-author">
                           <label for="txtContactName">Tên <span class="required">*</span></label> 
                           <input class="mb-0" id="txtContactName" name="txtContactName" type="text" value="" size="30" maxlength="245" required='required' />
                           <small id="spanContactName" style="min-height: 10px; color:red;"></small>
                        </p>
                        <p class="comment-form-email">
                           <label for="txtContactEmail">Email <span class="required">*</span></label> 
                           <input class="mb-0" id="txtContactEmail" name="txtContactEmail" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' />
                           <small id="spanContactEmail" style="min-height: 10px; color:red;"></small>
                        </p>
                        <p class="comment-form-email">
                           <label for="txtContactPhone">Phone <span class="required">*</span></label> 
                           <input class="mb-0" id="txtContactPhone" name="txtContactPhone" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required='required' />
                           <small id="spanContactPhone" style="min-height: 10px; color:red;"></small>
                        </p>
                        <p class="form-submit">
                           <input onclick="contactSubmit()" name="submit" type="submit" id="submit" class="submit" value="Gửi" />
                        </p>
                     </form>
                  </div>
                  <!-- #respond -->

               </div>
               <!-- #comments -->

            </div>
            <!-- .page-inner -->
         </div>
         <!-- end #content large-9 left -->

      </div>
      <!-- end row -->
   </div>
</main>