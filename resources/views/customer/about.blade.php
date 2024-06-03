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

<body>
    @include('customer.include.navbar')
    <div class="container mx-auto">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center">
            <h2 class="text-2xl text-red-500 font-bold mb-4 ">About Us</h2>
            <h3>เกี่ยวกับเรา</h3>
            <div class="flex justify-center pt-3">
                <p>เราคือบริษัทที่มีความเชี่ยวชาญในการให้บริการด้านพลังงานแสงอาทิตย์
                    โดยเรามีทีมงานที่มีประสบการณ์และความชำนาญในการให้คำปรึกษาและออกแบบระบบพลังงานแสงอาทิตย์ที่เหมาะสมกับความต้องการของลูกค้า
                    โดยเรามีบริการทั้งในรูปแบบของระบบติดตั้งและระบบจำหน่าย
                    โดยเรามีความตั้งใจที่จะให้บริการที่ดีที่สุดแก่ลูกค้าของเรา</p>
            </div>
        </div>
    </div>
</body>

</html>
