<?php

declare(strict_types=1);

/**
 * Ad RPC 服务端接口
 */

namespace App\JsonRpc\AdRpc;

interface AdRpcServiceInterface
{
    public function getAd(array $args);
}