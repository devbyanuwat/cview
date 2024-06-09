<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    @include('style.tailwind')
    <!-- Styles -->

</head>

<body class="bg-gray-100">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>

    @include('customer.include.navbar')

    <img src="<?php echo env('APP_URL'); ?>/public/resources/img/banner/banner.jpg" alt="banner">
    <br>
    <div class="container mx-auto ">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center ">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex justify-end" data-aos="fade-up">
                    <img src="<?php echo env('APP_URL'); ?>/resources/img/other/spacial-offer.png" alt="spacial-offer"
                        class="w-full sm:w-3/4 rounded-lg shadow-lg">
                </div>
                <div class="flex items-center sm:justify-start justify-center" data-aos="fade-down">
                    <form action="{{ route('user.spacial-offer') }}" method="post" id="registerform"
                        class="bg-white space-y-4 py-4 h-auto p-6 rounded-lg shadow-lg">
                        @include('customer.include.registerform')
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3" id="image-grid">
        <div class="relative" data-aos="fade-up">
            <img src="<?php echo env('APP_URL'); ?>/resources/img/other/strong.jpg" class="w-full h-full shadow"
                alt="Wind Turbines">
            <div
                class="absolute bottom-0 left-0 right-0 mx-auto pb-3 p-3 flex flex-col items-center justify-center text-white text-lg bg-gradient-to-t from-gray-200">
                <span class="font-bold text-3xl">มั่นใจ</span>
                <span class="text-base text-gray-600">รับประกันประสิทธิภาพของแผงโซลาร์ นาน 25 ปี</span>
            </div>
        </div>

        <div class="relative" data-aos="fade-down">
            <img src="<?php echo env('APP_URL'); ?>/resources/img/other/safe.jpg" class="w-full h-full  shadow" alt="safe">
            <div
                class="absolute bottom-0 left-0 right-0 mx-auto pb-3 p-3 flex flex-col items-center justify-center text-white text-lg bg-gradient-to-t from-gray-200">
                <span class="font-bold text-3xl">ปลอดภัย</span>
                <span class="text-base text-gray-600">อุปกรณ์และการติดตั้งที่ได้มาตราฐาน</span>
            </div>
        </div>

        <div class="relative" data-aos="fade-up">
            <img src="<?php echo env('APP_URL'); ?>/resources/img/other/standard.jpg" class="w-full h-full  shadow"
                alt="safe">
            <div
                class="absolute bottom-0 left-0 right-0 mx-auto pb-3 p-3 flex flex-col items-center justify-center text-white text-lg bg-gradient-to-t from-gray-200">
                <span class="font-bold text-3xl">มีมาตรฐาน</span>
                <span class="text-base text-gray-600">มีขั้นตอนการทำงานที่ชัดเจน</span>
            </div>
        </div>

    </div>
    <br>
    <div class="container mx-auto">
        <div class=" shadow overflow-hidden sm:rounded-lg p-6 text-center ">
            <div class="text-2xl text-left font-bold">ราคาติดตั้งโซล่าเซลล์</div>
            <div class="grid grid-cols-1 sm:grid-cols-6 gap-2">
                @include('customer.include.package')
            </div>
            <div class="text-left mt-4">
                <div class="font-bold">หมายเหตุ:</div>
                <ul class="list-disc pl-4 font-light">
                    <li>คำนวณราคาค่าไฟฟ้า 4.7 บาท/หน่วย และใช้งานช่วงกลางวันเฉลี่ย 5 ชั่วโมงต่อวัน.</li>
                    {{-- <li>เครื่องใช้ไฟฟ้าคำนวณจาก แอร์ 9000 BTU / ทีวี 55 นิ้ว / ผู้เย็น 12 คิว</li> --}}
                    <li>ราคาสินค้ารวมค่าบริการติดตั้ง และค่าขออนุญาตจากการไฟฟ้า (ไม่รวม Vat 7%), ราคาอาจมีการเปลี่ยนแปลง
                        ขึ้นอยู่กับพื้นที่ในการติดตั้งและสภาพหน้างาน</li>
                    <li>ฟรี !! รับประกันการบำรุงรักษาระบบโซล่าเซลล์ และล้างทำความสะอาดแผงโซล่าเซลล์นาน 2 ปี</li>
                </ul>
            </div>
            <br>
            @include('customer.include.calsolarcell')
            @include('customer.include.review')
            <br>
            @include('customer.include.knowledge')
            <br>

        </div>
    </div>

</body>
@include('customer.include.footer')

</html>
