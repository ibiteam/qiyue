<?php

namespace Qiyue\Trait\Assert;

trait AuthAssertTrait
{
    public function assertSuccessfully(?array $response, string $check_code = 'code', int|string $success_value = 200, string $msg_code = 'msg', string $data_key = 'data')
    {
        if (isset($response[$check_code]) && (int) $response[$check_code] == (int) $success_value) {
            return [
                'code' => $this->success_code_value,
                'message' => $response[$msg_code] ?? $this->success_message_default_value,
                'data' => $response[$data_key] ?? $this->data_default_value,
            ];
        }

        return [
            'code' => $this->fail_code_value,
            'message' => $response[$msg_code] ?? $this->fail_message_default_value,
            'data' => $response[$data_key] ?? $this->data_default_value,
        ];
    }
}
