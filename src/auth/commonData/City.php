<?php
namespace Wotu\auth\commonData;
use Wotu\auth\AuthBase;
use Wotu\BaseService;



class City extends AuthBase {

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *城市列表
     *https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E5%85%AC%E5%85%B1%E6%95%B0%E6%8D%AEAPI/cityDataPHPUsingGET
     */
    public  function list($parentCode){
        $parentCode = $parentCode ?? 0;
        $url = $this->domainUrl . '/auth/common_data/city_php/'.$parentCode;
        return BaseService::sendNormalRequest('GET', $url );
    }




}