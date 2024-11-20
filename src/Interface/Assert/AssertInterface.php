<?php

namespace Qiyue\Interface\Assert;

interface AssertInterface
{
    public function assertSuccessfully(?array $response, string $check_code = 'code', int|string $success_value = 200, string $msg_code = 'message', string $data_key = 'data');
}
