<?php

namespace Wotu;

use GuzzleHttp\Client;
use http\Header;
use Zipkin\Propagation\Map;

class BaseService
{

    /**
     * @param $method
     * @param $url
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * 发送服务请求
     */
    public static function sendRequest($method, $url, $data = [])
    {
        $headers = self::getHeader();
//        $zipKin = ZipKin::getInstance();
//        $tracing = $zipKin->getTracing();
//        $injector = $tracing->getPropagation()->getInjector(new Map());
//        $childSpan = $zipKin->getChildSpan();
//        $injector($childSpan->getContext(), $headers);
        $headers['Content-Type'] = 'application/json';
        $headers['accept'] = 'application/json, text/plain, */*';
        //获取请求头中header
        if(empty($headers['Authorization'])){
            $headers['Authorization'] = 'php-sdk';
        }
        $httpClient = new Client();
//        $option['form_params'] = $data;
        $request = new \GuzzleHttp\Psr7\Request($method, $url, $headers);
        $response = $httpClient->send($request, $data);
//        $childSpan->finish();
        return json_decode($response->getBody()->getContents(), true);
    }


    public static function getHeader() {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if ('HTTP_' == substr($key, 0, 5)) {
                $headers[str_replace('_', '-', substr($key, 5))] = $value;
            }
            if (isset($_SERVER['PHP_AUTH_DIGEST'])) {
                $header['AUTHORIZATION'] = $_SERVER['PHP_AUTH_DIGEST'];
            } elseif (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
                $header['AUTHORIZATION'] = base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW']);
            }
            if (isset($_SERVER['CONTENT_LENGTH'])) {
                $header['CONTENT-LENGTH'] = $_SERVER['CONTENT_LENGTH'];
            }
            if (isset($_SERVER['CONTENT_TYPE'])) {
                $header['CONTENT-TYPE'] = $_SERVER['CONTENT_TYPE'];
            }
        }
        return $headers;
    }

    public static function sendNormalRequest($method, $url, $data = [] ,$header=[]){
        $headers = self::getHeader();
        if(empty($headers['Authorization'])){
            $header[] = 'Authorization:php-sdk';
        }else{
            $header[] = 'Authorization:'.$headers['Authorization'];

        }
//        $header[] = 'Authorization:eyJhbGciOiJIUzM4NCJ9.eyJqdGkiOiJqd3RfaWQiLCJzdWIiOiI2IiwiaWF0IjoxNjYxODQyMDI3LCJhdWQiOiJXRUIiLCJleHAiOjE2NjQ0MzQwMjcsInNpZCI6MSwidHlwZSI6IlVTRVIifQ.9H5j0w0aA0tVxUCejfonE9iaIwDTW1ModaOYPyGOik9e9M9r4urRR8v_l-D9GSLN';
        $header[] = "Content-Type:application/json";
        if( 'get' == strtolower($method)){
            $result = Http::get($url,$data,$header);
        }else{
            $result = Http::send($url,$method,[],json_encode($data),$header);
        }
        $resultData = json_decode($result,true);
//        var_dump($resultData);
        if(empty($resultData['messageCode']) || $resultData['messageCode'] != 200){
            $errorMessage = $resultData['message'] ?? '请求失败';
            throw new \ErrorException($errorMessage);
        }

        return $resultData['data'] ?? 'success';
    }


}
