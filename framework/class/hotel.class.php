<?php
/**
 * [WEIZAN System] Copyright (c) 2014 012WZ.COM
 * WEIZAN is NOT a free software, it under the license terms, visited http://www.012wz.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
class hotel {

    /*
     *查询酒店接口信息
     */
    public function hotelApiMsg($card_no){
        $sql = 'select * from ' . tablename('hotel_api_message') . 'where `term_merno` = :term_merno';
        $term_merno = substr($card_no , 0,4);
        $params = array('term_merno' => $term_merno);
        $hotelMsg = pdo_fetch($sql,$params);

        if($data['os'] == 'mobile'){
            $termNo = $hotelMsg['term_merno'] . '9999'; //目前没有上线 上线微信端改为9997
        }elseif($data['os'] == 'windows'){
            $termNo = $hotelMsg['term_merno'] . '9998';
        }else{
            $termNo = $hotelMsg['term_merno'] . '9999';
        }
        $bind_config = array(
            'term_merno' => $hotelMsg['term_merno'],
            'loginid' => $hotelMsg['loginid'],
            'loginpwd' => $hotelMsg['loginpwd'],
            'is_open' => $hotelMsg['is_open'],
            'termNo' => $termNo
        );
        return $bind_config;
    }


}