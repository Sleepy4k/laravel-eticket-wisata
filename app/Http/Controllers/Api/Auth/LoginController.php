<?php
namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Traits\Responsible;
use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use Responsible;
    
    /**
     * Login Token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        // Validate data form
    	$validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:8',
        ],
        [
            'username.required' => 'form username is required',
            'password.required' => 'form password is required',
            'password.min' => 'form password is minimum at 8 char'
        ]);

        // If validate going false or error then send error message
        if ($validator->fails()) {
            return $this->response_error([
                'message' => 'Invalid form request',
                'error' => $validator->errors()
            ], 422);
        }

        // When data from form is not match on any account then send error message
        if (!$token = auth('api')->attempt($validator->validated())) {
            return $this->response_error([
                'message' => 'Account not match',
                'error' => 'username and password not match'
            ], 401);
        }

        // Try to send respon success with token api, if fail then send error message
        try {
            // $detail_tours = Tour::where('user_id', auth('api')->user()->id);
            $user = User::with('tours')->where('id', auth('api')->user()->id)->first();
            return $this->response_success([
                'message' => $request->input('username').' berhasil login',
                'data' => $user,
                // 'tours' => $detail_tours->get(),
                'token' => $token,
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