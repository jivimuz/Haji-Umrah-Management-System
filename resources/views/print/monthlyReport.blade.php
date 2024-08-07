<?php
use App\Helpers\WebHelper;
?>
<title>Print Manifest</title>
<style>
    @page {
        margin: 10px;
        max-height: 100vh !important;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        max-height: 100vh !important;
        background-color: White;
        color: Black;
        font-size: 75%;
    }

    table {
        width: 100%;
    }

    tr td {
        white-space: nowrap;

    }

    td {
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        page-break-inside: auto;
        /* Agar tabel tidak terputus di tengah halaman */
    }

    tr {
        page-break-inside: avoid;
        /* Hindari pemutusan baris tabel di tengah halaman */
    }

    .bd {
        border: 0.3px solid grey;
    }
</style>

<body>
    <div style="  max-height: 100vh !important;">
        <table style="width: 100%">
            <tr>
                <td>
                    <img src="{{ public_path($clogo) }}" style="width: 150px; max-height:100px" alt=""><br><br>
                    {{ $caddress }}
                </td>
                <td style="text-align: right">
                    <span style="padding: 10px;background-color: #1f79e7;color:white;font-size: 1.5rem">Report
                        {{ WebHelper::bulanTahun($monthYear) }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr style="margin-top:-10px">
                </td>
            </tr>
        </table>

        <table style="width: 100%; ">
            <thead style="background-color: #1f79e7;color: white;">
                <tr>
                    <th>No</th>
                    <th>Paid at</th>
                    <th>Name</th>
                    <th>Paket</th>
                    <th>remark</th>
                    <th>Nominal</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; ?>
                @foreach ($data as $i)
                    <tr>
                        <td class="bd">{{ $no++ }}</td>
                        <td class="bd">{{ date('d-m-Y', strtotime($i->paid_at)) }}</td>
                        <td class="bd">{{ $i->jamaah ?: 'System' }}</td>
                        <td class="bd">{{ $i->paket ?: '-' }}</td>
                        <td class="bd">{{ $i->remark }}</td>
                        <td class="bd">Rp. {{ number_format($i->nominal, 2) }}</td>
                        <td class="bd">{{ $i->nominal < 0 ? 'Refund' : 'Payment' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
