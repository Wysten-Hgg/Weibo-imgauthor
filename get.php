<?php
if($_POST){
    $filename = $_POST['pic_path'];
    $houzhui = substr(strrchr($filename, '.'), 1);
    $result = basename($filename,".".$houzhui);
    $result=substr($result,0,8);

    if(substr($result,0,3)=='005' || substr($result,0,3)=='006' ){
        $uid=from62_to10($result);
        $data="https://weibo.com/u/".$uid;
    }else{
        $uid=hexdec($result);
        $data="https://weibo.com/u/".$uid;
    }
    $res = json_encode($data);
    echo $res;
}


function from62_to10($num) {
    $from = 62;
    $num = strval($num);
    $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $len = strlen($num);
    $dec = 0;
    for($i = 0; $i < $len; $i++) {
        $pos = strpos($dict, $num[$i]);
        $dec = bcadd(bcmul(bcpow($from, $len - $i - 1), $pos), $dec);
    }
    return $dec;
}

?>


