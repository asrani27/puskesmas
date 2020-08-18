<?php

namespace App\Exports;

use App\Mruangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ObatExport implements FromView, WithEvents, ShouldAutoSize, WithCustomStartCell
{
    public function view(): View
    {
        return view('exports.FormatObatExcel', [
            'ruangan' => Mruangan::where('is_aktif', 'Y')->get()
        ]);
    }
    public function registerEvents(): array
    {
        $style = [
            'font' => [
                'bold' => true,
                'size' => 13,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        $styleData = [
            'font' => [
                'size' => 11,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];
        return [
            AfterSheet::class => function (AfterSheet $event) use ($style, $styleData) {
                $event->sheet->getStyle('A4:E4')->applyFromArray($styleData);
                $event->sheet->getStyle('A3:E3')->applyFromArray($style);
                $event->sheet->getStyle('A2:E2')->applyFromArray($style);
                $event->sheet->getStyle('A1:E1')->applyFromArray($style);
            },
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }
}
