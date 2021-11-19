<div class="modal" id="successModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thông báo</h5>
      </div>
      <div class="modal-body">
        <p>Cảm ơn bạn đã đặt hàng, chúng tôi sẽ sớm liên lạc với bạn khi nhân được thông tin!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="success()">Đồng ý</button>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['btndat'])) {
    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['dienthoai']) || !isset($_POST['address'])) {
        echo "<script>alert('Bạn hay điền đầy đủ thông tin đặt hàng!');";
    } else {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $date = date('Y-m-d H:i:s');
        $dienthoai = isset($_POST['dienthoai']) ? $_POST['dienthoai'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : 0;
        $tinh = isset($_POST['tinh']) ? $_POST['tinh'] : '';
        $huyen = isset($_POST['huyen']) ? $_POST['huyen'] : '';
        $note = isset($_POST['note']) ? $_POST['note'] : '';
        // $tong=0;
        // foreach ($_SESSION['cart'] as $value) {
        //     $tong+=$value['num']*$value['price'];
        // }
        $khachhang = array('name' => $name, 'dien_thoai' => $dienthoai, 'email' => $email, 'dia_chi' => $address, 'thanh_pho' => $tinh,'quan_huyen' => $huyen, 'tinh_trang' => 1);
        // $cart = array('date' => $date, 'thanh_tien'=>$tong, 'hinh_thuc_tt' => $paymentMethod, 'ghi_chu' => $note, 'tinh_trang' => 1);
        $cart = array('date' => $date, 'hinh_thuc_tt' => $paymentMethod, 'ghi_chu' => $note, 'tinh_trang' => 1);
        $ok = $data->donhang($khachhang, $cart);
        $noidung = '<div class=""><div class="aHl"></div><div id=":le" tabindex="-1"></div><div id=":iz" class="ii gt"><div id=":j0" class="a3s aiL "><table cellpadding="0" cellspacing="0" style="min-width:600px;width:100%">
				<tbody>
					<tr>
						<td align="center" style="background-color:#fff">
							<table border="0" cellpadding="0" cellspacing="0" style="width:600px;border-collapse:collapse;background-color:#ffffff">
								<tbody>
									
									<tr>
										<td colspan="2" style="padding:0px 10px">
											<table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse">
												<tbody>
													<tr>
														<td style="padding:0px 25px;color:#333333;font-family:Arial;border-top:2px solid #055699">
															<p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
																Xin chào bạn,</p>
															<p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
																Vừa có khách hàng đặt hàng thông qua website với thông tin: <br><br>
																Họ và tên: '.$name.'<br>
																Email: ' . $email . '<br>
																Điện thoại: ' .$dienthoai.'<br>
																Địa chỉ: '.$address.'<br>
																Ghi chú: '.$note.'


															</p>
															<p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
																Nếu bạn cần hỗ trợ, vui lòng liên hệ hotline <a href="tel:'.$thongtin[4]['value'].'" style="font-size:14px;color:#333333;font-family:Arial;text-decoration:none" target="_blank">'.$thongtin[4]['value'].'</a>.</p>
															<p style="font-size:14px;line-height:180%;margin:10px 0px;color:#333333;font-family:Arial">
																Trân trọng cảm ơn
																</p>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td colspan="2" style="border-top:2px solid #055699">
											<p style="font-size:16px;color:#333333;font-family:Arial;text-align:center;font-weight:bold">
												<a href="'.HOME.'" style="text-decoration:none;color:#fff" target="_blank"> <img alt="IGEMS" src="'.$thongtin[7]['value'].'" style="width:115px" class="CToWUd"> </a></p>
											<p style="font-size:12px;color:#333333;font-family:Arial;text-align:center">
												'.$thongtin[1]['value'].'<br>
												Hotline <a href="tel:'.$thongtin[4]['value'].'" style="font-size:12px;color:#333333;font-family:Arial;text-decoration:none" target="_blank">'.$thongtin[4]['value'].'</a>.<br>
												<a href="mailto:'.$thongtin[3]['value'].'" style="font-size:12px;color:#333333;font-family:Arial;text-decoration:none" target="_blank">'.$thongtin[3]['value'].'</a></p>
                        <p style="font-size:12px;color:#333333;font-family:Arial;text-align:center">Nội dung email này là riêng tư và không được phép tiết lộ. Nếu bạn nhận được email này do nhầm lẫn, vui lòng xóa bỏ hoặc thông báo lại cho chúng tôi qua địa chỉ email  <a href="mailto:info@gemstech.com.vn" target="_blank">info@gemstech.com.vn</a><br> Chân thành cảm ơn!</p>
											
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table></div><div class="yj6qo"></div><div class="yj6qo"></div><div class="yj6qo"></div></div><div id=":li" class="ii gt" style="display:none"><div id=":lj" class="a3s aiL undefined"></div></div><div class="hi"></div></div>';
			$data->sendmail('Website Vtrade',$thongtin[3]['value'],'','Đơn hàng mới',$noidung);
        if ($ok) {
            unset($_SESSION['cart']);
            echo "<script>alert('Cảm ơn quý khách đã đặt hàng tại VtradeTextile, bộ phận order sẽ liên hệ lại với quý khách sau ít phút để hoàn tất đơn hàng !');window.location.assign('" . HOME . "/cart');</script>";
        } else {
            echo "<script>alert('Đã có lỗi sảy ra vui lòng thực hiện lại!');window.history.back();</script>";
        }
    }
} else {
    echo "<script>window.location.assign('" . HOME . "/checkout');</script>";
}
?>
<script>
    function success() {
        window.location.assign('" . HOME . "/cart');
    }
</script>
