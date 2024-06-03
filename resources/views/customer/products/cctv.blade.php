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
            <div class="text-center text-4xl font-bold">CCTV</div>
            <div id="products" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Products will be inserted here -->
            </div>
        </div>
    </div>
    <script>
        axios.get("{{ route('product.cctv') }}")
            .then(response => {
                // Handle the response data here
                const products = response.data;
                const productsContainer = document.getElementById('products');

                if (products.length === 0) {
                    const notFoundText = document.createElement('p');
                    notFoundText.className = 'text-lg text-gray-700 text-center w-full';
                    notFoundText.textContent = 'Product not found';
                    productsContainer.appendChild(notFoundText);
                } else {
                    products.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.className = 'shadow rounded py-3';

                        const productImg = document.createElement('img');
                        productImg.className = 'h-40 w-auto mx-auto';
                        productImg.src = "<?php echo env('APP_URL') . '/public/images/'; ?>" + product.image;
                        productImg.alt = product.name;

                        const productName = document.createElement('p');
                        productName.className = 'text-lg font-semibold mb-4';
                        productName.textContent = product.name;

                        const productDescription = document.createElement('p');
                        productDescription.className = 'text-gray-700';
                        productDescription.textContent = product.description;

                        productDiv.appendChild(productImg);
                        productDiv.appendChild(productName);
                        productDiv.appendChild(productDescription);

                        productsContainer.appendChild(productDiv);
                    });
                }
            })
            .catch(error => {
                // Handle any errors here
                console.error(error);
            });
    </script>
</body>

</html>
