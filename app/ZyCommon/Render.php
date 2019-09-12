<?php

declare(strict_types=1);

/**
 * 渲染类
 */

namespace App\ZyCommon;

use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Hyperf\Utils\Context;
use Hyperf\Di\Annotation\Inject;

class Render
{
    /**
     * @Inject
     * @var ResponseInterface
     */
    public $response;

    /**
     * 默认的返回数据
     */
    private $default = [
        'code' => 200,
        'msg'  => 'SUCCESS'
    ];

    public function errorParam(string $msg = 'ERROR PARAM')
    {
        $this->_set('code', 11001);
        $this->_set('msg', $msg);

        return $this->output();
    }

    public function setExtraData(string $key, $val)
    {
        $this->_set($key, $val);
    }

    public function setCode(int $code)
    {
        $this->_set('code', $code);
    }

    public function setMsg(string $msg)
    {
        $this->_set('msg', $msg);
    }

    public function output(): Psr7ResponseInterface
    {
        $data = $this->_getAll();
        return $this->response->json($data);
    }

    public function get(string $key)
    {
        $data = $this->_getAll();
        return isset($data[$key]) ? $data[$key] : null;
    }

    private function _getAll()
    {
        return Context::get(static::class, $this->default);
    }

    private function _set(string $key, $val)
    {
        $data       = $this->_getAll();
        $data[$key] = $val;
        Context::set(static::class, $data);
    }
}