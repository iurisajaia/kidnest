<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\PaymentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PaymentController extends Controller
{
    private array $views = [
        'parent' => 'pages.payment.parent',
        'kindergarten' => 'pages.payment.kindergarten',
        'educator' => 'pages.payment.educator',
    ];

    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index(Request $request): View
    {
        $payments = $this->paymentRepository->index($request);
        $invoices = $this->paymentRepository->getInvoices($request);
        return view($this->views[$request->user()->role->key])->with(['payments' => $payments, 'invoices' => $invoices]);
    }

    public function createInvoiceView(): View
    {
        return view('pages.payment.invoice.create');
    }

    public function createInvoice(Request $request): View
    {
        $this->paymentRepository->createInvoice($request);
        Session::flash('success', 'ინვოისი წარმატებით შეიქმნა');
        return view('pages.payment.kindergarten');
    }
}
