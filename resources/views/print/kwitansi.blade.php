<?php
use App\Helpers\WebHelper;

?>
<title>Print Kwitansi</title>
<style>
    @page {
        margin: 10px;
        max-height: 100vh !important
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
        width: 100%
    }

    tr td {
        white-space: nowrap;

    }

    td {
        padding: 5px;
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
                    <span style="padding: 10px;background-color: #1f79e7;color:white;font-size: 1.5rem">Kwitansi</span>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <hr style="margin-top:-10px">
                </td>
            </tr>
            <tr>
                <td style="width: 15%">No</td>
                <td style="width: 1%">:</td>
                <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                    KWT/{{ date('m') }}/AWH/{{ $data->id }}</td>
                <td style="width: 15%">
                    Tanggal
                </td>
                <td style="width: 1%">:</td>
                <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                    {{ date('d-m-Y') }}
                </td>
            </tr>
            <tr>
                <td>{{ substr($data->nominal, 0, 1) == '-' ? 'Diberikan Kepada' : 'Terima Dari' }}
                </td>
                <td style="width: 1%">:</td>
                <td colspan="4" style="padding-left:10px"> {{ $data->jamaah ?: ($data->agen ?: '-') }}
                </td>
            </tr>
            <tr>
                <td>Terbilang</td>
                <td style="width: 1%">:</td>
                <td colspan="4" style="background-color: #71cb6b; border: 1px solid black; padding-left:10px"
                    id="terbilang">{{ WebHelper::terbilang($data->nominal) }}
                </td>
            </tr>
            <tr>
                <td>Untuk </td>
                <td style="width: 1%">:</td>
                <td colspan="4" style=" border: 1px solid black;padding-left:10px"> {{ $data->remark }}
                    @if ($data->jamaah_name != 'Out Transaction')
                        untuk {{ $data->paket }} keberangkatan {{ date('d M Y', $data->flight_date) }}
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3"
                    style="background-color: #71cb6b; padding-left:10px; font-size:20px;text-align: center">
                    <i>Rp.
                        {{ substr($data->nominal, 0, 1) == '-' ? number_format(substr($data->nominal, 1), 2) : number_format($data->nominal, 2) }}</i>
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="3" style="text-align: center; font-size: 18px">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>{{ auth()->user()->load('employee')->employee->fullname }}</b>
                </td>
            </tr>
        </table>
    </div>
</body>
