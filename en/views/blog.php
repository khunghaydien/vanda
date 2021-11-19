<?php
$categoryParent = $data->getBlogCategoryParent();
$total = count($page['data']);
$currentPage = isset($_GET['p']) ? $_GET['p'] : 1;
$pages = ceil($total / 6);
$allBlog = $data->getAllBlog($currentPage, 6);
$newBlog = $data->getNewBlog(5);
?>
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-large">
                <nav class="woocommerce-breadcrumb breadcrumbs"><a href="<?= HOME ?>">Home</a> <span class="divider">&#47;</span> NEWS</nav>
            </div>
        </div><!-- .flex-left -->
    </div><!-- flex-row -->
</div><!-- .page-title -->
<main id="main" class="">
    <div id="content" class="blog-wrapper blog-archive page-wrapper">
        <div class="row row-large row-divided ">
            <div class="post-sidebar large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
                    <aside id="woocommerce_product_categories-3" class="widget woocommerce widget_product_categories"><span class="widget-title "><span>NEWS CATEGORY</span></span>
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
                    <aside id="woocommerce_products-5" class="widget woocommerce widget_products"><span class="widget-title "><span>Latest news</span></span>
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
                   
                    <aside id="text-3" class="widget widget_text"><span class="widget-title "><span>REGISTER FOR PRICE</span></span>
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
                <div class="row large-columns-1 medium-columns- small-columns-1">
                    <?php
                    if (count($allBlog) > 0) {
                        foreach ($allBlog as $blog) { ?>
                            <div class="col post-item">
                                <div class="col-inner post-item-col-1">
                                    <a href="blog/<?= $blog['url'] ?>" class="plain">
                                        <div class="box box-vertical box-text-bottom box-blog-post has-hover">
                                            <div class="box-image" style="width:40%;">
                                                <div class="image-cover" style="padding-top:56%;">
                                                    <img width="388" height="335" src="<?= $blog['avatar'] ?>" sizes="(max-width: 388px) 100vw, 388px" alt="<?= $blog['title'] ?>" />
                                                </div>
                                            </div><!-- .box-image -->
                                            <div class="box-text text-left">
                                                <div class="box-text-inner blog-post-inner">
                                                    <h5 class="post-title is-large "><?= functions::textLimit($blog['title'], 20) ?></h5>
                                                    <div class="is-divider"></div>
                                                    <p class="from_the_blog_excerpt "><?= functions::textLimit(strip_tags($blog['description']), 30) ?></p>
                                                    <div class="info-blog-meta">
                                                        <span class="blog-details-author"><i class="fa fa-user"></i> <?= $blog['author'] ?></span> -
                                                        <span class="blog-details-time"><i class="fa fa-calendar"></i> <?= $blog['updated'] ?></span>
                                                    </div>
                                                </div><!-- .box-text-inner -->
                                            </div><!-- .box-text -->
                                        </div><!-- .box -->
                                    </a><!-- .link -->
                                </div><!-- .col-inner -->
                            </div><!-- .col -->
                        <?php }
                    } else { ?>
                        <h4 class="col-md-12 text-center">
                            No posts found !
                        </h4>
                    <?php } ?>
                    <div class="container">
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers nav-pagination links text-center">
                                <?php
                                if ($currentPage > 1 && $pages > 1)
                                    echo '<li><a class="page-number" href="blog?p=1"><<</a></li>';
                                if ($currentPage > 1 && $pages > 1)
                                    echo '<li><a class="page-number" href="blog?p=' . ($currentPage - 1) . '"><</a></li>';
                                if ($currentPage > 3)
                                    echo '<li><a class="page-number" href="blog?p=1">1</a></li>';
                                if ($currentPage > 4)
                                    echo '<li><a class="page-number">...</a></li>';
                                for ($i = 1; $i <= $pages; $i++) {
                                    if ($i >= $currentPage - 2 && $i <= $currentPage + 2) {
                                        if ($i == $currentPage) {
                                            echo '<li><span aria-current="page" class="page-number current">' . $i . '</span></li>';
                                        } else {
                                            echo '<li><a class="page-number" href="blog?p=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }
                                }
                                if ($currentPage < $pages - 3)
                                    echo '<li><a class="page-number">...</a></li>';
                                if ($currentPage < $pages - 2)
                                    echo '<li><a class="page-number" href="blog?p=' . ($pages) . '">' . ($pages) . '</a></li>';
                                if ($currentPage < $pages)
                                    echo '<li><a class="next page-number" href="blog?p=' . ($currentPage + 1) . '">></a></li>';
                                if ($currentPage < $pages)
                                    echo '<li><a class="next page-number" href="blog?p=' . ($pages) . '">>></a></li>';
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- <div class="pagination-block text-center">
                    <ul class="pagination">
                        
                    </ul>
                </div> -->

            </div> <!-- .large-9 -->

        </div><!-- .row -->

    </div><!-- .page-wrapper .blog-wrapper -->


</main><!-- #main -->