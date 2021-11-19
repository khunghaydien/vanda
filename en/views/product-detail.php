<?php
$categoryParent = $data->getProductCategoryParent(1000);
// $featuredProduct = $data->featuredAllProduct(3);
$relatedProduct = $data->relatedProduct($page['data']['id'], $page['data']['category'], 8);
$newProduct = $data->getNewProduct(5);
?>

<main id="main" class="">
	<div class="blog-wrapper blog-archive page-wrapper">
		<div class="container">
			<div class="woocommerce-notices-wrapper"></div>
		</div>
		<!-- /.container -->
		<div id="product-2142" class="post-2142 product type-product status-publish has-post-thumbnail product_cat-yamaha product_tag-kw1-m229k-00x product_tag-yamaha-cl-1216mm-spring first instock shipping-taxable product-type-simple">
			<div class="product-main">
				<!-- <div class="row content-row row-divided row-large row-reverse"> -->
				<div class="row row-large row-divided">
					<div class="post-sidebar large-3 col">
						<div id="secondary" class="widget-area " role="complementary">
							<aside id="woocommerce_product_categories-3" class="widget woocommerce widget_product_categories"><span class="widget-title">PRODUCT PORTFOLIO</span>
								<div class="is-divider small"></div>
								<ul class="product-categories">
									<?php foreach ($categoryParent as $key => $parent) {
										$categoryChild = $data->getProductCategoryChild($parent['id'],1000);
										if (count($categoryChild) > 0) { ?>
											<li class="cat-item cat-item-431 cat-parent">
												<a href="product/1/<?= $parent['url'] ?>">
													<?= $parent['name'] ?>
												</a>
												<ul class='children'>
													<?php foreach ($categoryChild as $key => $value) {
														echo '<li class="cat-item cat-item-432"><a href="product/1/' . $value['url'] . '">' . $value['name'] . '</a></li>';
													} ?>

												</ul>
											</li>
										<?php } else { ?>
											<li class="cat-item cat-item-438">
												<a href="product/1/<?= $parent['url'] ?>">
													<?= $parent['name'] ?>
												</a>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							</aside>
							<aside id="woocommerce_products-5" class="widget woocommerce widget_products"><span class="widget-title "><span>Latest product</span></span>
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
						</div>
						<!-- #secondary -->
					</div>
					<!-- .post-sidebar -->
					<div class="large-9 col medium-col-first">
						<div class="row">
							<div class="large-6 col">
								<div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
									<div class="badge-container is-larger absolute left top z-1">
									</div>
									<div class="image-tools absolute top show-on-hover right z-3">
									</div>
									<figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half" data-flickity-options='{
                "cellAlign": "center",
                "wrapAround": true,
                "autoPlay": false,
                "prevNextButtons":true,
                "adaptiveHeight": true,
                "imagesLoaded": true,
                "lazyLoad": 1,
                "dragThreshold" : 15,
                "pageDots": false,
                "rightToLeft": false       }'>
										<?php foreach ($page['productPicture'] as $value) { ?>
											<div data-thumb="<?= $value['link'] ?>" class="first slide woocommerce-product-gallery__image">
												<a href="<?= $value['link'] ?>">
													<img width="480" height="480" src="<?= $value['link'] ?>" class="attachment-shop_single size-shop_single wp-post-image" alt="" loading="lazy" title="<?= $page['data']['name'] ?>" data-caption="" data-src="https://smtparts.vn/wp-content/uploads/2016/04/Yamaha-spring-K87-M239P-00X-CN.jpg" data-large_image="<?= $value['link'] ?>" data-large_image_width="480" data-large_image_height="480" sizes="(max-width: 480px) 100vw, 480px" />
												</a>
											</div>
										<?php } ?>
									</figure>

									<div class="image-tools absolute bottom left z-3">
										<a href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small" title="Zoom">
											<i class="icon-expand"></i> </a>
									</div>
								</div>
								<div class="product-thumbnails thumbnails slider-no-arrows slider row row-small row-slider slider-nav-small small-columns-4" data-flickity-options='{
              "cellAlign": "left",
              "wrapAround": false,
              "autoPlay": false,
              "prevNextButtons":true,
              "asNavFor": ".product-gallery-slider",
              "percentPosition": true,
              "imagesLoaded": true,
              "pageDots": false,
              "rightToLeft": false,
              "contain": true
          }'>
									<?php foreach ($page['productPicture'] as $value) { ?>
										<div class="col is-nav-selected first">
											<a><img width="100" height="100" src="<?= $value['link'] ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" loading="lazy" sizes="(max-width: 100px) 100vw, 100px" /></a>
										</div>
									<?php } ?>
								</div>
								<!-- .product-thumbnails -->
							</div>

							<div class="product-info summary entry-summary col col-fit product-summary">
								<nav class="woocommerce-breadcrumb breadcrumbs"><a href="<?= HOME ?>">Home</a> <span class="divider">&#47;</span>
									<a href="product">Product</a> <span class="divider">&#47;</span>
									<a href="product/1/<?= $page['data']['danhmucurl'] ?>"><?= $page['data']['danhmuc'] ?></a>
								</nav>
								<h1 class="product-title entry-title"><?= $page['data']['name'] ?></h1>
								<div class="is-divider small"></div>
								<div class="price-wrapper">
									<p class="price product-page-price ">
									</p>
								</div>
								<div class="product-short-description">
									<h5>
										<div style="display: flex; width: 100%;">
											<div style="width: 50%;" >
												<div>Model: </div>
											</div>
											<div style="padding-left: 10px; width: 50%;">
												<div><?= $page['data']['code'] ?></div>
											</div>
										</div>
										<div style="display: flex; width: 100%;">
											<div style="width: 50%;" >
												<?php foreach ($page['productPropertiesName'] as $value) { ?>
													<div><?= $value['name'] ?>: </div>
												<?php } ?>
											</div>
											<div style="padding-left: 10px; width: 50%;">
												<?php foreach ($page['productPropertiesDetail'] as $value) { ?>
													<div><?= $value['value'] ?></div>
												<?php } ?>
											</div>
										</div>
									</h5>
								</div>
								<div class="full-bnt">
									<div class="nut-lien-he" style="margin-bottom : 10px;">
										<a href="#live_chat" class="modal_trigger pps-btn-img fancybox" title="Contact" 7>
											<h3 style="margin-bottom:0;color:#fff !important;">
												<i class="fa fa-cart-plus" style="display: inline-block; font: normal normal normal 14px/1 FontAwesome; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; transform: translate(0, 0);"></i>
												<span style="padding-left:10px;">QUICK BOOKING</span>
											</h3>
										</a>
									</div>
									<div class="fancybox-hidden" style="display: none;">
										<div id="live_chat" style="max-width: 488px; text-align: CENTER;">
											<div style="color:#03A9F4;font-size: 26px;margin: 16px;font-weight: bold;background: #023994 !important;">
											QUICK BOOKING</div>
											<p style="font-style: italic;">We will get back to you as soon as possible</p>
											<div role="form" class="wpcf7" id="wpcf7-f2655-p2142-o1" lang="vi" dir="ltr">
												<div class="screen-reader-response">
													<p role="status" aria-live="polite" aria-atomic="true"></p>
													<ul></ul>
												</div>
												<form onsubmit="event.preventDefault();" class="wpcf7-form init" novalidate="novalidate" data-status="init">
													<div class="contact-form-view">
														<div class="contact-form-left">
															<div class="txt-01">
																<span class="wpcf7-form-control-wrap"><input type="text" id="txtDatHangName" name="txtDatHangName" value="" size="40" class="wpcf7-form-control wpcf7-text mb-0" aria-invalid="false" placeholder="Full name" /></span> 
																<small id="spanDatHangName" style="min-height: 10px; color:red; padding-bottom: 10px;"></small>
															</div>
															<div class="txt-01">
																<span class="wpcf7-form-control-wrap "><input type="tel" id="txtDatHangPhone" name="txtDatHangPhone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel mb-0" aria-required="true" aria-invalid="false" placeholder="Phone number" /></span>
																<small id="spanDatHangPhone" style="min-height: 10px; color:red; padding-bottom: 10px;"></small>
															</div>
														</div>
														<div class="contact-form-right">
															<div class="txt-01">
																<span class="wpcf7-form-control-wrap "><input type="email" id="txtDatHangEmail" name="txtDatHangEmail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email mb-0" aria-invalid="false" placeholder="Email" /></span> 
																<small id="spanDatHangEmail" style="min-height: 10px; color:red; padding-bottom: 10px;"></small>
															</div>
															<div class="txt-01">
																<span class="wpcf7-form-control-wrap "><input type="text" id="txtDatHangAddress" name="txtDatHangAddress" value="" size="40" class="wpcf7-form-control wpcf7-text mb-0" aria-invalid="false" placeholder="Address" /></span> 
																<small id="spanDatHangAddress" style="min-height: 10px; color:red; padding-bottom: 10px;"></small>
															</div>
														</div>
														<input type="hidden" id="txtDatHangIDProduct" name="txtDatHangIDProduct" value="<?= $page['data']['id'] ?>" >
														<div class="txt-03"><input onclick="datHangSubmit()" type="submit" value="Send information"/></div>
													</div>
													<div class="wpcf7-response-output" aria-hidden="true"></div>
												</form>
											</div>
										</div>
									</div>
									<div style="margin : 10px;">
										<div class="social-icons share-icons share-row relative icon-style-fill ">
											<a href="http://www.facebook.com/sharer.php?u=<?= HOME . '/' . $thisUrl ?>" data-label="Facebook" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="nofollow" target="_blank" class="icon primary button circle tooltip facebook" title="Share on Facebook"><i class="icon-facebook"></i></a>
											<a href="http://twitter.com/share?url=<?= HOME . '/' . $thisUrl ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="nofollow" target="_blank" class="icon primary button circle tooltip twitter" title="Share on Twitter"><i class="icon-twitter"></i></a>
											<a href="http://plus.google.com/share?url=<?= HOME . '/' . $thisUrl ?>" target="_blank" class="icon primary button circle tooltip google-plus" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="nofollow" title="Share on Google+"><i class="icon-google-plus"></i></a>
										</div>
									</div>

								</div>
								<aside class="promo-online">
									<b>
										<i class="fa fa-mobile" aria-hidden="true"></i>CALL NOW FOR BEST PRICE</b>
									<span class="" data-id="365501">
										<p><sub class="icondetail-check"></sub> Hotline 1 : <a href="tel:<?= $info['dien-thoai'] ?>" style="color:red;"><?php echo functions::convertPhone($info['dien-thoai']); ?></a></p>
										<p><sub class="icondetail-check"></sub> Hotline 2 : <a href="tel:<?= $info['dien-thoai-2'] ?>" style="color:red;"><?php echo functions::convertPhone($info['dien-thoai-2']); ?></a></p>
									</span>
								</aside>
								<div class="product_meta">



									<span class="posted_in">Category: <a href="product/1/<?= $page['data']['danhmucurl'] ?>" rel="tag"><?= $page['data']['danhmuc'] ?></a></span>
									<?php if ($page['data']['tag'] != "") { ?>
										<span class="tagged_as">Tag: <?= $page['data']['tag'] ?></span>
									<?php } ?>

								</div>


							</div>
							<!-- .summary -->


						</div>
						<!-- .row -->
						<div class="product-footer">
							<div class="woocommerce-tabs container tabbed-content">
								<ul class="product-tabs  nav small-nav-collapse tabs nav nav-uppercase nav-tabs nav-normal nav-left">
									<li class="description_tab  active">
										<a href="#tab-description">Specifications</a>
									</li>
								</ul>
								<div class="tab-panels">
									<div class="panel entry-content active" id="tab-description">
										<?= $page['data']['description'] ?>
									</div>

								</div>
								<!-- .tab-panels -->
							</div>
							<div class="woocommerce-tabs container tabbed-content">
								<div class="tab-panels">
									<div class="panel entry-content active" id="tab-description">
										<div class="fb-comments" data-href="<?= HOME . '/' . $thisUrl ?>" data-width="100%" data-numposts="5"></div>
									</div>

								</div>
								<!-- .tab-panels -->
							</div>
							<!-- .tabbed-content -->

							<?php if(count($relatedProduct) > 0){ ?>
								<div class="related related-products-wrapper product-section">

								<h3 class="product-section-title container product-section-title-related pt-half pb-half uppercase">Related products </h3>
								<div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push" data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
									<?php foreach ($relatedProduct as $value) { ?>
									<div class="product-small col has-hover post-2204 product type-product status-publish has-post-thumbnail product_cat-yamaha product_tag-yg100-io-head-board-assy  instock shipping-taxable product-type-simple">
										<div class="col-inner">
											<div class="badge-container absolute left top z-1">
											</div>
											<div class="product-small box ">
												<div class="box-image">
													<div class="image-fade_in_back">
														<a href="product/<?=$value['url']?>">
															<img width="247" height="300" src="<?=$value['image']?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="<?=$value['name']?>" loading="lazy" />
															<img width="247" height="300" src="<?=$value['image']?>" class="show-on-hover absolute fill hide-for-small back-image" alt="<?=$value['name']?>" loading="lazy" /> </a>
													</div>
													<div class="image-tools is-small top right show-on-hover">
													</div>
													<div class="image-tools is-small hide-for-small bottom left show-on-hover">
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
							<?php } ?>
						</div>

					</div>
					<!-- col large-9 -->

				</div>
				<!-- .row -->
			</div>
			<!-- .product-main -->
		</div>
	</div>
	<!-- shop container -->

</main>
<!-- #main -->