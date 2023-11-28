<?php
namespace App\Exceptions;

use JsonSerializable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Throwable;

class Error implements Arrayable, Jsonable, JsonSerializable
{
    public function __construct(private readonly string $help = '', private readonly string $error = '')
    {
    }

    public function toArray(): array
    {
        return [
            'error' => $this->error,
            'help' => $this->help,
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @throws Throwable
     */
    public function toJson($options = 0.0): bool|string
    {
        $jsonEncoded = json_encode($this->jsonSerialize(), $options);
        throw_unless($jsonEncoded, ListNotFoundException::class);
        return $jsonEncoded;
    }
}
