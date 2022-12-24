<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Transaction::count() == 0) {
            $transactions = Transaction::factory(10)->make();

            Transaction::insert($transactions->toArray());
        }
    }
}
