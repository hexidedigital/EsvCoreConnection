<?php

namespace Hexide\EsvCore\Classes;


class Response
{
    const SUCCESS = 200;
    const SUCCESS_NO_RESPONSE = 204;
    const ERROR_NOT_FOUND = 404;
    const ERROR_RELATION_NEEDED = 422;
    const INTERNAL_ERROR = 500;
    const BAD_GATEWAY = 502;

    public ?array $response = null;

    public ?int $total_pages = null;

    public int $status;

    public function __construct(array $response, int $status = 400)
    {
        $this->response = $response;
        $this->status = $status;
    }

    public static function success(array $data = []): static
    {
        return new static($data, self::SUCCESS);
    }

    public static function successNoResponse(array $data = []): static
    {
        return new static($data, self::SUCCESS_NO_RESPONSE);
    }

    public static function error(array $data, ?int $code = null): static
    {
        return new static($data, $code ?? self::BAD_GATEWAY);
    }

    public static function errorNotFound(array $data = []): static
    {
        return new static($data, self::ERROR_NOT_FOUND);
    }

    public static function errorRelationNeeded(array $data = []): static
    {
        return new static($data, self::ERROR_RELATION_NEEDED);
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
    public function isRelationNeeded(): bool
    {
	    return in_array($this->status, [self::ERROR_RELATION_NEEDED]);
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
                self::ERROR_NOT_FOUND,
                self::INTERNAL_ERROR,
                self::BAD_GATEWAY,
            ]
        );
    }
}
