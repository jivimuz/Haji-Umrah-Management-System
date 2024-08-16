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

    td,
    th {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    tbody,
    thead {
        font-size: 8px;
        /* Sesuaikan ukuran font jika perlu */
        word-wrap: break-word
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
                    <span style="padding: 10px;background-color: #1f79e7;color:white;font-size: 1.5rem">Manifest
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr style="margin-top:-10px">
                </td>
            </tr>
        </table>
        <div style="padding:10px">
            <table style="width: 100%">
                <tr>
                    <td style="width: 15%">NUMBER OF PAXES</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                        {{ $paket->total }}</td>
                    <td style="width: 15%">GROUP</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                        {{ $cname }}</td>
                </tr>
                <tr>
                    <td style="width: 15%">PAKET</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                        {{ $paket->nama }}</td>
                    <td style="width: 15%">TYPE</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                        {{ $paket->type }}</td>
                </tr>
                <tr>
                    <td style="width: 15%">PROGRAM</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                        {{ $paket->program }}</td>
                    <td style="width: 15%">KEBERANGKATAN </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid black;padding-left:10px">
                        {{ $paket->flight_date }}</td>
                </tr>
            </table>
        </div>

        <table style="width: 100%; border: 1px solid grey;">
            <thead style="background-color: #1f79e7;color: white; font-size:8px">
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NAME</th>
                    <th colspan="2">BIRTH</th>
                    <th rowspan="2">PASSPORT</th>
                    <th rowspan="2">PASSPORT CITY</th>
                    <th colspan="2">PASSPORT DATE</th>
                    <th rowspan="2">VACCINE 1</th>
                    <th rowspan="2">VACCINE 2</th>
                    <th rowspan="2">FATHER NAME</th>
                    <th rowspan="2">AGE</th>
                    <th rowspan="2">ADDRESS</th>
                    <th rowspan="2">NIK</th>
                </tr>
                <tr>
                    <th>PLACE</th>
                    <th>BIRT</th>
                    <th>ISSUED</th>
                    <th>EXPIRE</th>
                </tr>

            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($data as $i)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $i->nama }}</td>
                        <td>{{ $i->birth_place }}</td>
                        <td>{{ date('d-m-Y', strtotime($i->birth_date)) }}</td>
                        <td>{{ $i->no_passport }}</td>
                        <td>{{ $i->city_passport }}</td>
                        <td>{{ date('d-m-Y', strtotime($i->passport_date)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($i->passport_expired)) }}</td>
                        <td>{{ $i->vaccine1 }} _ {{ $i->vaccine1_date }}</td>
                        <td>{{ $i->vaccine2 }} _ {{ $i->vaccine2_date }}</td>
                        <td>{{ $i->nama_ayah }}</td>
                        <td>{{ WebHelper::calculateAge($i->birth_date) }}</td>
                        <td>{{ $i->alamat }}</td>
                        <td>{{ $i->no_ktp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
