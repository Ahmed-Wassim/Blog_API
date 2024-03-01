<?php

namespace App\Traits;

trait ResponseTrait
{
    /**
     * Send a JSON response.
     *
     * @param mixed $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    /**
     * Send a success response.
     *
     * @param mixed $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendSuccess($data, $status = 200)
    {
        return $this->sendResponse(['success' => true, 'data' => $data], $status);
    }

    /**
     * Send an error response.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError($message, $status = 400)
    {
        return $this->sendResponse(['success' => false, 'error' => $message], $status);
    }
}
