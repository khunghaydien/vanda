<?php
$categoryParent = $data->getProductCategoryParent(1000);
$categoryParent2 = $data->getProductCategoryParent(4);
$newProduct = $data->getNewProduct(12);
$doitac = $data->getDoiTac(20);
$banner1 =  $data->banner(1);
?>
<h1 style="display: none;"><?=$page['title']?></h1>
<h2 style="display: none;"><?=$page['description']?></h2>
<main id="main" class="">
   <div id="content" role="main" class="content-area">
      <div class="row row-small" id="row-378348333" style="max-width: 100% !important;">
         <div class="col small-12 large-12">
            <div class="col-inner" style="margin:0px 0px -10px 0px;">
               <div class="slider-wrapper relative " id="slider-759709075">
                  <div class="slider slider-nav-circle slider-nav-large slider-nav-light slider-style-normal" data-flickity-options='{
            "cellAlign": "center",
            "imagesLoaded": true,
            "lazyLoad": 1,
            "freeScroll": false,
            "wrapAround": true,
            "autoPlay": 6000,
            "pauseAutoPlayOnHover" : true,
            "prevNextButtons": true,
            "contain" : true,
            "adaptiveHeight" : true,
            "dragThreshold" : 5,
            "percentPosition": true,
            "pageDots": true,
            "rightToLeft": false,
            "draggable": true,
            "selectedAttraction": 0.1,
            "parallax" : 0,
            "friction": 0.6        }'>
                     <?php foreach ($banner1 as $value) { ?>
                        <div class="img has-hover x md-x lg-x y md-y lg-y" style="width: 100%;">
                           <div class="img-inner dark">
                              <img width="1020" height="306" src="<?=$value['image']?>" class="attachment-large size-large" alt="<?=$value['name']?>" loading="lazy" sizes="(max-width: 1020px) 100vw, 1020px" />
                           </div>
                        </div>
                     <?php } ?>
                     
                  </div>
                  <div class="loading-spin dark large centered"></div>
                  <style scope="scope">
                  </style>
               </div>
               <!-- .ux-slider-wrapper -->
            </div>
         </div>
      </div>
      <div class="row row-small" id="row-814621748">
         <div class="col hide-for-small medium-3 small-12 large-3">
            <div class="col-inner">
               <ul class="sidebar-wrapper ul-reset ">
                  <aside id="woocommerce_product_categories-3" class="widget woocommerce widget_product_categories"><span class="widget-title">PRODUCT PORTFOLIO</span>
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
                  <!-- <aside id="custom_html-7" class="widget_text widget widget_custom_html"><span class="widget-title shop-sidebar"><?=$info["title-tu-van"]?></span>
                    <div class="is-divider small"></div>
                    <div class="textwidget custom-html-widget">
                        <div class="box-htt">
                            <p><img class=" lazyloaded" src="<?php if(isset($info["image-tu-van"])) echo $info["image-tu-van"]; else echo "template/wp-content/uploads/2018/04/online.gif"; ?>" width="100%" data-lazy-src="<?php if(isset($info["image-tu-van"])) echo $info["image-tu-van"]; else echo "template/wp-content/uploads/2018/04/online.gif"; ?>"></p>
                            <p class="title_online"><?=$info['tu-van-vien-1']?></p>
                            <ul class="hotline_online">
                                <li><?php echo functions::convertPhone($info['sdt-tvv-1']);?></li>
                            </ul>
                            <p class="title_online"><?=$info['tu-van-vien-2']?></p>
                            <ul class="hotline_online">
                                <li><?php echo functions::convertPhone($info['sdt-tvv-2']);?></li>
                            </ul>
                        </div>
                    </div>
                  </aside> -->
                  <aside id="text-3" class="widget widget_text"><span class="widget-title "><span>CONSULTING PRODUCTS</span></span>
                        <div class="is-divider small"></div>
                        <div class="textwidget">
                            <div class="contact-home"><em>Register to receive the fastest quote</em></p>
                                <div role="form" class="wpcf7" id="wpcf7-f2657-o1" lang="vi" dir="ltr">
                                    <div class="screen-reader-response">
                                        <p role="status" aria-live="polite" aria-atomic="true">
                                        <ul></ul>
                                    </div>
                                    <form onsubmit="event.preventDefault();" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                                        <div class="contact-form-view">
                                            <div class="contact-form-left">
                                                <div class="txt-01">
                                                    <span class="wpcf7-form-control-wrap">
                                                        <input type="text" id="txtBaoGiaName" name="txtBaoGiaName" value="" size="40" class="wpcf7-form-control wpcf7-text mb-0" aria-invalid="false" placeholder="Full name" />
                                                        <small id="spanBaoGiaName" style="min-height: 10px; color:red;"></small>
                                                    </span>
                                                </div>
                                                <div class="txt-01">
                                                    <span class="wpcf7-form-control-wrap">
                                                        <input type="text" id="txtBaoGiaPhone" name="txtBaoGiaPhone" value="" size="40" class="wpcf7-form-control wpcf7-text mb-0" aria-invalid="false" placeholder="Phone number" />
                                                        <small id="spanBaoGiaPhone" style="min-height: 10px; color:red;"></small>
                                                    </span>
                                                </div>
                                                <div class="txt-01">
                                                    <span class="wpcf7-form-control-wrap">
                                                        <input type="text" id="txtBaoGiaEmail" name="txtBaoGiaEmail" value="" size="40" class="wpcf7-form-control wpcf7-text mb-0" aria-invalid="false" placeholder="Email" />
                                                        <small id="spanBaoGiaEmail" style="min-height: 10px; color:red;"></small>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="txt-03">
                                                <input type="submit" onclick="baoGiaSubmit()" value="Send information" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </aside>
                
                  <aside id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                     <span class="widget-title "><span>SEARCH PRODUCT</span></span>
                     <div class="is-divider small"></div>
                     <form method="post" class="searchform" action="search" >
                        <div class="flex-row relative">
                           <div class="flex-col flex-grow">
                           <input type="search" class="mb-0" name="keyword" value="<?php if(isset($_REQUEST['keyword'])) echo $_REQUEST['keyword'];?>" placeholder="Enter keywords..." required />
                           </div>
                           <!-- .flex-col -->
                           <div class="flex-col">
                              <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                 <i class="icon-search"></i> </button>
                           </div>
                           <!-- .flex-col -->
                        </div>
                        <!-- .flex-row -->
                        <div class="live-search-results text-left z-top"></div>
                     </form>
                  </aside>
                  <aside id="block_widget-2" class="widget block_widget">
                     <div class="row dv-left" id="row-412092332">
                        <div class="col small-12 large-12">
                           <div class="col-inner" style="padding:0px 0px 0px 0px;">
                              <div class="icon-box featured-box icon-box-left text-left">
                                 <div class="icon-box-img" style="width: 60px">
                                    <div class="icon">
                                       <div class="icon-inner">
                                          <img width="240" height="240" src="<?=$info['image-tip-1']?>" class="attachment-medium size-medium" alt="<?=$info['title-tip-1']?>" loading="lazy" sizes="(max-width: 240px) 100vw, 240px" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="icon-box-text last-reset">
                                    <h3 style=" margin-bottom: 5px;"><?=$info['title-tip-1']?></h3>
                                    <p><?=$info['content-tip-1']?></p>
                                 </div>
                              </div>
                              <!-- .icon-box -->
                              <div class="icon-box featured-box icon-box-left text-left">
                                 <div class="icon-box-img" style="width: 60px">
                                    <div class="icon">
                                       <div class="icon-inner">
                                          <img width="100" height="100" src="<?=$info['image-tip-2']?>" class="attachment-medium size-medium" alt="<?=$info['title-tip-2']?>" loading="lazy" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="icon-box-text last-reset">
                                    <h3 style=" margin-bottom: 5px;"><?=$info['title-tip-2']?></h3>
                                    <p><?=$info['content-tip-2']?></p>
                                 </div>
                              </div>
                              <!-- .icon-box -->
                              <div class="icon-box featured-box icon-box-left text-left">
                                 <div class="icon-box-img" style="width: 60px">
                                    <div class="icon">
                                       <div class="icon-inner">
                                          <img width="100" height="100" src="<?=$info['image-tip-3']?>" class="attachment-medium size-medium" alt="<?=$info['title-tip-3']?>" loading="lazy" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="icon-box-text last-reset">
                                    <h3 style=" margin-bottom: 5px;"><?=$info['title-tip-3']?></h3>
                                    <p><?=$info['content-tip-3']?></p>
                                 </div>
                              </div>
                              <!-- .icon-box -->
                              <div class="icon-box featured-box icon-box-left text-left">
                                 <div class="icon-box-img" style="width: 60px">
                                    <div class="icon">
                                       <div class="icon-inner">
                                          <img width="100" height="100" src="<?=$info['image-tip-4']?>" class="attachment-medium size-medium" alt="<?=$info['title-tip-4']?>" loading="lazy" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="icon-box-text last-reset">
                                    <h3 style=" margin-bottom: 5px;"><?=$info['title-tip-4']?></h3>
                                    <p><?=$info['content-tip-4']?></p>
                                 </div>
                              </div>
                              <!-- .icon-box -->
                           </div>
                        </div>
                     </div>
                  </aside>
               </ul>
            </div>
         </div>
         <div class="col medium-9 small-12 large-9">
            <div class="col-inner">
               <section class="section list-product-home" id="section_3064680">
                  <div class="bg section-bg fill bg-fill  bg-loaded">
                  </div>
                  <!-- .section-bg -->
                  <div class="section-content relative">
                     <div class="container section-title-container">
                        <h3 class="section-title section-title-bold"><b></b><span class="section-title-main red-tab">NEW PRODUCT</span><b></b></h3>
                     </div>
                     <!-- .section-title -->
                     <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-circle slider-nav-push" data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                        <?php foreach ($newProduct as $value) { ?>  
                        <div class="col">
                           <div class="col-inner">
                              <div class="badge-container absolute left top z-1">
                              </div>
                              <div class="product-small box has-hover box-normal box-text-bottom">
                                 <div class="box-image">
                                    <div class="image-zoom image-cover" style="padding-top:100%;">
                                       <a href="product/<?= $value['url'] ?>">
                                          <img width="247" height="300" src="<?= $value['image'] ?>" class="show-on-hover absolute fill hide-for-small back-image" alt="<?= $value['name'] ?>" loading="lazy" />
                                          <img width="247" height="300" src="<?= $value['image'] ?>" class="attachment-shop_catalog size-shop_catalog" alt="<?= $value['name'] ?>" loading="lazy" /> </a>
                                    </div>
                                    <div class="image-tools z-top top right show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                 </div>
                                 <!-- box-image -->
                                 <div class="box-text text-center">
                                    <div class="title-wrapper">
                                       <p class="name product-title"><a href="product/<?= $value['url'] ?>"><?= functions::textLimit($value['name'], 14) ?></a></p>
                                    </div>
                                    <div class="price-wrapper">
                                    </div>
                                    <div class="add-to-cart-button">
                                       <a href="product/<?= $value['url'] ?>" rel="nofollow" data-product_id="2437" class="ajax_add_to_cart  product_type_simple button primary is-outline mb-0 is-small">
                                       <img src="template/wp-content/uploads/2018/04/btnbuy.png" alt="Đặt mua">
                                       </a>
                                    </div>
                                 </div>
                                 <!-- box-text -->
                              </div>
                              <!-- box -->
                           </div>
                           <!-- .col-inner -->
                        </div>
                        <!-- col -->
                        <?php } ?>
                     </div>
                  </div>
                  <!-- .section-content -->
                  <style scope="scope">
                     #section_3064680 {
                        padding-top: 0px;
                        padding-bottom: 0px;
                     }
                  </style>
               </section>
               <?php 
                  $i = 1;
                  foreach ($categoryParent2 as $key => $parent) {
                  $categoryChild = $data->getProductCategoryChild($parent['id'],4);
                  ?>
                  <section class="section list-product-home" id="section_268927378">
                     <div class="bg section-bg fill bg-fill  bg-loaded">
                     </div>
                     <!-- .section-bg -->
                     <div class="section-content relative">
                        <div class="tabbed-content">
                           <ul class="nav nav-simple nav-normal nav-size-small nav-right">
                              <!-- <li class="tab active has-icon main-tab"><a href="#tab_<?=$parent['id']?>"><span><?= $parent['name'] ?></span></a></li> -->
                              <li class="tab active has-icon main-tab main-tab-<?=$i++?>">
                                 <a href="#tab_<?=$parent['id']?>">
                                    <h3 class="section-title section-title-bold">
                                       <b></b><span class="section-title-main"><?= $parent['name'] ?></span><b></b>
                                    </h3>
                                 </a>
                              </li>
                              <?php foreach ($categoryChild as $key => $value) { ?>
                                 <li class="tab has-icon"><a href="#tab_<?=$value['id']?>"><span><?=$value['name']?></span></a></li>
                              <?php }?>
                           </ul>
                           <div class="tab-panels">
                              <div class="panel active entry-content" id="tab_<?=$parent['id']?>">
                                 <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-circle slider-nav-push" data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                    <?php 
                                    $productList = $data->getProductCategory(1, $parent['id'], 0, 8);
                                    foreach ($productList as $value) { ?>  
                                    <div class="col">
                                       <div class="col-inner">
                                          <div class="badge-container absolute left top z-1">
                                          </div>
                                          <div class="product-small box has-hover box-normal box-text-bottom">
                                             <div class="box-image">
                                                <div class="image-zoom image-cover" style="padding-top:100%;">
                                                   <a href="product/<?= $value['url'] ?>">
                                                      <img width="247" height="300" src="<?= $value['image'] ?>" class="show-on-hover absolute fill hide-for-small back-image" alt="<?= $value['name'] ?>" loading="lazy" />
                                                      <img width="247" height="300" src="<?= $value['image'] ?>" class="attachment-shop_catalog size-shop_catalog" alt="<?= $value['name'] ?>" loading="lazy" /> </a>
                                                </div>
                                                <div class="image-tools z-top top right show-on-hover">
                                                </div>
                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                </div>
                                             </div>
                                             <!-- box-image -->
                                             <div class="box-text text-center">
                                                <div class="title-wrapper">
                                                   <p class="name product-title"><a href="product/<?= $value['url'] ?>"><?= functions::textLimit($value['name'], 14) ?></a></p>
                                                </div>
                                                <div class="price-wrapper">
                                                </div>
                                                <div class="add-to-cart-button">
                                                   <a href="product/<?= $value['url'] ?>" rel="nofollow" data-product_id="2437" class="ajax_add_to_cart  product_type_simple button primary is-outline mb-0 is-small">
                                                   <img src="template/wp-content/uploads/2018/04/btnbuy.png" alt="Đặt mua">
                                                   </a>
                                                </div>
                                             </div>
                                             <!-- box-text -->
                                          </div>
                                          <!-- box -->
                                       </div>
                                       <!-- .col-inner -->
                                    </div>
                                    <!-- col -->
                                    <?php } ?>
                                 </div>
                              </div>
                              <?php foreach ($categoryChild as $key => $child) { ?>
                                 <div class="panel entry-content" id="tab_<?=$child['id']?>">
                                    <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-circle slider-nav-push" data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                       <?php 
                                       $productList = $data->getProductCategory(1, $child['id'], 0, 8);
                                       foreach ($productList as $value) { ?>  
                                       <div class="col">
                                          <div class="col-inner">
                                             <div class="badge-container absolute left top z-1">
                                             </div>
                                             <div class="product-small box has-hover box-normal box-text-bottom">
                                                <div class="box-image">
                                                   <div class="image-zoom image-cover" style="padding-top:100%;">
                                                      <a href="product/<?= $value['url'] ?>">
                                                         <img width="247" height="300" src="<?= $value['image'] ?>" class="show-on-hover absolute fill hide-for-small back-image" alt="<?= $value['name'] ?>" loading="lazy" />
                                                         <img width="247" height="300" src="<?= $value['image'] ?>" class="attachment-shop_catalog size-shop_catalog" alt="<?= $value['name'] ?>" loading="lazy" /> </a>
                                                   </div>
                                                   <div class="image-tools z-top top right show-on-hover">
                                                   </div>
                                                   <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                   </div>
                                                </div>
                                                <!-- box-image -->
                                                <div class="box-text text-center">
                                                   <div class="title-wrapper">
                                                      <p class="name product-title"><a href="product/<?= $value['url'] ?>"><?= functions::textLimit($value['name'], 14) ?></a></p>
                                                   </div>
                                                   <div class="price-wrapper">
                                                   </div>
                                                   <div class="add-to-cart-button">
                                                      <a href="product/<?= $value['url'] ?>" rel="nofollow" data-product_id="2437" class="ajax_add_to_cart  product_type_simple button primary is-outline mb-0 is-small">
                                                         <img src="template/wp-content/uploads/2018/04/btnbuy.png" alt="Đặt mua">
                                                      </a>
                                                   </div>
                                                </div>
                                                <!-- box-text -->
                                             </div>
                                             <!-- box -->
                                          </div>
                                          <!-- .col-inner -->
                                       </div>
                                       <!-- col -->
                                       <?php } ?>
                                    </div>
                                 </div>
                              <?php }?>
                           </div>
                        </div>
                     </div>
                     <!-- .section-content -->
                  </section>
               <?php } ?>
            </div>
         </div>

         <style scope="scope">

         </style>
      </div>
      <section class="section" id="section_1852699846">
         <div class="bg section-bg fill bg-fill  bg-loaded">
            <div class="is-border" style="border-width:1px 0px 0px 0px;">
            </div>

         </div>
         <!-- .section-bg -->

         <div class="section-content relative">
            <div class="row" id="row-2020620564">
               <div class="col small-12 large-12">
                  <div class="col-inner" style="margin:0px 0px -40px 0px;">
                     <div class="slider-wrapper relative " id="slider-129476263">
                        <div class="slider slider-nav-simple slider-nav-large slider-nav-dark slider-nav-outside slider-style-normal slider-show-nav" data-flickity-options='{
            "cellAlign": "center",
            "imagesLoaded": true,
            "lazyLoad": 1,
            "freeScroll": true,
            "wrapAround": true,
            "autoPlay": 6000,
            "pauseAutoPlayOnHover" : true,
            "prevNextButtons": true,
            "contain" : true,
            "adaptiveHeight" : true,
            "dragThreshold" : 5,
            "percentPosition": true,
            "pageDots": false,
            "rightToLeft": false,
            "draggable": true,
            "selectedAttraction": 0.1,
            "parallax" : 0,
            "friction": 0.6        }'>
                        <?php foreach($doitac as $itemDoiTac) {?>
                           <div class="ux-logo has-hover align-middle ux_logo inline-block" style="max-width: 100%!important; width: 194.81012658228px!important">
                              <div class="ux-logo-link block image-" title="" target="_self" href="#" style="padding: 15px;"><img src="<?=$itemDoiTac['hinh_anh']?>" title="<?=$itemDoiTac['ten']?>" alt="<?=$itemDoiTac['ten']?>" class="ux-logo-image block" style="height:60px;" /></div>
                           </div>
                           <?php } ?>
                        </div>
                        <div class="loading-spin dark large centered"></div>
                        <style scope="scope">
                        </style>
                     </div>
                     <!-- .ux-slider-wrapper -->
                  </div>
               </div>
            </div>
         </div>
         <!-- .section-content -->


         <style scope="scope">
            #section_1852699846 {
               padding-top: 0px;
               padding-bottom: 0px;
               background-color: rgb(255, 255, 255);
            }
         </style>
      </section>
   </div>

</main>
<!-- #main -->