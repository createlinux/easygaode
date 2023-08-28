<?php

namespace Createlinux\EasyGaoDe\Http;

class Request
{

    public function __construct()
    {
        if (!extension_loaded('curl')) {
            throw new \Exception("curl扩展未安装");
        }
    }

    /**
     * 发送get请求
     * @param string $url
     * @param array $queries
     * @return string
     */
    public function get(string $url, array $queries = []): string
    {
        // 创建 cURL 句柄
        $ch = curl_init();
        $params = http_build_query($queries);
        $url = $url."?{$params}";
        // 设置 cURL 选项
        curl_setopt($ch, CURLOPT_URL, $url);  // 设置请求的 URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // 将响应保存到变量而不直接输出
        curl_setopt($ch, CURLOPT_HTTPGET, true);  // 发送 GET 请求

        // 不验证 SSL 证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        // 发送请求并获取响应
        $response = curl_exec($ch);
        // 关闭 cURL 句柄
        curl_close($ch);
        // 检查请求是否成功
        if ($response === false) {
            $error = curl_error($ch);
            throw new \Exception($error);
            // 处理错误
        } else {
            // 处理响应
            return $response;
        }
    }
}