<?php

if (isset($_POST['loginForm']) && $_POST['loginForm'] == true) {
    // login
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = MD5(MD5($_POST['password']));
        // check email tồn tại
        $checkLoginEmail = $data->checkLoginEmail($email);
        if (count($checkLoginEmail) > 0) {
            $userLogin = $data->login($email, $password);
            if (count($userLogin) > 0) {
                // đăng nhập thành công
                $_SESSION['weborderuser'] = $userLogin[0];
                echo  1;
            } else {
                // đăng nhập thất bại
                echo 0;
            };
        } else {
            echo 2;
        }
    }
} else if (isset($_POST['logoutForm']) && $_POST['logoutForm'] == true) {
    // logout
    unset($_SESSION['weborderuser']);
    // setcookie('', $userLogin[0]['id'], time() + (86400 * 30), "/");
    echo 1;
} else if (isset($_POST['profileForm']) && $_POST['profileForm'] == true) {
    // update profile
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['province']) && isset($_POST['newPassword'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $province = $_POST['province'];
        $newPassword = $_POST['newPassword'];
        $checkEmail = $data->checkUpdateProfile($email);
        if (count($checkEmail) > 0) {
            // email đã tồn tại
            echo 2;
        } else {
            $dataProfile = [];
            if ($name != $_SESSION['weborderuser']['name']) {
                $dataProfile['name'] = $name;
            }
            if ($phone != $_SESSION['weborderuser']['phone']) {
                $dataProfile['phone'] = $phone;
            }
            if ($email != $_SESSION['weborderuser']['email']) {
                $dataProfile['email'] = $email;
            }
            if ($address != $_SESSION['weborderuser']['address']) {
                $dataProfile['address'] = $address;
            }
            if ($province != $_SESSION['weborderuser']['province']) {
                $dataProfile['province'] = $province;
            }
            if ($newPassword != "") {
                $dataProfile['password'] = MD5(MD5($_POST['newPassword']));
            }
            if (count($dataProfile) > 0) {
                $query = $data->updateProfile($dataProfile);
                if ($query) {
                    foreach ($dataProfile as $key => $value) {
                        $_SESSION['weborderuser'][$key] = $value;
                    }
                    if (isset($dataProfile['password'])) {
                        // cập nhật mật khẩu, đăng nhập lại
                        unset($_SESSION['weborderuser']);
                    }
                    echo  1;
                }
                // cập nhật thất bại
                else echo 0;
            } else {
                // không có sự thay đổi
                echo 3;
            }
        }
    }
} else if (isset($_POST['registerForm']) && $_POST['registerForm'] == true) {
    // register
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $checkEmail = $data->checkRegister($email);
        if (count($checkEmail) > 0) {
            echo 2;
        } else {
            $password = MD5(MD5($_POST['password']));
            $dataRegister = ['name' => $name, 'phone' => $phone, 'email' => $email, 'password' => $password];
            $query = $data->register($dataRegister);
            if ($query)
                echo  1;
            else echo 0;
        }
    }
} else if (isset($_POST['contactForm']) && $_POST['contactForm'] == true) {
    // contact
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['title']) && isset($_POST['content'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = date('Y-m-d H:i:s');
        $dataContact = ['name' => $name, 'phone' => $phone, 'email' => $email, 'title' => $title, 'content' => $content, 'date' => $date];
        $query = $data->saveContact($dataContact);
        if ($query)
            echo  1;
        else echo 0;
    }
} else if (isset($_POST['baoGiaForm']) && $_POST['baoGiaForm'] == true) {
    // contact
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['title'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $date = date('Y-m-d H:i:s');
        $dataContact = ['name' => $name, 'phone' => $phone, 'email' => $email, 'title' => $title, 'date' => $date];
        $query = $data->saveBaoGia($dataContact);
        if ($query)
            echo  1;
        else echo 0;
    }
} else if (isset($_POST['datHangForm']) && $_POST['datHangForm'] == true) {
    if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $idProduct = $_POST['idProduct'];
        $date = date('Y-m-d H:i:s');
        $dataBook = ['name' => $name, 'phone' => $phone, 'email' => $email, 'address' => $address, 'id_product' => $idProduct, 'date' => $date];
        $query = $data->saveDatHang($dataBook);
        if ($query)
            echo  1;
        else echo 0;
    }
} 
