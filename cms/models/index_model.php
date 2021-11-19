<?php

class index_model extends model
{
    function __construct()
    {
        parent::__construct();
    }

    function thongketinrao()
    {
        $result = array();
//        $qr = $this->db->query("SELECT max(ngay_dang) as ngaydang FROM tinrao WHERE status>0");
//        $temp = $qr->fetchAll(PDO::FETCH_ASSOC);
        $date = date('Y-m-d');
        $newdate = strtotime('-6 day', strtotime($date));
        $newdate = date('Y-m-d', $newdate);
        $dieukien = " WHERE status>0 AND updated>='$newdate' AND updated<='$date'";
        $query = $this->db->query("SELECT count(id) as total,updated FROM blog $dieukien GROUP BY updated ORDER BY updated ASC");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($temp) {
            //  $result=$temp;
            $j = 0;
            for ($i = 6; $i >= 0; $i--) {
                $date1 = strtotime("-$i day", strtotime($date));
                if (isset($temp[$j]) && strtotime($temp[$j]['updated']) == $date1) {
                    $result += array($i => array('total' => $temp[$j]['total'], 'updated' => date('d/m', $date1)));
                    $j++;
                } else
                    $result += array($i => array('total' => 0, 'updated' => date('d/m', $date1)));
            }

        } else {
            for ($i = 0; $i < 7; $i++) {
                $date1 = strtotime("-$i day", strtotime($date));
                $result += array($i => array('total' => 0, 'updated' => date('d/m', $date1)));
            }
        }
        return $result;
    }

    function thongketincan()
    {
        $date = date('Y-m-d');
        $result = array();
//        $qr = $this->db->query("SELECT max(ngay_dang) as ngaydang FROM tincan WHERE status>0");
//        $temp = $qr->fetchAll(PDO::FETCH_ASSOC);
        $newdate = strtotime('-6 day', strtotime($date));
        $newdate = date('Y-m-d', $newdate);
        $dieukien = " WHERE status>0 AND updated>='$newdate' AND updated<='$date'";
//        $dieukien = " WHERE status>0 ";
        $sql = "SELECT count(id) as total,updated FROM product $dieukien GROUP BY updated ORDER BY updated ASC LIMIT 7";
        $query = $this->db->query($sql);
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($temp) {
            $j = 0;
            for ($i = 6; $i >= 0; $i--) {
                $date1 = strtotime("-$i day", strtotime($date));
                if (isset($temp[$j]) && strtotime($temp[$j]['updated']) == $date1) {
                    $result+= array($i => array('total' => $temp[$j]['total'], 'updated' => date('d/m', $date1)));
                    $j++;
                } else
                    $result += array($i => array('total' => 0, 'updated' => date('d/m', $date1)));
            }
        } else {
            for ($i = 0; $i < 7; $i++) {
                $date1 = strtotime("-$i day", strtotime($date));
                $result += array($i => array('total' => 0, 'updated' => date('d/m', $date1)));
            }
        }
        return $result;
    }

    function tongtinrao($kieu)
    {
        $result = array();
        $date = date("Y-m-d");
        $dieukien = " WHERE status>0 ";
        if ($kieu == 1)
            $query = $this->db->query("SELECT count(id) as total FROM blog $dieukien");
        else
            $query = $this->db->query("SELECT count(id) as total FROM product $dieukien");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['total'];
    }

    function tongkh()
    {
        $result = array();

        $dieukien = " WHERE status>0 ";
        $query = $this->db->query("SELECT count(id) as total FROM contact $dieukien");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['total'];
    }

    function totalviews()
    {
        $result = array();
        $dieukien = " WHERE status>0 ";
        $query = $this->db->query("SELECT count(id) as total FROM views $dieukien");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['total'];
    }

    function truycap7ngay()
    {
        $date = date('Y-m-d');
//        $qr = $this->db->query("SELECT max(ngay_dang) as ngaydang FROM tincan WHERE status>0");
//        $temp = $qr->fetchAll(PDO::FETCH_ASSOC);
        $result['rows'] = array();
        $newdate = strtotime('-6 day', strtotime($date));
        $newdate = date('Y-m-d', $newdate);
        $dieukien = " WHERE status>0 AND times>='$newdate 00:00:00' AND times<='$date 23:59:59' ";
        $query = $this->db->query("SELECT count(1) as total FROM views $dieukien");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        $result['total'] = $temp[0]['total'];
        $query = $this->db->query("SELECT count(1) as truycap, DATE_FORMAT(times,'%d/%m/%Y') as ngaygio 
        FROM views $dieukien GROUP BY ngaygio");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($temp)
            $result['rows'] = $temp;
        return $result;
    }

    function doanhthu()
    {
        $dieukien = " WHERE status>0  ";
        $query = $this->db->query("SELECT COUNT(id) as doanhthu FROM booking $dieukien");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return number_format($result[0]['doanhthu']);
    }

    function doanhthu7ngay()
    {
        $date = date('Y-m-d');
//        $qr = $this->db->query("SELECT max(ngay_dang) as ngaydang FROM tincan WHERE status>0");
//        $temp = $qr->fetchAll(PDO::FETCH_ASSOC);
        $result['rows'] = array();
        $newdate = strtotime('-6 day', strtotime($date));
        $newdate = date('Y-m-d', $newdate);
        $dieukien = " WHERE status>0  AND updated>='$newdate 00:00:00' AND updated<='$date 23:59:59' ";
        $query = $this->db->query("SELECT SUM(total) as doanhthu FROM orderlist $dieukien");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        $result['total'] = $temp[0]['doanhthu'];
        $query = $this->db->query("SELECT SUM(total) as doanhthu,updated, DATE_FORMAT(updated,'%Y-%m-%d') as updated 
        FROM orderlist $dieukien GROUP BY updated ORDER BY updated ASC");
        $temp = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($temp) {
            $j = 0;
            for ($i = 6; $i >= 0; $i--) {
                $date1 = strtotime("-$i day", strtotime($date));
                if (isset($temp[$j]) && strtotime($temp[$j]['updated']) == $date1) {
                    $result['rows'] += array($i => array('doanhthu' => $temp[$j]['doanhthu'], 'updated' => date('d/m/Y', $date1)));
                    $j++;
                } else
                    $result['rows'] += array($i => array('doanhthu' => 0, 'updated' => date('d/m/Y', $date1)));
            }
        } else {
            for ($i = 6; $i >= 0; $i--) {
                $date1 = strtotime("-$i day", strtotime($date));
                $result['rows'] += array($i => array('doanhthu' => 0, 'updated' => $date1));
            }
        }
        return $result;
    }

    function luotxemvanphong()
    {
        $sql = "SELECT count(id) as total
                FROM `contact` WHERE status>0 ";
        $query = $this->db->query($sql);
        return $temp = $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
