<div class="">
    <div class="container mx-auto">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center">
            <div class="text-center text-4xl font-bold">Manage product</div>
            <div id="products" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Products will be inserted here -->
            </div>
        </div>
    </div>

    <div class="fixed bottom-0 right-0 p-6">
        <button onclick="document.getElementById('createForm').style.display = 'block';"
            class="bg-blue-500 text-white px-4 py-2 rounded">เพิ่มสินค้า</button>
        <div class="mb-4 ">
            <label for="filterName" class="block text-gray-700">Filter by Name</label>
            <input type="text" id="filterName" class="w-full p-2 border rounded cursor-not-allowed" disabled>
        </div>
        <button onclick="window.location.href = '{{ route('logout') }}';"
            class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
    </div>
    <div id="createForm"
        class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50"
        style="display: none;">
        <form class="bg-white p-6 rounded shadow" method="post" action="{{ route('product.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="createFormName" class="block text-gray-700">Product Name</label>
                <input type="text" id="createFormName" name="name" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="createFormDescription" class="block text-gray-700">Description</label>
                <textarea id="createFormDescription" name="description" class="w-full p-2 border rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="createFormType" class="block text-gray-700">Category</label>
                <select id="createFormType" name="type" class="w-full p-2 border rounded">
                    <option value="solarcell">Solar cell</option>
                    <option value="accesscontrol">Access control</option>
                    <option value="CCTV">CCTV</option>
                    <option value="network">Network</option>
                    <option value="evcharge">EV charge</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="createFormIsShow" class="block text-gray-700"> Show</label>
                <select id="createFormIsShow" name="is_show" class="w-full p-2 border rounded">
                    <option value="show">Yes</option>
                    <option value="noshow">No</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="createFormPrice" class="block text-gray-700">Price</label>
                <input type="text" id="createFormPrice" name="price" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="createFormImage" class="block text-gray-700">Image</label>
                <input type="file" id="createFormImage" name="image" class="w-full p-2 border rounded"
                    accept="image/*">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">เพิ่ม</button>
            <button type="button" onclick="document.getElementById('createForm').style.display = 'none';"
                class="border border-red-500 bg-white text-red-500 px-4 py-2 rounded">ยกเลิก</button>
        </form>
    </div>
    <div id="editForm" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50"
        style="display: none;">
        <form class="bg-white p-6 rounded shadow" method="post" action="{{ route('product.update') }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="editFormId">
            <div class="mb-4">
                <label for="editFormName" class="block text-gray-700">Product Name</label>
                <input type="text" id="editFormName" name="name" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="editFormDescription" class="block text-gray-700">Description</label>
                <textarea id="editFormDescription" name="description" class="w-full p-2 border rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="editType" class="block text-gray-700">Category</label>
                <select id="editType" name="type" class="w-full p-2 border rounded">
                    <option value="solarcell">Solar cell</option>
                    <option value="accesscontrol">Access control</option>
                    <option value="CCTV">CCTV</option>
                    <option value="network">Network</option>
                    <option value="evcharge">EV charge</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="editFormIsShow" class="block text-gray-700"> Show</label>
                <select id="editFormIsShow" name="is_show" class="w-full p-2 border rounded">
                    <option value="show">Yes</option>
                    <option value="noshow">No</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="editFormPrice" class="block text-gray-700">Price</label>
                <input type="text" id="editFormPrice" name="price" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="editFormImage" class="block text-gray-700">Image</label>
                <input type="file" id="editFormImage" name="image" class="w-full p-2 border rounded"
                    accept="image/*">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">แก้ไข</button>
            <button type="button" onclick="document.getElementById('editForm').style.display = 'none';"
                class="border border-red-500 bg-white text-red-500 px-4 py-2 rounded">ยกเลิก</button>
        </form>
    </div>
</div>
