<?php

use App\Models\Bank;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_banks', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

        $banks = [
            ['code' => '002', 'name' => 'PT. BANK RAKYAT INDONESIA (PERSERO), Tbk'],
            ['code' => '008', 'name' => 'PT. BANK MANDIRI (PERSERO), Tbk'],
            ['code' => '009', 'name' => 'PT. BANK NEGARA INDONESIA (PERSERO),Tbk'],
            ['code' => '011', 'name' => 'PT. BANK DANAMON INDONESIA, Tbk'],
            ['code' => '013', 'name' => 'PT. BANK PERMATA, Tbk (d/h PT BANK BALI Tbk)'],
            ['code' => '014', 'name' => 'PT. BANK CENTRAL ASIA, Tbk.'],
            ['code' => '016', 'name' => 'PT. BANK INTERNASIONAL INDONESIA, Tbk'],
            ['code' => '019', 'name' => 'PT. PAN INDONESIA BANK, Tbk'],
            ['code' => '022', 'name' => 'PT. BANK CIMB NIAGA, Tbk d/h NIAGA'],
            ['code' => '023', 'name' => 'PT. BANK UOB INDONESIA TBK'],
            ['code' => '028', 'name' => 'PT. BANK OCBC NISP, Tbk d/h PT BANK NISP TBK'],
            ['code' => '031', 'name' => 'CITIBANK N.A.'],
            ['code' => '032', 'name' => 'JP MORGAN CHASE BANK, NA'],
            ['code' => '033', 'name' => 'BANK OF AMERICA, N.A'],
            ['code' => '036', 'name' => 'PT. BANK WINDU KENTJANA INTERNASIONAL TBK'],
            ['code' => '037', 'name' => 'PT. BANK ARTA GRAHA INTERNASIONAL, Tbk'],
            ['code' => '040', 'name' => 'THE BANGKOK BANK COMP, LTD'],
            ['code' => '041', 'name' => 'THE HONGKONG & SHANGHAI B.C.'],
            ['code' => '042', 'name' => 'THE BANK OF TOKYO-MITSUBISHI UFJ, LTD'],
            ['code' => '045', 'name' => 'PT. BANK SUMITOMO MITSUI INDONESIA'],
            ['code' => '046', 'name' => 'PT. BANK DBS INDONESIA'],
            ['code' => '047', 'name' => 'PT. BANK RESONA PERDANIA'],
            ['code' => '048', 'name' => 'PT. BANK MIZUHO INDONESIA'],
            ['code' => '050', 'name' => 'STANDARD CHARTERED BANK'],
            ['code' => '052', 'name' => 'THE ROYAL BANK OF SCOTLAND NV D/H ABN AMRO BANK'],
            ['code' => '054', 'name' => 'PT. BANK CAPITAL INDONESIA(d/h CREDIT LYONNAIS)'],
            ['code' => '057', 'name' => 'PT. BANK BNP PARIBAS INDONESIA'],
            ['code' => '059', 'name' => 'PT. KOREA EXCHANGE BANK DANAMON'],
            ['code' => '061', 'name' => 'PT. BANK ANZ INDONESIA D/H ANZ PANIN BANK'],
            ['code' => '067', 'name' => 'DEUTSCHE BANK AG.'],
            ['code' => '068', 'name' => 'PT. BANK WOORI INDONESIA'],
            ['code' => '069', 'name' => 'BANK OF CHINA, LTD'],
            ['code' => '076', 'name' => 'PT. BANK BUMI ARTA'],
            ['code' => '087', 'name' => 'PT. BANK EKONOMI RAHARJA TBK'],
            ['code' => '088', 'name' => 'PT. BANK ANTAR DAERAH'],
            ['code' => '089', 'name' => 'PT. BANK RABOBANK INT IND d/h BANK HAGA'],
            ['code' => '095', 'name' => 'PT. BANK MUTIARA, Tbk D/H PT BANK CENTURY TBK'],
            ['code' => '097', 'name' => 'PT. BANK MAYAPADA INTERNASIONAL TBK'],
            ['code' => '110', 'name' => 'PT. BPD JAWA BARAT DAN BANTEN'],
            ['code' => '111', 'name' => 'PT. BANK DKI'],
            ['code' => '112', 'name' => 'BPD YOGYAKARTA'],
            ['code' => '113', 'name' => 'PT. BPD JAWA TENGAH'],
            ['code' => '114', 'name' => 'PT. BPD JAWA TIMUR'],
            ['code' => '115', 'name' => 'BPD JAMBI'],
            ['code' => '116', 'name' => 'PT. BANK ACEH D/H BPD ACEH'],
            ['code' => '117', 'name' => 'PT. BPD SUMATERA UTARA'],
            ['code' => '118', 'name' => 'BPD SUMATERA BARAT'],
            ['code' => '119', 'name' => 'PT. BPD RIAU'],
            ['code' => '120', 'name' => 'PT. BPD SUMATERA SELATAN DAN BANGKA BELITUNG'],
            ['code' => '121', 'name' => 'PT. BANK LAMPUNG'],
            ['code' => '122', 'name' => 'PT. BPD KALIMANTAN SELATAN'],
            ['code' => '123', 'name' => 'PT. BPD KALIMANTAN BARAT'],
            ['code' => '124', 'name' => 'BPD KALIMANTAN TIMUR'],
            ['code' => '125', 'name' => 'PT. BPD BANK KALIMANTAN TENGAH'],
            ['code' => '126', 'name' => 'PT. BPD SULAWESI SELATAN DAN SULAWESI BARAT'],
            ['code' => '127', 'name' => 'PT. BPD SULAWESI UTARA'],
            ['code' => '128', 'name' => 'PT. BPD NUSA TENGGARA BARAT'],
            ['code' => '129', 'name' => 'PT. BPD BALI'],
            ['code' => '130', 'name' => 'PT. BPD NUSA TENGGARA TIMUR'],
            ['code' => '131', 'name' => 'PT. BPD MALUKU'],
            ['code' => '132', 'name' => 'PT. BPD PAPUA'],
            ['code' => '133', 'name' => 'PT. BPD BENGKULU'],
            ['code' => '134', 'name' => 'PT. BPD SULAWESI TENGAH'],
            ['code' => '135', 'name' => 'PT. BPD SULAWESI TENGGARA'],
            ['code' => '145', 'name' => 'PT. BANK NUSANTARA PARAHYANGAN TBK.'],
            ['code' => '146', 'name' => 'PT. BANK SWADESI, Tbk'],
            ['code' => '147', 'name' => 'PT. BANK MUAMALAT INDONESIA'],
            ['code' => '151', 'name' => 'PT. BANK MESTIKA DHARMA'],
            ['code' => '152', 'name' => 'PT. BANK METRO EKSPRESS'],
            ['code' => '153', 'name' => 'PT. BANK SINAR MAS'],
            ['code' => '157', 'name' => 'PT. BANK MASPION INDONESIA'],
            ['code' => '161', 'name' => 'PT. BANK GANESHA'],
            ['code' => '164', 'name' => 'PT. BANK ICBC INDONESIA'],
            ['code' => '167', 'name' => 'PT. BANK QNB KESAWAN, Tbk'],
            ['code' => '200', 'name' => 'PT. BANK TABUNGAN NEGARA (PERSERO)'],
            ['code' => '212', 'name' => 'PT. BANK HIMPUNAN SAUDARA 1906'],
            ['code' => '213', 'name' => 'PT. BANK TABUNGAN PENSIUNAN NASIONAL TBK'],
            ['code' => '405', 'name' => 'PT. BANK VICTORIA SYARIAH d/h BANK SWAGUNA'],
            ['code' => '422', 'name' => 'PT BANK BRI SYARIAH d/h DJASA ARTHA'],
            ['code' => '425', 'name' => 'PT BANK JABAR BANTEN SYARIAH'],
            ['code' => '426', 'name' => 'PT BANK MEGA, Tbk'],
            ['code' => '427', 'name' => 'PT BANK BNI SYARIAH'],
            ['code' => '441', 'name' => 'PT. BANK BUKOPIN'],
            ['code' => '451', 'name' => 'PT. BANK SYARIAH MANDIRI, Tbk'],
            ['code' => '459', 'name' => 'PT. BANK BISNIS INTERNASIONAL'],
            ['code' => '466', 'name' => 'PT. BANK ANDARA d/h SRI PARTHA'],
            ['code' => '472', 'name' => 'PT. BANK JASA JAKARTA'],
            ['code' => '484', 'name' => 'PT. BANK HANA D/H BINTANG MANUNGGAL'],
            ['code' => '485', 'name' => 'PT. BANK ICB BUMIPUTERA,Tbkd/hBumiputera Indonesia'],
            ['code' => '490', 'name' => 'PT. BANK YUDHA BHAKTI'],
            ['code' => '491', 'name' => 'PT. BANK MITRANIAGA'],
            ['code' => '494', 'name' => 'PT. BANK RAKYAT INDONESIA AGRONIAGA, TBK'],
            ['code' => '498', 'name' => 'PT. BANK SBI INDONESIA d/h INDOMONEX'],
            ['code' => '501', 'name' => 'PT. BANK ROYAL INDONESIA'],
            ['code' => '503', 'name' => 'PT. BANK NATIONALNOBU D/H PT BANK ALFINDO'],
            ['code' => '506', 'name' => 'PT. BANK MEGA SYARIAH(dh B MG SY IND/TUGU)'],
            ['code' => '513', 'name' => 'PT. BANK INA PERDANA'],
            ['code' => '517', 'name' => 'PT. BANK PANIN SYARIAH D/H HARFA'],
            ['code' => '520', 'name' => 'PT. BANK PRIMA MASTER'],
            ['code' => '521', 'name' => 'PT. BANK SYARIAH BUKOPIN D/H PERSYARIKATAN IND.'],
            ['code' => '523', 'name' => 'PT. BANK SAHABAT SAMPOERNA'],
            ['code' => '526', 'name' => 'PT. BANK DINAR INDONESIA'],
            ['code' => '531', 'name' => 'PT. BANK ANGLOMAS INTERNASIONAL'],
            ['code' => '535', 'name' => 'PT. BANK KESEJAHTERAAN EKONOMI'],
            ['code' => '536', 'name' => 'PT. BANK BCA SYARIAH d/h UIB'],
            ['code' => '542', 'name' => 'PT. BANK ARTOS INDONESIA'],
            ['code' => '547', 'name' => 'PT. BANK SAHABAT PURBA DANARTA'],
            ['code' => '548', 'name' => 'PT. BANK MULTI ARTA SENTOSA'],
            ['code' => '553', 'name' => 'PT. BANK MAYORA'],
            ['code' => '555', 'name' => 'PT. BANK INDEX SELINDO'],
            ['code' => '558', 'name' => 'PT BANK PUNDI INDONESIA,Tbk d/h EKSEKUTIF INTL'],
            ['code' => '559', 'name' => 'PT. CENTRATAMA NASIONAL BANK'],
            ['code' => '562', 'name' => 'PT. BANK FAMA INTERNASIONAL'],
            ['code' => '564', 'name' => 'PT. BANK SINAR HARAPAN BALI'],
            ['code' => '566', 'name' => 'PT. BANK VICTORIA INTERNATIONAL'],
            ['code' => '567', 'name' => 'PT. BANK HARDA INTERNASIONAL'],
            ['code' => '945', 'name' => 'PT. BANK AGRIS D/H FINCONESIA'],
            ['code' => '947', 'name' => 'PT. BANK MAYBANK INDOCORP'],
            ['code' => '949', 'name' => 'PT. BANK CHINATRUST INDONESIA'],
            ['code' => '950', 'name' => 'PT. BANK COMMONWEALTH'],
        ];

        Bank::insert($banks);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_banks');
    }
};
