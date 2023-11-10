<?php

namespace App\Console\Commands;

use App\Enums\UserRoleEnum;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Console\Command;

class CheckUserPayments extends Command
{
    protected $signature = 'payments:check';

    protected $description = 'Check user payments and generate if needed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $amount = 90;

        $kindergartens = User::where('user_role_id', UserRoleEnum::KINDERGARTEN['id'])
            ->get();


        foreach ($kindergartens as $kindergarten) {
            $kindergartenId = $kindergarten->id;
            $users = User::where('user_role_id', UserRoleEnum::PARENT['id'])
                ->whereJsonContains('user_data->kindergarten_id', $kindergartenId)
                ->get();
            foreach ($users as $user) {
//                $lastPaymentDate = $user->last_payment_date;

//                if ($lastPaymentDate <= now()->subMonth()) {

                $invoice = Invoice::create([
                    'amount' => $amount,
                    'invoice_date' => now()->addWeek(),
                    'invoice_number' => 'INV-' . $kindergartenId . '-' . $user->id . '-' . now()->addWeek(),
                ]);


                $payment = new Payment();
                $payment['parent_id'] = $user->id;
                $payment['kindergarten_id'] = $kindergartenId;
                $payment['amount'] = $amount;
                $payment['invoice_id'] = $invoice->id;
                $payment->save();


                // Update the user's last_payment_date
//                    $user->last_payment_date = now();
//                    $user->save();
//                }
            }
        }


        $this->info('User payments checked and processed.');
    }
}
