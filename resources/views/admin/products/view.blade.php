<h1 class="text-3xl font-bold mb-4">Product DataTable</h1>
<button id="addProductBtn" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">Add Product</button>

<div id="productFormContainer" class="hidden mb-4 bg-white p-4 rounded-lg shadow-lg w-2/4 modal">
    <h2 class="text-2xl font-bold mb-4" id="formTopic">Add Product</h2>
    <form id="productForm" class="">
        <input type="hidden" id="productId" name="productId">
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" id="name" name="name"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <input type="text" id="description" name="description"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" step="0.01" id="price" name="price"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="type" class="block text-gray-700">Type</label>
            <select name="type" id="type"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
                <option value="SOLAR CELL">SOLAR CELL</option>
                <option value="CCTV">CCTV</option>
                <option value="EV CHARGE">EV CHARGE</option>
                <option value="ACCESS CONTROL">ACCESS CONTROL</option>
                <option value="NETWORK">NETWORK</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" id="image" name="image"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="is_show" class="block text-gray-700">Show (แสดงสินค้าหลังจากการสร้าง)</label>
            <input type="checkbox" id="is_show" name="is_show" value="show">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded" id="submitButton">Submit</button>
        <button type="button" id="cancelAddProductBtn" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
    </form>
</div>

<div class="overflow-x-auto">
    <table id="productTable" class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Type</th>
                <th class="py-2 px-4 border-b">Image</th>
                <th class="py-2 px-4 border-b">Price</th>
                <th class="py-2 px-4 border-b">Is Show</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody id="datatable-body">
            <!-- Rows will be populated here -->
        </tbody>
    </table>
</div>

<script>
    function populateTable(data) {
        const tableBody = document.getElementById('datatable-body');

        const row = document.createElement('tr');
        row.id = `row-${data.id}`; // Set an ID for each row element

        row.innerHTML = `
                <td class="py-2 px-4 border-b">${data.id}</td>
                <td class="py-2 px-4 border-b">${data.name}</td>
                <td class="py-2 px-4 border-b">${data.description}</td>
                <td class="py-2 px-4 border-b">${data.type}</td>
                <td class="py-2 px-4 border-b"><img src="<?php echo env('APP_URL') . 'public/images/'; ?>${data.image}" alt="${data.name}" class="w-20 h-20"></td>
                <td class="py-2 px-4 border-b">${data.price}</td>
                <td class="py-2 px-4 border-b">${data.is_show}</td>
                <td class="py-2 px-4 border-b">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick='edit(${data.id})'>Edit</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded" onclick='del(${data.id})'>Delete</button>
                </td>
            `;

        tableBody.appendChild(row);
    }
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch data from an actual endpoint
        axios.get("{{ route('product.all') }}")
            .then(response => {
                response.data.forEach(data => {
                    populateTable(data);
                });

                // Initialize DataTable after data has been populated
                $('#productTable').DataTable();
            })
            .catch(error => {
                console.error(error);
            });

        // Toggle the product form visibility
        document.getElementById('addProductBtn').addEventListener('click', function() {
            const formContainer = document.getElementById('productFormContainer');
            formContainer.classList.toggle('hidden');
        });
        document.getElementById('cancelAddProductBtn').addEventListener('click', function() {
            const formContainer = document.getElementById('productFormContainer');
            resetForm();
            formContainer.classList.add('hidden');
        });

        // Event listener for form submission
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault();
            handleSubmit();
        });
    });

    // Function to handle form submission
    function handleSubmit() {
        document.getElementById('is_show').value = document.getElementById('is_show').checked ? 'show' : 'hide';
        const formData = new FormData(document.getElementById('productForm'));
        const action = document.getElementById('productForm').action;
        let method = 'POST'; // Default method for adding products

        if (action.includes('update')) {
            // If the action URL contains 'update', change method to 'PUT' for updating
            method = 'PUT';
        }

        formData.append('_method', method); // Append method to form data

        axios.post(action, formData)
            .then(response => {
                toastr.success('Product saved successfully!');
                // Reset the form after successful submission
                document.getElementById('productForm').reset();
                // Hide the form after submission
                const formContainer = document.getElementById('productFormContainer');
                formContainer.classList.add('hidden');
                // Reload the table data after submission
                reloadTableData();
            })
            .catch(error => {
                toastr.error('Failed to save the product.');
                console.error(error);
            });
    }

    // Reload table data function
    function reloadTableData() {
        axios.get("{{ route('product.all') }}")
            .then(response => {
                // Clear existing table data
                const tableBody = document.getElementById('datatable-body');
                tableBody.innerHTML = '';

                // Populate table with new data
                response.data.forEach(data => {
                    populateTable(data);
                });

                // Initialize DataTable after data has been populated
                $('#productTable').DataTable();
            })
            .catch(error => {
                console.error(error);
            });
    }

    // Function to handle edit
    function edit(id) {
        axios.get(`{{ route('product.getProductById') }}`, {
                params: {
                    id: id
                }
            })
            .then(response => {
                populateFormFields(response.data[0]);
                // Change form action to update route
                document.getElementById('formTopic').innerText = 'Edit Product';
                document.getElementById('productForm').action = `{{ route('product.update') }}`;
                document.getElementById('productId').value = id; // Set product ID for updating
                document.getElementById('submitButton').innerText = 'Update Product';
                // Show the form
                const formContainer = document.getElementById('productFormContainer');
                formContainer.classList.remove('hidden');

            })
            .catch(error => {
                console.error(error);
                toastr.error('Failed to retrieve product data for editing.');
            });
    }

    // Function to populate form fields with product data
    function populateFormFields(data) {
        document.getElementById('name').value = data.name;
        document.getElementById('description').value = data.description;
        document.getElementById('price').value = data.price;
        document.getElementById('type').value = data.type;
        if (data.is_show === 'show') {
            document.getElementById('is_show').checked = true;
        } else {
            document.getElementById('is_show').checked = false;
        }
    }

    // Function to reset the form
    function resetForm() {
        document.getElementById('productForm').reset();
        // Reset form action, method, and submit button text for adding
        document.getElementById('productForm').action = `{{ route('product.store') }}`;
        document.getElementById('submitButton').innerText = 'Add Product';
        document.getElementById('productId').value = '';
        document.getElementById('formTopic').innerText = 'Add Product';
    }

    // Function to handle deletion
    function del(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{ route('product.delete') }}", {
                        params: {
                            id: id
                        }
                    })
                    .then(response => {
                        if (response.data.message === 'error') {
                            toastr.error('There was an error deleting the product.');
                            return;
                        }
                        // Remove the entire row from the table
                        const rowToRemove = document.getElementById(`row-${id}`);
                        if (rowToRemove) {
                            rowToRemove.remove();
                        }

                        toastr.success('Product deleted successfully!');
                    })
                    .catch(error => {
                        toastr.error('There was an error deleting the product.');
                        console.error(error);
                    });
            }
        });
    }
</script>
