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
                <div class="input-group date align-items-center">
                    <div id="weekpicker1"></div>
                </div>
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
@push('styles')
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/pingcheng/bootstrap4-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/flatly/bootstrap.min.css">
@endpush
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="https://cdn.rawgit.com/pingcheng/bootstrap4-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js" type="text/javascript" ></script>
    <!-- Bootstrap 4 Weekpicker JavaScript -->
    <script src="{{asset('js/bootstrap-weekpicker.js')}}" type="text/javascript" ></script>

    <script type="text/javascript">
        var weekpicker = $("#weekpicker1").weekpicker();
    </script>
@endpush
