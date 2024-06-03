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

<style>
    .set-background {
        background-image: url('https://images.unsplash.com/photo-1625301840055-7c1b7198cfc0?q=80&w=3271&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover
    }
</style>

<body class="set-background">
    @include('customer.include.navbar')
    <div class="container mx-auto">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center bg-opacity-90 hover:bg-opacity-95">
            <div class="text-center text-4xl font-bold">
                <span class="drop-shadow-lg">
                    Solar cell
                </span>
            </div>
            <div id="products" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Products will be inserted here -->
            </div>
        </div>
    </div>
    <script>
        axios.get("{{ route('product.solarcell') }}")
            .then(response => {
                // Handle the response data here
                const products = response.data;
                console.log(products);
                const productsContainer = document.getElementById('products');

                if (products.length === 0) {
                    const notFoundText = document.createElement('p');
                    notFoundText.className = 'text-lg text-gray-700 text-center w-full';
                    notFoundText.textContent = 'Product not found';
                    productsContainer.appendChild(notFoundText);
                } else {
                    products.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.className = 'shadow rounded py-3 bg-white';

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