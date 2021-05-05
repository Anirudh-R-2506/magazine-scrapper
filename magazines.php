<?php

function get_page_no($num){
    return str_repeat('0',(4-strlen(strval($num)))).strval($num);
}
function url_not_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($retcode == 200){
        curl_close($ch);
        return 0;
    }
    else{
        curl_close($ch);
        return 1;
    }
}
function bakthi_sup(){

    $today = '2021-04-29';#date('Y-m-d');

    function save_pages2($date,$link,$type){    
        mkdir('bakthi_supplement/links/'.$date,0755,true);
        fwrite(fopen('bakthi_supplement/links/'.$date.'/'.$type.'.txt','w+'),$link."\n");
        return 1;
    }
    
    $url4 = "https://www.kumudam.com/magazine/Bakthi/".$today."/book2/files/assets/common/page-vectorlayers/";
$url5 = ".svg?uni=1c0f52ecd48491ee805bd0b4618d4d02";
$url1 = "https://www.kumudam.com/magazine/Bakthi/".$today."/book2/files/assets/common/page-html5-substrates/page";
$url2 = "_1.jpg?uni=1c0f52ecd48491ee805bd0b4618d4d02";
    $page = 1;
    if (url_not_exists($url1.get_page_no($page).$url2)){    
        return;
    }
    $img = '';
    $svg = '';
    while(1){
        echo get_page_no($page)."\n";
        if (url_not_exists($url1.get_page_no($page).$url2)){
            break;
        }
        $img .= $url1.get_page_no($page).$url2."\n";
        $svg .= $url4.get_page_no($page).$url5."\n";
        $page = $page + 1;
        }
    save_pages2($today,$img,'img');
    save_pages2($today,$svg,'svg');
    }

function bakthi(){
$today = date('Y-m-d');

function save_pages2($date,$link,$type){    
    mkdir('bakthi/links/'.$date,0755,true);
    fwrite(fopen('bakthi/links/'.$date.'/'.$type.'.txt','w+'),$link."\n");
    return 1;
}

$url4 = "https://www.kumudam.com/magazine/Bakthi/".$today."/files/assets/common/page-vectorlayers/";
$url5 = ".svg?uni=1c0f52ecd48491ee805bd0b4618d4d02";
$url1 = "https://www.kumudam.com/magazine/Bakthi/".$today."/files/assets/common/page-html5-substrates/page";
$url2 = "_1.jpg?uni=1c0f52ecd48491ee805bd0b4618d4d02";
$page = 1;
if (url_not_exists($url1.get_page_no($page).$url2)){    
    return;
}
$img = '';
$svg = '';
while(1){
    echo get_page_no($page)."\n";
    if (url_not_exists($url1.get_page_no($page).$url2)){
        break;
    }
    $img .= $url1.get_page_no($page).$url2."\n";
    $svg .= $url4.get_page_no($page).$url5."\n";
    $page = $page + 1;
    }
save_pages2($today,$img,'img');
save_pages2($today,$svg,'svg');
}
#file_put_contents('bakthi/cover.jpg',file_get_contents('https://www.kumudam.com/magazine/Bakthi/'.$today.'/files/assets/cover300.jpg?uni=47e698ba4850f09cd7aa3b9d9a4c01d4'));



function deepam(){
function dates(){
    $month = array(
        '01'=>'jan',
        '02'=>'feb',
        '03'=>'mar',
        "04"=>'apr',
        '05'=>'may',
        '06'=>'jun',
        '07'=>'jul',
        '08'=>'aug',
        '09'=>'sep',
        '10'=>'oct',
        '11'=>'nov',
        '12'=>'dec',
    );
    $today = date('Y-m-d');
    $l = array_reverse(explode('-',$today));
    $month_alpha = $month[$l[1]];
    $year = $l[2];
    $issue = '';
    foreach($l as $e){
        $issue.=$e;
    }
    return array($issue,$year,$month_alpha);
}    

function save_pages3($link,$date){
    mkdir('deepam/links/'.$date,0755,true);
    fwrite(fopen('deepam/links/'.$date.'/img.txt','w+'),$link);
    return 1;
}


$da = dates();
$url = 'https://www.kalkionline.com/flipb/upload/deepam/';
$page = 1;
$f = '';
if (url_not_exists($url.$da[1].'/'.$da[2].'/'.$da[0].'/'.$page.'.jpg')){
    return;
}
while (1){
    if (url_not_exists($url.$da[1].'/'.$da[2].'/'.$da[0].'/'.$page.'.jpg')){
        break;
    }
    else{
        $f.=$url.$da[1].'/'.$da[2].'/'.$da[0].'/'.$page.'.jpg'."\n";
        $page += 1;
}
}
save_pages3($f,$da[0]);

}
bakthi_sup();
bakthi();
deepam();
