<style>
    @keyframes slideRight {
        from {
            transform: translateX(-100%);
        }

        to {
            transform: translateX(0);
        }
    }

    .slide-right {
        animation: slideRight 1s ease forwards;
    }



    @media (max-width: 640px) {
        .slide-right {
            animation: none;
            /* Disable animation on larger screens */
        }
    }
</style>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
    <img src="<?php echo env('APP_URL'); ?>/resources/img/other/3k.jpg" data-aos="flip-up" class="rounded shadow" alt="Image 1">
    <img src="<?php echo env('APP_URL'); ?>/resources/img/other/5k.jpg" data-aos="flip-up" class="rounded shadow" alt="Image 2">
    <img src="<?php echo env('APP_URL'); ?>/resources/img/other/15k.jpg" data-aos="flip-up" class="rounded shadow" alt="Image 3">
    <img src="<?php echo env('APP_URL'); ?>/resources/img/other/15k.jpg" data-aos="flip-up" class="rounded shadow" alt="Image 4">
    <img src="<?php echo env('APP_URL'); ?>/resources/img/other/20k.jpg" data-aos="flip-up" class="rounded shadow" alt="Image 5">
    <img src="<?php echo env('APP_URL'); ?>/resources/img/other/more.jpg" data-aos="flip-up" class="rounded shadow"
        alt="Image 6">
</div>


<style>
    .fade-down {
        opacity: 0;
        transform: translateY(-20px);
        animation: fadeDownAnimation 1.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    @keyframes fadeDownAnimation {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let lazyImages = document.querySelectorAll('.lazy');

        function fadeInImages() {
            lazyImages.forEach(function(image) {
                if (isInViewport(image)) {
                    image.classList.add('fade-down');
                    image.onload = function() {
                        image.removeAttribute('src');
                    };
                }
            });
        }

        function isInViewport(element) {
            var rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        fadeInImages();

        window.addEventListener('scroll', function() {
            fadeInImages();
        });
    });
</script>

<script defer src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
