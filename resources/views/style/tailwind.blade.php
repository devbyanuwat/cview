<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<link rel="stylesheet" href='<?php echo env('APP_URL') . '/public/toastr/build/toastr.min.css'; ?> '>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='<?php echo env('APP_URL') . '/public/toastr/build/toastr.min.js'; ?> '></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"
    integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--
<link href='<?php echo env('APP_URL') . 'aos/src/sass/aos.scss'; ?>' rel="stylesheet">
<script src="<?php echo env('APP_URL') . 'aos/src/js/aos.js'; ?>" defer></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
<script>
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;
    toastr.options.closeMethod = 'fadeOut';
</script>
{{-- <script>
    AOS.init({
        duration: 1200,
    })
</script> --}}
<style>
    html {
        scroll-behavior: smooth;
    }

    .relative {
        position: relative;
    }

    .absolute {
        position: absolute;
    }

    input[type="checkbox"] {
        height: 1.25rem;
        /* Tailwind's h-5 */
        width: 1.25rem;
        /* Tailwind's w-5 */
        border-color: #D1D5DB;
        /* Tailwind's border-gray-300 */
        border-radius: 0.25rem;
        /* Tailwind's rounded */
    }

    input[type="checkbox"]:checked {
        background-color: #D97706;
        /* Tailwind's text-yellow-600 */
        border-color: #D1D5DB;
        /* Tailwind's border-gray-300 */
    }
</style>
