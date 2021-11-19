<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $num = (isset($_POST['num']) && $_POST['num'] > 0) ? $_POST['num'] : 1;
    $sanpham = $data->getsanphamcart($id);
    if (!isset($_SESSION['cart'])) {
        $cart = array();
        $cart[$id] = array(
            'id' => $sanpham['id'],
            'ma_sp' => $sanpham['ma_sp'],
            'name' => $sanpham['name'],
            'name_en' => $sanpham['name_en'],
            'url' => $sanpham['url'],
            'hinhanh' => $sanpham['hinh_anh'],
            'num' => $num
        );
    } else {
        $cart = $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                'id' => $sanpham['id'],
                'ma_sp' => $sanpham['ma_sp'],
                'name' => $sanpham['name'],
                'name_en' => $sanpham['name_en'],
                'url' => $sanpham['url'],
                'hinhanh' => $sanpham['hinh_anh'],
                'num' => (int)$cart[$id]['num'] + $num
            );
        } else {
            $cart[$id] = array(
                'id' => $sanpham['id'],
                'ma_sp' => $sanpham['ma_sp'],
                'name' => $sanpham['name'],
                'name_en' => $sanpham['name_en'],
                'url' => $sanpham['url'],
                'hinhanh' => $sanpham['hinh_anh'],
                'num' => $num
            );
        }
    }
    $_SESSION['cart'] = $cart;
}
if (isset($_SESSION['cart'])) {
    $_SESSION['cart'] = $_SESSION['cart'];
} else {
    $_SESSION['cart'] = array();
}
$banner6 = $data->getbanner6();
?>

<link rel="stylesheet" href="template/css/cart.css">
<div class="content_inner">
    <div class="banner-page">
        <?php if (count($banner6) > 0) ?>
        <img src="<?= $banner6[0]['hinh_anh'] ?>" alt="<?= $banner6[0]['name'] ?>">
    </div>
</div>
<div class="shopping-cart">
    <div class="container">
        <div class="row">
            <div id="content" class="col-sm-12 col-xs-12 col-md-12">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h5><b>
                                    <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Cart';
                                    else echo 'Đơn đặt hàng'; ?>
                                </b></h5>
                        </div>
                        <div class="col align-self-center text-right text-muted"><?= count($_SESSION['cart']) ?> <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'product';
                                                                                                                    else echo 'sản phẩm'; ?></div>
                    </div>
                </div>
                <?php
                if (count($_SESSION['cart']) > 0) { ?>
                    <div class="table-responsive table-cart-content cart-table">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <td class="text-center">
                                        <strong>
                                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Image';
                                            else echo 'Ảnh'; ?>
                                        </strong>
                                    </td>
                                    <td class="text-center">
                                        <strong>
                                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Product ID';
                                            else echo 'Mã sản phẩm'; ?>
                                        </strong>
                                    </td>
                                    <td class="text-center">
                                        <strong>
                                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Product';
                                            else echo 'Sản phẩm'; ?>
                                        </strong>
                                    </td>
                                    <td class="text-center">
                                        <strong>
                                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Quantity';
                                            else echo 'Số lượng'; ?>
                                        </strong>
                                    </td>
                                    <td class="text-center">
                                        <strong>
                                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Product unit';
                                            else echo 'Đơn vị sản phẩm'; ?>
                                        </strong>
                                    </td>
                                    <td class="text-center">
                                        <strong>
                                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Delete';
                                            else echo 'Xóa'; ?>
                                        </strong>
                                    </td>
                                </tr>
                            </thead>
                            <tbody id="okcart">
                                <?php foreach ($_SESSION['cart'] as $value) { ?>
                                    <tr>
                                        <td class="text-center cart-item-img"><img src="<?= $value['hinhanh'] ?>" alt="<?= $value['name'] ?>" title="<?= $value['name'] ?>"></td>
                                        <td class="text-left cart-item-name">
                                            <a href="product/<?= $value['url'] ?>">
                                                <?php echo $value['ma_sp']; ?>
                                            </a>
                                        </td>
                                        <td class="text-left cart-item-name">
                                            <a href="product/<?= $value['url'] ?>">
                                                <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo $value['name_en'];
                                                else echo $value['name']; ?>
                                            </a>
                                        </td>
                                        <td class="text-center" style="width: 160px !important;">
                                            <div class="custom custom-btn-numbers form-control mx-auto">
                                                <button onclick="suasl(<?= $value['id'] ?>, 0)" class="btn-minus btn-cts" type="button">–</button>
                                                <input type="number" required class="qty input-text" min=1 name="quantity" size="4" id="soluong_<?= $value['id'] ?>" value="<?= $value['num'] ?>" maxlength="6" onchange="suasl(<?= $value['id'] ?>)">
                                                <button onclick="suasl(<?= $value['id'] ?>, 1)" class="btn-plus btn-cts" type="button">+</button>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'meter';
                                            else echo 'mét'; ?>
                                        </td>
                                        <td class="cart-item-remove m-0">
                                            <a class="" onclick="xoacart(<?= $value['id'] ?>)">&#10005;</a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 my-5 mt-md-2">
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 text-center text-md-right"><a class="btn mb-2 btn-secondary button_shopping" href="product">
                                        <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Continue shopping';
                                        else echo 'Tiếp tục mua hàng'; ?>
                                    </a></div>
                                <div class="col-sm-6 col-xs-6 text-center text-md-left"><a href="checkout" class="btn mb-2 pull-md-right button_checkout">
                                        <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Checkout';
                                        else echo 'Tiến hành đặt hàng'; ?>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="empty-cart">
                        <p>
                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Your shopping cart is empty';
                            else echo 'Đơn đặt hàng của bạn trống'; ?>
                        </p>
                        <a href="product" class="btn btn-secondary">
                            <?php if (isset($_SESSION['en']) && $_SESSION['en'] == '1') echo 'Continue shopping';
                            else echo 'Tiếp tục mua hàng'; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>