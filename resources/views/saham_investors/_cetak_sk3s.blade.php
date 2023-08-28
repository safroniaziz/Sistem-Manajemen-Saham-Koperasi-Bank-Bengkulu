<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak SK3S</title>
</head>
<body>
    <style>
        .img-top {
            opacity: 0.6;
        }

        body{
            margin:2.3cm 1.7cm 1cm 1.7cm;
        }
    </style>
    <table style="width:100%">
        <tr>
            <td rowspan="2" align="bottom" style="width:250px;">
                <font style=font-size:10pt face="Times New Roman" color=#000000>Seri SPMPKOP  &nbsp;&nbsp;   :    {{ $sahamInvestor->seri_spmpkop }}</font><br>
                <font style=font-size:10pt face="Times New Roman" color=#000000>Seri FORMULIR &nbsp;:   {{ $sahamInvestor->seri_formulir }}</font>
            </td>
            <td rowspan="2" style="padding:18px;"></td>
            <td rowspan="2" align="right;" >
                <font style=font-size:10pt face="Times New Roman" color=#000000>Seri SK3S :</font><br>
                <font style=font-size:10spt face="Times New Roman" color=#000000>{{ $sahamInvestor->nomor_sk3s }}</font>
            </td>
        </tr>
    </table>
    <h4 align="center" style="margin:50 0 50 0;font-family:Arial, Helvetica, sans-serif ">KOPERASI KARYAWAN JASA MITRA UTAMA BANK BENGKULU</h4>
    <p align="center" style="margin:0 0 50 0;font-family:Arial, Helvetica, sans-serif">SURAT KETERANGAN KEPESERTAAN KEPEMILIKAN SAHAM <br> (SK3S)</p>
    <h3 align="center" style="font-family:Arial, Helvetica, sans-serif"><u>{{ strtoupper($sahamInvestor->jumlah_saham_terbilang)  }}</u></h3>
    <h3 align="center" style="margin:0 0 10 0;font-family:Arial, Helvetica, sans-serif"> Rp.{{ number_format($sahamInvestor->jumlah_saham) }},- </h3>
    <p style="font-family:Arial, Helvetica, sans-serif; text-align:center;">Surat Saham Seri-B Mewakili : {{ $sahamInvestor->jumlah_lembar }} Lembar</p>
    <p style="font-family:Arial, Helvetica, sans-sefrif; text-align:center;">Nomor Saham : {{ substr($sahamInvestor->nomor_saham, 0,4) }} s/d {{ substr($sahamInvestor->nomor_saham, 4,7) }}</p>


    <div align="center" style="margin:25 0 40 0;">
        <h3 style="font-family:Arial, Helvetica, sans-serif; text-transform:uppercase;"><b><u>{{ $sahamInvestor->investor->nama_investor }}</u></b></h3>
        <p style="font-family:Arial, Helvetica, sans-serif">Register : {{ $sahamInvestor->investor->nomor_register }}</p>
    </div>

    <table style="width:100%">
        <tr>
            <td style="width:56%"></td>
            <td align="left">Ditetapkan : {{ $tanggalDitetapkan->isoFormat('DD MMMM YYYY') }} <br>
                Perubahan Ke- {{ $sahamInvestor->perubahan_ke }}
            </td>
            {{-- <td style="text-align:left" >Ditetapkan : {{ $time_indo }} <br>
                Perubahan Ke- {{ $sk3s[0]->perubahan_ke }}</td> --}}
        </tr>
        <tr>
            <td style="width:56%;  font-size: 10pt;" align="center">
                Saham Seri B <br>
                <span style="text-align:left !important">No. SK3S: {{ $sahamInvestor->nomor_sk3s }}</span> <br>
                <span style="background-color:#2a2a28; color:white; padding:1px;">APPROVAL OF AUTHENTICITY</span>
                <br><br>
            </td>
            <td align="center" rowspan="2">
                <p style="font-size: 12pt;">Ketua Koperasi</p>
                <br>
                <h3 style="font-size: 12pt">
                    @if ($ketua != "")
                        {{ $ketua->nama_ketua_koperasi }}
                        @else
                            <a style="color:red"><i>tidak ada ketua koperasi aktif</i></a>
                    @endif
                </h3>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; width:40%; font-size: 9pt;"><hr width="140px" style="margin-bottom:-120px; color:black"> <br ><b>Board Of Director</b></td>
        </tr>
    </table>

    {{-- <table style="width:100%">
        <tr>
            <td rowspan="5" align="left" width="230"><a style="margin-left:50px" width="120"></td>
            <td align="left">Ditetapkan : {{ $tanggalDitetapkan->isoFormat('DD MMMM YYYY') }} <br>
                Perubahan Ke- {{ $sahamInvestor->perubahan_ke }}
            </td>
        </tr>
        <tr>
            <td rowspan="4" align="center">
                <p style="font-size: 13pt; margin:0 0 35 0;">Ketua Koperasi</p>
                <br>
                <h3 style="font-size: 13pt">
                    @if ($ketua != "")
                        {{ $ketua->nama_ketua_koperasi }}
                        @else
                            <a style="color:red"><i>tidak ada ketua koperasi aktif</i></a>
                    @endif
                </h3>
            </td>
        </tr>
    </table> --}}
</body>
</html>
