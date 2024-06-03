<nav class="bg-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="<?php echo env('APP_URL') . 'public/welcome'; ?>">
                    <img class="h-10 w-auto" src="<?php echo env('APP_URL'); ?>/resources/img/banner/Cview.png" alt="Logo">
                </a>
            </div>

            <!-- Menu Button (for Mobile) -->
            <div class="md:hidden">
                <button id="mobile-menu-toggle" class="text-white hover:text-gray-300 focus:outline-none">
                    <!-- Hamburger Icon -->
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Menu Items -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <!-- First Menu Item (Dropdown) -->
                    <div class="relative">
                        <a href="<?php echo env('APP_URL') . 'public/welcome'; ?>"
                            class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">หน้าหลัก
                        </a>
                    </div>
                    <div class="relative">
                        <!-- Image Icon -->
                        <a href="#" id="dropdown-toggle"
                            class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">
                            ผลิตภัณฑ์
                        </a>
                        <!-- Dropdown Content -->
                        <div id="dropdown-menu" class="hidden absolute left-0 mt-2 w-32 bg-white rounded-lg shadow-lg">
                            <!-- Dropdown Items (Example) -->
                            <div class="border-t border-gray-200">
                                <a href="<?php echo env('APP_URL') . 'public/products/solarcell'; ?>"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Solarcell</a>
                                <a href="<?php echo env('APP_URL') . 'public/products/cctv'; ?>"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">CCTV</a>
                                <a href="<?php echo env('APP_URL') . 'public/products/evcharge'; ?>"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">EV CHARGE</a>
                                <a href="<?php echo env('APP_URL') . 'public/products/accesscontrol'; ?>"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">ACCESS CONTROL</a>
                                <a href="<?php echo env('APP_URL') . 'public/products/network'; ?>"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">NETWORK</a>
                            </div>
                        </div>
                    </div>
                    <!-- Remaining Menu Items with Anchor Tags -->
                    <div class="relative">
                        <a href="<?php echo env('APP_URL') . 'public/calculate'; ?>"
                            class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">คำนวณการใช้
                            Solarcell</a>
                    </div>
                    <div class="relative">
                        <a href="<?php echo env('APP_URL') . 'public/article'; ?>"
                            class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">บทความ</a>
                    </div>
                    <div class="relative">
                        <a href="https://facebook.com/cviewtech" target="_blank"
                            class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">ผลงาน</a>
                    </div>
                    {{-- <div class="relative">
                        <a href="<?php echo env('APP_URL') . 'public/candidate'; ?>"
                            class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">สนใจสมัครงาน</a>
                    </div> --}}
                    <div class="relative">
                        <a href="<?php echo env('APP_URL') . 'public/candidate'; ?> "
                            class="text-red-500 bg-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">สนใจสมัครงาน
                            / ติดต่อ</a>
                    </div>
                    <!-- Add other menu items here -->
                </div>
            </div>
        </div>
    </div>
</nav>

<div id="mobile-menu" class="hidden md:hidden fixed inset-0 bg-blue-800 opacity-95 z-50">
    <div class="flex justify-end px-4 py-2">
        <button id="mobile-menu-close" class="text-white">
            <!-- Close Icon -->
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div class="flex flex-col items-center justify-center h-full">
        <div class="flex flex-col items-center space-y-4">
            <!-- Mobile Menu Items -->
            <a href="<?php echo env('APP_URL') . 'public/'; ?>"
                class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">หน้าหลัก</a>
            <div class="border border-white rounded-lg flex flex-col items-center">
                <a href="#" id="dropdown-toggle"
                    class="text-white hover:bg-blue-600 px-3 py-2 text-sm font-bold border-b-2 border-white">
                    ผลิตภัณฑ์
                </a>
                <!-- Dropdown Content -->
                <!-- Dropdown Items (Example) -->

                <a href="<?php echo env('APP_URL') . 'public/products/solarcell'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">Solarcell</a>
                <a href="<?php echo env('APP_URL') . 'public/products/cctv'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">CCTV</a>
                <a href="<?php echo env('APP_URL') . 'public/products/evcharge'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">EV
                    CHARGE</a>
                <a href="<?php echo env('APP_URL') . 'public/products/accesscontrol'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">ACCESS CONTROL</a>
                <a href="<?php echo env('APP_URL') . 'public/products/network'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">NETWORK</a>
            </div>
            <div class="relative">
                <a href="<?php echo env('APP_URL') . 'public/calculate'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">คำนวณการใช้
                    Solarcell</a>
            </div>
            <div class="relative">
                <a href="<?php echo env('APP_URL') . 'public/article'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">บทความ</a>
            </div>
            <div class="relative">
                <a href="<?php echo env('APP_URL') . 'public/review'; ?>"
                    class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">ผลงาน</a>
            </div>
            {{-- <div class="relative">
                        <a href="<?php echo env('APP_URL') . 'public/candidate'; ?>"
                            class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">สนใจสมัครงาน</a>
                    </div> --}}
            <div class="relative">
                <a href="<?php echo env('APP_URL') . 'public/candidate'; ?> "
                    class="text-red-500 bg-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">สนใจสมัครงาน
                    / ติดต่อ</a>
            </div>
        </div>
        <!-- Include other mobile menu items here -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.getElementById('dropdown-toggle');
        const dropdownMenu = document.getElementById('dropdown-menu');

        function toggleDropdown(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('hidden');
        }

        // Handle click event
        dropdownToggle.addEventListener('click', toggleDropdown);

        // Handle touchstart event for mobile devices
        dropdownToggle.addEventListener('touchstart', toggleDropdown);
    });



    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        // Disable scrolling when the mobile menu is open
        document.body.style.overflow = mobileMenu.classList.contains('hidden') ? 'auto' : 'hidden';
    });

    mobileMenuClose.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });
</script>
