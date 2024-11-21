<?php

namespace Qiyue\Trait\Assert;

trait BaseAssertTrait
{
    public const SUCCESS_CODE = 0;

    public const FAIL_CODE = 1;

    protected int $success_code_value = self::SUCCESS_CODE;

    protected int $fail_code_value = self::FAIL_CODE;

    protected string $success_message_default_value = 'success';

    protected string $fail_message_default_value = 'fail';

    protected ?array $data_default_value = [];

    public function assertSuccessfully(?array $response, string $check_code = 'code', int|string $success_value = 200, string $msg_code = 'message', string $data_key = 'data')
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
