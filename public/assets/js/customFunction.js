const Toast = Swal.mixin({
    toast: true,
    position: "top-right",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
});

function showModal(targetId) {
    $('#' + targetId).modal('show')
}

function closeModal(targetId) {
    $('#' + targetId).modal('hide')
}

function HoldCloseModal(targetId) {
    Swal.fire({
        title: "Are you sure to close?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Close it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $('#' + targetId).modal('hide')
        }
       });
}


function checkboxVal(fromId, targetId) {
    if ($('#' + fromId).prop('checked') == true) {
        $('#' + targetId).val('1')
    } else {
        $('#' + targetId).val('0')
    }
}

function noMinus(val) {
    var currentValue = val.value.trim();
    if (currentValue.startsWith('0') && currentValue.length > 1 && currentValue[1] !== '.') {
        currentValue = currentValue.slice(1);
    }
    if (parseFloat(currentValue) < 0 || isNaN(parseFloat(currentValue))) {
        currentValue = '0';
    }
    $('#' + val.id).val(currentValue);

    return currentValue;
}

function maxValue(val, max) {
    var currentValue = val.value.trim();
    if (currentValue.startsWith('0') && currentValue.length > 1 && currentValue[1] !== '.') {
        currentValue = currentValue.slice(1);
    }
    var parsedValue = parseFloat(currentValue);
    if (parsedValue > max || isNaN(parsedValue)) {
        currentValue = max.toString();
    }
    $('#' + val.id).val(currentValue);

    var a = val.value.length
    console.log(a)

    return currentValue;
}

function timeDiff(tanggalAwal, tanggalAkhir = false) {
    const waktuAwal = new Date(tanggalAwal);
    const waktuAkhir = tanggalAkhir ? new Date(tanggalAkhir) :new Date();
    const selisih = Math.abs(waktuAkhir - waktuAwal);

    const detik = Math.floor(selisih / 1000);
    const menit = Math.floor(detik / 60);
    const jam = Math.floor(menit / 60);
    const hari = Math.floor(jam / 24);
    const bulan = Math.floor(hari / 30);
    const tahun = Math.floor(bulan / 12);

    let hasil = '';
    if (tahun > 0) hasil += tahun + (tahun == 1 ? ' Year ' : ' Years ');
    if (bulan > 0) hasil += bulan + (bulan == 1 ? ' Month ' : ' Months ');
    if (hari > 0) hasil += hari % 30 + ((hari % 30) == 1 ? ' Day ' : ' Days ');
    if (jam > 0) hasil += jam % 24 + ((jam % 24) == 1 ? ' Hour ' : ' Hours ');
    if (menit > 0) hasil += menit % 60 + ' Min ';
    hasil += detik % 60 + ' Sec';

    return hasil;
}

function timeDiffPause(tanggalAwal, tanggalAkhir =  new Date(), totalPauseTime = []) {
        const waktuAwal = new Date(tanggalAwal);
        const waktuAkhir =new Date(tanggalAkhir) ;
        let selisih = Math.abs(waktuAkhir - waktuAwal);

        if (totalPauseTime.length > 0) {
            let totalPauseDetik = 0;
            for (let i = 0; i < totalPauseTime.length; i++) {
                const startPause = new Date(totalPauseTime[i][0]);
                const endPause = new Date(totalPauseTime[i][1]);
                totalPauseDetik += Math.abs(endPause - startPause) / 1000;
            }
            selisih -= totalPauseDetik * 1000;
        }


        const detik = Math.floor(selisih / 1000);
        const menit = Math.floor(detik / 60);
        const jam = Math.floor(menit / 60);
        const hari = Math.floor(jam / 24);
        const bulan = Math.floor(hari / 30);
        const tahun = Math.floor(bulan / 12);

        let hasil = '';
        if (tahun > 0) hasil += tahun + (tahun == 1 ? ' Year ' : ' Years ');
        if (bulan > 0) hasil += bulan + (bulan == 1 ? ' Month ' : ' Months ');
        if (hari > 0) hasil += hari % 30 + ((hari % 30) == 1 ? ' Day ' : ' Days ');
        if (jam > 0) hasil += jam % 24 + ((jam % 24) == 1 ? ' Hour ' : ' Hours ');
        if (menit > 0) hasil += menit % 60 + ' Min ';
        hasil += detik % 60 + ' Sec';

        return hasil;
}

function openPopup(url) {
    var windowName = 'popupWindow';
    var windowFeatures = 'width=800,height=600,toolbar=no,location=no,menubar=no,scrollbars=yes,resizable=yes';

    var popupWindow = window.open(url, windowName, windowFeatures);
    // popupWindow.focus();
}

function terbilang(bilangan) {
    bilangan = String(bilangan);
    let angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
    let kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
    let tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');

    let panjang_bilangan = bilangan.length;
    let kalimat = subkalimat = kata1 = kata2 = kata3 = "";
    let i = j = 0;

    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
        kalimat = "Diluar Batas";
        return kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
    for (i = 1; i <= panjang_bilangan; i++) {
        angka[i] = bilangan.substr(-(i), 1);
    }

    i = 1;
    j = 0;
    kalimat = "";

    /* mulai proses iterasi terhadap array angka */
    while (i <= panjang_bilangan) {

        subkalimat = "";
        kata1 = "";
        kata2 = "";
        kata3 = "";

        /* untuk Ratusan */
        if (angka[i + 2] != "0") {
            if (angka[i + 2] == "1") {
                kata1 = "Seratus";
            } else {
                kata1 = kata[angka[i + 2]] + " Ratus";
            }
        }

        /* untuk Puluhan atau Belasan */
        if (angka[i + 1] != "0") {
            if (angka[i + 1] == "1") {
                if (angka[i] == "0") {
                    kata2 = "Sepuluh";
                } else if (angka[i] == "1") {
                    kata2 = "Sebelas";
                } else {
                    kata2 = kata[angka[i]] + " Belas";
                }
            } else {
                kata2 = kata[angka[i + 1]] + " Puluh";
            }
        }

        /* untuk Satuan */
        if (angka[i] != "0") {
            if (angka[i + 1] != "1") {
                kata3 = kata[angka[i]];
            }
        }

        if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
            subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
        }

        /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
        kalimat = subkalimat + kalimat;
        i = i + 3;
        j = j + 1;

    }

    /* mengganti Satu Ribu jadi Seribu jika diperlukan */
    if ((angka[5] == "0") && (angka[6] == "0")) {
        kalimat = kalimat.replace("Satu Ribu", "Seribu");
    }
    return (kalimat.trim().replace(/\s{2,}/g, ' ')) + " Rupiah";
}
