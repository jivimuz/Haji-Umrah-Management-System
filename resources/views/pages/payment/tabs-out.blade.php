<div class="box">
    <div class="box-body">
        <div class="nav nav-pills" style="text-align: center; align-items:center; justify-content: center">
            <a href="#" class="nav-link btn-outline-primary btn" id="tab1">Transaction Out</a>
            <a href="#" class="nav-link btn-outline-primary btn" id="tab2">Jamaah Refund</a>
            <a href="#" class="nav-link btn-outline-primary btn" id="tab3">Fee Agen</a>
        </div>

        <hr>
        <div id="tab-bawah"></div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        // Mengaktifkan tab pertama
        $("#tab1").addClass("active");
        Sider('tab1')
    });

    $(".nav-link").on("click", function() {
        Sider($(this).attr("id"))
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    })

    function Sider(tabId) {
        var url = '';

        switch (tabId) {
            case 'tab1':
                url = "<?= url('payment/pengeluaran') ?>";
                break;
            case 'tab2':
                url = "<?= url('payment/refund') ?>";
                break;
            case 'tab3':
                url = "<?= url('payment/feeAgen') ?>";
                break;
        }

        // Menghapus kelas aktif dari tab saat ini



        $.ajax({
            url: url,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Memasukkan konten ke dalam container
                $("#tab-bawah").html(response);
            },
            error: function() {
                // Menangani kesalahan jika terjadi
                $("#tab-bawah").html("Terjadi kesalahan dalam memuat konten.");
            }
        });
    }
</script>
