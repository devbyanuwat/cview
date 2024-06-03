@csrf
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <input type="text" name="name" placeholder="ชื่อ-สกุล"
        class="py-2 px-4 block w-full border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
    <input type="tel" name="tel" placeholder="เบอร์โทร" maxlength="10"
        class="py-2 px-4 block w-full border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <input type="text" name="line_id" placeholder="Line ID"
        class="py-2 px-4 block w-full border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
    <input type="text" name="address" placeholder="ที่อยู่"
        class="py-2 px-4 block w-full border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
</div>
<input type="email" name="email" placeholder="อีเมล์"
    class="py-2 px-4 block w-full border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
<select style="background-color: white" name="position" id="position"
    class="p-2.5 py-2 px-4 block w-full border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
    <option value="">เลือกฝ่าย</option>
    <option value="engineer">วิศวะ</option>
    <option value="accounting">บัญชี</option>
    <option value="installing-staff">ช่างติดตั้ง</option>
    <option value="sale">พนักงานขาย</option>
    <option value="unknow">ไม่ระบุ</option>
</select>
{{-- <div class="flex items-center">
    <input type="checkbox" name="accept_conditions"
        class="form-checkbox h-5 w-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
    <label for="accept_conditions" class="ml-2 text-gray-700">I accept the conditions</label>
</div> --}}
<button type="button" onclick="validateForm()"
    class="bg-yellow-400 hover:bg-yellow-200 hover:text-black text-white border border-yellow-300  font-bold py-2 px-4 rounded-lg transition-colors delay-150">สนใจสมัครงาน</button>

<script>
    function validateForm() {
        // console.log('validateForm');
        var name = document.forms["registerform"]["name"]
        var tel = document.forms["registerform"]["tel"]
        var line_id = document.forms["registerform"]["line_id"]
        var address = document.forms["registerform"]["address"]
        var email = document.forms["registerform"]["email"]
        var position = document.forms["registerform"]["position"]

        var nameValue = name.value;
        var telValue = tel.value;
        var line_idValue = line_id.value;
        var addressValue = address.value;
        var emailValue = email.value;
        var positionValue = position.value;

        if (nameValue == "" || nameValue == null || nameValue == undefined) {
            toastr.warning('กรุณากรอกชื่อ-สกุล!')
            name.focus();
            return false;
        }
        if (telValue == "" || telValue == null || telValue == undefined) {
            toastr.warning('กรุณากรอกเบอร์โทร!')
            tel.focus();
            return false;
        } else {
            if (isNaN(telValue)) {
                toastr.warning('เบอร์โทรต้องเป็นตัวเลขเท่านั้น!')
                tel.focus();
                return false;
            }
            if (telValue.length < 10) {
                toastr.warning('เบอร์โทรต้องมี 10 หลัก!')
                tel.focus();
                return false;
            }
        }
        if (line_idValue == "" || line_idValue == null || line_idValue == undefined) {
            toastr.warning('กรุณากรอก Line ID!')
            line_id.focus();
            return false;
        }
        if (addressValue == "" || addressValue == null || addressValue == undefined) {
            toastr.warning('กรุณากรอกที่อยู่!')
            address.focus();
            return false;
        }
        if (emailValue == "" || emailValue == null || emailValue == undefined) {
            toastr.warning('กรุณากรอกอีเมล์!')
            email.focus();
            return false;
        } else {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(emailValue)) {
                toastr.warning('รูปแบบอีเมล์ไม่ถูกต้อง!')
                email.focus();
                return false;
            }
        }
        if (positionValue == "" || positionValue == null || positionValue == undefined) {
            toastr.warning('กรุณาเลือกตำแหน่ง!')
            position.focus();
            return false;
        }
        submitForm();
    }

    function submitForm() {

        const formData = new FormData()
        formData.append('name', document.forms["registerform"]["name"].value);
        formData.append('tel', document.forms["registerform"]["tel"].value);
        formData.append('line_id', document.forms["registerform"]["line_id"].value);
        formData.append('address', document.forms["registerform"]["address"].value);
        formData.append('email', document.forms["registerform"]["email"].value);
        formData.append('position', document.forms["registerform"]["position"].value);

        axios.post('{{ route('candidate.register') }}', formData)
            .then(function(response) {
                var data = response.data;
                console.log(data);
                if (data.status == 'success') {
                    toastr.success(data.message);
                    document.forms["registerform"].reset();
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(function(error) {
                // console.log(error);
                toastr.error('เกิดข้อผิดพลาดในการส่งข้อมูล!');
            });

    }
</script>
