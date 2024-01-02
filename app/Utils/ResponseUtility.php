<?php

namespace App\Utils;

use App\Exceptions\GeneralException;
use Illuminate\Http\JsonResponse;
use Spatie\Fractalistic\ArraySerializer;
use Symfony\Component\HttpFoundation\Response;

class ResponseUtility
{
    /**
     * @param null $data
     * @param string|null $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function success($data = null, string $message = null, int $statusCode = Response::HTTP_OK): JsonResponse
    {
        $response = [
            'status' => 'success',
            'data' => $data['data'] ?? $data,
        ];
        if ($data['pagination'] ?? false) {
            $response['pagination'] = $data['pagination'];
        }
        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    public function created($data = null, string $message = ''): JsonResponse
    {
        return $this->success($data, $message, Response::HTTP_CREATED);
    }

    /**
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    public function updated($data = null, string $message = ''): JsonResponse
    {
        return $this->success($data, $message, Response::HTTP_CREATED);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function deleted(string $message = ''): JsonResponse
    {
        return $this->success(null, $message, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $data
     * @param null $transformer
     * @return JsonResponse
     */
    public function data($data, $transformer = null): JsonResponse
    {
        $data = $transformer ? fractal($data, $transformer)->serializeWith(new ArraySerializer())->toArray() : $data;
        return $this->success($data);
    }

    /**
     * @param $paginator
     * @param null $transformer
     * @return JsonResponse
     */
    public function paginate($paginator, $transformer = null): JsonResponse
    {
        return $this->success([
            'data' => $transformer ? fractal()->collection($paginator, $transformer)->serializeWith(new ArraySerializer())->toArray() : $paginator->items(),
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'limit' => intval($paginator->perPage()),
                'total' => $paginator->total(),
                'total_pages' => $paginator->lastPage(),
            ]
        ]);
    }

    /**
     * @param $collection
     * @param null $transformer
     * @return JsonResponse
     */
    public function collection($collection, $transformer = null): JsonResponse
    {
        return $this->success([
            'data' => fractal()->collection($collection, $transformer)->serializeWith(new ArraySerializer())->toArray(),
        ]);
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @param int $errorCode
     */
    public function error(string $message = '', int $statusCode = Response::HTTP_BAD_REQUEST, int $errorCode = 0)
    {
        throw new GeneralException($message, $errorCode, $statusCode);
    }
}
