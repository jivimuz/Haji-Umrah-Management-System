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
