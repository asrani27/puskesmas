<?php

namespace App\Exports;

use App\User;
use App\Tpelayanan;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;

class KunjunganPasien implements FromCollection, WithHeadings
{
    
    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             $event->sheet->setCellValue('A1','LAPORAN KUNJUNGAN PASIEN');
    //             $event->sheet->setCellValue('A2','Puskesmas : Pekauman');
    //             $event->sheet->setCellValue('A3','Tanggal : 25-09-2020');
    //             $event->sheet->setCellValue('A4','Jenis Kelamin : Semua');
    //             $event->sheet->setCellValue('A5','Asuransi : Semua');
    //             $event->sheet->setCellValue('A6','Total Data : 80');
    //             $event->sheet->setCellValue('A7','Kunjungan : Semua');
    //             $event->sheet->setCellValue('A8','Jenis Kunjungan : Semua');
    //         },
    //     ];
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'Mobile',
            'Puskesmas ID',
        ];
    }
}
