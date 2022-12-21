<?php
namespace App\Http\Controllers\Api\User;

use App\Models\User;
use App\Http\Traits\Responsible;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use Responsible;
    
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $user = User::latest()->get();
            return $this->response_success([
                'message' => 'data berhasil diterima',
                'data' => $user
            ], 200);
        } catch (\Throwable $trw) {
            return $this->response_error([
                'message' => 'Server Error',
                'error' => $trw->getMessage()
            ], 500);
        }
    }
}