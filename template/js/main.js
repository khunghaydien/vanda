// hàm dùng chung
//function to add commas to textboxes
function comma(Num) {
    Num += "";
    Num = Num.replace(",", "");
    Num = Num.replace(",", "");
    Num = Num.replace(",", "");
    Num = Num.replace(",", "");
    Num = Num.replace(",", "");
    Num = Num.replace(",", "");
    x = Num.split(".");
    x1 = x[0];
    x2 = x.length > 1 ? "." + x[1] : "";
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) x1 = x1.replace(rgx, "$1" + "," + "$2");
    return x1 + x2;
}

function emailIsValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function phoneIsValid(phone) {
    return /(84|0[3|5|7|8|9])+([0-9]{8})\b/g.test(phone);
}

function resetBaoGia() {
    document.getElementById("txtBaoGiaName").value = "";
    document.getElementById("txtBaoGiaPhone").value = "";
    document.getElementById("txtBaoGiaEmail").value = "";
    document.getElementById("spanBaoGiaName").innerHTML = "";
    document.getElementById("spanBaoGiaPhone").innerHTML = "";
    document.getElementById("spanBaoGiaEmail").innerHTML = "";
}

function baoGiaSubmit() {
    let name = $("#txtBaoGiaName").val();
    let phone = $("#txtBaoGiaPhone").val();
    let email = $("#txtBaoGiaEmail").val();
    let checkValidate = true;
    if (name == "") {
        document.getElementById("spanBaoGiaName").innerHTML = "Bạn hãy nhập họ tên";
        checkValidate = false;
    } else {
        document.getElementById("spanBaoGiaName").innerHTML = "";
    }

    if (phone == "") {
        document.getElementById("spanBaoGiaPhone").innerHTML =
            "Bạn hãy nhập số điện thoại";
        checkValidate = false;
    } else {
        if (!phoneIsValid(phone)) {
            document.getElementById("spanBaoGiaPhone").innerHTML =
                "Số điện thoại không hợp lệ";
            checkValidate = false;
        } else {
            document.getElementById("spanBaoGiaPhone").innerHTML = "";
        }
    }

    if (email == "") {
        document.getElementById("spanBaoGiaEmail").innerHTML = "Bạn hãy nhập email";
        checkValidate = false;
    } else {
        if (!emailIsValid(email)) {
            document.getElementById("spanBaoGiaEmail").innerHTML = "Email không hợp lệ";
            checkValidate = false;
        } else {
            document.getElementById("spanBaoGiaEmail").innerHTML = "";
        }
    }
    // check có submit hay không
    if (checkValidate) {
        $.post(
            "authenticate", {
                name: name,
                phone: phone,
                email: email,
                title: "Đăng ký nhận báo giá nhanh",
                baoGiaForm: true,
            },
            function(data) {
                switch (data) {
                    case "1":
                        alert("Đăng ký thành công");
                        // $("#myModalNotification").modal("show");
                        // document.getElementById("notificationMessage").innerHTML =
                        //     "Gửi thành công. Cảm ơn bạn!";
                        resetBaoGia();
                        break;
                    default:
                        alert("Đăng ký thất bại");
                        // $("#myModalNotification").modal("show");
                        // document.getElementById("notificationMessage").innerHTML =
                        //     "Gửi thất bại! Bạn hãy kiểm tra lại hoặc liên hệ bộ phận chăm sóc khách hàng.";
                        resetBaoGia();
                        break;
                }
            }
        );
    }
}

function resetDatHang() {
    document.getElementById("txtDatHangName").value = "";
    document.getElementById("txtDatHangPhone").value = "";
    document.getElementById("txtDatHangEmail").value = "";
    document.getElementById("txtDatHangAddress").value = "";
    document.getElementById("spanDatHangName").innerHTML = "";
    document.getElementById("spanDatHangPhone").innerHTML = "";
    document.getElementById("spanDatHangEmail").innerHTML = "";
    document.getElementById("spanDatHangAddress").innerHTML = "";
}

function datHangSubmit() {
    let name = $("#txtDatHangName").val();
    let phone = $("#txtDatHangPhone").val();
    let email = $("#txtDatHangEmail").val();
    let address = $("#txtDatHangAddress").val();
    let idProduct = $("#txtDatHangIDProduct").val();
    let checkValidate = true;
    if (name == "") {
        document.getElementById("spanDatHangName").innerHTML = "Bạn hãy nhập họ tên";
        checkValidate = false;
    } else {
        document.getElementById("spanDatHangName").innerHTML = "";
    }

    if (phone == "") {
        document.getElementById("spanDatHangPhone").innerHTML =
            "Bạn hãy nhập số điện thoại";
        checkValidate = false;
    } else {
        if (!phoneIsValid(phone)) {
            document.getElementById("spanDatHangPhone").innerHTML =
                "Số điện thoại không hợp lệ";
            checkValidate = false;
        } else {
            document.getElementById("spanDatHangPhone").innerHTML = "";
        }
    }

    if (email == "") {
        document.getElementById("spanDatHangEmail").innerHTML = "Bạn hãy nhập email";
        checkValidate = false;
    } else {
        if (!emailIsValid(email)) {
            document.getElementById("spanDatHangEmail").innerHTML = "Email không hợp lệ";
            checkValidate = false;
        } else {
            document.getElementById("spanDatHangEmail").innerHTML = "";
        }
    }

    if (address == "") {
        document.getElementById("spanDatHangAddress").innerHTML = "Bạn hãy nhập địa chỉ";
        checkValidate = false;
    } else {
        document.getElementById("spanDatHangAddress").innerHTML = "";
    }
    // check có submit hay không
    if (checkValidate) {
        $.post(
            "authenticate", {
                name: name,
                phone: phone,
                email: email,
                address: address,
                idProduct: idProduct,
                datHangForm: true,
            },
            function(data) {
                switch (data) {
                    case "1":
                        alert("Đặt hàng thành công");
                        // $("#myModalNotification").modal("show");
                        // document.getElementById("notificationMessage").innerHTML =
                        //     "Gửi thành công. Cảm ơn bạn!";
                        resetDatHang();
                        jQuery.fancybox.close();
                        break;
                    default:
                        alert("Đặt hàng thất bại");
                        // $("#myModalNotification").modal("show");
                        // document.getElementById("notificationMessage").innerHTML =
                        //     "Gửi thất bại! Bạn hãy kiểm tra lại hoặc liên hệ bộ phận chăm sóc khách hàng.";
                        resetDatHang();
                        jQuery.fancybox.close();
                        break;
                }
            }
        );
    }
}

function resetContact() {
    document.getElementById("txtContactName").value = "";
    document.getElementById("txtContactPhone").value = "";
    document.getElementById("txtContactEmail").value = "";
    document.getElementById("txtContactTitle").value = "";
    document.getElementById("txtContactContent").value = "";
    document.getElementById("spanContactName").innerHTML = "";
    document.getElementById("spanContactPhone").innerHTML = "";
    document.getElementById("spanContactEmail").innerHTML = "";
    document.getElementById("spanContactTitle").innerHTML = "";
    document.getElementById("spanContactContent").innerHTML = "";
}

function contactSubmit() {
    let name = $("#txtContactName").val().trim();
    let phone = $("#txtContactPhone").val().trim();
    let email = $("#txtContactEmail").val().trim();
    let title = $("#txtContactTitle").val().trim();
    let content = $("#txtContactContent").val().trim();
    let checkValidate = true;
    if (name == "") {
        document.getElementById("spanContactName").innerHTML = "Bạn hãy nhập họ tên";
        checkValidate = false;
    } else {
        document.getElementById("spanContactName").innerHTML = "";
    }

    if (phone == "") {
        document.getElementById("spanContactPhone").innerHTML =
            "Bạn hãy nhập số điện thoại";
        checkValidate = false;
    } else {
        if (!phoneIsValid(phone)) {
            document.getElementById("spanContactPhone").innerHTML =
                "Số điện thoại không hợp lệ";
            checkValidate = false;
        } else {
            document.getElementById("spanContactPhone").innerHTML = "";
        }
    }

    if (email == "") {
        document.getElementById("spanContactEmail").innerHTML = "Bạn hãy nhập email";
        checkValidate = false;
    } else {
        if (!emailIsValid(email)) {
            document.getElementById("spanContactEmail").innerHTML = "Email không hợp lệ";
            checkValidate = false;
        } else {
            document.getElementById("spanContactEmail").innerHTML = "";
        }
    }

    if (title == "") {
        document.getElementById("spanContactTitle").innerHTML = "Bạn hãy nhập tiêu đề";
        checkValidate = false;
    } else {
        document.getElementById("spanContactTitle").innerHTML = "";
    }

    if (content == "") {
        document.getElementById("spanContactContent").innerHTML =
            "Bạn hãy nhập nội dung";
        checkValidate = false;
    } else {
        document.getElementById("spanContactContent").innerHTML = "";
    }
    // check có submit hay không
    if (checkValidate) {
        $.post(
            "authenticate", {
                name: name,
                phone: phone,
                email: email,
                title: title,
                content: content,
                contactForm: true,
            },
            function(data) {
                switch (data) {
                    case "1":
                        alert("Gửi liên hệ thành công");
                        // $("#myModalNotification").modal("show");
                        // document.getElementById("notificationMessage").innerHTML =
                        //     "Gửi thành công. Cảm ơn bạn!";
                        resetContact();
                        break;
                    default:
                        alert("Gửi liên hệ thất bại");
                        // $("#myModalNotification").modal("show");
                        // document.getElementById("notificationMessage").innerHTML =
                        //     "Gửi thất bại! Bạn hãy kiểm tra lại hoặc liên hệ bộ phận chăm sóc khách hàng.";
                        resetContact();
                        break;
                }
            }
        );
    }
}

function changeSortProduct(typeSort, page) {
    window.location.replace(BASE_URL + "/product?p=" + page + "&sort=" + typeSort);
}

function changeSortProductCategory(typeSort, page, url) {
    window.location.replace(BASE_URL + "/product/" + page + "/" + url + "?sort=" + typeSort);
}