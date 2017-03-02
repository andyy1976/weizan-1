<?php
/**
 * [WEIZAN System] Copyright (c) 2014 012WZ.COM
 * WEIZAN is NOT a free software, it under the license terms, visited http://www.012wz.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
class webapi {
	function __construct(){

        $this->config = array(
            'termMerno' => '2131', 
            'loginid' => 'master', 
            'loginpwd' => '888888',
            'termNo' => '21319999'
        );
        $this->api = new SoapClient('http://crm.multiconceptslink.com/webservice/services/MmtInterface?wsdl');
    }
	
	/*
	 * 查询卡信息
	 * */
    public function selectCardinfo($params){
        $file = array(
            'term_merno' => $params['term_merno'],
            'loginid' =>$params['loginid'],
            'loginpwd' => $params['loginpwd'],
            'card' => $params['card'],
            'pwd' => $params['pwd']
        );

        $data = $this->api->selectCardinfo($file);

        if(is_object($data)){
            return $this->_xmlarr($data->out);
        }
    }

    /*
     * 开通会员卡
     * */
    public function issueCard($params, $isPass = '0', $rate = '', $exp_date = ''){
        $file = array(
            'cardInfo' => array(
                'termMerno' => $this->config['termMerno'],
                'loginid' => $this->config['loginid'],
                'loginpwd' => $this->config['loginpwd'],
                'termNo' => $this->config['termNo'],
                'card_no' => $params['card_no'],
                'card_mm' => $params['card_pwd'],
                'isPass' => $isPass,
                'rate' => $rate,
                'exp_date' => $exp_date,
                'id_no' => $params['id_no']
            ),
        );

        $data = $this->api->issueCard($file);

        if(is_object($data)){
            return $this->_xmlarr($data->out);
        }
    }

    /*
     * 查询用户信息
     * */
    public function selectUserInfo($params){
        $file = array(
            'term_merno' => $params['term_merno'],
            'loginid' => $params['loginid'],
            'loginpwd' => $params['loginpwd'],
            'card' => $params['card'],
            'cerno' => '',
            'mobile' => '',
            'email' => ''
        );

        $data = $this->api->selectUserInfo($file);
        if(is_object($data)){
            return $this->_xmlarr($data->out);
        }
    }


    /*
     * 验证原密码 是否正确
     * */
    public function checkCardPass($params){
        $file = array(
            'cardInfo' => array(
                'termMerno' => $params['termMerno'],
                'loginid' => $params['loginid'],
                'loginpwd' => $params['loginpwd'],
                'card_no' => $params['card_no'],
                'termNo' => $params['termNo'],
                'card_mm' => $params['card_mm'],
            ),
        );

        $data = $this->api->checkCardPass($file);
        if(is_object($data)){
            return $this->_xmlarr($data->out);
        }
    }

    /*
     * 修改密码
     * */
    public function updatePwd($params){
        $file = array(
            'term_merno' => $params['term_merno'],
            'loginid' => $params['loginid'],
            'loginpwd' => $params['loginpwd'],
            'card' => $params['card'],
            'pwd1' => $params['pwd1'],
            'pwd2' => $params['pwd2'],
            'pwd3' => $params['pwd3']
        );

        $data = $this->api->updatePwd($file);

        if(is_object($data)){
            return $this->_xmlarr($data->out);
        }
    }


    /*
     * 电子抵扣券查询
     * */
    public function queryCardTicket($params){
        $file = array(
            'ticketInfo' => array(
                'termMerno' => $params['termMerno'],
                'loginid' => $params['loginid'],
                'loginpwd' => $params['loginpwd'],
                'termNo' => $params['termNo'],
                'termSeq' => rand(000001,999999),
                'cardNo' => $params['cardNo']
            ),
        );

        $data = $this->api->queryCardTicket($file);
        if(is_object($data)){
            return $this->_xmlarr($data->out);
        }
    }


    /*
     * 查询卡发生的各项交易记录
     * */
    public function selectInfo($params){
        $file = array(
            'term_merno' => $params['term_merno'],
            'loginid' => $params['loginid'],
            'loginpwd' => $params['loginpwd'],
            'term_no' => $params['termNo'],
            'trans_no' => $params['trans_no'],
            'begDate' => $params['begDate'],
            'endDate' => $params['endDate'],
            'card' => $params['card'],
            'pwd' => $params['pwd'],
        );

        $data = $this->api->selectInfo ($file);
        if(is_object($data)){
            return $this->_xmlarr($data->out);
        }
    }



	private function _xmlarr($xml) {
        $xmlobj = @simplexml_load_string($xml);
        if ($xmlobj) {
            return $this->_obj2arr($xmlobj->information);
        }
        $doc = new DOMDocument('1.0', 'GB2312');
        if (@$doc->loadXML($xml)) {
            echo '123';
        }
        if (preg_match('/^\<\?xml.*?\?\>(\<informations\>(\<information\>(.*)\<\/information\>)\<\/informations\>)$/', $xml, $match)) {
            return $this->_xmlstr2arr($match[1]);
        }elseif(preg_match('/^\<\?xml.*?\?\>(\<informations\>(\<ticket\>(.*)(\<ticketNo\>(.*)\<\/ticketNo\>)(\<ticketTypeName\>(.*)\<\/ticketTypeName\>(\<startDate\>(.*)\<\/startDate\>))(\<endDate\>(.*)\<\/endDate\>)\<\/ticket\>)\<\/informations\>)$/', $xml, $match)){
            return $this->_xmlstr2arr($match[1]);
        }else{
            return $xml;
        }
    }

    private function _obj2arr($arrObjData, $arrSkipIndices = array()) {
        $arrData = array();

        if (is_object($arrObjData)) {
            $arrObjData = get_object_vars($arrObjData);
        }


        if (is_array($arrObjData)) {
            foreach ($arrObjData as $index => $value) {
                if (is_object($value) || is_array($value)) {
                    $value = $this->_obj2arr($value, $arrSkipIndices);
                }
                if (in_array($index, $arrSkipIndices)) {
                    continue;
                }
                $arrData[$index] = $value;
            }
        }
        return $arrData;
    }
    private function _xmlstr2arr($str) {
        if (!preg_match_all('/\<(\w+?)\>([^\<\>]*?)\<\/\w+?\>/i', $str, $match)){
            return array();
        }
        $result = array();
        if($match[1][0] == 'ticketNo'){
            return $this->reloadarr($match[2],4);
        }
        foreach ($match[1] as $k => $m) {
            if (isset($result[$m]) && $result[$m] != $match[2][$k]) {
                if (!is_array($result[$m]))
                    $result[$m] = array($result[$m]);
                $result[$m][] = $match[2][$k];
            } else
                $result[$m] = $match[2][$k];
        }
        return $result;
    }

    private function reloadarr($array, $groupch){
        $allLength = count($array);
        $groupNum = (int)$allLength / $groupch;
        $start = 0;
        $enum = (int)($allLength/$groupNum);
        $result = array();
        if($enum > 0){
            $firstLength = $enum * $groupNum;
            $firstArray = array();
            for($i=0; $i<$firstLength; $i++){
                array_push($firstArray, $array[$i]);
                unset($array[$i]);
            }
            for($i=0; $i<$groupNum; $i++){
                $result[] = array_slice($firstArray, $start, $enum);
                $start += $enum;
            }
            $secondLength = $allLength - $firstLength;
            for($i=0; $i<$secondLength; $i++){
                array_push($result[$i], $array[$i + $firstLength]);
            }
        }else{
            for($i=0; $i<$allLength; $i++){
                $result[] = array_slice($array, $i, 1);
            }
        }
        return $result;
    }
}