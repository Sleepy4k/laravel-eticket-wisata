<?php
namespace App\Http\Controllers\Api\Transaction;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Traits\Responsible;
use App\Http\Traits\Transactional;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    use Responsible, Transactional;
    
    /**
     * Pejualan List of Data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Try to send all Penjualan data
        try {
            $penjualan = Transaction::latest()->get();
            return $this->response_success([
                'message' => 'data berhasil diterima',
                'data' => $penjualan
            ], 200);
        } catch (\Throwable $trw) {
            return $this->response_error([
                'message' => 'Server Error',
                'error' => $trw->getMessage()
            ], 500);
        }
    }

    /**
     * Store Penjualan Data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){
        // Validate form data
    	$validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'status' => 'required|max:255',
            'package_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'price' => 'required|numeric'
        ],
        [
            'amount.required' => 'form amount is required',
            'amount.numeric' => 'form amount is numeric not string',
            'status.required' => 'form status is required',
            'stats.max' => 'form status is maxed at 255 char',
            'package_id.required' => 'form package_id is required',
            'package_id.numeric' => 'form package_id is numeric not string',
            'user_id.required' => 'form user_id is required',
            'user_id.numeric' => 'form user_id is numeric not string',
            'price.required' => 'form price is required',
            'price.numeric' => 'form price is numeric not string',
        ]);

        // If validate error or fail then send error message
        if ($validator->fails()) {
            return $this->response_error([
                'message' => 'Invalid form request',
                'error' => $validator->errors()
            ], 422);
        }

        try {
            $input = $request->only('tiket_number', 'time', 'amount', 'status', 'package_id', 'user_id', 'price');
        
            $input['tiket_number'] = $this->generate_number([
                'min' => 100000,
                'max' => 999999
            ]);

            $input['time'] = date("y/m/d H:i:s");

            $Penjualan = Transaction::create($input);
            $Penjualan->save();

            return $this->response_success([
                'message' => 'data berhasil diterima',
                'data' => [
                    'tiket_number' => $input['tiket_number'],
                    'time' => $input['time'],
                    'amount' => $request['amount'],
                    'status' => $request['status'],
                    'package_id' => $request['package_id'],
                    'user_id' => $request['user_id'],
                    'price' => $request['price'],
                ]
            ], 201);
        } catch (\Throwable $trw) {
            return $this->response_error([
                'message' => 'Server Error',
                'error' => $trw->getMessage()
            ], 500);
        }
    }
}