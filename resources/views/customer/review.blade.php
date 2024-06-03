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
            @include('customer.include.review')
        </div>
    </div>
</body>

</html>
