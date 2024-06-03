<script>
    // console.log('package')
    var package = [{
            package: 3,
            packageName: "3kW",
            savingPerMonth: 1800,
            salePrice: 119000,
            discountPrice: 109000,
            solarcell: 6,
            area: 18,
            payback: 5
        }, {
            package: 5,
            packageName: "5kW1P",
            savingPerMonth: 3000,
            salePrice: 169000,
            discountPrice: 159000,
            solarcell: 9,
            area: 28,
            payback: 5
        },
        {
            package: 5,
            packageName: "5kW3P",
            savingPerMonth: 3000,
            salePrice: 189000,
            discountPrice: 179000,
            solarcell: 9,
            area: 28,
            payback: 5
        }, {
            package: 10,
            packageName: "10kW",
            savingPerMonth: 6000,
            salePrice: 299000,
            discountPrice: 289000,
            solarcell: 18,
            area: 81,
            payback: 5
        }, {
            package: 15,
            packageName: "15kW",
            savingPerMonth: 9000,
            salePrice: 439000,
            discountPrice: 429000,
            solarcell: 26,
            area: 112,
            payback: 5
        }, {
            package: 20,
            packageName: "20kW",
            savingPerMonth: 12000,
            salePrice: 579000,
            discountPrice: 569000,
            solarcell: 36,
            area: 162,
            payback: 5
        }
    ]

    function matchingPackage(totalKWh, phase) {

        if (totalKWh == 0) {
            return {
                error: "warning",
                message: "กรุณากรอกข้อมูลการใช้งานไฟฟ้าของคุณ"
            }
        }
        if (totalKWh < 3) {
            return {
                error: "warning",
                message: "การใช้งานของคุณน้อยเกินไป ไม่สามารถติดตั้งระบบไฟฟ้าแสงอาทิตย์ได้"
            }
        }

        if (totalKWh < 5) {
            return package[0]
        } else if (totalKWh < 10) {
            if (Number(phase) == 1) {
                return package[1]
            } else {
                return package[2]
            }
        } else if (totalKWh < 15) {
            return package[3]
        } else if (totalKWh < 20) {
            return package[4]
        } else if (totalKWh >= 20) {
            return package[5]
        } else {
            return {
                error: "error",
                message: "ไม่พบแพ็คเกจที่ตรงกับการใช้งานของคุณ"
            }
        }
    }
</script>
