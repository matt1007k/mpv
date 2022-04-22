<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DocumentsExport;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Services\EncryptService;
use App\Services\JsonParseService;
use PDF;

class ReportsController extends Controller
{
    public function reportExcel(string $params_code)
    {
        $params_decode = (new EncryptService($params_code))->getDecodeEncrypt();
        $params = (new JsonParseService($params_decode))->getJsonDecode();

        $nowDate = now()->format('d-m-Y');

        $fileName = "{$nowDate}-documentos.xlsx";

        return (new DocumentsExport)->search($params->search)->rangeDate($params->dateFrom, $params->dateTo)->download($fileName);
    }

    public function reportPdf(string $params_code)
    {
        $params_decode = (new EncryptService($params_code))->getDecodeEncrypt();
        $params = (new JsonParseService($params_decode))->getJsonDecode();

        $documents = Document::search($params->search)->rangeDate($params->dateFrom, $params->dateTo)->get();
        if ($documents) {
            $pdf = PDF::loadView('reports.pdf', [
                'documents' => $documents,
            ]);
            $pdf->getDomPDF()->set_option("enable_php", true);

            $pdf->setPaper('a4');
            return $pdf->stream();
        } else {
            return response()->json([
                'msg' => 'Documentos no ha sido encontrado',
            ], 404);
        }
    }
}
