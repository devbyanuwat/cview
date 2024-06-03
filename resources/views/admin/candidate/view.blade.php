<h1 class="text-3xl font-bold mb-4">Candidate DataTable</h1>
{{-- <button id="addCandidateBtn" class="mb-4 bg-blue-500 text-white px-4 py-2 rounded">Add Candidate</button> --}}

<div id="candidateFormContainer" class="hidden mb-4 bg-white p-4 rounded-lg shadow-lg w-2/4 modal">
    <h2 class="text-2xl font-bold mb-4" id="formTopic">Add Candidate</h2>
    <form id="candidateForm" class="">
        <input type="hidden" id="candidateId" name="candidateId">
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" id="name" name="name"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="tel" class="block text-gray-700">Telephone</label>
            <input type="tel" id="tel" name="tel"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="line_id" class="block text-gray-700">Line ID</label>
            <input type="text" id="line_id" name="line_id"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="position" class="block text-gray-700">Position</label>
            <input type="text" id="position" name="position"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
        </div>
        <div class="mb-4">
            <label for="is_completed" class="block text-gray-700">Completed Status</label>
            <select name="is_completed" id="is_completed"
                class="w-full px-4 py-2 border rounded-lg focus:ring focus:outline-none">
                <option value="waiting contract">Waiting Contract</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded" id="submitButton">Submit</button>
        <button type="button" id="cancelAddCandidateBtn"
            class="bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
    </form>
</div>

<div class="overflow-x-auto">
    <table id="candidateTable" class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Telephone</th>
                <th class="py-2 px-4 border-b">Line ID</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Position</th>
                <th class="py-2 px-4 border-b">Completed Status</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody id="datatable-body">
            <!-- Rows will be populated here -->
        </tbody>
    </table>
</div>
<script>
    function convertPosition(position) {
        switch (position) {
            case 'engineer':
                return 'วิศวะ';
            case 'accounting':
                return 'บัญชี';
            case 'installing-staff':
                return 'ช่างติดตั้ง';
            case 'sale':
                return 'พนักงานขาย';
            case 'unknow':
                return 'ไม่ระบุ';
            default:
                return 'Unknown';
        }
    }

    function addColorSpanTag(is_completed) {
        switch (is_completed) {
            case 'waiting contract':
                return `<span class="bg-yellow-500 text-white px-2 py-1 rounded">${is_completed}</span>`;
            case 'completed':
                return `<span class="bg-green-500 text-white px-2 py-1 rounded">${is_completed}</span>`;
            case 'pending':
                return `<span class="bg-blue-500 text-white px-2 py-1 rounded">${is_completed}</span>`;
            case 'rejected':
                return `<span class="bg-red-500 text-white px-2 py-1 rounded">${is_completed}</span>`;
            default:
                return `<span class="bg-gray-500 text-white px-2 py-1 rounded">${is_completed}</span>`;
        }
    }

    function populateTable(data) {
        const tableBody = document.getElementById('datatable-body');

        const row = document.createElement('tr');
        row.id = `row-${data.id}`; // Set an ID for each row element

        row.innerHTML = `
            <td class="py-2 px-4 border-b">${data.id}</td>
            <td class="py-2 px-4 border-b">${data.name}</td>
            <td class="py-2 px-4 border-b"><a class='text-green-700' href='tel:${data.tel}'>${data.tel}</a></td>
            <td class="py-2 px-4 border-b">${data.line_id}</td>
            <td class="py-2 px-4 border-b">${data.email}</td>
            <td class="py-2 px-4 border-b">${convertPosition(data.position)}</td>
            <td class="py-2 px-4 border-b">${addColorSpanTag(data.is_completed)}</td>
            <td class="py-2 px-4 border-b">${data.description}</td>
            <td class="py-2 px-4 border-b">
                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick='edit(${data.id})'>Edit</button>
                </td>
                `;

        // <button class="bg-red-500 text-white px-4 py-2 rounded" onclick='del(${data.id})'>Delete</button>
        tableBody.appendChild(row);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Fetch data from an actual endpoint
        axios.get("{{ route('candidate.all') }}")
            .then(response => {
                response.data.forEach(data => {
                    populateTable(data);
                });

                // Initialize DataTable after data has been populated
                $('#candidateTable').DataTable();
            })
            .catch(error => {
                console.error(error);
            });

        // Toggle the candidate form visibility
        document.getElementById('addProductBtn').addEventListener('click', function() {
            const formContainer = document.getElementById('candidateFormContainer');
            formContainer.classList.toggle('hidden');
        });
        document.getElementById('cancelAddProductBtn').addEventListener('click', function() {
            const formContainer = document.getElementById('candidateFormContainer');
            resetForm();
            formContainer.classList.add('hidden');
        });

        // Event listener for form submission
        document.getElementById('candidateForm').addEventListener('submit', function(event) {
            event.preventDefault();
            handleSubmit();
        });
    });

    // Function to handle form submission
    function handleSubmit() {
        document.getElementById('is_show').value = document.getElementById('is_show').checked ? 'show' : 'hide';
        const formData = new FormData(document.getElementById('candidateForm'));
        const action = document.getElementById('candidateForm').action;
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
                document.getElementById('candidateForm').reset();
                // Hide the form after submission
                const formContainer = document.getElementById('candidateFormContainer');
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
        axios.get("{{ route('candidate.all') }}")
            .then(response => {
                // Clear existing table data
                const tableBody = document.getElementById('datatable-body');
                tableBody.innerHTML = '';

                // Populate table with new data
                response.data.forEach(data => {
                    populateTable(data);
                });

                // Initialize DataTable after data has been populated
                $('#candidateTable').DataTable();
            })
            .catch(error => {
                console.error(error);
            });
    }

    // Function to handle edit
    function edit(id) {
        axios.get("{{ route('candidate.getCandidateById') }}", {
            params: {
                id: id
            }
        }).then(response => {
            const data = {
                "id": 1,
                "name": "Anuwat Tansanguan",
                "tel": "0822179618",
                "line_id": "anuwattansanguan",
                "email": "mailfordevbyanuwat@gmail.com",
                "position": "engineer",
                "is_completed": "waiting contract",
                "created_at": "2024-06-03 21:17:55",
                "updated_at": "2024-06-03 21:17:55"
            }
            Swal.fire({
                title: 'Update Candidate',
                text: 'You can update the candidate status here.',
                icon: 'info',
                html: `
                    <div class="my-4 text-left">
                        <span class="block text-gray-700 mb-2">Name: ${data.name}</span>
                        <span class="block text-gray-700 mb-2">Telephone: ${data.tel}</span>
                        <span class="block text-gray-700 mb-2">Line ID: ${data.line_id}</span>
                        <span class="block text-gray-700 mb-2">Email: ${data.email}</span>
                        <span class="block text-gray-700 mb-2">Position: ${convertPosition(data.position)}</span>
                        <label for="is_completed" class="block text-gray-700">Completed Status</label>
                        <select name="is_completed_sweet" id="is_completed_sweet"
                            class="w-full px-2 py-2 border rounded-lg focus:ring focus:outline-none" value="${data.is_completed}">
                            <option value="waiting">Waiting Contract</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description_sweet" id="description_sweet" rows="3" value="${data.description}"
                            class="w-full px-2 py-2 border rounded-lg focus:ring focus:outline-none"
                            placeholder="Description"></textarea>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Update'

            }).then((result) => {
                if (result.isConfirmed) {
                    const is_completed = document.getElementById('is_completed_sweet').value;
                    const description = document.getElementById('description_sweet').value?.trim() ||
                        null;
                    axios.put("{{ route('candidate.update') }}", {
                            id: id,
                            is_completed: is_completed,
                            description: description
                        })
                        .then(response => {
                            if (response.data.message === 'error') {
                                toastr.error('There was an error updating the candidate status.');
                                return;
                            }

                            toastr.success('Candidate status updated successfully!');
                            // Reload the table data after submission
                            reloadTableData();
                        })
                        .catch(error => {
                            toastr.error('There was an error updating the candidate status.');
                            console.error(error);
                        });
                }
            });
        }).catch(error => {
            toastr.error('There was an error fetching the candidate data.');
            // console.error(error);
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
        document.getElementById('candidateForm').reset();
        // Reset form action, method, and submit button text for adding
        document.getElementById('candidateForm').action = `{{ route('product.store') }}`;
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
