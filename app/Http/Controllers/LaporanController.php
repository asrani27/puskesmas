<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use App\Mruangan;
use App\Tdiagnosa;
use Carbon\Carbon;
use App\Tpelayanan;
use Illuminate\Http\Request;
use App\Exports\KunjunganPasien;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends Controller
{

    public function test_export()
    {
        return Excel::download(new kunjunganpasien, 'test_export.xlsx');
    }

    public function exportkunjunganpasien() 
    {
        $spreadsheet = new Spreadsheet();
        $rowArray = Tpelayanan::Take(10)->get()->toArray();
        
        $sheet = $spreadsheet->getActiveSheet()
        ->fromArray(
            $rowArray,   // The data to set
            NULL,        // Array values with this value will not be set
            'A12'         // Top left coordinate of the worksheet range where
                         //    we want to set these values (default is A1)
        );
        $sheet->setCellValue('A1', 'LAPORAN KUNJUNGAN PASIEN');
        $sheet->setCellValue('A2', 'Puskesmas : Pekauman');
        $sheet->setCellValue('A3', 'Tanggal :' . Carbon::today()->format('d-m-Y') . '-'. Carbon::today()->format('d-m-Y'));
        $sheet->setCellValue('A4', 'Jenis Kelamin : Semua');
        $sheet->setCellValue('A5', 'Asuransi : Semua');
        $sheet->setCellValue('A6', 'Total Data : '. count($rowArray) . ' Pengunjung');
        $sheet->setCellValue('A7', 'Kunjungan : Semua');
        $sheet->setCellValue('A8', 'Jenis Kunjungan : Semua !');
        
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save('php://output');
        //return Excel::download(new KunjunganPasien, 'kunjunganpasien.xlsx');
    }

    public function exportkunjunganpasientoday()
    {
        $spreadsheet = new Spreadsheet();
        $today = Carbon::today()->format('Y-m-d');
        $no = 1;
        $data = Tpelayanan::whereDate('tanggal', '=', $today)->get()->map(function($item, $key) use ($no){
            $item->nomor         = $key+1;
            $item->nama_pasien   = $item->pendaftaran->pasien->nama;
            $item->no_rm         = $item->pendaftaran->pasien->id;
            $item->nik           = $item->pendaftaran->pasien->nik;
            $item->no_rm_lama    = $item->pendaftaran->pasien->no_rm_lama;
            $item->no_dok_rm     = $item->pendaftaran->pasien->no_dok_rm;
            $item->jkel          = $item->pendaftaran->pasien->jenis_kelamin == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN';
            $item->tempat_lahir  = $item->pendaftaran->pasien->tempat_lahir .', '.Carbon::parse($item->pendaftaran->pasien->tanggal_lahir)->format('d-m-Y');
            $item->umur          = hitungUmur($item->pendaftaran->pasien->tanggal_lahir);
            $item->pekerjaan     = $item->pendaftaran->pasien->pekerjaan == null ? '-' : $item->pendaftaran->pasien->pekerjaan->nama;
            $item->alamat        = $item->pendaftaran->pasien->alamat;
            $item->kelurahan     = $item->pendaftaran->pasien->kelurahan == null ? '' : $item->pendaftaran->pasien->kelurahan->nama;
            $item->nama_ayah     = $item->pendaftaran->pasien->nama_ayah;
            $item->kunjungan     = $item->pendaftaran->kunjungan;
            $item->status        = $item->pendaftaran->status;
            $item->ruangan       = $item->ruangan->nama;
            $item->asuransi      = strtoupper($item->pendaftaran->pasien->asuransi->nama);
            $item->no_asuransi   = strtoupper($item->pendaftaran->pasien->no_asuransi);
            $item->kode_diagnosa = json_encode($item->diagnosa->map(function($item2){
                return $item2->diagnosa_id;
            })->toArray());
            $item->diagnosis = json_encode($item->diagnosa->map(function($item3){
                return $item3->mdiagnosa->value;
            })->toArray());
            $item->jenis_kasus = json_encode($item->diagnosa->map(function($item4){
                return $item4->diagnosa_kasus;
            })->toArray());
            return $item->only(['nomor','tanggal','nama_pasien','no_rm','nik','no_rm_lama','no_dok_rm','jkel',
            'tempat_lahir','umur','pekerjaan','alamat','kelurahan','nama_ayah','kunjungan','status','ruangan',
            'asuransi','no_asuransi','kode_diagnosa','diagnosis','jenis_kasus']);
        });
        $rowArray = $data->toArray();
         //dd($rowArray);
        $styleArrayHeader = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                ],
            ],
        ];
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
        $jmlRow = 11 + count($rowArray);
        $spreadsheet->getActiveSheet()->getStyle('A11:V11')->applyFromArray($styleArrayHeader);
        $spreadsheet->getActiveSheet()->getStyle('A12:A'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('B12:B'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('C12:C'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('D12:D'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('E12:E'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('F12:F'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('G12:G'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('H12:H'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('I12:I'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('J12:J'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('K12:K'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('L12:L'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('M12:M'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('N12:N'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('O12:O'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('P12:P'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('Q12:Q'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('R12:R'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('S12:S'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('T12:T'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('U12:U'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:V'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('E12:V'.$jmlRow)->getNumberFormat()->setFormatCode('###0');
        $sheet = $spreadsheet->getActiveSheet()
        ->fromArray(
            $rowArray,
            NULL,
            'A12'
        );
        
        $sheet->setCellValue('A1', 'LAPORAN KUNJUNGAN PASIEN');
        $sheet->setCellValue('A2', 'Puskesmas : Pekauman');
        $sheet->setCellValue('A3', 'Tanggal :' . Carbon::today()->format('d-m-Y') . '-'. Carbon::today()->format('d-m-Y'));
        $sheet->setCellValue('A4', 'Jenis Kelamin : Semua');
        $sheet->setCellValue('A5', 'Asuransi : Semua');
        $sheet->setCellValue('A6', 'Total Data : '. count($rowArray) . ' Pengunjung');
        $sheet->setCellValue('A7', 'Kunjungan : Semua');
        $sheet->setCellValue('A8', 'Jenis Kunjungan : Semua !');
        
        $sheet->setCellValue('A11', 'No');
        $sheet->setCellValue('B11', 'Tanggal');
        $sheet->setCellValue('C11', 'Nama Pasien');
        $sheet->setCellValue('D11', 'No RM');
        $sheet->setCellValue('E11', 'NIK');
        $sheet->setCellValue('F11', 'No RM Lama');
        $sheet->setCellValue('G11', 'No Dok. RM');
        $sheet->setCellValue('H11', 'Jenis Kelamin');
        $sheet->setCellValue('I11', 'Tempat & Tanggal Lahir');
        $sheet->setCellValue('J11', 'Umur');
        $sheet->setCellValue('K11', 'Pekerjaan');
        $sheet->setCellValue('L11', 'Alamat');
        $sheet->setCellValue('M11', 'Kelurahan');
        $sheet->setCellValue('N11', 'Nama Ayah');
        $sheet->setCellValue('O11', 'Jenis Kunjungan');
        $sheet->setCellValue('P11', 'Kunjungan'); 
        $sheet->setCellValue('Q11', 'Poli/Ruangan');
        $sheet->setCellValue('R11', 'Asuransi');
        $sheet->setCellValue('S11', 'No. Asuransi');
        $sheet->setCellValue('T11', 'Kode Diagnosa');
        $sheet->setCellValue('U11', 'Diagnosa');
        $sheet->setCellValue('V11', 'Jenis Kasus');
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save('php://output');
    }

    public function exportkunjunganpasientanggal($parameter)
    {
        $start = Carbon::parse($parameter['dari'])->format('Y-m-d')." 00:00:00"; 
        $end   = Carbon::parse($parameter['sampai'])->format('Y-m-d')." 23:59:59"; 

        $spreadsheet = new Spreadsheet();
        $no = 1;
        $data = Tpelayanan::whereBetween('tanggal', [$start, $end])->get()->map(function($item, $key) use ($no){
            $item->nomor         = $key+1;
            $item->nama_pasien   = $item->pendaftaran->pasien->nama;
            $item->no_rm         = $item->pendaftaran->pasien->id;
            $item->nik           = $item->pendaftaran->pasien->nik;
            $item->no_rm_lama    = $item->pendaftaran->pasien->no_rm_lama;
            $item->no_dok_rm     = $item->pendaftaran->pasien->no_dok_rm;
            $item->jkel          = $item->pendaftaran->pasien->jenis_kelamin == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN';
            $item->tempat_lahir  = $item->pendaftaran->pasien->tempat_lahir .', '.Carbon::parse($item->pendaftaran->pasien->tanggal_lahir)->format('d-m-Y');
            $item->umur          = hitungUmur($item->pendaftaran->pasien->tanggal_lahir);
            $item->pekerjaan     = $item->pendaftaran->pasien->pekerjaan == null ? '-' : $item->pendaftaran->pasien->pekerjaan->nama;
            $item->alamat        = $item->pendaftaran->pasien->alamat;
            $item->kelurahan     = $item->pendaftaran->pasien->kelurahan == null ? '' : $item->pendaftaran->pasien->kelurahan->nama;
            $item->nama_ayah     = $item->pendaftaran->pasien->nama_ayah;
            $item->kunjungan     = $item->pendaftaran->kunjungan;
            $item->status        = $item->pendaftaran->status;
            $item->ruangan       = $item->ruangan->nama;
            $item->asuransi      = strtoupper($item->pendaftaran->pasien->asuransi->nama);
            $item->no_asuransi   = strtoupper($item->pendaftaran->pasien->no_asuransi);
            $item->kode_diagnosa = json_encode($item->diagnosa->map(function($item2){
                return $item2->diagnosa_id;
            })->toArray());
            $item->diagnosis = json_encode($item->diagnosa->map(function($item3){
                return $item3->mdiagnosa->value;
            })->toArray());
            $item->jenis_kasus = json_encode($item->diagnosa->map(function($item4){
                return $item4->diagnosa_kasus;
            })->toArray());
            return $item->only(['nomor','tanggal','nama_pasien','no_rm','nik','no_rm_lama','no_dok_rm','jkel',
            'tempat_lahir','umur','pekerjaan','alamat','kelurahan','nama_ayah','kunjungan','status','ruangan',
            'asuransi','no_asuransi','kode_diagnosa','diagnosis','jenis_kasus']);
        });
        $rowArray = $data->toArray();
         //dd($rowArray);
        $styleArrayHeader = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                ],
            ],
        ];
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
        $jmlRow = 11 + count($rowArray);
        $spreadsheet->getActiveSheet()->getStyle('A11:V11')->applyFromArray($styleArrayHeader);
        $spreadsheet->getActiveSheet()->getStyle('A12:A'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('B12:B'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('C12:C'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('D12:D'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('E12:E'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('F12:F'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('G12:G'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('H12:H'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('I12:I'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('J12:J'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('K12:K'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('L12:L'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('M12:M'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('N12:N'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('O12:O'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('P12:P'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('Q12:Q'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('R12:R'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('S12:S'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('T12:T'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('U12:U'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:V'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('E12:V'.$jmlRow)->getNumberFormat()->setFormatCode('###0');
        $sheet = $spreadsheet->getActiveSheet()
        ->fromArray(
            $rowArray,
            NULL,
            'A12'
        );
        
        $sheet->setCellValue('A1', 'LAPORAN KUNJUNGAN PASIEN');
        $sheet->setCellValue('A2', 'Puskesmas : Pekauman');
        $sheet->setCellValue('A3', 'Tanggal :' . Carbon::today()->format('d-m-Y') . '-'. Carbon::today()->format('d-m-Y'));
        $sheet->setCellValue('A4', 'Jenis Kelamin : Semua');
        $sheet->setCellValue('A5', 'Asuransi : Semua');
        $sheet->setCellValue('A6', 'Total Data : '. count($rowArray) . ' Pengunjung');
        $sheet->setCellValue('A7', 'Kunjungan : Semua');
        $sheet->setCellValue('A8', 'Jenis Kunjungan : Semua !');
        
        $sheet->setCellValue('A11', 'No');
        $sheet->setCellValue('B11', 'Tanggal');
        $sheet->setCellValue('C11', 'Nama Pasien');
        $sheet->setCellValue('D11', 'No RM');
        $sheet->setCellValue('E11', 'NIK');
        $sheet->setCellValue('F11', 'No RM Lama');
        $sheet->setCellValue('G11', 'No Dok. RM');
        $sheet->setCellValue('H11', 'Jenis Kelamin');
        $sheet->setCellValue('I11', 'Tempat & Tanggal Lahir');
        $sheet->setCellValue('J11', 'Umur');
        $sheet->setCellValue('K11', 'Pekerjaan');
        $sheet->setCellValue('L11', 'Alamat');
        $sheet->setCellValue('M11', 'Kelurahan');
        $sheet->setCellValue('N11', 'Nama Ayah');
        $sheet->setCellValue('O11', 'Jenis Kunjungan');
        $sheet->setCellValue('P11', 'Kunjungan'); 
        $sheet->setCellValue('Q11', 'Poli/Ruangan');
        $sheet->setCellValue('R11', 'Asuransi');
        $sheet->setCellValue('S11', 'No. Asuransi');
        $sheet->setCellValue('T11', 'Kode Diagnosa');
        $sheet->setCellValue('U11', 'Diagnosa');
        $sheet->setCellValue('V11', 'Jenis Kasus');
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save('php://output');
    }

    public function kunjunganpasien()
    {
        $today = Carbon::today()->format('Y-m-d');
        $data = Tpelayanan::whereDate('tanggal', '=', $today)->get();
        //->whereHas('pendaftaran', function ($item){$item->where('status_periksa', 2);})
        return view('puskes.laporan.kunjunganpasien',compact('data'));
    }

    public function tampilkankunjunganpasien(Request $req)
    {
        if($req->tanggalex != null){
            $this->exportkunjunganpasientanggal($req->all());
        }else{
            $start = Carbon::parse($req->dari)->format('Y-m-d')." 00:00:00"; 
            $end   = Carbon::parse($req->sampai)->format('Y-m-d')." 23:59:59"; 
            $jenis_laporan   = $req->jenis_laporan;
            $kunjungan       = $req->kunjungan == 'semua' ? null : $req->kunjungan;
            $jenis_kunjungan = $req->jenis_kunjungan == 'semua' ? null :$req->jenis_kunjungan;
            $jenis_kelamin   = $req->jenis_kelamin == 'semua' ? null :$req->jenis_kelamin;
            $asuransi        = $req->asuransi == 'semua' ? null :$req->asuransi;
            $wilayah         = $req->wilayah;
            $data = Tpelayanan::whereBetween('tanggal', [$start, $end])
            ->whereHas('pendaftaran', function ($item) use ($kunjungan, $jenis_kunjungan, $jenis_kelamin, $asuransi) {
                $item->whereHas('pasien', function ($item2) use ($jenis_kelamin, $asuransi){    
                    if($jenis_kelamin == null){
    
                    }else{
                        $item2->where('jenis_kelamin', $jenis_kelamin);
                    }
                    if($asuransi == null){
    
                    }else{
                        $item2->where('asuransi_id', $asuransi);
                    }
                });
                if($kunjungan == null){
    
                }else{
                    $item->where('status', $kunjungan);
                }
                if($jenis_kunjungan == null){
    
                }else{
                    $item->where('kunjungan', $jenis_kunjungan);
                }
            })
            ->get();
            //dd($data, $req->all(), $start, $end, $kunjungan, $jenis_kunjungan);
            //dd($req->all(), $start, $end, $data);
            return view('puskes.laporan.kunjunganpasiensearch',
            compact('data',
                    'start',
                    'end',
                    'jenis_laporan',
                    'kunjungan',
                    'jenis_kunjungan',
                    'jenis_kelamin',
                    'asuransi',
                    'wilayah'
            ));
        }
    }

    public function laporansp3lb1()
    {
        $ruangan = Mruangan::where('is_aktif', 'Y')->get();
        $mapData = null;
        return view('puskes.laporan.laporansp3lb1',
        compact('ruangan', 'mapData'));
    }

    public function laporansp3lb1tampilkan(Request $req)
    {
        if($req->ruangan_id == null){
            toast('Tidak Ada Data', 'info');
            return back();
        }else{
            $Start = Carbon::createFromFormat('d-m-Y','01-'.$req->bulandari.'-'.$req->tahundari);
            $End   = Carbon::createFromFormat('d-m-Y','01-'.$req->bulansampai.'-'.$req->tahunsampai);
            $parseStart = Carbon::parse($Start)->format('Y-m-d').' 00:00:00';
            $parseEnd = Carbon::parse($End)->endofMonth()->format('Y-m-d').' 23:59:59';
            $poli = $req->ruangan_id;
            $data = Tdiagnosa::whereBetween('tanggal', array($parseStart, $parseEnd))
                                ->whereHas('pelayanan', function ($item) use ($poli){
                                    $item->whereIn('ruangan_id', $poli);
                                })->get();
        
            $mapData = $data->map(function($item, $key){
                $item->kode_icd = $item->diagnosa_id;
                $item->jenis_penyakit = $item->mdiagnosa->value;
                $item->poli = $item->pelayanan->ruangan->nama;
                $item->jenis_kelamin = $item->pelayanan->pendaftaran->pasien->jenis_kelamin;
                $item->umur = hitungUmur($item->pelayanan->pendaftaran->pasien->tanggal_lahir);
                return $item;
            })->sortBy('diagnosa_id');
            
            $ruangan = Mruangan::where('is_aktif', 'Y')->get();
            return view('puskes.laporan.laporansp3lb1',
            compact('ruangan','mapData'));

            // ->map(function($item, $value){
            //     $item->diagnosa->kode_icd = $item->diagnosa_id;
            //     $item->diagnosa['jenis_penyakit'] = $item->mdiagnosa;
            //     return $item->diagnosa;
            // });
            dd($req->all(), $req->ruangan_id,$parseStart, $parseEnd, $mapData);
        }
    }

    public function laporansp3lb2()
    {
        return view('puskes.laporan.laporansp3lb2');
    }
    
    public function laporansp3lb3()
    {
        return view('puskes.laporan.laporansp3lb3');
    }
    
    public function laporansp3lb4()
    {
        return view('puskes.laporan.laporansp3lb4');
    }
}
