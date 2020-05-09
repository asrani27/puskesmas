<?php

namespace App\Exports;

use App\User;
use App\Tpelayanan;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class KunjunganPasien implements FromCollection, WithHeadings, WithEvents
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = User::all();
        $data = $user->map(function($item){
            return $item->only(['name','email','mobile','puskesmas_id']);
        });
        return $data;
    }

    public function headings(): array
    {
        return [ 
                    ['LAPORAN'],
                    ['Nama','Email','Mobile','Puskesmas ID']
        ];
    }

    public function registerEvents(): array
    {
        $styleArrayData = [
            'font' => [
                'size' => 8,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],  
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                ],
            ],
        ];
        
        return [
            
            AfterSheet::class => function(AfterSheet $event) use($styleArrayData){
                $event->sheet->getStyle('A1')->applyFromArray($styleArrayData);

            }
        ];
    }
}
