<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GeneralException extends HttpException
{
    /**
     * GeneralException constructor.
     * @param null $message
     * @param int $statusCode
     * @param int|0 $errorCode
     */
    public function __construct(
        $message = null,
        int $errorCode = 0,
        int $statusCode = Response::HTTP_BAD_REQUEST
    ) {
        if (is_array($message)) {
            $errorCode = $message['code'] ?? null;
            $message = $message['message'] ?? null;
        }

        // Todo: Remove message for production
        parent::__construct($statusCode, $message, null, [], $errorCode);
    }
}
