<?php
use App\Helpers\WebHelper;
?>
<title>Print Jamaah infor</title>
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

    td {
        padding-left: 10px;
    }

    .bd {
        border: 0.3px solid grey;
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
                    <span style="padding: 10px;background-color: #1f79e7;color:white;font-size: 1.5rem">Payment
                        Information</span>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr style="margin-top:-10px">
                </td>
            </tr>
        </table>

        <div style="padding:10px">
            <table style="width: 100%">
                <tr>
                    <td style="width: 15%">Nama Jamaah</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->nama }}</td>
                    <td style="width: 15%">Tipe</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->type }}</td>

                </tr>
                <tr>
                    <td style="width: 15%">No Ktp</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->no_ktp }}</td>
                    <td style="width: 15%">Paket </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->paket }}</td>
                </tr>
                <tr>
                    <td style="width: 15%">Passport</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->no_passport ?: '-' }}</td>
                    <td style="width: 15%">Program </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->program ?: '-' }}</td>
                </tr>
                <tr>
                    <td style="width: 15%">Tgl DP</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->firstpaid_date ? date('d-m-Y', strtotime($data->firstpaid_date)) : '-' }}</td>
                    <td style="width: 15%">Harga Paket </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        Rp {{ number_format($data->price ?: 0, 2) }} </td>
                </tr>
                <tr>
                    <td style="width: 15%">Tgl Pelunasan</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->donepaid_date ? date('d-m-Y', strtotime($data->donepaid_date)) : '-' }}</td>
                    <td style="width: 15%">Discount </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        Rp {{ number_format($data->discount ?: 0, 2) }} </td>
                </tr>
                <tr>
                    <td style="width: 15%">Alamat</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        {{ $data->alamat ?: '-' }}</td>
                    <td style="width: 15%">Terbayar </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        Rp {{ number_format($data->paid ?: 0, 2) }} </td>
                </tr>
                <tr>
                    <td style="width: 15%">Status</td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        @php
                            if ($data->is_done) {
                                $badgeText = 'Lunas';
                            } elseif ($data->is_firstpaid) {
                                $badgeText = 'Kurang Bayar';
                            } else {
                                $badgeText = 'Belum Bayar';
                            }
                        @endphp
                        {{ $badgeText }}
                    </td>
                    <td style="width: 15%">Sisa </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        Rp {{ number_format($data->price + $data->morepayment - $data->paid ?: 0, 2) }} </td>
                </tr>
                <tr>
                    <td style="width: 15%"></td>
                    <td style="width: 1%"></td>
                    <td style="width: 35%">
                    </td>
                    <td style="width: 15%">Biaya Lain-lain </td>
                    <td style="width: 1%">:</td>
                    <td style="width: 35%" style=" border: 1px solid grey;padding-left:10px">
                        Rp {{ number_format($data->morepayment ?: 0, 2) }} </td>
                </tr>
            </table>
        </div>

        <table style="width: 100%; ">
            <thead style="background-color: #1f79e7;color: white;">
                <tr>
                    <th colspan="6" style="border-bottom: 1px solid grey">Payment History</th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Paid at</th>
                    <th>Paket</th>
                    <th>Nominal</th>
                    <th>Type</th>
                    <th>remark</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $no = 1;
                $total = 0;
                ?>
                @foreach ($history as $i)
                    <?php $total += $i->nominal; ?>
                    <tr>
                        <td class="bd">{{ $no++ }}</td>
                        <td class="bd">{{ date('d-m-Y', strtotime($i->paid_at)) }}</td>
                        <td class="bd">{{ $i->paket ?: '-' }}</td>
                        <td class="bd">Rp {{ number_format($i->nominal, 2) }}</td>
                        <td class="bd">{{ $i->void_by ? 'Canceled' : ($i->nominal < 0 ? 'Out' : 'In') }}
                        </td>
                        <td class="bd">{{ $i->remark }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="bd text-right">Total</td>
                    <td class="bd">Rp {{ number_format($total, 2) }}</td>
                    <td colspan="2" class="bd"></td>
                </tr>
            </tfoot>
            <tr>
                <td colspan="4"></td>
                <td colspan="2" style="vertical-align: top; text-align: center">
                    <br><br>
                    Hormat Kami, <br>
                    {{ $ccity ?: '-' }}, {{ WebHelper::bulanTahun(date('Y-m')) }} <br>
                    <b>{{ $cname }}</b>
                    <br><br><br><br>
                    <b style="text-decoration-line: underline">{{ $employee->fullname ?: '-' }} </b><br>
                    {{ $employee->jabatan ?: '-' }}
                </td>
            </tr>
        </table>
    </div>
</body>
