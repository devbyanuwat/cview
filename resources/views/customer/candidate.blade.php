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

<body
    style="background-image: url('https://images.unsplash.com/photo-1625301840055-7c1b7198cfc0?q=80&w=3271&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
    @include('customer.include.navbar')
    <div class="container mx-auto mt-8">
        <div class="grid xl:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-4 divide-x ">
            <div
                class="max-w-xl md:w-full mx-auto bg-gray-100 shadow-md overflow-hidden rounded-lg p-6 text-center bg-opacity-80 hover:bg-opacity-90">
                <h2 class="text-2xl font-semibold mb-4">สมัครงาน</h2>
                <form action="{{ route('candidate-form') }}" name="registerform" method="post" class="space-y-4">
                    @include('customer.include.candidateform')
                </form>
            </div>
            <div
                class="max-w-xl md:w-full h-full mx-auto bg-white shadow-md overflow-hidden rounded-lg p-6 text-center bg-opacity-80 hover:bg-opacity-90">
                <h2 class="text-2xl font-semibold mb-4">ข้อมูลติดต่อ</h2>
                <div class="text-left grid grid-rows-1 gap-5">
                    <p><i class="fa-brands fa-facebook text-blue-600 text-2xl"></i> <a
                            href="https://www.facebook.com/example">Example
                            Facebook</a></p>
                    <p><i class="fa-brands fa-line text-green-600 text-2xl"></i> example_line</p>
                    <p><i class="fa-solid fa-square-phone text-yellow-500 text-2xl"></i> 123-456-7890</p>
                    <p><i class="fa-solid fa-location-dot text-red-500 text-2xl"></i> 123 Example Street, City,
                        Country
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
