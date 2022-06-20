<?php
namespace Wotu;



use GuzzleHttp\Client;
use Zipkin\Propagation\Map;

class Test{
    public function test(){
        var_dump('composer-test');
        exit;
    }

    public static function getUser($name){
        $headers = [];
        $zipKin = ZipKin::getInstance();
        $tracing = $zipKin->getTracing();
        $injector = $tracing->getPropagation()->getInjector(new Map());
        $childSpan = $zipKin->getChildSpan();
        $injector($childSpan->getContext(), $headers);
        $httpClient = new Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'exam.com', $headers);
        $response = $httpClient->send($request);
        $childSpan->finish();
        $result = $response;
        return $result;
    }
}