<?php

if (isset($_SESSION['weborderCart'])) {
    $_SESSION['weborderCart'] = $_SESSION['weborderCart'];
} else {
    $_SESSION['weborderCart'] = array();
}

if (isset($_POST['typePost']) && $_POST['typePost'] == 1) {
    // add cart click
    if (isset($_POST['id']) && isset($_POST['qty']) && isset($_POST['idType'])) {
        $id = $_POST['id'];
        $qty = (isset($_POST['qty']) && $_POST['qty'] > 0) ? $_POST['qty'] : 1;
        $idType = $_POST['idType'];
        $product = $data->getProductCart($id, $idType);
        if (!isset($_SESSION['weborderCart'])) {
            $cart = array();
            $cart[$id][$idType] = array(
                'id' => $product['id'],
                'name' => $product['name'],
                'url' => $product['url'],
                'image' => $product['image'],
                'idType' => $product['idType'],
                'nameType' => $product['nameType'],
                'countType' => $product['countType'],
                'price' => $product['price'],
                'qty' => (int)$qty
            );
        } else {
            $cart = $_SESSION['weborderCart'];
            // check id product in cart
            if (array_key_exists($id, $cart)) {
                // product type already exists
                if ($cart[$id][$idType]['idType'] == $idType) {
                    $cart[$id][$idType] = array(
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'url' => $product['url'],
                        'image' => $product['image'],
                        'idType' => $product['idType'],
                        'nameType' => $product['nameType'],
                        'countType' => $product['countType'],
                        'price' => $product['price'],
                        'qty' => (int)$cart[$id][$idType]['qty'] + $qty
                    );
                } else {
                    // add a new product type
                    $cart[$id][$idType] = array(
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'url' => $product['url'],
                        'image' => $product['image'],
                        'idType' => $product['idType'],
                        'nameType' => $product['nameType'],
                        'countType' => $product['countType'],
                        'price' => $product['price'],
                        'qty' => (int)$qty
                    );
                }
            } else {
                // add new product to cart
                $cart[$id][$idType] = array(
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'url' => $product['url'],
                    'image' => $product['image'],
                    'idType' => $product['idType'],
                    'nameType' => $product['nameType'],
                    'countType' => $product['countType'],
                    'price' => $product['price'],
                    'qty' => (int)$qty
                );
            }
        }
        $_SESSION['weborderCart'] = $cart;
    }
} else if (isset($_POST['typePost']) && $_POST['typePost'] == 2) {
    // update cart click
    if (isset($_POST['id']) && isset($_POST['qty']) && isset($_POST['idType'])) {
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        $idType = $_POST['idType'];
        $cart = $_SESSION['weborderCart'];
        if (array_key_exists($id, $cart)) {
            if ($qty > 0) {
                $cart[$id][$idType] = array(
                    'id' => $cart[$id][$idType]['id'],
                    'name' => $cart[$id][$idType]['name'],
                    'url' => $cart[$id][$idType]['url'],
                    'image' => $cart[$id][$idType]['image'],
                    'idType' => $cart[$id][$idType]['idType'],
                    'nameType' => $cart[$id][$idType]['nameType'],
                    'countType' => $cart[$id][$idType]['countType'],
                    'price' => $cart[$id][$idType]['price'],
                    'qty' => $qty
                );
            } else {
                unset($cart[$id][$idType]);
                if (count($cart[$id]) == 0) {
                    unset($cart[$id]);
                }
            }

            $_SESSION['weborderCart'] = $cart;
        }
    }
} else if (isset($_POST['typePost']) && $_POST['typePost'] == 3) {
    // đặt hàng 
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['note']) && isset($_POST['paymentMethod'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $paymentMethod = $_POST['paymentMethod'];
        $updated = date('Y-m-d H:i:s');
        // thông tin đơn hàng trong bảng order
        $order = array(
            'email' => $email,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'total' => 0,
            'note' => $note,
            'paymentMethod' => $paymentMethod,
            'updated' => $updated
        );
        $query = $data->saveOrder($order);
        if ($query) {
            unset($_SESSION['weborderCart']);
            echo 1;
        } else echo 0;
    }
} else if (isset($_POST['cancelOrder']) && $_POST['cancelOrder'] == true) {
    // đặt hàng 
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = $data->cancelChinaOrder($id);
        if ($query) {
            unset($_SESSION['weborderCart']);
            echo 1;
        } else echo 0;
    }
}else if (isset($_POST['addTracking']) && $_POST['addTracking'] == true) {
    // đặt hàng 
    if (isset($_POST['trackingNumber']) && isset($_POST['valuePackage']) && isset($_POST['nameProduct']) && isset($_POST['quantity'])) {
        $trackingNumber = $_POST['trackingNumber'];
        $valuePackage = $_POST['valuePackage'];
        $nameProduct = $_POST['nameProduct'];
        $quantity = $_POST['quantity'];
        $dataTracking = array(
            'id_user' =>$_SESSION['weborderuser']['id'] ,
            'tracking_number' => $trackingNumber,
            'value_package' => $valuePackage,
            'name_product' => $nameProduct,
            'quantity' => $quantity,
            'updated' => date('Y-m-d H:i:s'),
        );
        $query = $data->saveTracking($dataTracking);
        if ($query) {
            echo 1;
        } else echo 0;
    }
}
