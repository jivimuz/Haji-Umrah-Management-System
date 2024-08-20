<?php
use App\Helpers\WebHelper;
?>
<title>Print Surat Rekomendasi</title>
<style>
    @page {
        margin: 10px;
        max-height: 100vh !important;
        font-size: 14px
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
        padding: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        page-break-inside: auto;
        /* Agar tabel tidak terputus di tengah halaman */
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

            </tr>
            <tr>
                <td colspan="2">
                    <hr style="margin-top:-10px">
                </td>
            </tr>
        </table>
        <div style="padding-left: 20px">
            <table style="width: 100%">
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Nomor
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        SPR/{{ date('m') }}/AWH/{{ $no_surat }}/{{ date('Y') }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Lampiran
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        ...
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Perihal
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        Permohonan Rekomendasi Paspor
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" colspan="4">
                        <br>
                        <b>Kepada Yth. <br>
                            Kepala Kantor Imigrasi Kelas 1 TPI Cirebon
                        </b><br>
                        Di Tempat
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" colspan="4">

                        Yang bertanda tangan dibawah ini :
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Nama
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        {{ $employee->fullname ?: '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Jabatan
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        {{ $employee->jabatan ?: '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Alamat
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        {{ $employee->alamat ?: '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;" colspan="4">
                        <br>
                        Bersama ini menerangkan dengan sesungguhnya bahwa :
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Nama
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        {{ $data->nama ?: '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Tempat, Tanggal Lahir
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        {{ $data->born_place ?: '-' }}, {{ date('d-m-Y', strtotime($data->born_date)) }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        NIK
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        {{ $data->no_ktp ?: '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; width: 100px">
                        Alamat
                    </td>
                    <td style="vertical-align: top; width: 5px">:</td>
                    <td style="vertical-align: top" colspan="2">
                        {{ $data->alamat ?: '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; word-wrap: break-word;max-width: 100%;" colspan="4">
                        <p style="word-wrap: break-word; ">
                            &nbsp;&nbsp;&nbsp;&nbsp;Adalah benar calon jamaah umrah {{ $cname }} (SK Kemenag No.
                            :
                            02830009220820003)
                            sebagai penyelenggara
                            Ibadah Umroh kami bertanggung jawab dan menjamin sepenuhnya
                            terhadap calon jamaah umrah kami dengan memperhatikan hal-hal sebagai berikut :
                        <ol type="1">
                            <li>Permohonan paspor yang kami urus adalah WNI yang sebenarnya akan melakukan perjalanan
                                ke Arab Saudi dalam rangka menunaikan ibadah umrah.</li>

                            <li>Rombongan calon jamaah umrah yang kami urus tidak akan melakukan pelanggaran
                                peraturan keimigrasian berupa
                                penyalahgunaan izin tinggal, tidak melebihi izin
                                tinggalnya (Overstay)memalsukan atau membuat paspor palsu yang,
                                diberikan kepadanya maupun
                                bekerja secara illegal</li>

                            <li> Jadwal keberangkatan tanggal
                                {{ date('d ', strtotime($data->flight_date)) . WebHelper::bulanTahun($data->flight_date) }}
                            </li>
                        </ol>
                        Demikian surat permohonan ini kami buat, atas perhatian Bapak kami
                        ucapkan terima kasih. <br>
                        Wassalaamu’alaikum Warahmatullaahi Wabarakaatuh.

                        </p>

                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top" colspan="3">
                    </td>
                    <td style="vertical-align: top; text-align: center">
                        Hormat Kami, <br>
                        {{ $ccity ?: '-' }}, {{ WebHelper::bulanTahun(date('Y-m')) }} <br>
                        <b>{{ $cname }}</b>
                        <br><br><br><br>
                        <b> <span style="text-decoration-line: underline">{{ $employee->fullname ?: '-' }} </span><br>
                            {{ $employee->jabatan ?: '-' }}</b>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</body>
