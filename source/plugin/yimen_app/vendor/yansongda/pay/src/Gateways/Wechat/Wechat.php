<?php

namespace Yansongda\Pay\Gateways\Wechat;

use Yansongda\Pay\Contracts\GatewayInterface;
use Yansongda\Pay\Exceptions\GatewayException;
use Yansongda\Pay\Exceptions\InvalidArgumentException;
use Yansongda\Pay\Support\Config;
use Yansongda\Pay\Traits\HasHttpRequest;

abstract class Wechat implements GatewayInterface
{
    use HasHttpRequest;

    /**
     * @var string
     */
    protected $endpoint = 'https://api.mch.weixin.qq.com/';

    /**
     * @var string
     */
    protected $gateway_order = 'pay/unifiedorder';

    /**
     * @var string
     */
    protected $gateway_query = 'pay/orderquery';

    /**
     * @var string
     */
    protected $gateway_close = 'pay/closeorder';

    /**
     * @var string
     */
    protected $gateway_refund = 'secapi/pay/refund';

    /**
     * @var array
     */
    protected $config;

    /**
     * @var \Yansongda\Pay\Support\Config
     */
    protected $user_config;

    /**
     * [__construct description].
     *
     * @param array $config
     * @author yansongda <me@yansongda.cn>
     *
     */
    public function __construct(array $config)
    {
        $this->user_config = new Config($config);

        $this->config = [
            'appid' => $this->user_config->get('app_id', ''),
            'mch_id' => $this->user_config->get('mch_id', ''),
            'nonce_str' => $this->createNonceStr(),
            'sign_type' => 'MD5',
            'notify_url' => $this->user_config->get('notify_url', ''),
            'trade_type' => $this->getTradeType(),
        ];

        if ($endpoint = $this->user_config->get('endpoint_url')) {
            $this->endpoint = $endpoint;
        }
    }

    /**
     * pay a order.
     *
     * @param array $config_biz
     *
     * @return mixed
     * @author yansongda <me@yansongda.cn>
     *
     */
    abstract public function pay(array $config_biz = []);

    /**
     * refund.
     *
     * @return string|bool
     * @author yansongda <me@yansongda.cn>
     *
     */
    public function refund($config_biz = [])
    {
        if (isset($config_biz['miniapp'])) {
            $this->config['appid'] = $this->user_config->get('miniapp_id');
            unset($config_biz['miniapp']);
        }

        $this->config = array_merge($this->config, $config_biz);

        $this->unsetTradeTypeAndNotifyUrl();

        return $this->getResult($this->gateway_refund, true);
    }

    /**
     * close a order.
     *
     * @return array|bool
     * @author yansongda <me@yansongda.cn>
     *
     */
    public function close($out_trade_no = '')
    {
        $this->config['out_trade_no'] = $out_trade_no;

        $this->unsetTradeTypeAndNotifyUrl();

        return $this->getResult($this->gateway_close);
    }

    /**
     * find a order.
     *
     * @param string $out_trade_no
     *
     * @return array|bool
     * @author yansongda <me@yansongda.cn>
     *
     */
    public function find($out_trade_no = '')
    {
        $this->config['out_trade_no'] = $out_trade_no;

        $this->unsetTradeTypeAndNotifyUrl();

        return $this->getResult($this->gateway_query);
    }

    /**
     * verify the notify.
     *
     * @param string $data
     * @param string $sign
     * @param bool $sync
     *
     * @return array|bool
     * @author yansongda <me@yansongda.cn>
     *
     */
    public function verify($data, $sign = null, $sync = false)
    {
        if (!is_array($data)) {
            $data = $this->fromXml($data);
        }
        $sign = is_null($sign) ? $data['sign'] : $sign;

        return $this->getSign($data) === $sign ? $data : false;
    }

    /**
     * get trade type config.
     *
     * @return string
     * @author yansongda <me@yansongda.cn>
     *
     */
    abstract protected function getTradeType();

    /**
     * pre order.
     *
     * @param array $config_biz
     *
     * @return array
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function preOrder($config_biz = [])
    {
        $this->config = array_merge($this->config, $config_biz);

        return $this->getResult($this->gateway_order);
    }

    /**
     * get api result.
     *
     * @param string $path
     * @param bool $cert
     *
     * @return array
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function getResult($path, $cert = false)
    {
        $this->config['sign'] = $this->getSign($this->config);

        if ($cert) {
            $data = $this->fromXml($this->post(
                $this->endpoint . $path,
                $this->toXml($this->config),
                [
                    'cert' => $this->user_config->get('cert_client', ''),
                    'ssl_key' => $this->user_config->get('cert_key', ''),
                ]
            ));
        } else {
            $data = $this->fromXml($this->post($this->endpoint . $path, $this->toXml($this->config)));
        }

        if (!isset($data['return_code']) || $data['return_code'] !== 'SUCCESS' || $data['result_code'] !== 'SUCCESS') {
            $error = 'getResult error:' . $data['return_msg'];
            $error .= isset($data['err_code_des']) ? ' - ' . $data['err_code_des'] : '';
        }

        if (!isset($error) && $this->getSign($data) !== $data['sign']) {
            $error = 'getResult error: return data sign error';
        }

        if (isset($error)) {
            throw new GatewayException(
                $error,
                20000,
                $data);
        }

        return $data;
    }

    /**
     * sign.
     *
     * @param array $data
     *
     * @return string
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function getSign($data)
    {
        if (is_null($this->user_config->get('key'))) {
            throw new InvalidArgumentException('Missing Config -- [key]');
        }

        ksort($data);

        $string = md5($this->getSignContent($data) . '&key=' . $this->user_config->get('key'));

        return strtoupper($string);
    }

    /**
     * get sign content.
     *
     * @param array $data
     *
     * @return string
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function getSignContent($data)
    {
        $buff = '';

        foreach ($data as $k => $v) {
            $buff .= ($k != 'sign' && $v != '' && !is_array($v)) ? $k . '=' . $v . '&' : '';
        }

        return trim($buff, '&');
    }

    /**
     * create random string.
     *
     * @param int $length
     *
     * @return string
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function createNonceStr($length = 16)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }

        return $str;
    }

    /**
     * convert to xml.
     *
     * @param array $data
     *
     * @return string
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function toXml($data)
    {
        if (!is_array($data) || count($data) <= 0) {
            throw new InvalidArgumentException('convert to xml error!invalid array!');
        }

        $xml = '<xml>';
        foreach ($data as $key => $val) {
            $xml .= is_numeric($val) ? '<' . $key . '>' . $val . '</' . $key . '>' :
                '<' . $key . '><![CDATA[' . $val . ']]></' . $key . '>';
        }
        $xml .= '</xml>';

        return $xml;
    }

    /**
     * convert to array.
     *
     * @param string $xml
     *
     * @return array
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function fromXml($xml)
    {
        if (!$xml) {
            throw new InvalidArgumentException('convert to array error !invalid xml');
        }

        libxml_disable_entity_loader(true);

        return json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA), JSON_UNESCAPED_UNICODE), true);
    }

    /**
     * delete trade_type and notify_url.
     *
     * @return bool
     * @author yansongda <me@yansongda.cn>
     *
     */
    protected function unsetTradeTypeAndNotifyUrl()
    {
        unset($this->config['notify_url']);
        unset($this->config['trade_type']);

        return true;
    }
}
