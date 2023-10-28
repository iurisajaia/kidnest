@extends('layouts.landing')
@section('landing')

    <div class="h-[600px] bg-no-repeat" style="background-image: url({{ asset('assets/images/landing/cover.jpg') }})">
        <div class="flex items-center py-[24px] px-[32px] justify-between">
            <div>
                <a href="">
                    <img class=" w-[100px] h-[40px]" src="{{ asset('assets/images/global/logo.svg') }}">
                </a>
            </div>
            <div class="flex gap-[40px] items-center">
                <div class="flex gap-[40px]">
                    <a class="text-[14px] text-[#444] font-semibold" href="">მთავარი</a>
                    <a class="text-[14px] text-[#444] font-semibold" href="">ჩვენს შესახებ</a>
                    <a class="text-[14px] text-[#444] font-semibold" href="">პროდუქტი</a>
                    <a class="text-[14px] text-[#444] font-semibold" href="">პარტნიორები</a>
                    <a class="text-[14px] text-[#444] font-semibold" href="">კონტაქტი</a>
                </div>
                <div class="flex gap-[8px]">
                    <a class="text-[14px] text-[#444] font-bold py-[6px] px-[12px] rounded-[8px] border border-[#919EAB3D] hover:bg-[#FFCC5C] hover:text-[#F8F8F8]"
                       href="{{ route('login') }}">ავტორიზაცია</a>
                    <a class="text-[14px]  text-[#444] font-bold py-[6px] px-[12px]  rounded-[8px] border border-[#919EAB3D] hover:bg-[#FFCC5C] hover:text-[#F8F8F8]"
                       href="">მოგვწერეთ</a>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-[50px] mt-[100px] px-[20px]">
            <ul class="flex flex-col gap-[30px]">
                <li>
                    <a href="">
                        <img class=" w-[24px] h-[24px]" src="{{ asset('assets/images/landing/facebook.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class=" w-[24px] h-[24px]" src="{{ asset('assets/images/landing/instagram.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class=" w-[24px] h-[24px]" src="{{ asset('assets/images/landing/linkedin.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img class=" w-[24px] h-[24px]" src="{{ asset('assets/images/landing/tiktok.svg') }}">
                    </a>
                </li>
            </ul>
            <div>
                <h1 class="text-[100px] font-bold text-[#FFCC5C]">
                    KidNest
                </h1>
                <h2 class="text-[24px] font-normal text-[#999]">
                    მოუფრთხილდით თქვენი შვილის მოგზაურობას
                </h2>
            </div>
        </div>
    </div>
    <div class="mt-[60px] w-[1002px] m-auto text-center">
        <div class="flex justify-center items-cente gap-[21px]">
            <h3 class="text-[48px] text-[#444] font-bold mb-[40px]">ჩვენ შესახებ</h3>
            <img class=" w-[43px] h-[69px]" src="{{ asset('assets/images/landing/pin.svg') }}">
        </div>
        <p class="text-[#999] text-[24px] font-normal">KidNest - ი არის აპლიკაცია, რომელიც ამარტივებს ბავშვზე ზრუნვის
            პროცესს, როგორც მშობლისთვის ასევე ბაღისთვის. პლათფორმა სთავაზობს მშობელს რეალ;ურ დროში განახლებებს ბავშვის
            აქტივობის შესახებ, ბაღს კი, ისეთ ფუნქციონალს, რომელიც საოფისე დროს დაზოგავს.</p>
    </div>
    <div class="mt-[200px] w-[1002px] m-auto text-center relative">
        <h3 class="text-[48px] text-[#444] font-bold mb-[40px]   mb-[40px]">პრობლემის გადაჭრის გზა</h3>
        <img class="hidden  md:block w-[85px] h-[85px] absolute top-[30px]"
             src="{{ asset('assets/images/landing/vector.svg') }}">
        <div class="flex gap-[50px]  justify-center">
            <div class="py-[80px] px-[20px] shadow-md w-[291px] rounded-[16px]">
                <h3 class="text-[24px] text-[#212B36] font-bold mb-[16px]">ბაღის მხარე</h3>
                <ul class="list-disc w-[80%] m-auto">
                    <li class="text-[16px] text-[#637381]">დროისა და რესურსების ეფექტურობა</li>
                    <li class="text-[16px] text-[#637381]">გამარტივებული გადახდის მენეჯმენტი</li>
                    <li class="text-[16px] text-[#637381]">ბავშვებზე ორიენტირებული მიდგომა</li>
                </ul>
            </div>
            <div class="py-[80px] px-[20px] shadow-md w-[291px] rounded-[16px]">
                <h3 class="text-[24px] text-[#212B36] font-bold mb-[16px]">მშობლის მხარე</h3>
                <ul class="list-disc w-[80%] m-auto">
                    <li class="text-[16px] text-[#637381]">უწყვეტი კომუნიკაცია</li>
                    <li class="text-[16px] text-[#637381]">რეალურ დროში განახლებები, შეტყობინებები</li>
                    <li class="text-[16px] text-[#637381]">უსაფრთხო ონლაინ გადახდები და გადახდების ისტორიის კონტროლი
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div>
        <h3 class="md:mt-[140px] text-center text-[48px] text-[#212B36] font-bold mb-[16px] w-[50%] m-auto">
            მომსახურების
            პაკეტები და საფასური
        </h3>
        <h4 class="md:mb-[54px] text-center text-[16px] text-[#999] font-normal">
            შეარჩიე შენს საჭიროებებზე მორგებული ფუნქციონალი
        </h4>
        <div class="flex justify-center gap-[50px]">
            <div class="h-[631px] p-[40px] shadow-md w-[304px] rounded-[16px]">
                <div class="border-dashed border-b border-[#919eab33]">
                    <img class=" w-[46px] h-[30px]" src="{{ asset('assets/images/landing/stack1.svg') }}">
                    <h3 class="my-[40px] text-[24px] font-bold text-[#444)]">სტანდარტული</h3>
                </div>
                <h4 class="mt-[40px] mb-[16px] text-[12px] font-bold text-[#444)]">ფუნქციონალი</h4>
                <ul class="mb-[40px]" style="list-style-image: url({{ asset('assets/images/landing/checkmark.svg') }})">
                    <li class="text-[#444] text-[14px]">რეალურ დროში განახლებები მშობლებისთვის</li>
                    <li class="text-[#444] text-[14px]">გადახდის თვალყურის დევნება და შეხსენებები</li>
                    <li class="text-[#444] text-[14px]">დასწრების მართვა</li>
                    <li class="text-[#444] text-[14px]">კალენდარული ინტეგრაცია ღონისძიებებისა და აქტივობებისთვის</li>
                </ul>
                <a class="hover:bg-[#FFCC5C] hover:text-[#FFFFFF] py-[11px] px-[40px] text-[#919eabcc] bg-[#919eab3d]  rounded-[8px]"
                   href="">დაგვიკავშირდით</a>
            </div>
            <div class="p-[40px] shadow-md w-[304px] rounded-[16px]">
                <div class="border-dashed border-b border-[#919eab33]">
                    <img class=" w-[46px] h-[30px]" src="{{ asset('assets/images/landing/stack1.svg') }}">
                    <h3 class="my-[40px] text-[24px] font-bold text-[#444)]">სტანდარტული</h3>
                </div>
                <h4 class="mt-[40px] mb-[16px] text-[12px] font-bold text-[#444)]">ფუნქციონალი</h4>
                <ul class="mb-[40px]" style="list-style-image: url({{ asset('assets/images/landing/checkmark.svg') }})">
                    <li class="text-[#444] text-[14px]">რეალურ დროში განახლებები მშობლებისთვის</li>
                    <li class="text-[#444] text-[14px]">გადახდის თვალყურის დევნება და შეხსენებები</li>
                    <li class="text-[#444] text-[14px]">დასწრების მართვა</li>
                    <li class="text-[#444] text-[14px]">კალენდარული ინტეგრაცია ღონისძიებებისა და აქტივობებისთვის</li>
                    <li class="text-[#444] text-[14px]">მორგებული ბრენდინგი საბავშვო ბაღის ლოგოთი</li>
                    <li class="text-[#444] text-[14px]">გაფართოებული საცავი დოკუმენტებისა და ფაილებისთვის</li>
                    <li class="text-[#444] text-[14px]">მესიჯინგი მშობლებთან</li>
                    <li class="text-[#444] text-[14px]">რეპორტინგი და ანალიტიკა</li>
                </ul>
                <a class="hover:bg-[#FFCC5C] hover:text-[#FFFFFF] py-[11px] px-[40px] text-[#919eabcc] bg-[#919eab3d]  rounded-[8px]"
                   href="">დაგვიკავშირდით</a>
            </div>

        </div>
    </div>
{{--    <div>--}}
{{--        <h3 class="md:mt-[80px] text-center text-[48px] text-[#212B36] font-bold mb-[16px] w-[50%] m-auto">--}}
{{--            პარტნიორები--}}
{{--        </h3>--}}


{{--        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">--}}
{{--            <div class="w-full relative flex items-center justify-center">--}}
{{--                <button aria-label="slide backward"--}}
{{--                        class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer"--}}
{{--                        id="prev">--}}
{{--                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"--}}
{{--                         xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                              stroke-linejoin="round"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">--}}
{{--                    <div id="slider"--}}
{{--                         class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">--}}

{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}
{{--                        @include('components.homepage.slider-item')--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <button aria-label="slide forward"--}}
{{--                        class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400"--}}
{{--                        id="next">--}}
{{--                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none"--}}
{{--                         xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
{{--                              stroke-linejoin="round"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="flex justify-between px-[150px] pt-[112px] pb-[60px] items-center">
        <div class="flex flex-col gap-10px">
            <span class="text-[14px] font-bold text-[#444]">ელ.ფოსტა</span>
            <a class="text-[14px] font-semibold text-[#444]"
               href="mailto:kidnest.info@gmail.com">kidnest.info@gmail.com</a>
        </div>
        <div class="flex flex-col gap-[8px] items-center">
            <img class=" w-[33px] h-[40px]" src="{{ asset('assets/images/landing/layer1.svg') }}">
            <span class="w-[140px] text-[12px] ">© All rights reserved
                made by  <span class="text-[#FFCC5C]">KidNest.life</span></span>
        </div>
        <div class="flex flex-col gap-10px">
            <span>ელ.ფოსტა</span>
            <a href="tel:+995 598 880 151">+995 598 880 151</a>
        </div>
    </div>
@endsection
