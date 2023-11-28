<?php
namespace App\Exceptions;

use Illuminate\Http\Response;

class ListNotFoundException extends ApplicationException
{
    public function status(): int
    {
        return Response::HTTP_NOT_FOUND;
    }

    public function help(): string
    {
        return trans('exception.list_not_found.help');
    }

    public function error(): string
    {
        return trans('exception.list_not_found.error');
    }
}
