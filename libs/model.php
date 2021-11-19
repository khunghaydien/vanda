<?php
class model
{
  function __construct()
  {
    $this->db = new database();
  }

  //------------------- các hàm thao tác trên database ---------------
  function insert($table, $array)
  {
    $cols = array();
    $bind = array();
    foreach ($array as $key => $value) {
      $cols[] = $key;
      $bind[] = "'" . $value . "'";
    }
    $query = $this->db->query("INSERT IGNORE INTO " . $table . " (" . implode(",", $cols) . ")
             VALUES (" . implode(",", $bind) . ")");
    return $query;
  }

  function update($table, $array, $where)
  {
    $set = array();
    foreach ($array as $key => $value) {
      $set[] = $key . " = '" . $value . "'";
    }
    $query = $this->db->query("UPDATE " . $table . " SET " . implode(",", $set) . " WHERE " . $where);
    return $query;
  }
  // hàm cắt chuỗi
  function cuttingString($str, $num)
  {
    $result = '';
    $words = explode(" ", $str);
    $num = ($num < count($words)) ? $num : count($words);
    for ($i = 0; $i < $num; $i++) $result .= $words[$i] . ' ';
    $result .= '...';
    return $result;
  }
  // hàm tạo chuỗi ngẫu nhiên
  function randomString($limit)
  {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($permitted_chars), 0, $limit);
  }
  // hàm gửi email 
  function sendmail($from, $tolist, $cclist, $bcc, $subject, $noidung, $textpart)
  {
    $mailjetApiKey = '2af6c853730029edd01747dfb4a82947';
    $mailjetApiSecret = '045cdbb126cc83131834e072d226bdb0';
    $messageData = [
      'Messages' => [[
        'From' => $from,
        'To' => $tolist,
        "Cc" => $cclist,
        "Bcc" => $bcc,
        'Subject' => $subject,
        'TextPart' => $textpart,
        'HTMLPart' => $noidung
      ]]
    ];
    $jsonData = json_encode($messageData);
    $ch = curl_init('https://api.mailjet.com/v3.1/send');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_USERPWD, "{$mailjetApiKey}:{$mailjetApiSecret}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Content-Length: ' . strlen($jsonData)]);
    $response = curl_exec($ch);
    return $response;
  }

  // hàm cập nhật lượt xem
  function checkViews()
  {
    $session = session_id();
    $ip = $_SERVER['REMOTE_ADDR'];
    //        $ip = '118.78.12.13';
    if ($session != '' && $ip != '') {
      $query = $this->db->query("SELECT * FROM views
            WHERE sessions='$session' AND ip='$ip' AND status>0 ORDER BY id DESC LIMIT 1");
      $views = $query->fetchAll(PDO::FETCH_ASSOC);
      if ($views) {
        $city = $views[0]['city'];
        $loc = $views[0]['loc'];
        $time1 = strtotime($views[0]['times']);
        $time2 = strtotime(date('Y-m-d H:i:s'));
        if (($time2 - $time1) > 3600) {
          $data = array(
            'sessions' => $session,
            'ip' => $ip,
            'city' => $city,
            'loc' => $loc,
            'times' => date('Y-m-d H:i:s'),
            'status' => 1
          );
          $this->insert('views', $data);
        }
      } else {
        $query = $this->db->query("SELECT city,loc FROM views
                WHERE ip='$ip' AND status>0 ORDER BY id DESC LIMIT 1");
        $views = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($views) {
          $city = $views[0]['city'];
          $loc = $views[0]['loc'];
        } else {
          $details = json_decode(file_get_contents("https://ipwhois.app/json/$ip"), true);
          $city = isset($details['city']) ? $details['city'] : '';
          $lat = isset($details['latitude']) ? $details['latitude'] : '';
          $lon = isset($details['longitude']) ? $details['longitude'] : '';
          $loc = $lat . ',' . $lon;
        }
        $dataview = array(
          'sessions' => $session,
          'ip' => $ip,
          'city' => $city,
          'loc' => $loc,
          'times' => date('Y-m-d H:i:s'),
          'status' => 1
        );
        $this->insert('views', $dataview);
      }
    }
  }
  //------------------- các hàm xử lý frontend ---------------

  // lấy thông tin website
  function info()
  {
    $query = $this->db->query("SELECT * FROM infomation");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy danh sách tỉnh
  function getProvince()
  {
    $query = $this->db->query("SELECT id, name FROM province WHERE status = 1 ORDER BY name");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  // lấy thông tin website
  function getDistrict()
  {
    $query = $this->db->query("SELECT id, name FROM district WHERE status = 1");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  //lấy thông tin từng trang 
  function pageInfo($url)
  {
    $page = array();
    if ($url[0] == 'blog')
      if (sizeof($url) == 2) {
        // chi tiet bai viet
        $query = $this->db->query("SELECT id, url, title, avatar, 
                    description, content, tag, view, category,
                    DATE_FORMAT(updated,'%d/%m/%Y') AS updated,
                    (SELECT name FROM admin WHERE id=b.author) AS author,
                    (SELECT name FROM blogcategory WHERE id=b.category) AS nameCategory,
                    (SELECT url FROM blogcategory WHERE id=b.category) AS urlCategory
                    FROM blog b WHERE url='" . $url[1] . "' ");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        $count = $temp[0]['view'];
        $newView = $count + 1;
        $query1 = $this->db->query("UPDATE blog set view=$newView WHERE id='" . $temp[0]['id'] . "' ");
        $page['title'] = $temp[0]['title'];
        $page['description'] = $temp[0]['description'];
        $page['keywords'] = $temp[0]['tag'];
        $page['image'] = $temp[0]['avatar'];
        $page['data'] = $temp[0];
      } elseif (sizeof($url) == 3) {
        // danh muc bai viet
        $query1 = $this->db->query("SELECT id, name, image, description FROM blogcategory WHERE status=1 AND url='" . $url[2] . "' ");
        $category = $query1->fetchAll(PDO::FETCH_ASSOC);
        $query2 = $this->db->query("SELECT id FROM blog WHERE status=1 AND category='" . $category[0]['id'] . "' ");
        $temp = $query2->fetchAll(PDO::FETCH_ASSOC);
        $page['title'] = $category[0]['name'];
        $page['description'] = $this->cuttingString($category[0]['description'], 150);
        $page['keywords'] = $category[0]['name'];
        $page['image'] = $category[0]['image'];
        $page['data'] = $temp;
        $page['idCategory'] = $category[0]['id'];
      } else {
        // tat ca bai viet
        $query = $this->db->query("SELECT title, description, avatar FROM blog WHERE status=1 ");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        $page['title'] = "Danh sách bài viết";
        $page['description'] = $this->cuttingString($temp[0]['description'], 150);
        $page['keywords'] = $temp[0]['title'];
        $page['image'] = $temp[0]['avatar'];
        $page['data'] = $temp;
      }
    elseif ($url[0] == 'product')
      if (sizeof($url) == 2) {
        // chi tiet san pham
        $query = $this->db->query("SELECT *,
                (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
                (SELECT name FROM productcategory WHERE id= p.category) AS danhmuc,
                (SELECT url FROM productcategory WHERE id= p.category) AS danhmucurl
                  FROM product p WHERE url='" . $url[1] . "'");
        if(!$query){
          $query = $this->db->query("SELECT *,
                (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
                (SELECT name FROM productcategory WHERE id= p.category) AS danhmuc,
                (SELECT url FROM productcategory WHERE id= p.category) AS danhmucurl
                  FROM product p WHERE url='" . $url[1] . "'");
        }
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        $dem = $temp[0]['view'];
        $new = $dem + 1;
        $query1 = $this->db->query("UPDATE product set view=$new WHERE url='" . $url[1] . "' ");
        $page['title'] = $temp[0]['name'];
        $page['description'] = $this->cuttingString($temp[0]['description'], 150);
        $page['keywords'] = $temp[0]['tag'];
        $page['image'] = $temp[0]['image'];
        $page['data'] = $temp[0];
        // get product picture
        $query = $this->db->query("SELECT * FROM productpicture WHERE status = 1 AND product='" . $temp[0]['id'] . "' ORDER BY position");
        $temp2 = $query->fetchAll(PDO::FETCH_ASSOC);
        $page['productPicture'] = $temp2;
        // get product type
        $query = $this->db->query("SELECT * FROM producttype WHERE status = 1 AND product='" . $temp[0]['id'] . "' ORDER BY position");
        if($query){
          $temp3 = $query->fetchAll(PDO::FETCH_ASSOC);
          $page['productType'] = $temp3;
        }
        $query = $this->db->query("SELECT name FROM properties WHERE status = 1 ORDER BY id");
        if($query){
          $temp3 = $query->fetchAll(PDO::FETCH_ASSOC);
          $page['productPropertiesName'] = $temp3;
        }
        $query = $this->db->query("SELECT value FROM properties_detail WHERE status = 1 AND product='" . $temp[0]['id'] . "' ORDER BY id");
        if($query){
          $temp3 = $query->fetchAll(PDO::FETCH_ASSOC);
          $page['productPropertiesDetail'] = $temp3;
        }
      } elseif (sizeof($url) == 3) {
        // danh muc san pham
        $query1 = $this->db->query("SELECT id, name, url, description, image FROM productcategory WHERE url='$url[2]' AND status= 1");
        $danhmuc = $query1->fetchAll(PDO::FETCH_ASSOC);
        if(count($danhmuc) > 0){
          $query3 = $this->db->query("SELECT id FROM product 
                WHERE status=1 AND 
                (category='" . $danhmuc[0]['id'] . "' OR category IN (SELECT id FROM productcategory WHERE cha=" . $danhmuc[0]['id'] . " AND status= 1))");
          $data = $query3->fetchAll(PDO::FETCH_ASSOC);
          $page['title'] = $danhmuc[0]['name'];
          $page['description'] = $this->cuttingString($danhmuc[0]['description'], 150);
          $page['keywords'] = $danhmuc[0]['name'];
          $page['image'] = $danhmuc[0]['image'];
          $page['data'] = $data;
          $page['category'] = $danhmuc[0];
        }else{
          $page['error'] = true;
        }
      } else {
        // tat ca san pham
        $queryInfo = $this->db->query("SELECT * FROM infomation");
        $tempInfo = $queryInfo->fetchAll(PDO::FETCH_ASSOC);
        $query = $this->db->query("SELECT name, description,
                (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image
                FROM product p WHERE status=1 ");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        $page['title'] = "Danh sách sản phẩm";
        $page['description'] = $this->cuttingString($tempInfo[8]['value'], 150);
        $page['showDescription'] = $this->cuttingString($tempInfo[8]['value'], 50);
        $page['keywords'] = $temp[0]['name'];
        $page['image'] =  $tempInfo[7]['value'];
        $page['data'] = $temp;
      }
    else if ($url[0] == 'search'){
      $query = $this->db->query("SELECT * FROM infomation");
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
      $page['title'] = "Tìm kiếm sản phẩm";
      $page['description'] = $this->cuttingString($temp[8]['value'], 150);
      $page['keywords'] = $temp[9]['value'];
      $page['image'] = $temp[7]['value'];
      $page['data']['nhanvien'] = 'Admin';
    }else {
      $query = $this->db->query("SELECT * FROM infomation");
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
      $page['title'] = $temp[0]['value'];
      $page['description'] = $this->cuttingString($temp[8]['value'], 150);
      $page['keywords'] = $temp[9]['value'];
      $page['image'] = $temp[7]['value'];
      $page['data']['nhanvien'] = 'Admin';
    }
    return $page;
  }

  // lấy thông tin menu cha ở header
  function topMenu()
  {
    $condition = " WHERE status=1 AND cha = 0";
    $query = $this->db->query("SELECT *  FROM menu $condition  ORDER BY position");
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  // lấy thông tin menu con ở header
  function subMenu($cha)
  {
    $temp = array();
    $condition = " WHERE status =1 AND cha=$cha ";
    $query = $this->db->query("SELECT * FROM menu $condition ORDER BY position");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy thông tin banner (<vị trí xuất hiện - position>)
  function banner($position)
  {
    $temp = array();
    $condition = " WHERE status =1 AND position ='$position'";
    $limit = " LIMIT 1";
    switch ($position) {
      case '1':
      case '8':
        $limit = "";
        break;
      case '2':
        $limit = " LIMIT 2";
        break;
      case '4':
        $limit = " LIMIT 3";
        break;
      case '5':
        $limit = " LIMIT 2";
        break;
      default:
        $limit = " LIMIT 1";
        break;
    }
    $query = $this->db->query("SELECT * FROM banner $condition ORDER BY id $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy thông tin tab danh mục sản phẩm tại trang chủ
  function homeTabCategory($limit)
  {
    $temp = array();
    $condition = " WHERE status=1 AND cha=0";
    $query = $this->db->query("SELECT * FROM productcategory $condition ORDER BY id LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy sản phẩm theo mã danh mục tại trang chủ
  function homeProductByIdCategory($idCategory, $limit)
  {
    $temp = array();
    $condition = " WHERE status=1 AND category = $idCategory  OR category IN (SELECT id FROM productcategory WHERE cha = $idCategory) ";
    $query = $this->db->query("SELECT *, 
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
        (SELECT id FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as idType, 
        (SELECT price FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as price, 
        (SELECT cost FROM producttype WHERE product = p.id ORDER BY position LIMIT 1 ) as cost 
        FROM product p $condition ORDER BY id DESC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy danh dục sản phẩm
  function productCategory($limit)
  {
    $temp = array();
    $condition = " WHERE status=1 AND cha=0";
    $query = $this->db->query("SELECT * FROM productcategory $condition ORDER BY id LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy sản phẩm liên quan
  function relatedProduct($id, $category, $limit)
  {
    $temp = array();
    $condition = " WHERE status=1 AND category=$category AND id != $id";
    $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
        (SELECT id FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as idType, 
        (SELECT price FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as price, 
        (SELECT cost FROM producttype WHERE product = p.id ORDER BY position LIMIT 1 ) as cost 
        FROM product p $condition ORDER BY RAND() LIMIT $limit");
    if($query){
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
      $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image
        FROM product p $condition ORDER BY RAND() LIMIT $limit");
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return $temp;
  }

  // lấy sản phẩm nổi bật
  function featuredProduct($category, $limit)
  {
    $temp = array();
    $condition = " WHERE status=1 AND category=$category";
    $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
        (SELECT id FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as idType, 
        (SELECT price FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as price, 
        (SELECT cost FROM producttype WHERE product = p.id ORDER BY position LIMIT 1 ) as cost 
        FROM product p $condition ORDER BY view DESC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy sản phẩm theo danh mục có phân trang (<trang hiện tại>,<mã danh mục>,<giới hạn phân trang>)
  function getProductCategory($page, $category, $sort, $limit)
  {
    $from = ($page - 1) * $limit;
    $temp = array();
    $condition = " WHERE status=1 AND (category='$category' OR category IN (SELECT id FROM productcategory WHERE cha='$category' AND status= 1))";
    $sortQuery = "id DESC";
    switch ($sort) {
      case '1':
        $sortQuery = "name ASC";
        break;
      case '2':
        $sortQuery = "name DESC";
        break;
      case '3':
        $sortQuery = "price ASC";
        break;
      case '4':
        $sortQuery = "price DESC";
        break;
      
      default:
        $sortQuery = "id DESC";
        break;
    }
    $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
        (SELECT id FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as idType, 
        (SELECT price FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as price, 
        (SELECT cost FROM producttype WHERE product = p.id ORDER BY position LIMIT 1 ) as cost 
        FROM product p $condition ORDER BY $sortQuery LIMIT $from,$limit");
    if ($query) {
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image
        FROM product p $condition ORDER BY $sortQuery LIMIT $from,$limit");
         $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    return $temp;
  }

  // lấy danh mục sản phẩm cha
  function getProductCategoryParent($limit)
  {
    $temp = array();
    $condition = " WHERE status=1 AND cha = 0";
    $query = $this->db->query("SELECT * FROM productcategory $condition ORDER BY position ASC, name ASC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy danh mục sản phẩm con
  function getProductCategoryChild($cha, $limit)
  {
    $temp = array();
    $condition = " WHERE status=1 AND cha = $cha";
    $query = $this->db->query("SELECT * FROM productcategory $condition ORDER BY position ASC, name ASC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy sản phẩm nổi bật tại trang danh sách sản phẩm
  function featuredAllProduct($limit)
  {
    $temp = array();
    $condition = " WHERE status=1";
    $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
        (SELECT id FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as idType, 
        (SELECT price FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as price, 
        (SELECT cost FROM producttype WHERE product = p.id ORDER BY position LIMIT 1 ) as cost 
        FROM product p $condition ORDER BY view DESC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // lấy danh sách sản phẩm có phân trang (<trang hiện tại>,<giới hạn>)
  function getAllProduct($page, $sort, $limit)
  {
    $from = ($page - 1) * $limit;
    $temp = array();
    $condition = " WHERE status=1";
    $sortQuery = "id DESC";
    switch ($sort) {
      case '1':
        $sortQuery = "name ASC";
        break;
      case '2':
        $sortQuery = "name DESC";
        break;
      case '3':
        $sortQuery = "price ASC";
        break;
      case '4':
        $sortQuery = "price DESC";
        break;
      
      default:
        $sortQuery = "id DESC";
        break;
    }
    $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
        (SELECT id FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as idType, 
        (SELECT price FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as price, 
        (SELECT cost FROM producttype WHERE product = p.id ORDER BY position LIMIT 1 ) as cost 
        FROM product p $condition ORDER BY $sortQuery LIMIT $from,$limit");
    if($query){
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
      $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image
        FROM product p $condition ORDER BY $sortQuery LIMIT $from,$limit");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    }    
    return $temp;
  }
  function getProductSearch($keyword)
  {
    $temp = array();
    $condition = " WHERE status=1 AND name LIKE N'%$keyword%'";
    $query = $this->db->query("SELECT id FROM product $condition ORDER BY id DESC");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getAllProductSearch($page, $keyword, $sort, $limit)
  {
    $from = ($page - 1) * $limit;
    $temp = array();
    $condition = " WHERE status=1 AND name LIKE N'%$keyword%'";
    $sortQuery = "id DESC";
    switch ($sort) {
      case '1':
        $sortQuery = "name ASC";
        break;
      case '2':
        $sortQuery = "name DESC";
        break;
      case '3':
        $sortQuery = "price ASC";
        break;
      case '4':
        $sortQuery = "price DESC";
        break;
      
      default:
        $sortQuery = "id DESC";
        break;
    }
    $query = $this->db->query("SELECT *,
      (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
      (SELECT id FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as idType, 
      (SELECT price FROM producttype WHERE product = p.id ORDER BY position LIMIT 1) as price, 
      (SELECT cost FROM producttype WHERE product = p.id ORDER BY position LIMIT 1 ) as cost 
      FROM product p $condition ORDER BY $sortQuery LIMIT $from,$limit");
    if ($query) {
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      $query = $this->db->query("SELECT *,
      (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image
      FROM product p $condition ORDER BY $sortQuery LIMIT $from,$limit");
      $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return $temp;
  }
  function getNewProduct($limit)
  {
    $temp = array();
    $condition = " WHERE status=1";
    $query = $this->db->query("SELECT *, 
    (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
    DATE_FORMAT(updated,'%d/%m/%Y') AS updated
    FROM product p $condition ORDER BY position DESC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  // blog
  function getBlogCategoryParent()
  {
    $temp = array();
    $condition = " WHERE status=1 AND cha = 0";
    $query = $this->db->query("SELECT * FROM blogcategory $condition ORDER BY name ");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getBlogCategoryChild($cha)
  {
    $temp = array();
    $condition = " WHERE status=1 AND cha = $cha";
    $query = $this->db->query("SELECT * FROM blogcategory $condition ORDER BY name ");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getNewBlog($limit)
  {
    $temp = array();
    $condition = " WHERE status=1";
    $query = $this->db->query("SELECT *, 
    DATE_FORMAT(updated,'%d/%m/%Y') AS updated,
    (SELECT name FROM admin WHERE id=b.author) AS author
    FROM blog b $condition ORDER BY id DESC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getAllBlog($page, $limit)
  {
    $from = ($page - 1) * $limit;
    $temp = array();
    $condition = " WHERE status=1";
    $query = $this->db->query("SELECT *,
    DATE_FORMAT(updated,'%d/%m/%Y') AS updated,
    (SELECT name FROM admin WHERE id=b.author) AS author 
    FROM blog b $condition ORDER BY id DESC LIMIT $from,$limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getBlogCategory($page, $category, $limit)
  {
    $from = ($page - 1) * $limit;
    $temp = array();
    $condition = " WHERE status=1 AND (category='$category' OR category IN (SELECT id FROM blogcategory WHERE cha='$category' AND status= 1))";
    $query = $this->db->query("SELECT *,
    DATE_FORMAT(updated,'%d/%m/%Y') AS updated,
    (SELECT name FROM admin WHERE id=b.author) AS author 
    FROM blog b $condition ORDER BY id DESC LIMIT $from,$limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getBlogSearch($keyword)
  {
    $temp = array();
    $condition = " WHERE status=1 AND title LIKE N'%$keyword%'";
    $query = $this->db->query("SELECT id FROM blog $condition ORDER BY id DESC");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getAllBlogSearch($page, $keyword, $limit)
  {
    $from = ($page - 1) * $limit;
    $temp = array();
    $condition = " WHERE status=1 AND title LIKE N'%$keyword%'";
    $query = $this->db->query("SELECT * FROM blog $condition ORDER BY id DESC LIMIT $from,$limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  // authenticate
  function getUserActionCode($id, $actionCode)
  {
    $temp = array();
    $condition = " WHERE status=1 AND id = '$id' AND action_code = '$actionCode'";
    $query = $this->db->query("SELECT id,name, email, phone, address, province, district, avatar  FROM user $condition");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function checkLoginEmail($email)
  {
    $temp = array();
    $condition = " WHERE status=1 AND email = '$email'";
    $query = $this->db->query("SELECT id  FROM user $condition");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function checkForgotPassword($email)
  {
    $temp = array();
    $condition = " WHERE status=1 AND email = '$email'";
    $query = $this->db->query("SELECT id, name, phone, email, address FROM user $condition");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function login($email, $password)
  {
    $temp = array();
    $condition = " WHERE status=1 AND email = '$email' AND password = '$password'";
    $query = $this->db->query("SELECT id, user_code, name, email, phone, address, province, district, avatar  FROM user $condition");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  // kiểm tra email khi đặt đơn hàng
  function forgotPassword($userInfo)
  {
    $idUser = $userInfo['id'];
    $randomActionCode = $this->randomString(30) . '-' . $idUser;
    $query = $this->update("user", ["action_code" => $randomActionCode], "id= $idUser");
    // gửi email với thông tin tài khoản $userInfo
    $queryInfo = $this->db->query("SELECT * FROM infomation");
    $infoWebsite = $queryInfo->fetchAll(PDO::FETCH_ASSOC);
    // cấu hình email
    $from = ['Email' => 'info@gemstech.com.vn', 'Name' => 'WEBORDER'];
    if ($userInfo['email'] != '')
      $tolist = [['Email' => $userInfo['email'], 'Name' => 'Khách hàng']];
    else
      $tolist = [['Email' => 'velosoftware@gmail.com', 'Name' => 'Khách hàng']];
    $cclist = [['Email' => 'sale@gemstech.com.vn', 'Name' => 'Kinh doanh']];
    $bcc = [];
    $subject = 'Cập nhật mật khẩu từ website Weborder';
    $textpart = 'Cập nhật mật khẩu từ website Weborder';

    $mailContent = '<div id=":tv" class="a3s aiL">
            <table
              bgcolor="#e3e3e6"
              cellpadding="0"
              cellspacing="0"
              style="font-family: Arial, sans-serif;
              font-size: 14px;
              color: #333333;"
              height="100%"
              width="100%"
            >
              <tbody>
                <tr>
                  <td align="center" valign="top">
                    <table
                      bgcolor="#fff"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      height="100%"
                      width="800"
                    >
                      <tbody>
                        <tr>
                          <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="800">
                              <tbody>
                                <tr>
                                  <td style="text-align: center">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      width="100%"
                                    >
                                      <tbody>
                                        <tr>
                                          <td style="text-align: center;
                                          padding-top: 30px;" width="100%">
                                            <a
                                              href="' . HOME . '"
                                              target="_blank"
                                              ><img
                                                style="width: 300px;
                                                height: 120px;
                                                object-fit: contain;"
                                                alt="' . $infoWebsite[0]['value'] . '"
                                                src="' . $infoWebsite[7]['value'] . '"
                                                class="CToWUd"
                                            /></a>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td
                            style="
                              padding-left: 50px;
                              background: #ffffff;
                              padding-bottom: 0px;
                            "
                          >
                            <table
                              bgcolor="#ffffff"
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              width="700"
                            >
                              <tbody>
                                <tr>
                                  <td style="padding: 0px">
                                    <table
                                      border="0"
                                      cellpadding="0"
                                      cellspacing="0"
                                      width="100%"
                                    >
                                      <tbody>
                                        <tr>
                                          <td colspan="2">
                                            <p
                                              style="
                                                margin: 0;
                                                padding: 0;
                                                font-style: italic;
                                                line-height: 1.714;
                                              "
                                            >
                                              Chào&nbsp;<b style="color: #085eab"
                                                >' . $userInfo['name'] . ',</b
                                              >
                                            </p>
                                            <p
                                              style="
                                                margin: 0;
                                                padding: 10px 0 0;
                                                line-height: 1.714;
                                              "
                                            >
                                              Bạn vừa tạo yêu cầu quên mật khẩu tại website
                                              <b
                                                ><a
                                                  href="' . HOME . '"
                                                  target="_blank"
                                                  style="color: #085eab"
                                                  ><span class="il"
                                                    >' . HOME . '</span
                                                  ></a
                                                >!</b
                                              >
                                            </p>
                                            <p
                                              style="
                                                margin: 0;
                                                padding: 0;
                                                padding-top: 10px;
                                                color: #333333 !important;
                                                line-height: 1.714;
                                              "
                                            >
                                              Thông tin tài khoản bao gồm:<br />
                                              + Họ và tên: ' . $userInfo['name'] . '<br />
                                              + Số điện thoại: ' . $userInfo['phone'] . '<br />
                                              + Email: ' . $userInfo['email'] . '<br />
                                              + Địa chỉ: ' . $userInfo['address'] . '
                                            </p>
                                            <p
                                              style="
                                                margin: 0;
                                                padding: 20px 0 5px;
                                                text-align: center;
                                                line-height: 1.714;
                                              "
                                            >
                                              Click vào đường dẫn dưới đây để cập nhật mật
                                              khẩu
                                            </p>
                                            <p
                                              style="
                                                margin: 0;
                                                padding: 20px 0 0;
                                                text-align: center;
                                                line-height: 1.714;
                                              "
                                            >
                                              <a href="' . HOME . '/resetpassword?actioncode=' . $randomActionCode . '" target="_blank">
                                                <button style="border: none;
                                                padding: 10px 40px 10px;
                                                font-size: 14px;
                                                outline: none;
                                                text-transform: uppercase;
                                                margin: 0 0 0 -4px;
                                                font-weight: 700;
                                                letter-spacing: 1px;
                                                background: #085eab;
                                                color: #fff;">
                                                  Cập nhật mật khẩu
                                                </button>
                                              </a>
                                            </p>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img
                              alt=""
                              src="http://weborder.thuonghieuweb.com/template/images/bg-email.jpg"
                              class="CToWUd a6T"
                              tabindex="0"
                            />
                            <div
                              class="a6S"
                              dir="ltr"
                              style="opacity: 0.01; left: 750px; top: 1025.6px"
                            >
                              <div
                                id=":u7"
                                class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q"
                                role="button"
                                tabindex="0"
                                aria-label="Tải xuống tệp đính kèm "
                                data-tooltip-class="a1V"
                                data-tooltip="Tải xuống"
                              >
                                <div class="akn"><div class="aSK J-J5-Ji aYr"></div></div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td bgcolor="#014b8d">
                            <p style="color: #fff;
                            font-size: 13px;
                            text-align: center;
                            line-height: 1.846;
                            padding: 20px 0;">
                              Lưu ý: Đây là email riêng tư và không được phép tiết lộ.
                              <br />
                              Nếu bạn nhận được email này do nhầm lẫn, vui lòng liên hệ
                              <a style="color: #fff;" href="mailto:support@gemstech.com.vn" target="_blank"
                                >support@gemstech.com.vn</a
                              ><br />
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          ';
    $result = $this->sendmail($from, $tolist, $cclist, $bcc, $subject, $mailContent, $textpart);
    return 1;
  }
  function checkUpdateProfile($email)
  {
    $temp = array();
    $id = $_SESSION['weborderuser']['id'];
    $condition = " WHERE status=1 AND id != '$id' AND email = '$email'";
    $query = $this->db->query("SELECT id  FROM user $condition");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function updateProfile($dataProfile)
  {
    $id = $_SESSION['weborderuser']['id'];
    $query = $this->update("user", $dataProfile, " id = $id");
    return $query;
  }
  function updatePassword($id, $dataSetPass)
  {
    $query = $this->update("user", $dataSetPass, " id = $id");
    return $query;
  }
  function checkRegister($email)
  {
    $temp = array();
    $condition = " WHERE status=1 AND email = '$email'";
    $query = $this->db->query("SELECT id  FROM user $condition");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function register($dataRegister)
  {
    $query = $this->insert("user", $dataRegister);
    $idUser = $this->db->lastInsertId();
    $query = $this->update("user", ["user_code" => "NN".$idUser ], " id = $idUser");
    return $query;
  }

  function saveContact($dataContact)
  {
    $query = $this->insert("contact", $dataContact);
    return $query;
  }
  function saveBaoGia($dataContact)
  {
    $query = $this->insert("contact", $dataContact);
    // gửi mail cho quản trị viên
    $queryInfo = $this->db->query("SELECT * FROM infomation");
    $info = $queryInfo->fetchAll(PDO::FETCH_ASSOC);
    $infoWebsite = array();
    foreach ($info as $value) {
        $infoWebsite[$value['key_info']] = $value['value'];
    }
      // cấu hình mail 
      $from = ['Email' => 'info@gemstech.com.vn', 'Name' => 'VANDA'];
      $tolist = [['Email' => $infoWebsite['email-bao-gia'], 'Name' => 'Quản trị viên']];
      $cclist = [];
      // $cclist = [['Email' => 'sale@gemstech.com.vn', 'Name' => 'Kinh doanh']];
      $bcc = [];
      // $bcc = [['Email' => 'nguyenducloc2903@gmail.com', 'Name' => 'Loc ']];
      $subject = 'Đăng ký báo giá từ website Vanda';
      $textpart = 'Đăng ký báo giá từ website Vanda';

      $mailContent = '<div id=":tv" class="a3s aiL">
      <table bgcolor="#e3e3e6" cellpadding="0" cellspacing="0" style="font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333333;" height="100%" width="100%">
          <tbody>
              <tr>
                  <td align="center" valign="top">
                      <table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" height="100%" width="800">
                          <tbody>
                              <tr>
                                  <td>
                                      <table border="0" cellpadding="0" cellspacing="0" width="800">
                                          <tbody>
                                              <tr>
                                                  <td style="text-align: center">
                                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                          <tbody>
                                                              <tr>
                                                                  <td style="text-align: center;
                                    padding-top: 30px;" width="100%">
                                                                      <a href="' . HOME . '" target="_blank"><img style="width: 300px;
                                          height: 120px;
                                          object-fit: contain;" alt="' . $infoWebsite['ten-cong-ty'] . '" src="' . $infoWebsite['avatar'] . '" class="CToWUd" /></a>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </td>
                              </tr>
                              <tr>
                                  <td style="
                        padding-left: 50px;
                        background: #ffffff;
                        padding-bottom: 0px;
                      ">
                                      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="700">
                                          <tbody>
                                              <tr>
                                                  <td style="padding: 0px">
                                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                          <tbody>
                                                              <tr>
                                                                  <td colspan="2">
                                                                      <p style="
                                          margin: 0;
                                          padding: 0;
                                          font-style: italic;
                                          line-height: 1.714;
                                        ">
                                                                          Chào bạn,
                                                                      </p>
                                                                      <p style="
                                          margin: 0;
                                          padding: 10px 0 0;
                                          line-height: 1.714;
                                        ">
                                                                          Có yêu cầu đăng ký nhận báo giá tại website Vanda !
                                                                      </p>
                                                                      <p style="
                                          margin: 0;
                                          padding: 0;
                                          padding-top: 10px;
                                          color: #333333 !important;
                                          line-height: 1.714;
                                        ">
                                                                          Thông tin khách hàng bao gồm:<br /> + Tên người nhận: ' . $dataContact['name'] . '<br /> + Số điện thoại: ' . $dataContact['phone'] . '<br /> + Email: ' . $dataContact['email'] . '<br /> 
                                                                      </p>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <img alt="" src="'.HOME.'/template/images/bg-email.jpg" class="CToWUd a6T" tabindex="0" />
                                  </td>
                              </tr>
                              <tr>
                                  <td bgcolor="#014b8d">
                                      <p style="color: #fff;
                      font-size: 13px;
                      text-align: center;
                      line-height: 1.846;
                      padding: 20px 0;">
                                          Lưu ý: Đây là email riêng tư và không được phép tiết lộ.
                                          <br /> Nếu bạn nhận được email này do nhầm lẫn, vui lòng liên hệ
                                          <a style="color: #fff;" href="mailto:support@gemstech.com.vn" target="_blank">support@gemstech.com.vn</a
                        ><br />
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>';
      $result = $this->sendmail($from, $tolist, $cclist, $bcc, $subject, $mailContent, $textpart);
    return $query;
  }
  function saveDatHang($dataBook)
  {
    $query = $this->insert("booking", $dataBook);
    // gửi mail cho quản trị viên
    $idProduct = $dataBook['id_product'];
    $queryInfo = $this->db->query("SELECT * FROM product WHERE id = $idProduct");
    $infoProduct = $queryInfo->fetchAll(PDO::FETCH_ASSOC);
    $infoProduct = $infoProduct[0];
    $queryInfo = $this->db->query("SELECT * FROM infomation");
    $info = $queryInfo->fetchAll(PDO::FETCH_ASSOC);
    $infoWebsite = array();
    foreach ($info as $value) {
        $infoWebsite[$value['key_info']] = $value['value'];
    }
      // cấu hình mail 
      $from = ['Email' => 'info@gemstech.com.vn', 'Name' => 'VANDA'];
      $tolist = [['Email' => $infoWebsite['email-bao-gia'], 'Name' => 'Quản trị viên']];
      $cclist = [];
      // $cclist = [['Email' => 'sale@gemstech.com.vn', 'Name' => 'Kinh doanh']];
      $bcc = [];
      // $bcc = [['Email' => 'nguyenducloc2903@gmail.com', 'Name' => 'Loc ']];
      $subject = 'Đơn hàng online từ website Vanda';
      $textpart = 'Đơn hàng online từ website Vanda';

      $mailContent = '<div id=":tv" class="a3s aiL">
      <table bgcolor="#e3e3e6" cellpadding="0" cellspacing="0" style="font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333333;" height="100%" width="100%">
          <tbody>
              <tr>
                  <td align="center" valign="top">
                      <table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" height="100%" width="800">
                          <tbody>
                              <tr>
                                  <td>
                                      <table border="0" cellpadding="0" cellspacing="0" width="800">
                                          <tbody>
                                              <tr>
                                                  <td style="text-align: center">
                                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                          <tbody>
                                                              <tr>
                                                                  <td style="text-align: center;
                                    padding-top: 30px;" width="100%">
                                                                      <a href="' . HOME . '" target="_blank"><img style="width: 300px;
                                          height: 120px;
                                          object-fit: contain;" alt="' . $infoWebsite['ten-cong-ty'] . '" src="' . $infoWebsite['avatar'] . '" class="CToWUd" /></a>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </td>
                              </tr>
                              <tr>
                                  <td style="
                        padding-left: 50px;
                        background: #ffffff;
                        padding-bottom: 0px;
                      ">
                                      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="700">
                                          <tbody>
                                              <tr>
                                                  <td style="padding: 0px">
                                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                          <tbody>
                                                              <tr>
                                                                  <td colspan="2">
                                                                      <p style="
                                          margin: 0;
                                          padding: 0;
                                          font-style: italic;
                                          line-height: 1.714;
                                        ">
                                                                          Chào bạn,
                                                                      </p>
                                                                      <p style="
                                          margin: 0;
                                          padding: 10px 0 0;
                                          line-height: 1.714;
                                        ">
                                                                          Có đơn đặt hàng mới tại website Vanda !
                                                                      </p>
                                                                      <p style="
                                          margin: 0;
                                          padding: 0;
                                          padding-top: 10px;
                                          color: #333333 !important;
                                          line-height: 1.714;
                                        ">
                                                                          Thông tin đơn hàng bao gồm:<br /> + Tên người nhận: ' . $dataBook['name'] . '<br /> + Số điện thoại: ' . $dataBook['phone'] . '<br /> + Email: ' . $dataBook['email'] . '<br /> + Địa chỉ: ' . $dataBook['address']
        . '<br /> + Sản phẩm được đặt hàng: <a target="_blank" href="'.HOME.'/product'.'/'.$infoProduct['url'].'">'.$infoProduct['code'].' - '.$infoProduct['name'].'</a><br /> 
                                                                      </p>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <img alt="" src="'.HOME.'/template/images/bg-email.jpg" class="CToWUd a6T" tabindex="0" />
                                  </td>
                              </tr>
                              <tr>
                                  <td bgcolor="#014b8d">
                                      <p style="color: #fff;
                      font-size: 13px;
                      text-align: center;
                      line-height: 1.846;
                      padding: 20px 0;">
                                          Lưu ý: Đây là email riêng tư và không được phép tiết lộ.
                                          <br /> Nếu bạn nhận được email này do nhầm lẫn, vui lòng liên hệ
                                          <a style="color: #fff;" href="mailto:support@gemstech.com.vn" target="_blank">support@gemstech.com.vn</a
                        ><br />
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>';
      $result = $this->sendmail($from, $tolist, $cclist, $bcc, $subject, $mailContent, $textpart);
    return $query;
  }

  function getProductCart($id, $idTypeProduct)
  {
    $temp = array();
    $condition = " WHERE status=1 AND id = '$id'";
    $conditionType = " WHERE product = p.id AND id='$idTypeProduct'";
    $query = $this->db->query("SELECT *,
        (SELECT link from productpicture WHERE product = p.id ORDER BY position LIMIT 1 ) as image, 
        (SELECT id FROM producttype $conditionType ORDER BY position LIMIT 1) as idType, 
        (SELECT name FROM producttype $conditionType ORDER BY position LIMIT 1) as nameType, 
        (SELECT count(id) FROM producttype WHERE product = p.id ORDER BY position) as countType, 
        (SELECT price FROM producttype $conditionType ORDER BY position LIMIT 1) as price, 
        (SELECT cost FROM producttype $conditionType ORDER BY position LIMIT 1 ) as cost 
        FROM product p $condition ORDER BY id DESC");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp[0];
  }
  // lưu đơn hàng
  function saveOrder($order)
  {
    $email = $order['email'];
    $queryOrder = $this->insert("orderlist", $order);
    if ($queryOrder) {
      $idOrder = $this->db->lastInsertId();
      $total = 0;
      $htmlTableCart = "";
      $i = 1;
      foreach ($_SESSION['weborderCart'] as $product) {
        foreach ($product as $key => $value) {
          $itemOrder = array(
            'id_order' => $idOrder,
            'product' => $value['id'],
            'quantity' => $value['qty'],
            'id_type_product' => $value['idType'],
            'price' => $value['price'],
            'discount' => 0,
            'status' => 1
          );
          $queryDetails = $this->insert("orderdetails", $itemOrder);
          $htmlTableCart .= '<tr>
          <td style="text-align: center;">' . ($i++) . '</td>
          <td>' . $value['name'] . '</td>
          <td style="text-align: right;"> ' . number_format($value['price']) . ' đ</td>
          <td style="text-align: center;">' . $value['qty'] . '</td>
          <td style="text-align: right;"> ' . number_format($value['qty'] * $value['price']) . ' đ</td>
      </tr>';
          $total += $value['qty'] * $value['price'];
        }
      }
      $dataTotal = array('total' => $total);
      $queryTotal = $this->update("orderlist", $dataTotal, " id=$idOrder");
      // gửi email đặt hàng cho quản trị
      $paymentMethod = ($order['paymentMethod'] > 0) ? "Hình thức khác" : "Thanh toán khi nhận hàng";
      $queryInfo = $this->db->query("SELECT * FROM infomation");
      $infoWebsite = $queryInfo->fetchAll(PDO::FETCH_ASSOC);

      // cấu hình mail 
      $from = ['Email' => 'info@gemstech.com.vn', 'Name' => 'WEBORDER'];
      if ($email != '')
        $tolist = [['Email' => $email, 'Name' => 'Khách hàng']];
      else
        $tolist = [['Email' => 'velosoftware@gmail.com', 'Name' => 'Khách hàng']];
      $cclist = [['Email' => 'sale@gemstech.com.vn', 'Name' => 'Kinh doanh']];
      $bcc = [];
      // $bcc = [['Email' => 'nguyenducloc2903@gmail.com', 'Name' => 'Loc ']];
      $subject = 'Đơn hàng online từ website Weborder';
      $textpart = 'Đơn hàng online từ website Weborder';

      $mailContent = '<div id=":tv" class="a3s aiL">
      <table bgcolor="#e3e3e6" cellpadding="0" cellspacing="0" style="font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333333;" height="100%" width="100%">
          <tbody>
              <tr>
                  <td align="center" valign="top">
                      <table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" height="100%" width="800">
                          <tbody>
                              <tr>
                                  <td>
                                      <table border="0" cellpadding="0" cellspacing="0" width="800">
                                          <tbody>
                                              <tr>
                                                  <td style="text-align: center">
                                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                          <tbody>
                                                              <tr>
                                                                  <td style="text-align: center;
                                    padding-top: 30px;" width="100%">
                                                                      <a href="' . HOME . '" target="_blank"><img style="width: 300px;
                                          height: 120px;
                                          object-fit: contain;" alt="' . $infoWebsite[0]['value'] . '" src="' . $infoWebsite[7]['value'] . '" class="CToWUd" /></a>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </td>
                              </tr>
                              <tr>
                                  <td style="
                        padding-left: 50px;
                        background: #ffffff;
                        padding-bottom: 0px;
                      ">
                                      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="700">
                                          <tbody>
                                              <tr>
                                                  <td style="padding: 0px">
                                                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                          <tbody>
                                                              <tr>
                                                                  <td colspan="2">
                                                                      <p style="
                                          margin: 0;
                                          padding: 0;
                                          font-style: italic;
                                          line-height: 1.714;
                                        ">
                                                                          Chào bạn,
                                                                      </p>
                                                                      <p style="
                                          margin: 0;
                                          padding: 10px 0 0;
                                          line-height: 1.714;
                                        ">
                                                                          Cảm ơn bạn đã đặt hàng tại website Vanda !
                                                                      </p>
                                                                      <p style="
                                          margin: 0;
                                          padding: 0;
                                          padding-top: 10px;
                                          color: #333333 !important;
                                          line-height: 1.714;
                                        ">
                                                                          Thông tin đơn hàng bao gồm:<br /> + Tên người nhận: ' . $order['name'] . '<br /> + Số điện thoại: ' . $order['phone'] . '<br /> + Email: ' . $email . '<br /> + Địa chỉ: ' . $order['address']
        . '<br /> + Ghi chú: ' . $order['note'] . '<br /> + Hình thức thanh toán: ' . $paymentMethod . '<br /> + Tổng tiền: ' . number_format($total) . ' đ
                                                                      </p>
                                                                      <h3 style="text-align: center; width: 100%; margin: 20px;">CHI TIẾT ĐƠN HÀNG</h3>
                                                                      <table style="width: 100%;">
                                                                          <thead>
                                                                              <tr>
                                                                                  <th>STT</th>
                                                                                  <th style="text-align: left;">Tên sản phẩm</th>
                                                                                  <th style="text-align: right;">Đơn giá</th>
                                                                                  <th>Số lượng</th>
                                                                                  <th style="text-align: right;">Thành tiền</th>
                                                                              </tr>
                                                                          </thead>
                                                                          <tbody>
                                                                              ' . $htmlTableCart . '
                                                                          </tbody>
                                                                      </table>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      <img alt="" src="http://weborder.thuonghieuweb.com/template/images/bg-email.jpg" class="CToWUd a6T" tabindex="0" />
                                      <div class="a6S" dir="ltr" style="opacity: 0.01; left: 750px; top: 1025.6px">
                                          <div id=":u7" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Tải xuống tệp đính kèm " data-tooltip-class="a1V" data-tooltip="Tải xuống">
                                              <div class="akn">
                                                  <div class="aSK J-J5-Ji aYr"></div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                  <td bgcolor="#014b8d">
                                      <p style="color: #fff;
                      font-size: 13px;
                      text-align: center;
                      line-height: 1.846;
                      padding: 20px 0;">
                                          Lưu ý: Đây là email riêng tư và không được phép tiết lộ.
                                          <br /> Nếu bạn nhận được email này do nhầm lẫn, vui lòng liên hệ
                                          <a style="color: #fff;" href="mailto:support@gemstech.com.vn" target="_blank">support@gemstech.com.vn</a
                        ><br />
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>';
      $result = $this->sendmail($from, $tolist, $cclist, $bcc, $subject, $mailContent, $textpart);
    }
    return $queryOrder;
  }

  
  // lấy danh sách đối tác (<giới hạn>)
  function getDoiTac($limit)
  {
    $temp = array();
    $condition = " WHERE tinh_trang=1";
    $query = $this->db->query("SELECT * FROM doitac $condition ORDER BY id DESC LIMIT $limit");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }

  //------------------- phần mở rộng từng website ---------------
  
  function saveChinaOrder($order)
  {
    $query = $this->insert("chinaorder", $order);
    return $query;
  }
  function cancelChinaOrder($id)
  {
    $data = array(
      'status' => 9,
      'comment' => "Khách hàng yêu cầu hủy vào lúc " . date('d-m-Y H:i:s')
    );
    $query = $this->update("chinaorder", $data, " id = $id");
    return $query;
  }

  function getAllOrder($idUser, $orderId, $status, $active, $dateAdded, $dateModified)
  {
    $temp = array();
    $timest = ' 00:00:00';
    $timeend = ' 23:59:59';
    $condition = " WHERE status > 0 AND customer = $idUser";
    if ($orderId != "") {
      $condition .= " AND id LIKE '%$orderId%'";
    }
    if ($status != 0) {
      $condition .= " AND status = $status";
    }
    if ($active != 0) {
      $condition .= " AND active = $active";
    }
    if ($dateAdded != 0 && $dateModified != 0) {
      $condition .= " AND updated >='$dateAdded $timest' AND updated <= '$dateModified $timeend' ";
    }
    $query = $this->db->query("SELECT *, 
    DATE_FORMAT(updated,'%d/%m/%Y') AS updated 
    FROM chinaorder $condition ORDER BY id DESC");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
    // return $condition;
  }
  // lấy danh sách tracking
  function getAllTracking($idUser, $trackingNumber, $dateAdded, $dateModified)
  {
    $temp = array();
    $timest = ' 00:00:00';
    $timeend = ' 23:59:59';
    $condition = " WHERE status > 0 AND id_user = $idUser";
    if ($trackingNumber != "") {
      $condition .= " AND tracking_number LIKE N'%$trackingNumber%'";
    }
    if ($dateAdded != 0 && $dateModified != 0) {
      $condition .= " AND updated >='$dateAdded $timest' AND updated <= '$dateModified $timeend' ";
    }
    $query = $this->db->query("SELECT *, DATE_FORMAT(updated,'%d/%m/%Y') AS updated FROM tracking $condition ORDER BY id DESC");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  // lưu tracking
  function saveTracking($tracking)
  {
    $query = $this->insert("tracking", $tracking);
    $dataNotification = array(
      'content' => 'Thêm mới tracking '.$tracking['tracking_number'].' thành công.',
      'id_user' => $tracking['id_user'],
      'updated' => date('Y-m-d H:i:s')
    );
    $query2 = $this->insert("notification", $dataNotification);
    return $query;
  }

  function getAllTransaction($idUser, $dateAdded, $dateModified)
  {
    $temp = array();
    $timest = ' 00:00:00';
    $timeend = ' 23:59:59';
    $condition = " WHERE status > 0 AND id_user = $idUser";
    if ($dateAdded != 0 && $dateModified != 0) {
      $condition .= " AND updated >='$dateAdded $timest' AND updated <= '$dateModified $timeend' ";
    }
    $query = $this->db->query("SELECT *, DATE_FORMAT(updated,'%d/%m/%Y') AS updated FROM transaction $condition ORDER BY id");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getAllTransactionType1($idUser, $dateAdded, $dateModified)
  {
    $temp = array();
    $timest = ' 00:00:00';
    $timeend = ' 23:59:59';
    $condition = " WHERE status > 0 AND type = 1 AND id_user = $idUser";
    if ($dateAdded != 0 && $dateModified != 0) {
      $condition .= " AND updated >='$dateAdded $timest' AND updated <= '$dateModified $timeend' ";
    }
    $query = $this->db->query("SELECT *, DATE_FORMAT(updated,'%d/%m/%Y') AS updated FROM transaction $condition ORDER BY id");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getAllNotification($idUser)
  {
    $temp = array();
    $condition = " WHERE status > 0 AND id_user = $idUser";
    $query = $this->db->query("SELECT *, DATE_FORMAT(updated,'%d/%m/%Y') AS updated FROM notification $condition ORDER BY id DESC");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
  function getSurplus($idUser)
  {
    $temp = array();
    $condition = " WHERE status > 0 AND id_user = $idUser";
    $query = $this->db->query("SELECT id, id_user, surplus FROM transaction $condition ORDER BY id DESC LIMIT 1");
    $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    return $temp;
  }
}
