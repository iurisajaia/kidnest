<?php

namespace App\Repositories;

use App\Enums\ActivityEnum;
use App\Enums\PaymentStatusEnum;
use App\Enums\UserRoleEnum;
use App\Http\Requests\Activity\CreateActivityNotificationRequest;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\ActivityNotification;
use App\Models\Attendance;
use App\Models\Invoice;
use App\Models\Kid;
use App\Models\Payment;
use App\Models\Staff;
use App\Models\User;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function index(Request $request){
        $payments = Payment::query()->with('invoices')->orderByDesc('id');

//        if($request->user()->isParent()) {
//            $payments = $payments->whereHas('invoices', function ($query) use ($request) {
//                $query->where('parent_id', $request->user()->id);
//            })->with(['invoices.parent', 'invoices.kindergarten']);
//        }

        if($request->user()->isKindergarten()) {
            $payments = $payments->where('kindergarten_id', $request->user()->id);
        }


        return $payments->get();
    }

    public function getInvoices(Request $request){
        $invoices = Invoice::query()->with(['parent', 'kindergarten'])->orderByDesc('id');

        if($request->user()->isParent()) {
            $invoices = $invoices->where('parent_id', $request->user()->id);
        }

        return $invoices->get();
    }

    public function createInvoice(Request $request){
        $parents = [12, 13];
        $data = [
            'amount' => 150,
            'payment_date' => now(),
            'payment_note' => 'გადახდის შექმნა',
            'payment_status' => PaymentStatusEnum::IN_PROGRESS,
            'kindergarten_id' => $request->user()->id,
        ];

        $payment = Payment::create($data);

        foreach($parents as $parent){
            Invoice::create([
                'amount' => $data['amount'],
                'invoice_date' => $data['payment_date'],
                'invoice_note' => $data['payment_note'],
                'invoice_status' => $data['payment_status'],
                'invoice_number' => 'INV-'.rand(1000, 9999).'-'.now()->format('Y-m-d').'-'.$parent,
                'kindergarten_id' => $data['kindergarten_id'],
                'parent_id' => $parent,
                'payment_id' => $payment->id,
            ]);
        }
        return 'success';
    }
}
