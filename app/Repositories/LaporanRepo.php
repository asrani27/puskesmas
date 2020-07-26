<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Tpelayanan;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanRepo
{
    public function kunjunganpasien($parameter)
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
        header('Content-Disposition: attachment;filename="kunjunganpasien.xlsx"');
        
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save('php://output');
    }

    public function pelayananpasien($parameter)
    {
        $start = Carbon::parse($parameter['dari'])->format('Y-m-d')." 00:00:00"; 
        $end   = Carbon::parse($parameter['sampai'])->format('Y-m-d')." 23:59:59"; 

        $spreadsheet = new Spreadsheet();
        $no = 1;
        $data = Tpelayanan::whereBetween('tanggal', [$start, $end])->get()->map(function($item){
            $item->anamnesa = $item->anamnesa;
            return $item;
        })->where('anamnesa', '!=', null)->values();
        
        $dataArray = $data->map(function($item, $key) use ($no){
            $item->nomor         = $key+1;
            $item->nama_pasien   = $item->pendaftaran->pasien->nama;
            $item->no_rm         = $item->pendaftaran->pasien->id;
            $item->nik           = $item->pendaftaran->pasien->nik;
            $item->no_rm_lama    = $item->pendaftaran->pasien->no_rm_lama;
            $item->no_dok_rm     = $item->pendaftaran->pasien->no_dok_rm;
            $item->jkel          = $item->pendaftaran->pasien->jenis_kelamin == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN';
            $item->alamat        = $item->pendaftaran->pasien->alamat;
            $item->rt            = $item->pendaftaran->pasien->rt;
            $item->rw            = $item->pendaftaran->pasien->rw;
            $item->tanggal_periksa= $item->tanggal;
            $item->umur_tahun    = $item->pendaftaran->umur_tahun;
            $item->umur_bulan    = $item->pendaftaran->umur_bulan;
            $item->umur_hari     = $item->pendaftaran->umur_hari;
            $item->tempat_lahir  = $item->pendaftaran->pasien->tempat_lahir .', '.Carbon::parse($item->pendaftaran->pasien->tanggal_lahir)->format('d-m-Y');
            $item->umur          = hitungUmur($item->pendaftaran->pasien->tanggal_lahir);
            $item->pekerjaan     = $item->pendaftaran->pasien->pekerjaan == null ? '-' : $item->pendaftaran->pasien->pekerjaan->nama;
            $item->alamat        = $item->pendaftaran->pasien->alamat;
            $item->kelurahan     = $item->pendaftaran->pasien->kelurahan == null ? '' : $item->pendaftaran->pasien->kelurahan->nama;
            $item->nama_ayah     = $item->pendaftaran->pasien->nama_ayah;
            $item->nama_ibu      = $item->pendaftaran->pasien->nama_ibu;
            $item->kunjungan     = $item->pendaftaran->kunjungan;
            $item->status        = $item->pendaftaran->status;
            $item->ruangan       = $item->ruangan->nama;
            $item->dokter        = $item->anamnesa->dokter->nama;
            $item->keluhan_utama     = $item->anamnesa->keluhan_utama;
            $item->keluhan_tambahan  = $item->anamnesa->keluhan_tambahan;
            $item->terapi            = $item->anamnesa->terapi;
            $item->alergi            = '';
            $item->keterangan        = $item->anamnesa->keterangan;
            $item->merokok           = $item->anamnesa->merokok == 0 ? 'Tidak' : 'Ya';
            $item->konsumsi_alkohol  = $item->anamnesa->konsumsi_alkohol == 0 ? 'Tidak' : 'Ya';
            $item->kurang_sayur_buah = $item->anamnesa->kurang_sayur_buah == 0 ? 'Tidak' : 'Ya';
            $item->rps           = count($item->anamnesa->rps) == 0 ? '': $item->anamnesa->rps->where('jenis_riwayat', 'Riwayat Penyakit Sekarang')->first()->value;
            $item->rpd           = count($item->anamnesa->rpd) == 0 ? '': $item->anamnesa->rpd->where('jenis_riwayat', 'Riwayat Penyakit Dulu')->first()->value;
            $item->rpk           = count($item->anamnesa->rpk) == 0 ? '': $item->anamnesa->rpk->where('jenis_riwayat', 'Riwayat Penyakit Keluarga')->first()->value;
            $item->lama_sakit    = $item->anamnesa->lama_sakit_tahun.' Thn, '.$item->anamnesa->lama_sakit_bulan.' Bln, '.$item->anamnesa->lama_sakit_hari.' Hari';

            
            $item->kesadaran     = $item->periksafisik->kesadaran;
            $item->triage        = $item->periksafisik->triage;
            $item->tinggi        = $item->periksafisik->tinggi;
            $item->berat         = $item->periksafisik->berat;
            $item->lingkar_perut = $item->periksafisik->lingkar_perut;
            if($item->periksafisik->berat == 0 || $item->periksafisik->tinggi == 0){
                $item->imt = 0;
            }else{
                $item->imt           = number_format($item->periksafisik->berat / ($item->periksafisik->tinggi / 100) / ($item->periksafisik->tinggi / 100), 2);
            }
            $item->hasil_imt = '';
            $item->sistole         = $item->periksafisik->sistole;
            $item->diastole        = $item->periksafisik->diastole;
            $item->nafas           = $item->periksafisik->nafas;
            $item->detak_nadi      = $item->periksafisik->detak_nadi;
            $item->detak_jantung   = $item->periksafisik->detak_jantung;
            $item->suhu            = $item->periksafisik->suhu;
            $item->aktifitas_fisik = $item->periksafisik->aktifitas_fisik;

            $item->perawat       = $item->anamnesa->perawat == null ? '': $item->anamnesa->perawat->nama;
            $item->asuransi      = strtoupper($item->pendaftaran->pasien->asuransi->nama);
            $item->no_asuransi   = strtoupper($item->pendaftaran->pasien->no_asuransi);
            $item->kode_diagnosa = $item->diagnosa->map(function($item2){
                return $item2->diagnosa_id.'-'.$item2->mdiagnosa->value;
            });
            $item->jenis_kasus = $item->diagnosa->map(function($item4){
                return $item4->diagnosa_kasus;
            });
            $item->tindakan = $item->tindakan->map(function($t){
                return $t->mtindakan->value;
            });

            if($item->resep == null){
                $item->resep = '';
            }
            else{
                $item->resep = $item->resep->resepdetail->map(function($r){
                    return $r->obat->value;
                });
            }

            $item->pendaftaran = 'Pendaftaran';

            
            return $item->only(['nomor','tanggal','nama_pasien','no_rm','nik','no_rm_lama','no_dok_rm','jkel',
            'alamat', 'rt','rw','pekerjaan','tanggal_periksa','kelurahan','tempat_lahir','umur_tahun',
            'umur_bulan','umur_hari','nama_ayah','nama_ibu','kunjungan','ruangan','asuransi','no_asuransi',
            'dokter','perawat','keluhan_utama','keluhan_tambahan','lama_sakit','merokok','konsumsi_alkohol',
            'kurang_sayur_buah','terapi','keterangan','rsp','rpd','rpk','alergi','kesadaran','triage','tinggi',
            'badan','lingkar_perut','imt','hasil_imt','sistole','diastole','nafas','detak_nadi','detak_jantung',
            'suhu','aktifitas_fisik','kode_diagnosa','jenis_kasus','tindakan','resep','pendaftaran']);
        });
        $rowArray = $dataArray->toArray();
        
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
        $spreadsheet->getActiveSheet()->getStyle('A11:BE11')->applyFromArray($styleArrayHeader);
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
        $spreadsheet->getActiveSheet()->getStyle('V12:W'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:X'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:Y'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:Z'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AA'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AB'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AC'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AD'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AE'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AF'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AG'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AH'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AI'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AJ'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AK'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AL'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AM'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AN'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AO'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AP'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AQ'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AR'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AS'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AT'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AU'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AV'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AW'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AX'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AY'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:AZ'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:BA'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:BB'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:BC'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:BD'.$jmlRow)->applyFromArray($styleArrayData);
        $spreadsheet->getActiveSheet()->getStyle('V12:BE'.$jmlRow)->applyFromArray($styleArrayData);
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
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AL')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AM')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AN')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AO')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AP')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AQ')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AR')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AS')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AT')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AU')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AV')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AW')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AX')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AZ')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('BA')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('BB')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('BC')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('BD')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('BE')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('E12:BE'.$jmlRow)->getNumberFormat()->setFormatCode('###0');
        $sheet = $spreadsheet->getActiveSheet()
        ->fromArray(
            $rowArray,
            NULL,
            'A12'
        );
        
        $sheet->setCellValue('A1', 'LAPORAN PELAYANAN PASIEN');
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
        $sheet->setCellValue('I11', 'Alamat');
        $sheet->setCellValue('J11', 'RT');
        $sheet->setCellValue('K11', 'RW');
        $sheet->setCellValue('L11', 'Pekerjaan');
        $sheet->setCellValue('M11', 'Tanggal Pemeriksaan');
        $sheet->setCellValue('N11', 'Kelurahan');
        $sheet->setCellValue('O11', 'Tempat & Tgl Lahir');
        $sheet->setCellValue('P11', 'Umur Thn'); 
        $sheet->setCellValue('Q11', 'Umur Bln');
        $sheet->setCellValue('R11', 'Umur Hari');
        $sheet->setCellValue('S11', 'Nama Ayah');
        $sheet->setCellValue('T11', 'Nama Ibu');
        $sheet->setCellValue('U11', 'Jenis Kunjungan');
        $sheet->setCellValue('V11', 'Poli/Ruangan');
        $sheet->setCellValue('W11', 'Asuransi');
        $sheet->setCellValue('X11', 'No Asuransi');
        $sheet->setCellValue('Y11', 'Dokkter');
        $sheet->setCellValue('Z11', 'Perawat');
        $sheet->setCellValue('AA11', 'Keluhan Utama');
        $sheet->setCellValue('AB11', 'Keluhan Tambahan');
        $sheet->setCellValue('AC11', 'Lama Sakit');
        $sheet->setCellValue('AD11', 'Merokok');
        $sheet->setCellValue('AE11', 'Konsumsi Alkohol');
        $sheet->setCellValue('AF11', 'Kurang Sayur Buah');
        $sheet->setCellValue('AG11', 'Terapi');
        $sheet->setCellValue('AH11', 'Keterangan');
        $sheet->setCellValue('AI11', 'RPS');
        $sheet->setCellValue('AJ11', 'RPD');
        $sheet->setCellValue('AK11', 'RPK');
        $sheet->setCellValue('AL11', 'Alergi');
        $sheet->setCellValue('AM11', 'Kesadaran');
        $sheet->setCellValue('AN11', 'Triage');
        $sheet->setCellValue('AO11', 'Tinggi');
        $sheet->setCellValue('AP11', 'Badan');
        $sheet->setCellValue('AQ11', 'Lingkar Perut');
        $sheet->setCellValue('AR11', 'IMT');
        $sheet->setCellValue('AS11', 'Hasil IMT');
        $sheet->setCellValue('AT11', 'Sistole');
        $sheet->setCellValue('AU11', 'Diastole');
        $sheet->setCellValue('AV11', 'Nafas');
        $sheet->setCellValue('AW11', 'Detak Nadi');
        $sheet->setCellValue('AX11', 'Detak Jantung');
        $sheet->setCellValue('AY11', 'Suhu');
        $sheet->setCellValue('AZ11', 'Aktifitas Fisik');
        $sheet->setCellValue('BA11', 'Diagnosa');
        $sheet->setCellValue('BB11', 'Jenis Kasus');
        $sheet->setCellValue('BC11', 'Tindakan');
        $sheet->setCellValue('BD11', 'Resep');
        $sheet->setCellValue('BE11', 'Pendaftaran/Rujukan Internal');
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pelayananpasien.xlsx"');
        
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save('php://output');
    }

}
