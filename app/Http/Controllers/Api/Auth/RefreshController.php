<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Traits\Responsible;
use App\Http\Controllers\Controller;

class RefreshController extends Controller
{
    use Responsible;
    
    /**
     * Refresh Token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        // Try to regenerate token, if fail then send error message
        try {
            return $this->response_success([
                'message' => 'token berhasil di refresh',
                'token' => auth('api')->refresh(),
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ], 200);
        } catch (\Throwable $trw) {
            return $this->response_error([
                'message' => 'Server Error',
                'error' => $trw->getMessage()
            ], 500);
        }
    }
}