<?php

declare(strict_types=1);

/**
 * Ad RPC 服务端
 */
namespace App\JsonRpc\AdRpc;

use Hyperf\RpcServer\Annotation\RpcService;
use Psr\Container\ContainerInterface;
use Hyperf\Logger\LoggerFactory;
use Hyperf\Di\Annotation\Inject;
use App\ZyCommon\Render;

/**
 * 通过注解定义服务提供者
 * 注意，如希望通过服务中心来管理服务，需在注解内增加 publishTo 属性
 *
 * @RpcService(name="AdRpcService", protocol="jsonrpc-tcp", server="AdRpcService")
 */
class AdRpcService implements AdRpcServiceInterface
{
    /**
     * @Inject
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject
     * @var Render
     */
    protected $render;

    public function GetAd(array $args)
    {
        return ['in'];
        $method = $args['method'] ?: '';
        $param  = $args['args'] ?: [];

        $this->render->setExtraData('test', 'service');
        return $this->render->output();
    }
}