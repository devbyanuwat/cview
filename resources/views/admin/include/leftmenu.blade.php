<div class="flex flex-col w-64 h-full bg-gray-800 mb-3 pb-3 rounded-b-lg shadow-lg">
    <div class="flex items-center justify-center h-16 bg-gray-900">
        <h1 class="text-white text-2xl">Admin Panel</h1>
    </div>
    <div class="flex flex-col items-center justify-center mt-10">
        {{-- <a href="{{ route('admin.dashboard.view') }}"
            class="flex items-center justify-center w-40 h-10 bg-gray-900 text-white rounded-lg">Dashboard</a> --}}
        <a href="?view=product"
            class="flex items-center justify-center w-40 h-10 bg-gray-900 text-white rounded-lg mt-2">สินค้า</a>
        <a href="?view=register"
            class="flex items-center justify-center w-40 h-10 bg-gray-900 text-white rounded-lg mt-2">สนใจติดตั้ง(ลูกค้า)</a>
        <a href="?view=candidate"
            class="flex items-center justify-center w-40 h-10 bg-gray-900 text-white rounded-lg mt-2">สมัครงาน</a>
        <a href="?view=logout"
            class="flex items-center justify-center w-40 h-10 bg-red-600 text-white rounded-lg mt-2">ออกจากระบบ</a>
    </div>
</div>
