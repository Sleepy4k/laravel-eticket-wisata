<?php

namespace App\Http\Traits;

trait Responsible
{
    protected function response_success($data, $code)
    {
        $response = [
            'status' => $code,
            'message' => $data['message'],
            'total_data' => 0,
            'count_data' => 0,
            'data' => isset($data['data']) ? $data['data']:""
        ];

        if (isset($data['token'])) {
            $response['token'] = $data['token'];
            $response['token_type'] = $data['token_type'];
            $response['expires_in'] = $data['expires_in'];
        }

        return response()->json($response, $code);
    }

    protected function response_error($data, $code)
    {
        return response()->json([
            'status' => $code,
            'message' => $data['message'],
            'total_data' => 0, 
            'count_data' => 0,
            'data' => isset($data['data']) ? $data['data']:"", 
            'errors' => isset($data['error']) ? $data['error']:"", 
        ], $code);
    }
}