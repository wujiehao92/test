<?php
namespace Wotu;
use GuzzleHttp\Client;
use Zipkin\Propagation\Map;

class BaseService{
    /**
     * @param $method
     * @param $url
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * 发送服务请求
     */
    public static function sendRequest($method,$url,$data = []){
        $headers = [];
        $zipKin = ZipKin::getInstance();
        $tracing = $zipKin->getTracing();
        $injector = $tracing->getPropagation()->getInjector(new Map());
        $childSpan = $zipKin->getChildSpan();
        $injector($childSpan->getContext(), $headers);
        $httpClient = new Client();
        $option['form_params'] = $data;
        $request = new \GuzzleHttp\Psr7\Request($method, $url, $headers);
        $response = $httpClient->send($request,$option);
        $childSpan->finish();
        return json_decode($response->getBody()->getContents(),true);
    }
}
