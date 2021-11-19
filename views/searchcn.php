<?php
if (isset($_POST['btnSubmit'])) {
    $keyword = (isset($_POST['keyword'])) ? $_POST['keyword'] : ' ';
    $keyword = str_replace(' ', '%20', $keyword);
    $apiKey = 'AIzaSyCgPJ_Tci5j05CDbvkN1GDVEaibRbK68Yk';
    //$url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=fr';
    $url = 'https://www.googleapis.com/language/translate/v2?key='.$apiKey.'&target=zh-CN&q=' . $keyword;
    $data = file_get_contents($url);
    $data = json_decode($data, true);
    $value = rtrim($data['data']['translations'][0]['translatedText']);
    $value= str_replace('_n','',$value);
    
    // phân loại
    $selectSearchForm = (isset($_POST['selectSearchForm'])) ? $_POST['selectSearchForm'] : '1688';
    $link = "";
    if ($selectSearchForm == '1688') {
        $link = "https://s.1688.com/selloffer/offer_search.htm?_input_charset=utf-8&keywords=" . $value;
    } else if ($selectSearchForm == 'taobao') {
        $link = "https://s.taobao.com/search?q=" . $value . "&type=p&tmhkh5=&spm=a21wu.241046-global.a2227oh.d100&from=sea_1_searchbutton&catId=100";
    } else {
        $link = "https://list.tmall.com/search_product.htm?q=" . $value;
    }
    echo "<script>var redirectWindow = window.open('".$link."', '_blank'); redirectWindow.location; window.history.back();</script>";
} else {
    echo '<script>window.location.replace("' . HOME . '");</script>';
}

?>