<?php
$categoryParent = $data->getBlogCategoryParent();
$newBlog = $data->getNewBlog(5);
?>
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-large">
                <nav class="woocommerce-breadcrumb breadcrumbs">
                    <a href="<?= HOME ?>">Trang chủ</a> 
                    <span class="divider">&#47;</span> 
                    <a href="<?= HOME."/blog" ?>">Tin tức</a> 
                    <span class="divider">&#47;</span> 
                    <?=$page["title"]?>
                </nav>
            </div>
        </div><!-- .flex-left -->
    </div><!-- flex-row -->
</div><!-- .page-title -->
<main id="main" class="">
    <div id="content" class="blog-wrapper blog-archive page-wrapper">
        <div class="row row-large row-divided ">
            <div class="post-sidebar large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
                    <aside id="woocommerce_product_categories-3" class="widget woocommerce widget_product_categories"><span class="widget-title "><span>Danh mục tin tức</span></span>
                        <div class="is-divider small"></div>
                        <ul class="product-categories">
                            <?php foreach ($categoryParent as $key => $parent) {
                                $categoryChild = $data->getBlogCategoryChild($parent['id']);
                                if (count($categoryChild) > 0) { ?>
                                    <li><input type="checkbox" checked="checked" id="item-<?= $key ?>" /><label for="item-<?= $key ?>"><?= $parent['name'] ?></label>
                                        <ul>
                                            <li class="cat-item cat-item-431 cat-parent"><a href="blog/1/<?= $parent['url'] ?>"><?= $parent['name'] ?></a>
                                                <ul class='children'>
                                                    <?php foreach ($categoryChild as $key => $value) {
                                                        echo '<li class="cat-item cat-item-432"><a href="blog/1/' . $value['url'] . '">' . $value['name'] . '</a></li>';
                                                    } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } else { ?>
                                    <li class="cat-item cat-item-434"><a href="blog/1/<?= $parent['url'] ?>"><?= $parent['name'] ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </aside>
                    <aside id="woocommerce_products-5" class="widget woocommerce widget_products"><span class="widget-title "><span>Tin tức mới nhất</span></span>
                        <div class="is-divider small"></div>
                        <ul class="product_list_widget">
                            <?php foreach ($newBlog as $value) { ?>
                                <li>
                                    <a href="blog/<?= $value['url'] ?>">
                                        <img width="247" height="300" src="<?= $value['avatar'] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="<?= $value['title'] ?>" loading="lazy" />
                                        <span class="product-title"><?= functions::textLimit($value['title'], 14) ?></span> <br>
                                        <small><i class="fa fa-user"></i> <?= $value['author'] ?> - <i class="fa fa-calendar"></i> <?= $value['updated'] ?></small>
                                    </a>
                                <?php } ?>
                                </li>
                        </ul>
                    </aside>
                    <aside id="text-3" class="widget widget_text"><span class="widget-title "><span>ĐĂNG KÝ BÁO GIÁ</span></span>
                        <div class="is-divider small"></div>
                        <div class="textwidget">
                            <div class="contact-home"><em>Đăng ký nhận báo giá nhanh nhất</em></p>
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
                                                        <input type="text" id="txtBaoGiaName" name="txtBaoGiaName" value="" size="40" class="wpcf7-form-control wpcf7-text mb-0" aria-invalid="false" placeholder="Họ tên" />
                                                        <small id="spanBaoGiaName" style="min-height: 10px; color:red;"></small>
                                                    </span>
                                                </div>
                                                <div class="txt-01">
                                                    <span class="wpcf7-form-control-wrap">
                                                        <input type="text" id="txtBaoGiaPhone" name="txtBaoGiaPhone" value="" size="40" class="wpcf7-form-control wpcf7-text mb-0" aria-invalid="false" placeholder="Số điện thoại" />
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
                                                <input type="submit" onclick="baoGiaSubmit()" value="Gửi thông tin" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                </div><!-- #secondary -->
            </div><!-- .post-sidebar -->

            <div class="large-9 col medium-col-first">
                <article id="post-2127" class="post-2127 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc tag-cong-nghiep-dien-tu tag-dien-tu">
                    <div class="article-inner ">
                        <header class="entry-header">
                            <div class="entry-header-text entry-header-text-top text-center">
                                <h1 class="entry-title"><?= $page['data']['title'] ?></h1>
                            </div><!-- .entry-header -->
                            <div class="entry-image relative">
                                <a>
                                    <img width="534" height="324" src="<?= $page['data']['avatar'] ?>" class="attachment-large size-large wp-post-image" alt="" loading="lazy" srcset="<?= $page['data']['avatar'] ?>" sizes="(max-width: 534px) 100vw, 534px">
                                </a>
                                <div class="badge absolute top post-date badge-outline">
                                    <div class="badge-inner">
                                        <span class="post-date-day"><?= $page['data']['updated'] ?></span><br>
                                        <!-- <span class="post-date-month is-small">Th5</span> -->
                                    </div>
                                </div>
                            </div><!-- .entry-image -->
                        </header><!-- post-header -->
                        <div class="entry-content single-page">
                            <div>
                                <?= $page['data']['description'] ?>
                            </div>
                            <div>
                                <?= $page['data']['content'] ?>
                            </div>
                        </div><!-- .entry-content2 -->
                    </div><!-- .article-inner -->
                </article><!-- #-2127 -->
                <div id="comments" class="comments-area">
                    <div id="respond" class="comment-respond">
                        <div class="fb-comments" data-href="<?= HOME . '/' . $thisUrl ?>" data-width="100%" data-numposts="5"></div>
                    </div><!-- #respond -->

                </div><!-- #comments -->
            </div><!-- .large-9 -->

        </div><!-- .row -->

    </div><!-- .page-wrapper .blog-wrapper -->


</main><!-- #main -->