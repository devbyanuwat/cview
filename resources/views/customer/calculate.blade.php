<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    @include('style.tailwind')
    <!-- Styles -->

    <style>
        /* Add custom styles here if needed */
        tbody tr {
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            font-style: normal;
            font-size: 14px;
            color: black;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9fafb;
            /* Tailwind's bg-gray-100 */
        }

        tbody tr:nth-child(even) {
            background-color: #fff;
            /* Tailwind's bg-white */
        }

        tbody input[type="checkbox"] {
            height: 1.25rem;
            /* Tailwind's h-5 */
            width: 1.25rem;
            /* Tailwind's w-5 */
            border-color: #D1D5DB;
            /* Tailwind's border-gray-300 */
            border-radius: 0.25rem;
            /* Tailwind's rounded */
        }

        tbody input[type="checkbox"]:checked {
            background-color: #D97706;
            /* Tailwind's text-yellow-600 */
            border-color: #D1D5DB;
            /* Tailwind's border-gray-300 */
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 50;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black with opacity */
            backdrop-filter: blur(5px);
            /* Blur effect */
        }
    </style>
</head>

<body class="bg-gray-50">
    @include('customer.include.navbar')
    <div class="flex justify-center p-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 text-center">
            {{-- @include('customer.include.calsolarcell') --}}
            <div class="overflow-x-auto overflow-hidden rounded-lg">
                <h1 class="text-2xl font-semibold">Solar Calculator</h1>
                <p class="text-sm text-gray-500">โปรแกรมคำนวณโซล่าออนไลน์</p>
                <div class="flex justify-center items-center space-x-4 mt-4">
                    <p class="text-sm text-gray-500">ระบบไฟ</p>
                    <select
                        class="p-2.5 py-2 px-4 rounded-lg border focus:ring-yellow-300 focus:border-yellow-500 w-auto"
                        id="phase_option">
                        <option value="1">1 เฟส(ค่าเริ่มต้น)</option>
                        <option value="3">3 เฟส</option>
                    </select>
                    <p class="text-sm text-gray-500">ช่วงเวลา : 06:00 - 18:00</p>
                </div>

                <table class="table-auto w-full rounded-lg shadow-lg mt-4">
                    <thead class="bg-yellow-400">
                        <tr>
                            <th class="px-4 py-2 rounded-l-lg">อุปกรณ์</th>
                            <th class="px-4 py-2">จำนวน</th>
                            <th class="px-4 py-2">จำนวนชั่วโมงที่ใช้</th>
                            <th class="px-4 py-2 rounded-r-lg">ปริมาณไฟที่ใช้</th>
                        </tr>
                    </thead>
                    <tbody id="deviceTableBody">
                        <!-- Rows will be inserted here by JavaScript -->
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-center">
                <span id="wattageCalculation"
                    class="text-lg font-semibold bg-slate-400 rounded-lg shadow-md p-3"></span>
            </div>
            <div class="mt-6 flex flex-col items-center">
                <button id="myBtn"
                    class="border border-blue-600 bg-blue-600 text-white p-3 rounded-lg shadow-sm hover:text-blue-600 hover:bg-white transition-colors duration-300 delay-150">
                    คำนวณการใช้งาน
                </button>
            </div>
        </div>

    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal flex items-center justify-center">
        <!-- Modal content -->
        <div
            class="modal-content bg-white p-6 rounded shadow-lg max-w-sm w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
            <div class="bg-yellow-400 p-3 rounded-lg shadow">
                <span class="close cursor-pointer text-gray-500 float-right text-2xl">&times;</span>
                <span class="text-2xl font-bold ">ผลการคำนวณ</span>
            </div>
            <div class="mt-4">
                <div class="grid gap-4">
                    <div class="bg-gray-50 grid grid-cols-2 p-3 shadow rounded-lg">
                        <span class="text-lg">แพ็คเกจที่แนะนำ</span>
                        <span class="text-xl text-center" id="recommend_package">3kW</span>
                    </div>
                    <div class="bg-gray-100 grid grid-cols-2 p-3 shadow rounded-lg">
                        <span class="text-lg">ผลิตไฟได้</span>
                        <span class="text-xl text-center" id="genarate_month">360 หน่วย/เดือน</span>
                    </div>
                    <div class="bg-gray-50 grid grid-cols-2 p-3 shadow rounded-lg">
                        <span class="text-lg">มูลค่าที่ผลิตได้</span>
                        <span class="text-xl text-center" id="generate_value">2000.20 บาท</span>
                    </div>
                </div>
            </div>
            <div class="text-right">
                @include('customer.include.package.register')
            </div>
        </div>
    </div>
    @include('customer.include.package.package')
    <script>
        class Power {
            totalKWh = 0;
            totalWh = 0;

            totalWh() {
                return totalWh;
            }
            totalKWh() {
                return totalKWh;
            }
        }
        var modelPower = new Power();
        var data = {
            cols: ["devices", "amount", "usedPerHr", "wattPerDevice"],
            devicesDetail: [{
                    deviceName: "คอมพิวเตอร์",
                    amount: 1,
                    usedPerHr: 1,
                    wattPerDevice: 55
                },
                {
                    deviceName: "เครื่องปรับอากาศ",
                    amount: 1,
                    usedPerHr: 1,
                    wattPerDevice: 1500
                },
                {
                    deviceName: "หลอดไฟ",
                    amount: 1,
                    usedPerHr: 1,
                    wattPerDevice: 16
                },
                {
                    deviceName: "TV",
                    amount: 1,
                    usedPerHr: 1,
                    wattPerDevice: 150
                },
                {
                    deviceName: "เตารีด",
                    amount: 1,
                    usedPerHr: 1,
                    wattPerDevice: 1200
                },
                {
                    deviceName: "เครื่องซักผ้า",
                    amount: 1,
                    usedPerHr: 1,
                    wattPerDevice: 3000
                },
                {
                    deviceName: "ตู้เย็น",
                    amount: 1,
                    usedPerHr: 24,
                    wattPerDevice: 1800
                },
                {
                    deviceName: "เครื่องฟอกอากาศ",
                    amount: 1,
                    usedPerHr: 24,
                    wattPerDevice: 240
                },
                {
                    deviceName: "Plugin Hybrid",
                    amount: 1,
                    usedPerHr: 24,
                    wattPerDevice: 14160
                },
                {
                    deviceName: "EV Charger",
                    amount: 1,
                    usedPerHr: 24,
                    wattPerDevice: 29600
                }
            ]
        }

        function createDropdownList(defaultValue, maxValue, placeholder, onChangeCallback) {
            let dropdown = document.createElement('select');
            dropdown.className =
                'p-2.5 py-2 px-4 block w-full border border-yellow-300 rounded-md focus:ring-yellow-300 focus:border-yellow-500';
            dropdown.addEventListener('change', onChangeCallback);

            // Add default placeholder option
            let defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.text = placeholder;
            dropdown.appendChild(defaultOption);

            for (let i = 1; i <= maxValue; i++) {
                let option = document.createElement('option');
                option.value = i;
                option.text = i;
                if (i === defaultValue) {
                    option.selected = true;
                }
                dropdown.appendChild(option);
            }
            return dropdown;
        }

        function populateTable() {
            var tableBody = document.getElementById('deviceTableBody');
            tableBody.innerHTML = '';

            data.devicesDetail.forEach((device, index) => {
                let row = document.createElement('tr');

                let cellDeviceName = document.createElement('td');
                cellDeviceName.className = 'px-4 py-2 flex items-center';
                let checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.className = 'form-checkbox mr-2';
                checkbox.addEventListener('change', () => calculateWattage(index, row));
                cellDeviceName.appendChild(checkbox);
                let deviceNameSpan = document.createElement('span');
                deviceNameSpan.innerText = device.deviceName;
                cellDeviceName.appendChild(deviceNameSpan);
                row.appendChild(cellDeviceName);

                let cellAmount = document.createElement('td');
                cellAmount.className = 'px-4 py-2';
                let dropdownAmount = createDropdownList(device.amount, 12, 'Select Amount', () => calculateWattage(
                    index, row));
                cellAmount.appendChild(dropdownAmount);
                row.appendChild(cellAmount);

                let cellUsedPerHr = document.createElement('td');
                cellUsedPerHr.className = 'px-4 py-2';
                if (device.usedPerHr === 24) {
                    cellUsedPerHr.innerText = ''; // Empty cell
                } else {
                    let dropdownUsedPerHr = createDropdownList(device.usedPerHr, 24, 'Select Used Per Hour', () =>
                        calculateWattage(index, row));
                    cellUsedPerHr.appendChild(dropdownUsedPerHr);
                }
                row.appendChild(cellUsedPerHr);

                let cellWattPerDevice = document.createElement('td');
                cellWattPerDevice.className = 'px-4 py-2';
                cellWattPerDevice.innerText = device.wattPerDevice;
                row.appendChild(cellWattPerDevice);

                tableBody.appendChild(row);
            });

            calculateWattage(); // Calculate initially
        }

        function calculateWattage() {
            let totalWh = 0;
            let tableBody = document.getElementById('deviceTableBody');
            let rows = tableBody.getElementsByTagName('tr');

            Array.from(rows).forEach((row, index) => {
                let checkbox = row.getElementsByTagName('input')[0];
                let amountDropdown = row.getElementsByTagName('select')[0];
                let usedPerHrDropdown = row.getElementsByTagName('select')[1];
                let wattPerDeviceCell = row.getElementsByTagName('td')[3];

                if (checkbox && checkbox.checked) {
                    let amount = parseInt(amountDropdown.value);
                    let usedPerHr = usedPerHrDropdown ? parseInt(usedPerHrDropdown.value) : 24;
                    let wattPerDevice = data.devicesDetail[index].wattPerDevice;

                    if (isNaN(amount) || isNaN(usedPerHr)) {
                        return;
                    }

                    let totalDeviceWatt = amount * wattPerDevice;
                    wattPerDeviceCell.innerText = totalDeviceWatt; // Update watt per device cell
                    totalWh += totalDeviceWatt * usedPerHr;
                } else {
                    wattPerDeviceCell.innerText = 0; // Set to 0 when not checked
                }
            });

            let totalKWh = totalWh / 1000;
            modelPower.totalWh = totalWh;
            modelPower.totalKWh = totalKWh;
            document.getElementById('wattageCalculation').innerText =
                `ปริมาณไฟที่ใช้ ${totalWh} Wh, ${totalKWh.toFixed(2)} kWh`;
        }

        document.addEventListener('DOMContentLoaded', () => {
            populateTable();
        });

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            const phase = document.getElementById('phase_option').value;
            const contentModal = matchingPackage(modelPower.totalKWh, phase);
            if (contentModal.error == 'warning') {
                toastr.warning(contentModal.message);
                return;
            }
            if (contentModal.error == 'error') {
                toastr.error(contentModal.message);
                return;
            }
            document.getElementById('recommend_package').innerText = contentModal.packageName;
            document.getElementById('genarate_month').innerText = contentModal.savingPerMonth.toLocaleString() +
                ' หน่วย/เดือน';
            document.getElementById('generate_value').innerText = (contentModal.savingPerMonth * 3.5).toLocaleString() +
                ' บาท';

            modal.style.display = "flex";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
