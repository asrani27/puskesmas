@extends('layouts.admin.default')

@push('addcss')
<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@section('content-header')
<div class="content-header">
    <div class="row">
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Rekam Medis Pasien</h3>
              <div class="card-tools">
               <a href="/rekam_medis" class="btn btn-danger btn-xs shadow"> <i class="fas fa-backward"></i> Kembali</a>
             </div>
           </div>
            
            <!-- /.card-header -->
            <div class="card-body p-2 table-responsive">
                <table>
                    <tr>
                        <td>No Rm.</td>
                        <td style="padding-right:100px">: {{$pasien->id}}</td>
                        <td>Umur</td>
                        <td>: {{hitungUmur($pasien->tanggal_lahir)}}</td>
                    </tr>
                    <tr>
                        <td>No Rm Lama</td>
                        <td>: {{$pasien->no_rm_lama}}</td>
                        <td>Jenis Kelamin</td>
                        <td>: {{$pasien->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>No Dok Rm.</td>
                        <td>: {{$pasien->no_dok_em}}</td>
                        <td>Golongan Darah</td>
                        <td>: {{$pasien->gol_darah}}</td>
                    </tr>
                    <tr>
                        <td>No Asuransi</td>
                        <td>: {{$pasien->no_asuransi}}</td>
                        <td>Nama KK</td>
                        <td>: {{$pasien->no_kk}}</td>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>: {{$pasien->nama}}</td>
                        <td>Alamat</td>
                        <td>: {{$pasien->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:  {{$pasien->tempat_lahir}}</td>
                        <td>Tanggal Lahir</td>
                        <td>:  {{$pasien->tanggal_lahir}}</td>
                    </tr>
                </table>
                <br />
              <table id="example" class="table table-bordered table-sm">
                <thead>
                <tr class="bg-gradient-primary" style="font-size:12px; font-family:Arial, Helvetica, sans-serif">
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>Anamnesa</th>
                  <th>Pemeriksaan Fisik</th>
                  <th>Pem. Laboratorium</th>
                  <th>Diagnosa</th>
                  <th>Tindakan</th>
                  <th>Resep Obat</th>
                  <th>Poli/Ruangan</th>
                  <th>Rujuk Internal</th>
                  <th>Rujuk Eksternal</th>
                  <th>TTD</th>
                </thead>
                <small>
                    @php
                    $no = 1;
                    @endphp
                <tbody>
                  @foreach ($data as $item)
                      <tr style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">
                        <td>{{$no++}}</td>
                        <td width="100px">{{$item->anamnesa->tanggal}}</td>
                        <td>
                            <ul>
                                <li>Keluhan Utama : {{$item->anamnesa->keluhan_utama}}</li>
                                <li>Keluhan Tambahan : {{$item->anamnesa->keluhan_tambahan}}</li>
                                <li>Lama Sakit : {{$item->anamnesa->lama_sakit_tahun}} Thn, {{$item->anamnesa->lama_sakit_bulan}} Bln, {{$item->anamnesa->lama_sakit_hari}} Hari</li>
                                <li>Merokok : {{$item->anamnesa->merokok == 0 ? 'Tidak' : 'Ya'}}</li>
                                <li>Konsumsi Alkohol : {{$item->anamnesa->konsumsi_alkohol == 0 ? 'Tidak' : 'Ya'}}</li>
                                <li>Kurang Sayur Buah : {{$item->anamnesa->kurang_sayur_buah == 0 ? 'Tidak' : 'Ya'}}</li>
                                <li>Edukasi : {{$item->anamnesa->edukasi}}</li>
                                <li>Terapi Sebelumnya : {{$item->anamnesa->terapi}}</li>
                                <li>Rencana Tindakan : {{$item->anamnesa->rencana_tindakan}}</li>
                                <li>Observasi : {{$item->anamnesa->observasi}}</li>
                                <li>Biopsikososial : {{$item->anamnesa->biopsikososial}}</li>
                                <li>keterangan : {{$item->anamnesa->keterangan}}</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>Kesadaran : {{$item->periksafisik->kesadaran}}</li>
                                <li>Sistole :{{$item->periksafisik->sistole}}</li>
                                <li>Diastole :{{$item->periksafisik->diastole}}</li>
                                <li>Tinggi Badan :{{$item->periksafisik->tinggi}}</li>
                                <li>Berat Badan :{{$item->periksafisik->berat}}</li>
                                <li>Lingkar Perut :{{$item->periksafisik->lingkar_perut}}</li>
                                <li>Detak Nadi :{{$item->periksafisik->detak_nadi}}</li>
                                <li>Nafas :{{$item->periksafisik->nafas}}</li>
                                <li>Suhu :{{$item->periksafisik->suhu}} /°C</li>
                                <li>Aktifitas Fisik :{{$item->periksafisik->aktifitas_fisik}}</li>
                                <li>Detak Jantung :{{$item->periksafisik->detak_jantung}}</li>
                                <li>Triage :{{$item->periksafisik->triage}}</li>
                                <li>Skala Nyeri :
                                    @if($item->periksafisik->skala_nyeri == 0)
                                    Tidak Nyeri
                                    @elseif($item->periksafisik->skala_nyeri == 1)
                                    Sedang
                                    @elseif($item->periksafisik->skala_nyeri == 2)
                                    Ringan
                                    @elseif($item->periksafisik->skala_nyeri == 3)
                                    Berat
                                    @endif
                                </li>
                            </ul>
                        </td>
                        <td></td>
                        <td>
                            <ul>
                                @foreach ($item->diagnosa as $diagnosa)
                                    <li>{{$diagnosa->diagnosa_id}} - {{$diagnosa->mdiagnosa->value}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($item->tindakan as $tindakan)
                                <li>{{$tindakan->mtindakan->value}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @if($item->resep == null)

                            @else
                            <ul>
                                @foreach ($item->resep->resepdetail as $resep)
                                <li>{{$resep->obat->value}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </td>
                        <td>
                            {{$item->ruangan->nama}}
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            @if($item->anamnesa->dokter == null)
                            @else
                            {{strtoupper($item->anamnesa->dokter->nama)}}
                            @endif 
                        </td>
                      </tr>
                  @endforeach
                <tbody>
                </small> 
              </table>
            </div>
            <div class="card-footer">
                {{-- {{ $data->onEachSide(1)->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('addjs')
<script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endpush
