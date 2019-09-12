<?php

declare(strict_types=1);

/**
 * 广告服务控制器
 */

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;
use App\ZyCommon\Render;
use App\JsonRpc\AdRpc\AdRpcServiceInterface;

/**
 * @Controller()
 */
class AdController
{
    /**
     * @Inject
     * @var ContainerInterface
     */
    private $container;

    /**
     * @Inject
     * @var RequestInterface
     */
    private $request;

    /**
     * @Inject
     * @var Render
     */
    private $render;

    /**
     * @Inject
     * @var AdRpcServiceInterface
     */
    private $ad_client;

    /**
     * @RequestMapping(path="detail", methods="get")
     */
    public function adInfo()
    {
        $id = $this->request->input('id', 0);

        if(1 > $id)
        {
            return $this->render->errorParam();
        }

        $redis = $this->container->get(\Redis::class);
        $val   = $redis->get('test');

        $this->render->setExtraData('key', $val);
        return $this->render->output();
    }

    /**
     * @RequestMapping(path="GetAd", methods="get,post")
     */
    public function GetAd()
    {
        return $this->ad_client->GetAd([]);
    }
}