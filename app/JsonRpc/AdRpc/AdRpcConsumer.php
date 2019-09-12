<?php

declare(strict_types=1);

namespace App\JsonRpc\AdRpc;

use Hyperf\RpcClient\AbstractServiceClient;
//use Hyperf\CircuitBreaker\Annotation\CircuitBreaker;
//use Hyperf\Logger\LoggerFactory;

class AdRpcConsumer extends  AbstractServiceClient implements AdRpcServiceInterface
{
    /**
     * 定义对应底层服务名称
     * @var string
     */
    protected $serviceName = 'AdRpcService';

    /**
     * 定义底层服务的协议类型
     * @var string
     */
    protected $protocol = 'jsonrpc';

    public function GetAd(array $args)
    {
        $res   = $this->__request(__FUNCTION__, compact('args'));
        return $res;
    }
}