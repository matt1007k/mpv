<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de documentos</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .w-20 {
            width: 20%;
        }

        .w-80 {
            width: 80%;
        }

        .w-50 {
            width: 50% !important;
        }

        .w-100 {
            width: 100%;
        }

        .body table {
            border-collapse: collapse;
            /* width: 100%; */
        }

        .body .body-row td {
            border: 1px solid #c2c2c2;
            font-size: 10px;
            padding: 2px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .spacer {
            height: 10px;
        }

        .fs-header-sm {
            font-size: 9px;
        }

        .fs-header-smx {
            font-size: 10px;
        }

        .fs-header-sm b {
            margin: 0;
        }

        .fs-header-sm p {
            margin: 0;
            color: rgba(0, 0, 0, .7);
        }

        .fs-header {
            font-size: 12px;
        }

        .fs-header b {
            margin: 0;
        }

        .fs-header p {
            margin: 0;
            color: rgba(0, 0, 0, .7);
        }

        .text-md {
            font-size: 12px;
        }

        .fs-header2 {
            font-size: 16px;
        }

        .fs-total {
            font-size: 12px;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .bb-1 {
            border-bottom: 1px solid #000;
        }

        .position-absolute {
            position: absolute;
        }

        .position-relative {
            position: relative;
        }

        .header-cert {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 5px;
        }

        footer {
            position: fixed;
            bottom: 20px;
            left: 0px;
            right: 0px;
            height: 50px;
            /** Extra personal styles **/
            text-align: right;
            line-height: 35px;
        }

        .head-page {
            position: relative;
        }

        .head-page img {
            position: absolute;
            left: 0;
        }

        .head-page .title {
            /* position: absolute; */
            left: 10%;
            top: 0;
            right: 0;
            margin-bottom: 10px;
            /* padding: 14px; */
        }

        .head-page h4 .boleta {
            color: white;
            background: #228CDB;
            padding: 14px;
            font-size: 18px;
        }

        .head-page h4 .periodo {
            margin-left: 15px;
            color: rgba(0, 0, 0, .4);
            font-size: 25px;
            font-weight: 700;
        }

        .border-tl-sm {
            border-top-left-radius: 8px;
        }

        .border-tr-sm {
            border-top-right-radius: 8px;
        }

        .border-br-sm {
            border-top-right-radius: 8px;
        }

        .border-bl-sm {
            border-top-right-radius: 8px;

        }

        .border {
            border-bottom: 1px solid rgba(0, 0, 0, .25);
            border-top: 1px solid rgba(0, 0, 0, .25);
            padding: 10px;
            margin: 0;
        }

        .border-sm {
            border-bottom: 1px solid rgba(0, 0, 0, .25);
            border-top: 1px solid rgba(0, 0, 0, .25);
            padding: 5px;
            margin: 0;
        }

        .p-sm {
            /* border-top: 1px solid rgba(0,0,0,.25);  */
            padding: 3px;
            margin: 0;
        }

        .p-md {
            padding: 5px 10px;
        }

        .pr-1 {
            padding-right: 10px;
        }

        .pr-2 {
            padding-right: 15px;
        }

        .pl-1 {
            padding-left: 10px;
        }

        .pl-2 {
            padding-left: 15px;
        }

        p {
            color: rgba(0, 0, 0, .7);
            padding: 0;
            margin: 0;
        }

        .mt-3 {
            margin-top: 30px;
        }


        td {
            padding: 12px;
            border: 1px solid rgba(0, 0, 0, .3);
        }
    </style>
</head>

<body>
    <header>
        <div class="head-page">
            <img src="{{public_path().'/img/logo.png'}}" width="70" alt="">
            <div class="title">
                <h4 class="text-center">
                    <span class="boleta" style="padding: 20px">REPORTE DE DOCUMENTOS</span>
                </h4>
            </div>
        </div>
    </header>


    <table class="w-100 mt-3">
        <thead>
            <tr class="fs-total fw-bold text-uppercase">
                <td>#</td>
                <td>Nombre completo</td>
                <td>Dirección</td>
                <td># celular</td>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $index => $document)
            <tr class="fs-total">
                <td>{{ $index + 1 }}</td>
                <td>
                    <p class="fw-bold m-0">
                        {{ $document->full_name }}
                    </p>
                    <p>
                        {{ strtoupper($document->doc_type) }} {{ $document->doc_number }}
                    </p>
                </td>
                <td>{{ $document->address }}</td>
                <td>{{ $document->cell_phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



    <script type="text/php">
        if (isset($pdf)) {
            $x = 540;
            $y = 10;
            $text = "Página {PAGE_NUM}";
            $font = null;
            $size = 10;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
        
    </script>
</body>

</html>