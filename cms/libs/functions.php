<?php
class functions {
    public static function uploadfile($filename,$dir,$name) {
        if ($_FILES[$filename]["size"] > 5000000)  // gioi han kich thuoc file 5M
            return false;
        // elseif(getimagesize($_FILES[$filename]["tmp_name"]) == false) // kiểm tra xem có phải là file ảnh ko?
        //     return false;
        else {
            $imageFileType = strtolower(pathinfo(basename($_FILES[$filename]["name"]),PATHINFO_EXTENSION));
            $newfile=$name.'.'.$imageFileType;
            $target = $dir.$newfile;
            $i=1;
            while (file_exists($target)) {
                $newfile=$name.'.'.$i.'.'.$imageFileType;
                $target = $dir.$newfile;
                $i++;
            }
            if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target))
                return $newfile;
            else
                return false;
        }
    }

    public static function convertname($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = str_replace(" ","-",$str);
        $str = str_replace("!","-",$str);
        $str = str_replace("@","-",$str);
        $str = str_replace("#","-",$str);
        $str = str_replace("$","-",$str);
        $str = str_replace("%","-",$str);
        $str = str_replace("&","-",$str);
        $str = str_replace("&amp;","-",$str);
        $str = str_replace("*","-",$str);
        $str = str_replace("?","-",$str);
        $str = str_replace(";","-",$str);
        $str = str_replace(":","-",$str);
        $str = str_replace(",","-",$str);
        $str = str_replace(".","-",$str);
        $str = str_replace("\"","-",$str);
        $str = str_replace('“',"-",$str);
        $str = str_replace('”',"-",$str);
        $str = str_replace('"',"-",$str);
        $str = str_replace("(","-",$str);
        $str = str_replace(")","-",$str);
        $str = str_replace("{","-",$str);
        $str = str_replace("}","-",$str);
        $str = str_replace("[","-",$str);
        $str = str_replace("]","-",$str);
        $str = str_replace("/","-",$str);
        $str = str_replace("----","-",$str);
        $str = str_replace("---","-",$str);
        $str = str_replace("--","-",$str);
        $str = rtrim(strtolower($str),'-');
        return $str;
    }

	public static function dequy($menu,$parentid,$level) {
		if (!isset($ketqua)) $ketqua=array();
		global $ketqua;
		$level=($parentid==0)?0:$level+1;
		foreach($menu as $value) {
			$value['level']=$level;
			if($value['cha'] == $parentid) {
				$ketqua[]=$value;
				functions::dequy($menu,$value['id'],$level);
			}
		}
		return $ketqua;
	}

  public static function convertDate($text) { //convert 31/12/2019 thang 2019-12-31
		if ($text != '') {
			list ( $date, $month, $year ) = explode ( "/", $text );
			$text = $year . '-' . $month . '-' . $date;
		}
		return $text;
	}

   public static function password_generate($chars)
   {
       $data = '1234567890';
       return substr(str_shuffle($data), 0, $chars);
   }

   public static function generateStatusOrder($status)
    {
        switch ($status) {
            case '1':
                return '<span>Đang xử lý</span>';
                break;
            case '2':
                return '<span>Đã xử lý</span>';
                break;
            case '3':
                return '<span>Đã đặt hàng</span>';
                break;
            case '4':
                return '<span>Đã phát hàng</span>';
                break;
            case '5':
                return '<span>Kí nhận kho trung</span>';
                break;
            case '6':
                return '<span>Đã về kho Việt Nam</span>';
                break;
            case '7':
                return '<span>Đã giao</span>';
                break;
            case '8':
                return '<span>Hết hàng</span>';
                break;            
            default:
                return '<span>Đơn hàng đã hủy</span>';
                break;
        }
    }



}
?>
