<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\Activity\CreateActivityNotificationRequest;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use Illuminate\Http\Request;

Interface PaymentRepositoryInterface{
    public function index(Request $request);
    public function createInvoice(Request $request);
    public function getInvoices(Request $request);
}
