<div class="grid grid-cols-1 sm:grid-cols-2 col-span-2 gap-4 mb-3">
    <div class="bg-white py-3 px-5 shadow-lg rounded-lg w-full h-full">
        <div class="text-2xl text-center font-bold mb-5">คำนวณการใช้งาน</div>
        <form action="#" method="post" name="packageform">
            {{-- {{ route('package-form') }} --}}
            @csrf
            <input type="text" name="packageform_name" placeholder="ชื่อ-สกุล"
                class="mb-5 py-2 px-4 block w-full border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm ">
            <input type="tel" name="packageform_tel" placeholder="เบอร์โทร" maxlength="10"
                class="mb-5 py-2 px-4 block w-full border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm ">
            <input type="email" name="packageform_email" placeholder="อีเมล์"
                class="mb-5 py-2 px-4 block w-full border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm ">
            <input type="number" id="bill-per-month" name="packageform_bill_per_month"
                placeholder="ค่าไฟต่อเดือนโดยประมาณ"
                class="mb-5 py-2 px-4 block w-full border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 shadow-sm ">

            <div class="text-left py-5">ช่วงเวลาใช้ไฟ (%)</div>
            <div class="grid grid-cols-2 gap-10">
                <div class="text-gray-600 text-left">กลางวัน</div>
                <div class="text-gray-600 text-right">กลางคืน</div>
            </div>
            <input id="default-range" type="range" value="50" style="accent-color: #FCD34D;"
                class="w-full h-2 bg-yellow-200 rounded-lg appearance-none cursor-pointermb-5 mb-5">

            <div class="flex flex-col md:flex-row md:justify-around">
                <input type="number" id="day-time" name="packageform_day_time" placeholder="ไฟช่วงกลางวัน"
                    value="50"
                    class="py-2 px-4 block w-full md:w-24 border border-gray-300 rounded-lg focus:ring-yellow-300 focus:border-yellow-300 shadow-sm mb-2 md:mb-0">
                <input type="number" id="night-time" name="packageform_night_time" placeholder="ไฟช่วงกลางคืน"
                    value="50"
                    class="py-2 px-4 block w-full md:w-24 border border-gray-300 rounded-lg focus:ring-yellow-300 focus:border-yellow-300 shadow-sm">
            </div>
            <div class="text-left py-5">ระบบไฟ</div>
            <div class="grid grid-cols-3 gap-4">
                <label class="flex items-center">
                    <input type="radio" name="packageform_power_system" value="1" class="hidden">
                    <div
                        class="text-white bg-yellow-200 py-2 px-4 border border-white rounded-md cursor-pointer hover:bg-yellow-400 hover:text-yellow-200 w-full">
                        1 เฟส
                    </div>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="packageform_power_system" value="3" class="hidden">
                    <div
                        class="text-white bg-yellow-200 py-2 px-4 border border-white rounded-md cursor-pointer hover:bg-yellow-400 hover:text-yellow-200 w-full">
                        3 เฟส
                    </div>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="packageform_power_system" value="1" class="hidden">
                    <div
                        class="text-white bg-yellow-200 py-2 px-4 border border-white rounded-md cursor-pointer hover:bg-yellow-400 hover:text-yellow-200 w-full">
                        ไม่แน่ใจ
                    </div>
                </label>
            </div>
            <br>
            <br>
            <div class="text-left py-5 font-thin text-sm text-gray-600">ข้าพเจ้า ซึ่งเป็นลูกค้า หรือ
                ผู้ใช้บริการของบริษัทยินยอมให้บริษัทเก็นรวบรวม ใช้
                เปิดเผย
                และ/หรือโอนข้อมูลส่วนบุคคลของข้าพเจ้าที่มีอยู่กับบริษัทภายให้ข้อกำหนดและวัตถุประสงค์การดำเนินงานของบริษัท
                ตังต่อไปนี้</div>
            <div class="grid grid-cols-1 gap-4 font-thin text-sm text-gray-600">
                <div>
                    <input type="checkbox" name="cnf1" id="cnf1" value="cnf1" class="text-green-500">
                    <label for="cnf1" class=" p-2 px-4 rounded-md cursor-pointer text-left">
                        เพื่อให้บริษัทสามารถติดต่อ นำเสนอ ประชาสัมพันธ์ข้อมูลข่าวสาร
                        สิทธิประโยชน์และกิจกรรมทางการคลาดที่เกี่ยวข้องกับผลิตภัณฑ์และบริการของบริษัทที่ข้าพเจ้าสนใจ
                        ผ่านช่องทางการคิดต่อที่ข้าพเจ้าได้ให้ไว้กับบริษัท </label>
                </div>
                <div>
                    <input type="checkbox" name="cnf2" id="cnf2" value="cnf2" class="text-green-500">
                    <label for="cnf2" class=" py-2 px-4 rounded-md cursor-pointer">
                        เพื่อให้บริษัทสามารถทำการวิเคราะห์ข้อมูลเพื่อการพัฒนา การปรับปรุง ผลิตภัณฑ์
                        หรือการให้บริการของบริษัทให้เหมาะสบกับความต้องการของข้าพเจ้า </label>
                </div>
            </div>
            <button type="button" onclick="validatePackageForm();"
                class="mt-5 w-2/4 border border-blue-600 bg-blue-600 text-white p-3 rounded-lg shadow-sm hover:text-blue-600 hover:bg-white transition-colors duration-300 delay-150">คำนวณ</button>
        </form>
    </div>
    <div class="py-3 px-5 ">
        <div id='wait-cal' class="flex justify-center items-center w-full h-full bg-white shadow-lg rounded-lg">
            <div class="text-2xl text-gray-500 text-center font-bold mb-5">ผลการคำนวณ</div>
        </div>
        <div id="calculated" class="flex flex-col gap-4 bg-white shadow-lg rounded-lg p-3" style="display:none">
            <div class="text-2xl text-center font-bold mb-5">ผลการคำนวณ</div>
            <div id="information" class="p-3 grid grid-cols-1 gap-4">
                <div id="detail" class="text-left text-bold text-xl grid grid-cols-1 gap-4">
                    ข้อมูลลูกค้า
                </div>
                <span class="text-left font-extralight text-sm" id="detail-name">&emsp;ชื่อ-สกุล: </span>
                <span class="text-left font-extralight text-sm" id="detail-billPerMonth">&emsp;ค่าไฟต่อเดือน:
                </span>
                <span class="text-left font-extralight text-sm" id="detail-dayLight">&emsp;ไฟช่วงกลางวัน: </span>
                <span class="text-left font-extralight text-sm" id="detail-electicPhase">&emsp;ระบบไฟ: </span>
            </div>
            <div id="package" class="p-3 grid grid-cols-1 gap-4">
                <div id="package-1"
                    class="bg-yellow-300 rounded-lg p-3 text-white font-bold text-xl text-left w-full flex items-center justify-start">
                    <div id="package-recommed" class="text-white mr-2">
                        <i class="fa-solid fa-box-archive font-bold text-3xl"></i>
                    </div>
                </div>
                <div id="package-2"
                    class="bg-yellow-300 rounded-lg p-3 text-white font-bold text-md text-left w-full flex items-center justify-start">
                    <div id="package-save-price" class="text-white mr-2">
                        <i class="fa-solid fa-piggy-bank text-3xl text-white"></i>
                    </div>
                </div>
            </div>


            <div id="condition" class="p-3 grid grid-cols-1 gap-4">
                <div id="detail" class="text-left font-extralight text-md text-gray-500">เงื่อนไข</div>
                <span class="text-left font-extralight text-sm text-gray-500">&emsp;1. ราคา Package
                    ข้างต้นเป็นราคาประเมินเบื้องต้น
                    อาจมีการเปลี่ยนแปลงจากสภาพหน้างานและสถานที่ที่ต้องการติดตั้ง</span>
                <span class="text-left font-extralight text-sm text-gray-500">&emsp;2. ระยะคืนทุนของประมาณ
                    ขึ้นอยู่กับการใช้งาน</span>
            </div>
            @include('customer.include.package.register')
        </div>
    </div>
</div>

@include('customer.include.package.package')

<script>
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('click', function() {
            radioButtons.forEach(function(rb) {
                rb.parentNode.querySelector('div').classList.remove('bg-yellow-400');
                // rb.parentNode.querySelector('div').classList.remove('text-white');
            });
            this.parentNode.querySelector('div').classList.add('bg-yellow-400');
            this.parentNode.querySelector('div').classList.add('text-white');
        });
    });

    const defaultRange = document.getElementById('default-range');
    const dayTime = document.getElementById('day-time');
    const nightTime = document.getElementById('night-time');

    defaultRange.addEventListener('input', function() {
        let value = defaultRange.value;
        dayTime.value = value;
        nightTime.value = 100 - value;
    });

    dayTime.addEventListener('input', function() {
        let value = dayTime.value;
        defaultRange.value = value;
        nightTime.value = 100 - value;
    });

    nightTime.addEventListener('input', function() {
        let value = nightTime.value;
        defaultRange.value = 100 - value;
        dayTime.value = 100 - value;
    });

    function validatePackageForm() {
        // console.log('validatePackageForm');
        var name = document.forms["packageform"]["packageform_name"]
        var tel = document.forms["packageform"]["packageform_tel"]
        var email = document.forms["packageform"]["packageform_email"]
        var billPerMonth = document.forms["packageform"]["packageform_bill_per_month"]
        var dayTime = document.forms["packageform"]["packageform_day_time"]
        var nightTime = document.forms["packageform"]["packageform_night_time"]
        var powerSystem = document.forms["packageform"]["packageform_power_system"]
        var cnf1 = document.forms["packageform"]["cnf1"]
        var cnf2 = document.forms["packageform"]["cnf2"]

        var nameValue = name.value;
        var telValue = tel.value;
        var emailValue = email.value;
        var billPerMonthValue = billPerMonth.value;
        var dayTimeValue = dayTime.value;
        var nightTimeValue = nightTime.value;
        var powerSystemValue = powerSystem.value;
        var cnf1Value = cnf1.checked;
        var cnf2Value = cnf2.checked;

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
        if (emailValue == "" || emailValue == null || emailValue == undefined) {
            toastr.warning('กรุณากรอกอีเมล!')
            email.focus();
            return false;
        }
        if (billPerMonthValue == "" || billPerMonthValue == null || billPerMonthValue == undefined) {
            toastr.warning('กรุณากรอกค่าไฟต่อเดือน!')
            billPerMonth.focus();
            return false;
        }
        if (dayTimeValue == "" || dayTimeValue == null || dayTimeValue == undefined) {
            toastr.warning('กรุณากรอกไฟช่วงกลางวัน!')
            dayTime.focus();
            return false;
        }
        if (nightTimeValue == "" || nightTimeValue == null || nightTimeValue == undefined) {
            toastr.warning('กรุณากรอกไฟช่วงกลางคืน!')
            nightTime.focus();
            return false;
        }
        if (powerSystemValue == "" || powerSystemValue == null || powerSystemValue == undefined) {
            toastr.warning('กรุณาเลือกระบบไฟ!')
            return false;
        }

        if (!cnf1Value || !cnf2Value) {
            toastr.warning('กดยอมรับเงื่อนไขเพื่อทำการคำนวณ')
            return false;
        }
        // console.log(dayTimeValue, billPerMonthValue)
        let matchPackage = (billPerMonthValue * dayTimeValue / 100) / 600;
        // console.log(Math.ceil(matchPackage))
        generatePackage({
            name: nameValue,
            tel: telValue,
            email: emailValue,
            billPerMonth: billPerMonthValue,
            dayTime: dayTimeValue,
            nightTime: nightTimeValue,
            powerSystem: powerSystemValue,
            cnf1: cnf1Value,
            cnf2: cnf2Value,
            calPackage: matchPackage
        });
    }

    function generatePackage(data) {
        const result = matchingPackage(data.calPackage, data.powerSystem);
        // console.log(result)
        if (result.error) {
            toastr.warning(result.message)
            return false;
        }
        toastr.success('คำนวณเสร็จสิ้น')

        document.getElementById('detail-name').innerHTML = "&emsp;ชื่อ-สกุล: " + data.name;
        document.getElementById('detail-billPerMonth').innerHTML = "&emsp;ค่าไฟต่อเดือน: " + data.billPerMonth;
        document.getElementById('detail-electicPhase').innerHTML = "&emsp;ระบบไฟ: " + data.powerSystem + " เฟส";
        document.getElementById('detail-dayLight').innerHTML = "&emsp;ไฟช่วงกลางวัน: " + data.dayTime + "%";
        document.getElementById('package-recommed').innerHTML =
            '<i class="fa-solid fa-box-archive font-bold text-3xl"></i> ' + result.packageName;
        document.getElementById('package-save-price').innerHTML =
            '<i class="fa-solid fa-piggy-bank text-3xl text-white"></i> ' +
            "ประหยัดค่าไฟ " + '<span>' + result.savingPerMonth + " บาท/เดือน" + '</span>';
        document.getElementById('wait-cal').style.display = 'none';
        document.getElementById('calculated').style.display = 'block';
    }
</script>
