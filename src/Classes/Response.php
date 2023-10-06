<?php

namespace Hexide\EsvCore\Classes;


class Response
{
    const SUCCESS = 200;
    const SUCCESS_NO_RESPONSE = 204;
    const BAD_GATEWAY = 502;
    const INTERNAL_ERROR = 500;

    public ?array $response = null;

    public ?int $total_pages = null;

    public int $status;

    public function __construct(array $response, int $status = 400)
    {
        $this->response = $response;
        $this->status = $status;
    }

    public static function success(array $data): static
    {
        return new static($data, self::SUCCESS);
    }

    public static function successNoResponse(array $data): static
    {
        return new static($data, self::SUCCESS_NO_RESPONSE);
    }

    public static function error(array $data, ?int $code = null): static
    {
        return new static($data, $code ?? self::BAD_GATEWAY);
    }

    public function isSuccessful(): bool
    {
        return in_array(
            $this->status,
            [
                self::SUCCESS,
                self::SUCCESS_NO_RESPONSE,
            ]
        );
    }

    public function isEmpty(): bool
    {
        return in_array(
            $this->status,
            [
                self::SUCCESS_NO_RESPONSE,
            ]
        );
    }

    public function isError(): bool
    {
        return in_array(
            $this->status,
            [
                self::BAD_GATEWAY,
                self::INTERNAL_ERROR
            ]
        );
    }
}
