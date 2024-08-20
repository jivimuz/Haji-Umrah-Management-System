<?php
use App\Helpers\WebHelper;
?>
<title>Print {{ WebHelper::bulanTahun($monthYear) }} Report</title>
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
        padding: 5px;
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
                <td style="vertical-align: top; width: 10px">
                    @if ($clogo)
                        <img src="{{ public_path($clogo) }}" style="max-width: 100px; max-height:50px" alt="">
                        <br><br>
                    @endif
                </td>
                <td style="vertical-align: top">
                    @if ($cname)
                        <span style="font-size: 24px"> {{ $cname }}</span><br>
                    @endif
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
                <?php
                $no = 1;
                $total = 0;
                ?>
                @foreach ($data as $i)
                    <?php $total += $i->nominal; ?>
                    <tr>
                        <td class="bd">{{ $no++ }}</td>
                        <td class="bd">{{ date('d-m-Y', strtotime($i->paid_at)) }}</td>
                        <td class="bd">{{ $i->jamaah ?: ($i->agen ?: 'System') }}</td>
                        <td class="bd">{{ $i->paket ?: '-' }}</td>
                        <td class="bd">{{ $i->remark }}</td>
                        <td class="bd">Rp {{ number_format($i->nominal, 2) }}</td>
                        <td class="bd">{{ $i->void_by ? 'Canceled' : ($i->nominal < 0 ? 'Out' : 'In') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="bd text-right">Total</td>
                    <td class="bd">Rp {{ number_format($total, 2) }}</td>
                    <td class="bd"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
