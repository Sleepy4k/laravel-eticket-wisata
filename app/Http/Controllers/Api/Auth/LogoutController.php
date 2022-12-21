<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Traits\Responsible;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    use Responsible;

    /**
     * Logout Token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        // Try to remove token, if fail then send error message
        try {
            auth('api')->logout();
            return $this->response_success([
                'message' => 'user berhasil logout',
            ], 200);
        } catch (\Throwable $trw) {
            return $this->response_error([
                'message' => 'Server Error',
                'error' => $trw->getMessage()
            ], 500);
        }
    }
}