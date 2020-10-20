<?php
/*
 * @Author: ofearn
 * @Date: 2019/10/16 16:56
 * @Last Modified by: ofearn@qq.com
 */

namespace app\lib;

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class Http
{
    /**
     * 发送一个POST请求
     */
    public static function post($url, $params = [], $options = [])
    {
        $req = self::dfsockopen($url, $params, 'POST', $options);
        return $req['ret'] ? $req['msg'] : '';
    }

    /**
     * 发送一个GET请求
     */
    public static function get($url, $params = [], $options = [])
    {
        $req = self::dfsockopen($url, $params, 'GET', $options);
        return $req['ret'] ? $req['msg'] : '';
    }

    /**
     * 使用discuz 提供的dfsockopen 方法进行请求
     * @param $url
     * @param array $params
     * @param string $method
     * @return array
     */
    public static function dfsockopen($url, $params = [], $method = 'POST')
    {
        if ($method == 'GET') {
            $query_string = is_array($params) ? http_build_query($params) : $params;
            $url = $query_string ? $url . (stripos($url, "?") !== FALSE ? "&" : "?") . $query_string : $url;
            $params = [];
        }
        $ret = dfsockopen($url, 0, $params);
        return [
            'ret' => TRUE,
            'msg' => $ret,
        ];
    }

    /**
     * CURL发送Request请求,含POST和REQUEST
     * @param string $url 请求的链接
     * @param mixed $params 传递的参数
     * @param string $method 请求的方法
     * @param mixed $options CURL的参数
     * @return array
     */
    public static function sendRequest($url, $params = [], $method = 'POST', $options = [])
    {
        $method = strtoupper($method);
        $protocol = substr($url, 0, 5);
        $query_string = is_array($params) ? http_build_query($params) : $params;

        $ch = curl_init();
        $defaults = [];
        if ('GET' == $method) {
            $geturl = $query_string ? $url . (stripos($url, "?") !== FALSE ? "&" : "?") . $query_string : $url;
            $defaults[CURLOPT_URL] = $geturl;
        } else {
            $defaults[CURLOPT_URL] = $url;
            if ($method == 'POST') {
                $defaults[CURLOPT_POST] = 1;
            } else {
                $defaults[CURLOPT_CUSTOMREQUEST] = $method;
            }
            $defaults[CURLOPT_POSTFIELDS] = $query_string;
        }

        $defaults[CURLOPT_HEADER] = FALSE;
        $defaults[CURLOPT_USERAGENT] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.98 Safari/537.36";
        $defaults[CURLOPT_FOLLOWLOCATION] = TRUE;
        $defaults[CURLOPT_RETURNTRANSFER] = TRUE;
        $defaults[CURLOPT_CONNECTTIMEOUT] = 3;
        $defaults[CURLOPT_TIMEOUT] = 3;
        // disable 100-continue
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        if ('https' == $protocol) {
            $defaults[CURLOPT_SSL_VERIFYPEER] = FALSE;
            $defaults[CURLOPT_SSL_VERIFYHOST] = FALSE;
        }
        curl_setopt_array($ch, (array)$options + $defaults);

        $ret = curl_exec($ch);
        $err = curl_error($ch);

        if (FALSE === $ret || !empty($err)) {
            $errno = curl_errno($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);
            return [
                'ret' => FALSE,
                'errno' => $errno,
                'msg' => $err,
                'info' => $info,
            ];
        }
        curl_close($ch);
        return [
            'ret' => TRUE,
            'msg' => $ret,
        ];
    }

    /**
     * 异步发送一个请求
     * @param string $url 请求的链接
     * @param mixed $params 请求的参数
     * @param string $method 请求的方法
     * @return boolean TRUE
     */
    public static function sendAsyncRequest($url, $params = [], $method = 'POST')
    {
        $method = strtoupper($method);
        $method = $method == 'POST' ? 'POST' : 'GET';
        //构造传递的参数
        if (is_array($params)) {
            $post_params = [];
            foreach ($params as $k => &$v) {
                if (is_array($v))
                    $v = implode(',', $v);
                $post_params[] = $k . '=' . urlencode($v);
            }
            $post_string = implode('&', $post_params);
        } else {
            $post_string = $params;
        }
        $parts = parse_url($url);
        //构造查询的参数
        if ($method == 'GET' && $post_string) {
            $parts['query'] = isset($parts['query']) ? $parts['query'] . '&' . $post_string : $post_string;
            $post_string = '';
        }
        $parts['query'] = isset($parts['query']) && $parts['query'] ? '?' . $parts['query'] : '';
        //发送socket请求,获得连接句柄
        $fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80, $errno, $errstr, 3);
        if (!$fp)
            return FALSE;
        //设置超时时间
        stream_set_timeout($fp, 3);
        $out = "{$method} {$parts['path']}{$parts['query']} HTTP/1.1\r\n";
        $out .= "Host: {$parts['host']}\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "Content-Length: " . strlen($post_string) . "\r\n";
        $out .= "Connection: Close\r\n\r\n";
        if ($post_string !== '')
            $out .= $post_string;
        fwrite($fp, $out);
        fclose($fp);
        return TRUE;
    }

    public static function getSecond($url, $new_file)
    {
        $header = array(
            'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:45.0) Gecko/20100101 Firefox/45.0',
            'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
            'Accept-Encoding: gzip, deflate',);
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $data = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        if ($code == 200) {//把URL格式的图片转成base64_encode格式的！
            $imgBase64Code = "data:image/jpeg;base64," . base64_encode($data);
        }
        $img_content = $imgBase64Code;//图片内容
        //echo $img_content;exit;
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $img_content, $result)) {
            $type = $result[2];//得到图片类型png?jpg?gif?
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $img_content)))) {
                return $new_file;
            }
        }
    }

    public static function downFileToPath($url, $fileName)
    {
        //下载时候不中断等待
        @set_time_limit(0);
        if ($fp = @fopen($url, "rb")) {
            if (!$downloadFile = @fopen($fileName, "wb")) {
                return false;
            }
            while (!feof($fp)) {
                if (!file_exists($fileName)) {
                    fclose($downloadFile);
                    return false;
                }
                clearstatcache();
                fwrite($downloadFile, fread($fp, 1024 * 200), 1024 * 200);
            }
            fclose($downloadFile);
            fclose($fp);
            return true;
        } else {
            return false;
        }
    }
}