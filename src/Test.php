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
        $zipKin = ZipKin::getInstance('http://tracing-analysis-dc-hz.aliyuncs.com/adapt_cn6b5ghmxw@2d20a8f3746a69e_cn6b5ghmxw@53df7ad2afe8301/api/v2/spans','zhipei');
        $tracing = $zipKin->getTracing();
        $injector = $tracing->getPropagation()->getInjector(new Map());
        $childSpan = $zipKin->getChildSpan();
        $injector($childSpan->getContext(), $headers);
        $httpClient = new Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'exam.com', $headers);
        $response = $httpClient->send($request);
        $childSpan->finish();
        return json_decode($response->getBody()->getContents(),true);
    }

    public static function getCity(){
        $headers = [];
        $zipKin = ZipKin::getInstance('http://tracing-analysis-dc-hz.aliyuncs.com/adapt_cn6b5ghmxw@2d20a8f3746a69e_cn6b5ghmxw@53df7ad2afe8301/api/v2/spans','zhipei');
        $tracing = $zipKin->getTracing();
        $injector = $tracing->getPropagation()->getInjector(new Map());
        $childSpan = $zipKin->getChildSpan();
        $injector($childSpan->getContext(), $headers);
        $httpClient = new Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'exam.com/cities', $headers);
        $response = $httpClient->send($request);
        $childSpan->finish();
        return json_decode($response->getBody()->getContents(),true);
    }
    public static function register(){
        $headers = [];
        $zipKin = ZipKin::getInstance('http://tracing-analysis-dc-hz.aliyuncs.com/adapt_cn6b5ghmxw@2d20a8f3746a69e_cn6b5ghmxw@53df7ad2afe8301/api/v2/spans','zhipei');
        $tracing = $zipKin->getTracing();
        $injector = $tracing->getPropagation()->getInjector(new Map());
        $childSpan = $zipKin->getChildSpan();
        $injector($childSpan->getContext(), $headers);
        $httpClient = new Client();
        $body = [
            'test' => 22
        ];
        $option['form_params'] = $body;
        $request = new \GuzzleHttp\Psr7\Request('POST', 'exam.com/registers/register', $headers);
        $response = $httpClient->send($request,$option);

        $childSpan->finish();

        return json_decode($response->getBody()->getContents(),true);
    }
}