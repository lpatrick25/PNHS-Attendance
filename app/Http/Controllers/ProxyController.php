<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProxyController extends Controller
{
    public function proxyLogin(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://192.168.254.254/goform/goform_set_cmd_process', [
            'headers' => [
                'Host' => '192.168.254.254',
                'Proxy-Connection' => 'keep-alive',
                'Content-Length' => '73',
                'Accept' => 'application/json, text/javascript, */*; q=0.01',
                'DNT' => '1',
                'X-Requested-With' => 'XMLHttpRequest',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'Origin' => 'http://192.168.254.254',
                'Referer' => 'http://192.168.254.254/index.html?=t',
                'Accept-Encoding' => 'gzip, deflate',
                'Accept-Language' => 'en-US,en;q=0.9',
                'Cookie' => 'pageForward=home'
            ],
            'form_params' => $request->all(),
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode())
            ->header('Content-Type', $response->getHeaderLine('Content-Type'));
    }

    public function proxySendSms(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://192.168.254.254/goform/goform_set_cmd_process', [
            'headers' => [
                'Host' => '192.168.254.254',
                'Proxy-Connection' => 'keep-alive',
                'Content-Length' => $request->header('Content-Length'),
                'Accept' => 'application/json, text/javascript, */*; q=0.01',
                'DNT' => '1',
                'X-Requested-With' => 'XMLHttpRequest',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'Origin' => 'http://192.168.254.254',
                'Referer' => 'http://192.168.254.254/index.html?=t',
                'Accept-Encoding' => 'gzip, deflate',
                'Accept-Language' => 'en-US,en;q=0.9',
                'Cookie' => 'pageForward=home'
            ],
            'form_params' => $request->all(),
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode())
            ->header('Content-Type', $response->getHeaderLine('Content-Type'));
    }

    public function proxyGetMessageId(Request $request)
    {
        $client = new Client();

        $response = $client->get('http://192.168.254.254/goform/goform_get_cmd_process', [
            'headers' => [
                'Accept' => 'application/json, text/javascript, */*; q=0.01',
                'Accept-Encoding' => 'gzip, deflate',
                'Accept-Language' => 'en-US,en;q=0.9',
                'Connection' => 'keep-alive',
                'Cookie' => 'pageForward=home',
                'DNT' => '1',
                'Host' => '192.168.254.254',
                'Referer' => 'http://192.168.254.254/index.html?t=',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
                'X-Requested-With' => 'XMLHttpRequest'
            ],
            'query' => $request->query(),
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode())
            ->header('Content-Type', $response->getHeaderLine('Content-Type'));
    }

    public function proxyDeleteMessage(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://192.168.254.254/goform/goform_set_cmd_process', [
            'headers' => [
                'Accept' => 'application/json, text/javascript, */*; q=0.01',
                'Accept-Encoding' => 'gzip, deflate',
                'Accept-Language' => 'en-US,en;q=0.9',
                'Connection' => 'keep-alive',
                'Content-Length' => $request->header('Content-Length'),
                'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'Cookie' => 'pageForward=home',
                'DNT' => '1',
                'Host' => '192.168.254.254',
                'Origin' => 'http://192.168.254.254',
                'Referer' => 'http://192.168.254.254/index.html?t=',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
                'X-Requested-With' => 'XMLHttpRequest'
            ],
            'form_params' => $request->all(),
        ]);

        return response($response->getBody()->getContents(), $response->getStatusCode())
            ->header('Content-Type', $response->getHeaderLine('Content-Type'));
    }
}
