@extends('layouts.auth')
@section('user')
        @include('components.global.title.index', ['title' => __('attendance')])

        @if(isset($attendances) && count($attendances))

        <div class="flex items-center justify-between mt-4 mb-4">
            <a class="flex text-[#919EAB]" href="#">
                <img class="w-[24px] h-[24px]" src="{{asset('assets/images/attendance/arrow-left.svg')}}"/>
                უკან
            </a>
            <div class="flex">
                <img class="w-[24px] h-[24px]" src="{{asset('assets/images/attendance/calendar.svg')}}" />
                <p href="#" class="text-[#637381]">კვირა</p>
                <img src="{{asset('assets/images/attendance/arrow-down.svg')}}" />
            </div>
        </div>

        <table class="table-auto w-full">
            <thead class="tracking-wider bg-[#F4F6F8]">
            <tr>
                <th class="pt-4 pb-4">
                    <p>ბავშვის სახელი და გვარი</p>
                </th>
                <th class="pt-4 pb-4">
                    <p>ორშაბათი</p>
                </th>
                <th class="pt-4 pb-4">
                    <p>სამშაბათი</p>
                </th>
                <th class="pt-4 pb-4">
                    <p>ოთხშაბათი</p>
                </th>
                <th class="pt-4 pb-4">
                    <p>ხუთშაბათი</p>
                </th>
                <th class="pt-4 pb-4">
                    <p>პარასკევი</p>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendances as $at)
                <tr>
                    <td class="p-4">
                        @if(isset($at['kid']))
                        <div class="flex">
                            <img src="{{asset('assets/images/global/avatar.svg')}}" alt="" class="w-[40px] h-[40px]"/>
                            <div class="mx-2">
                                <p>{{$at['kid']['first_name']}} {{$at['kid']['last_name']}}</p>
                            </div>
                        </div>
                        @endif
                    </td>
                    @if(isset($at['days']))
                        @foreach($at['days'] as $day)
                            <td class="p-4">
                                @if($day >= 0)
                                <h3 class="w-[120px] m-auto {{$day ? 'text-[#22C55E] bg-green-100' : 'text-[#FF6B6B] bg-red-100'}} text-center rounded-lg px-2 py-3 ">
                                    {{$day ? 'დასწრება' : 'გაცდენა'}}
                                </h3>
                                @endif
                            </td>
                        @endforeach
                    @endif
                </tr>
            @endforeach




            </tbody>
        </table>
        @endif

@endsection
