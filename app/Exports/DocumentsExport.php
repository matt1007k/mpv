<?php

namespace App\Exports;

use App\Models\Document;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DocumentsExport implements FromQuery, WithHeadings
{
    use Exportable;

    public $search;
    public $dateFrom;
    public $dateTo;

    public function search(string $search)
    {
        $this->search = $search;
        return $this;
    }

    public function rangeDate(string $dateFrom, string $dateTo)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Query
     */
    public function query()
    {
        return Document::query()
            ->search($this->search)
            ->rangeDate($this->dateFrom, $this->dateTo)
        ;
    }

    public function headings(): array
    {
        return [
            '#',
            'Correo electrónico',
            'Nombre completo',
            'DNI',
            '# Celular',
            'Dirección',
            'Lugar de origin',
            'Asunto',
            'Link del documento',
            'ID del Usuario',
            'Fecha de registro',
            'Fecha de actualización',
        ];
    }
}
