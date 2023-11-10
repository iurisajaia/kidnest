@extends('layouts.auth')
@section('user')
    <div class="p-[20px]">
        <h1 class="text-[#444] text-[24px] mb-[50px]">გადახდები</h1>

        @if(isset($invoices))
            @foreach($invoices as $invoice)
                <div class="border rounded-lg p-4 mt-5 shadow-black">
                    <div class="flex items-center">
                        <h3 class="mr-2">{{$invoice?->parent?->name}}</h3>
                        <span class="bg-blue-100 text-[#006C9C] rounded-lg p-1">ბოლო ვადა {{date('d-m-Y', strtotime($invoice->invoice_date))}}</span>
                    </div>
                    <h4 class="text-[#637381]">თქვენ გაქვთ ბაღის ყოველთვიური გადასახადი</h4>
                    <div class="flex justify-between">
                        <h4 class="text-[#637381]">{{$invoice->amount}} ₾</h4>
                        <a class="{{$invoice->invoice_status === \App\Enums\PaymentStatusEnum::IN_PROGRESS ? 'bg-yellow-300 text-white' : ''}} rounded-lg p-1 font-bold" href="#">გადახდა</a>
                    </div>
                </div>
            @endforeach
        @endif



    </div>
@endsection
