<?php
$keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : "";
$categoryParent = $data->getProductCategoryParent(1000);
$productsSearch = $data->getProductSearch($keyword);
$total = count($productsSearch);
$sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 0;
$currentPage = isset($_GET['p']) ? $_GET['p'] : 1;
$limit = 12;
$from = ($currentPage - 1) * $limit + 1;
$end = ($currentPage*$limit > $total)? $total:$currentPage*$limit;
$pages = ceil($total / $limit);
$productList = $data->getAllProductSearch($currentPage, $keyword, $sort, $limit);
$newProduct = $data->getNewProduct(5);
?>
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-large">
                <nav class="woocommerce-breadcrumb breadcrumbs"><a href="<?= HOME ?>">Home</a> <span class="divider">&#47;</span> Search product</nav>
            </div>
        </div><!-- .flex-left -->
        <div class="flex-col medium-text-center">
            <p class="woocommerce-result-count hide-for-medium">
                Showing <?= $from.'&ndash;'.$end ?> of <?=$total?> products</p>
            <div class="woocommerce-ordering" method="get">
                <select onchange="changeSortProduct(this.value, <?=$currentPage?>)" >
                    <option <?php if($sort == 0) echo 'selected'; ?> value="0" selected='selected'>Latest</option>
                    <option <?php if($sort == 1) echo 'selected'; ?> value="1">Order by name A - Z</option>
                    <option <?php if($sort == 2) echo 'selected'; ?> value="2">Order by name Z - A</option>
                </select>
            </div>
        </div><!-- .flex-right -->
    </div><!-- flex-row -->
</div><!-- .page-title -->
<main id="main" class="">
    <div id="content" class="blog-wrapper blog-archive page-wrapper">
        <div class="row row-large row-divided ">
            <div class="post-sidebar large-3 col">
                <div id="secondary" class="widget-area " role="complementary">
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
                </div><!-- #secondary -->
            </div><!-- .post-sidebar -->

            <div class="large-9 col medium-col-first pt-0">
                <div class="shop-container">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights">
                        <?php if(count($productList) >0){
                            foreach ($productList as $product) {?>
                            <div class="product-small col has-hover post-2531 product type-product status-publish has-post-thumbnail product_cat-automatic-isertion-spare-parts product_cat-panasonic-automatic-isertion-spare-parts product_tag-n210157714aa first instock shipping-taxable product-type-simple">
                            <div class="col-inner">
                                <div class="badge-container absolute left top z-1">
                                </div>
                                <div class="product-small box ">
                                    <div class="box-image">
                                        <div class="image-fade_in_back">
                                            <a href="product/<?=$product['url']?>">
                                                <img width="247" height="300" src="<?=$product['image']?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="<?=$product['name']?>" loading="lazy" /> </a>
                                        </div>
                                        <div class="image-tools is-small top right show-on-hover">
                                        </div>
                                        <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                        </div>
                                        <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                        </div>
                                    </div><!-- box-image -->

                                    <div class="box-text box-text-products text-center grid-style-2">
                                        <div class="title-wrapper">
                                            <p class="name product-title"><a href="product/<?=$product['url']?>"><?=$product['name']?></a></p>
                                        </div>
                                        <div class="price-wrapper">
                                        </div>
                                        <div class="add-to-cart-button"><a href="product/<?=$product['url']?>" rel="nofollow" data-product_id="2531" class="ajax_add_to_cart  product_type_simple button primary is-outline mb-0 is-small">Đọc tiếp</a></div>
                                    </div><!-- box-text -->
                                </div><!-- box -->
                            </div><!-- .col-inner -->
                        </div><!-- col -->
                        <?php }}else { ?>
                            <div class="text-center">
                                <h3>No product found!</h3>
                            </div>
                        <?php }?>
                    </div><!-- row -->
                    <div class="container">
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers nav-pagination links text-center">
                                <?php
                                if ($currentPage > 1 && $pages > 1)
                                    echo '<li><a class="page-number" href="product?p=1&sort='.$sort.'"><<</a></li>';
                                if ($currentPage > 1 && $pages > 1)
                                    echo '<li><a class="page-number" href="product?p=' . ($currentPage - 1) . '&sort='.$sort.'"><</a></li>';
                                if ($currentPage > 3)
                                    echo '<li><a class="page-number" href="product?p=1&sort='.$sort.'">1</a></li>';
                                if ($currentPage > 4)
                                    echo '<li><a class="page-number">...</a></li>';
                                for ($i = 1; $i <= $pages; $i++) {
                                    if ($i >= $currentPage - 2 && $i <= $currentPage + 2) {
                                        if ($i == $currentPage) {
                                            echo '<li><span aria-current="page" class="page-number current">' . $i . '</span></li>';
                                        } else {
                                            echo '<li><a class="page-number" href="product?p=' . $i . '&sort='.$sort.'">' . $i . '</a></li>';
                                        }
                                    }
                                }
                                if ($currentPage < $pages - 3)
                                    echo '<li><a class="page-number">...</a></li>';
                                if ($currentPage < $pages - 2)
                                    echo '<li><a class="page-number" href="product?p=' . ($pages) . '&sort='.$sort.'">' . ($pages) . '</a></li>';
                                if ($currentPage < $pages)
                                    echo '<li><a class="next page-number" href="product?p=' . ($currentPage + 1) . '&sort='.$sort.'">></a></li>';
                                if ($currentPage < $pages)
                                    echo '<li><a class="next page-number" href="product?p=' . ($pages) . '&sort='.$sort.'">>></a></li>';
                                ?>
                            </ul>
                        </nav>
                    </div>


                </div><!-- shop container -->
            </div>
        </div>

</main><!-- #main -->