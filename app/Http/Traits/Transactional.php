<?php

namespace App\Http\Traits;

use App\Models\Transaction;

trait Transactional
{
    protected function generate_number($data)
    {
        // Generate number from $data['min'] and $data['max']
        $number = str_pad(mt_rand($data['min'], $data['max']), 6, '0', STR_PAD_LEFT);

        // Validate if number is unused in database
        $valid = $this->check_number($number);

        // If number used then generate it again, if dont then return it
        if (!$valid) {
            $this->generate_number([
                'min' => 100000,
                'max' => 999999
            ]);
        } else {
            return $number;
        }
    }

    protected function check_number($data)
    {
        // Check $data from database
        $validate_number = Transaction::where('tiket_number', $data)->count();

        // If data not nil then return false, if nil then true
        if ($validate_number > 0) {
            return false;
        } else {
            return true;
        }
    }

    protected function validate_ticket($ticket)
    {
        // Check it from database
        $check_ticket = Transaction::where('tiket_number', $ticket);
        $total_ticket = $check_ticket->count();

        if ($total_ticket === 1) {
            $success['code'] = 200;
            $success['message'] = $check_ticket->get();
            return $success;
        } elseif ($total_ticket > 1) {
            $errors['code'] = 422;
            $errors['message'] = "Ticket Number Duplicate";
            return $errors;
        } elseif ($total_ticket <= 0) {
            $errors['code'] = 422;
            $errors['message'] = "Ticket not found";
            return $errors;
        } else {
            $errors['code'] = 500;
            $errors['message'] = "Server Error";
            return $errors;
        }
    }
}