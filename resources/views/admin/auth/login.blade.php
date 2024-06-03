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
    {{-- @if ($errors->any())
        <script>
            toastr.error('Invalid username or password', 'Error', {
                closeButton: true,
                progressBar: true,
            });
        </script>
    @endif --}}
    <div class="container mx-auto">
        <form class="max-w-sm mx-auto mt-8 bg-white rounded shadow p-3" action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter your username">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter your password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-blue-500 focus:border-blue-500">Sign
                    In</button>
                {{-- <a href="#" class="text-sm text-blue-500 hover:text-blue-600">Forgot Password?</a> --}}
            </div>
        </form>
    </div>
</body>

</html>
