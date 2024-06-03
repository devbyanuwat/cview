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
    <div class="flex gap-1">
        <div class="flex-none">
            @include('admin.include.leftmenu')
        </div>
        <div class="flex-grow">
            @php
                $render = $_GET['view'] ?? 'product';
            @endphp

            @if ($render === 'register')
                @include('admin.registerCampaign.view')
            @elseif ($render === 'product')
                @include('admin.products.view')
            @elseif ($render === 'candidate')
                @include('admin.candidate.view')
            @elseif ($render === 'logout')
                <script>
                    // Redirect to the logout route
                    window.location.href = "{{ route('admin.logout') }}";
                </script>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Products will be inserted here -->
            </div>
        </div>
    </div>

</body>

</html>
