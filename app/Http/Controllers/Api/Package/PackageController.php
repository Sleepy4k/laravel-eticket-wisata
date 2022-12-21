<?php
namespace App\Http\Controllers\Api\Package;

use App\Models\Package;
use App\Http\Traits\Responsible;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    use Responsible;
    
    /**
     * Paket List of Data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Try to send all data from paket but when fail then send error message
        try {
            $paket = Package::latest()->get();
            return $this->response_success([
                'message' => 'data berhasil diterima',
                'data' => $paket
            ], 200);
        } catch (\Throwable $trw) {
            return $this->response_error([
                'message' => 'Server Error',
                'error' => $trw->getMessage()
            ], 500);
        }
    }
}