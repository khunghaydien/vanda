<?php

class index extends controller
{
    function __construct()
    {
        parent::__construct();
        if ($_SESSION['admin']['nhom'] > 2)
            header('Location: ' . URL.'/baiviet');
    }

    function index()
    {
        require('layouts/header.php');
        $tinrao = $this->model->thongketinrao();
        $this->view->tinrao7ngay['ngaydang'] = '[';
        $this->view->tinrao7ngay['total'] = '[';
        foreach ($tinrao as $item) {
            $this->view->tinrao7ngay['ngaydang'] .= "'" . $item['updated'] . "',";
            $this->view->tinrao7ngay['total'] .= "'" . $item['total'] . "',";
        }
        $this->view->tinrao7ngay['ngaydang'] = rtrim($this->view->tinrao7ngay['ngaydang'], ',');
        $this->view->tinrao7ngay['ngaydang'] .= ']';
        $this->view->tinrao7ngay['total'] = rtrim($this->view->tinrao7ngay['total'], ',');
        $this->view->tinrao7ngay['total'] .= ']';
        $tincan = $this->model->thongketincan();
        $this->view->tincan7ngay['ngaydang'] = '[';
        $this->view->tincan7ngay['total'] = '[';
        foreach ($tincan as $item) {
            $this->view->tincan7ngay['ngaydang'] .= "'" . $item['updated'] . "',";
            $this->view->tincan7ngay['total'] .= "'" . $item['total'] . "',";
        }
        $this->view->tincan7ngay['ngaydang'] = rtrim($this->view->tincan7ngay['ngaydang'], ',');
        $this->view->tincan7ngay['ngaydang'] .= ']';
        $this->view->tincan7ngay['total'] = rtrim($this->view->tincan7ngay['total'], ',');
        $this->view->tincan7ngay['total'] .= ']';

        $this->view->tongtinrao = $this->model->tongtinrao(1);
        $this->view->tongtincan = $this->model->tongtinrao(2);
        $this->view->tongkh = $this->model->tongkh();
        $this->view->luottruycap = $this->model->totalviews();
        $truycap7ngay = $this->model->truycap7ngay();
        $this->view->truycap7ngay = $truycap7ngay['total'];
        $label7ngay = "[";
        $value7ngay = "[";
        foreach ($truycap7ngay['rows'] as $item) {
            $label7ngay .= "'" . $item['ngaygio'] . "'" . ',';
            $value7ngay .= $item['truycap'] . ',';
        }
        $label7ngay = rtrim($label7ngay, ',');
        $value7ngay = rtrim($value7ngay, ',');
        $label7ngay .= "]";
        $value7ngay .= "]";
        $this->view->label7ngay = $label7ngay;
        $this->view->value7ngay = $value7ngay;
        $this->view->doanhthu = $this->model->doanhthu();

        $doanhthu7ngay = $this->model->doanhthu7ngay();
        $this->view->doanhthu7ngay = number_format($doanhthu7ngay['total']);
        $labeldt7ngay = "[";
        $valuedt7ngay = "[";
        foreach ($doanhthu7ngay['rows'] as $item) {
            $labeldt7ngay .= "'" . $item['updated'] . "'" . ',';
            $valuedt7ngay .= ceil($item['doanhthu']) . ',';
        }
        $labeldt7ngay = rtrim($labeldt7ngay, ',');
        $valuedt7ngay = rtrim($valuedt7ngay, ',');
        $labeldt7ngay .= "]";
        $valuedt7ngay .= "]";
        $this->view->labeldt7ngay = $labeldt7ngay;
        $this->view->valuedt7ngay = $valuedt7ngay;
        $luotxemvp = $this->model->luotxemvanphong();
        // if ($luotxemvp[0]['vpcha1'] == null) {
        //     if ($luotxemvp[0]['kieutin'] == 1)
        //         $this->view->vpname = 'Tin b??n';
        //     elseif ($luotxemvp[0]['kieutin'] == 2)
        //         $this->view->vpname = 'Tin cho thu??';
        //     else
        //         $this->view->vpname = 'Tin chuy???n nh?????ng';
        // } elseif ($luotxemvp[0]['vpcha1'] == 0) {
        //     $this->view->vpname = $luotxemvp[0]['vpname'];
        // } else {
        //     if ($luotxemvp[0]['kieutin'] == 1)
        //         $this->view->vpname = $luotxemvp[0]['vpname'] . ' b??n';
        //     elseif ($luotxemvp[0]['kieutin'] == 2)
        //         $this->view->vpname = $luotxemvp[0]['vpname'] . ' cho thu??';
        //     else
        //         $this->view->vpname = $luotxemvp[0]['vpname'] . ' chuy???n nh?????ng';
        //     $this->view->vpname = $luotxemvp[0]['vpname'];
        // }
        $this->view->vpluotxem = $luotxemvp[0]['total'];
        $this->view->render('index');
        require('layouts/footer.php');
    }

    function matkhau()
    {
        require(HEADER);
        if (MOBILE)
            $this->view->render('index/index_m');
        else
            $this->view->render('index/matkhau');
        require(FOOTER);
    }

    function changepass()
    {
        $matkhaucu = md5(md5($_REQUEST['matkhaucu']));
        $matkhaumoi = md5(md5($_REQUEST['matkhaumoi']));
        $retype = md5(md5($_REQUEST['retype']));
        if ($this->model->checkpass($_SESSION['admin']['id'], $matkhaucu)) {
            if ($matkhaumoi == $retype) {
                if ($this->model->changepass($_SESSION['admin']['id'], $matkhaumoi)) {
                    $jsonObj['msg'] = "?????i m???t kh???u th??nh c??ng";
                    $jsonObj['success'] = true;
                } else {
                    $jsonObj['msg'] = "?????i m???t kh???u kh??ng th??nh c??ng";
                    $jsonObj['success'] = false;

                }
            } else {
                $jsonObj['msg'] = "X??c nh???n m???t kh???u kh??ng ????ng";
                $jsonObj['success'] = false;
            }
        } else {
            $jsonObj['msg'] = "M???t kh???u c?? kh??ng ????ng";
            $jsonObj['success'] = false;
        }
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('common/json');
    }

    function logout()
    {
        $this->model->logout();
        session_destroy();
        header('Location: ' . URL);
    }

// DASHBOARD
    function congviec()
    {
        $jsonObj = $this->model->congviec();
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('common/json');
    }

    function dichvu()
    {
        $jsonObj = $this->model->dichvu();
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('common/json');
    }


// Notification
    function events()
    {
        $jsonObj = $this->model->events();
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('common/json');
    }

    function eventstop()
    {
        $id = $_REQUEST['id'];
        $this->model->eventstop($id);
    }


}

?>
