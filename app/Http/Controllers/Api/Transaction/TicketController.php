<?php
namespace App\Http\Controllers\Api\Transaction;

use Illuminate\Http\Request;
use App\Http\Traits\Responsible;
use App\Http\Traits\Transactional;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    use Responsible, Transactional;
    
    /**
     * Pejualan List of Data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($data)
    {
        // If validate going false or error then send error message
        if ($data === null) {
            return $this->response_error([
                'message' => 'param data is nil',
            ], 422);
        }

        // Try to send all Penjualan data
        try {
            $penjualan = $this->validate_ticket($data);
            return $this->response_success([
                'message' => 'data berhasil diterima',
                'data' => $penjualan['message']
            ], $penjualan['code']);
        } catch (\Throwable $trw) {
            return $this->response_error([
                'message' => 'Server Error',
                'error' => $trw->getMessage()
            ], 500);
        }
    }
}