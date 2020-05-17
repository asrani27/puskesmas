<script>
    $(document).on("click", ".open-modal", function () {
     var pendaftaran = $(this).data('pendaftaran');
     //console.log(pendaftaran);
     document.getElementById("id_pelayanan").innerHTML = pendaftaran.pelayanan.id;
     document.getElementById("instalasi").innerHTML = pendaftaran.instalasi;
     document.getElementById("nik_pasien").innerHTML = pendaftaran.pasien.nik;
     document.getElementById("nama_pasien").innerHTML = pendaftaran.pasien.nama;
     document.getElementById("nama_ibu").innerHTML = pendaftaran.pasien.nama_ibu;
     document.getElementById("poli").innerHTML = pendaftaran.ruangan.nama;
     document.getElementById("no_erm").innerHTML = pendaftaran.pasien.id;
     document.getElementById("no_rm_lama").innerHTML = pendaftaran.pasien.no_rm_lama;
     document.getElementById("tgl_pelayanan").innerHTML = pendaftaran.pelayanan.tanggal;
     document.getElementById("no_dok_rm").innerHTML = pendaftaran.pasien.no_dok_rm;
     document.getElementById("jkel").innerHTML = pendaftaran.pasien.jenis_kelamin;
     document.getElementById("tempat_lahir").innerHTML = pendaftaran.pasien.tempat_lahir+','+pendaftaran.pasien.tanggal_lahir;
     document.getElementById("id_pendaftaran").innerHTML = pendaftaran.id;
     document.getElementById("tanggal_daftar").innerHTML = pendaftaran.tanggal;
     document.getElementById("alamat").innerHTML = pendaftaran.pasien.alamat;
     document.getElementById("asuransi").innerHTML = pendaftaran.asuransi.jenis_asuransi;
     if(pendaftaran.anamnesa == null){
  
     document.getElementById("id_anamnesa").innerHTML = '';
     document.getElementById("tanggal_anamnesa").innerHTML = '';
     document.getElementById("dokter_anamnesa").innerHTML = '';
     document.getElementById("perawat_anamnesa").innerHTML = '';
     document.getElementById("keluhan_utama").innerHTML = '';
     document.getElementById("keluhan_tambahan").innerHTML = '';
     document.getElementById("lama_sakit").innerHTML  = '';
     document.getElementById("kesadaran").innerHTML  = '';
     document.getElementById("detak_nadi").innerHTML  = '';
     document.getElementById("sistole").innerHTML  = '';
     document.getElementById("diastole").innerHTML  = '';
     document.getElementById("suhu").innerHTML  = '';
     document.getElementById("nafas").innerHTML  = '';
     document.getElementById("tinggi_badan").innerHTML  = '';
     document.getElementById("aktifitas_fisik").innerHTML  = '';
     document.getElementById("id_periksafisik").innerHTML  = '';
     document.getElementById("berat").innerHTML  = '';
     document.getElementById("detak_jantung").innerHTML  = '';
     document.getElementById("lingkar_perut").innerHTML  = '';
     document.getElementById("triage").innerHTML  = '';
     document.getElementById("imt").innerHTML  = '';
     document.getElementById("skala_nyeri").innerHTML  = '';
     document.getElementById("hasil_imt").innerHTML  = '';
     document.getElementById("status").innerHTML  = '';
     document.getElementById("edukasi").innerHTML  = '';
     document.getElementById("merokok").innerHTML  = '';
     document.getElementById("terapi").innerHTML  = '';
     document.getElementById("konsumsi_alkohol").innerHTML  = '';
     document.getElementById("rencana").innerHTML  = '';
     document.getElementById("kurang_sayur_buah").innerHTML  = '';
     document.getElementById("observasi").innerHTML  = '';
     document.getElementById("biopsikososial").innerHTML  = '';
     }else{
     document.getElementById("id_anamnesa").innerHTML = pendaftaran.anamnesa.id;
     document.getElementById("tanggal_anamnesa").innerHTML = pendaftaran.anamnesa.tanggal;
     document.getElementById("dokter_anamnesa").innerHTML = pendaftaran.anamnesa.dokter.nama;
     document.getElementById("perawat_anamnesa").innerHTML = pendaftaran.anamnesa.perawat == null ? null : pendaftaran.anamnesa.perawat.nama;
     document.getElementById("keluhan_utama").innerHTML = pendaftaran.anamnesa.keluhan_utama;
     document.getElementById("keluhan_tambahan").innerHTML = pendaftaran.anamnesa.keluhan_tambahan;
     document.getElementById("lama_sakit").innerHTML = pendaftaran.anamnesa.lama_sakit_tahun+' Thn,'+pendaftaran.anamnesa.lama_sakit_bulan+' Bln,'+pendaftaran.anamnesa.lama_sakit_hari+' Hr';
  
     document.getElementById("id_periksafisik").innerHTML = pendaftaran.periksafisik.id;
     document.getElementById("kesadaran").innerHTML = pendaftaran.periksafisik.kesadaran;
     document.getElementById("detak_nadi").innerHTML  = pendaftaran.periksafisik.detak_nadi;
     document.getElementById("sistole").innerHTML  = pendaftaran.periksafisik.sistole;
     document.getElementById("diastole").innerHTML  = pendaftaran.periksafisik.diastole;
     document.getElementById("suhu").innerHTML  = pendaftaran.periksafisik.suhu;
     document.getElementById("nafas").innerHTML  = pendaftaran.periksafisik.nafas;
     document.getElementById("tinggi_badan").innerHTML  =  pendaftaran.periksafisik.tinggi;
     document.getElementById("aktifitas_fisik").innerHTML  =  pendaftaran.periksafisik.aktifitas_fisik;
     
     document.getElementById("berat").innerHTML  = pendaftaran.periksafisik.berat;
     document.getElementById("detak_jantung").innerHTML  = pendaftaran.periksafisik.detak_jantung;
     document.getElementById("lingkar_perut").innerHTML  = pendaftaran.periksafisik.lingkar_perut;
     document.getElementById("triage").innerHTML  = pendaftaran.periksafisik.triage;
     document.getElementById("imt").innerHTML  = pendaftaran.periksafisik.imt;
     if(pendaftaran.periksafisik.skala_nyeri == 0){
       sn = 'Tidak Nyeri';
     }else if(pendaftaran.periksafisik.skala_nyeri == 1){
       sn = 'Sedang';
     }else if(pendaftaran.periksafisik.skala_nyeri == 2){
       sn = 'Ringan';
     }else if(pendaftaran.periksafisik.skala_nyeri == 3){
       sn = 'Berat';
     }
     document.getElementById("skala_nyeri").innerHTML  = sn;
     document.getElementById("hasil_imt").innerHTML  = pendaftaran.periksafisik.hasil_imt;
     document.getElementById("status").innerHTML  = '';
     document.getElementById("edukasi").innerHTML  = pendaftaran.anamnesa.edukasi;
     document.getElementById("merokok").innerHTML  = pendaftaran.anamnesa.merokok == 0 ? 'Tidak' : 'Ya';
     document.getElementById("terapi").innerHTML  = pendaftaran.anamnesa.terapi;
     document.getElementById("konsumsi_alkohol").innerHTML  = pendaftaran.anamnesa.konsumsi_alkohol == 0 ? 'Tidak' : 'Ya';
     document.getElementById("rencana").innerHTML  = pendaftaran.anamnesa.rencana_tindakan;
     document.getElementById("kurang_sayur_buah").innerHTML  = pendaftaran.anamnesa.kurang_sayur_buah == 0 ? 'Tidak' : 'Ya';
     document.getElementById("observasi").innerHTML  = pendaftaran.anamnesa.observasi;
     document.getElementById("biopsikososial").innerHTML  = pendaftaran.anamnesa.biopsikososial;
     }
     $("#tableDiagnosa tbody tr").remove(); 
  
     data = pendaftaran.diagnosa;
     
     for(i = 0; i< data.length; i++)
     {
       //console.log(data[i].id);
        $('#tableDiagnosa').append('<tr><td>'+data[i].id+'</td><td>'+data[i].tanggal+'</td><td>'+data[i].dokter.nama+'</td><td>'+data[i].perawat.nama+'</td><td>'+data[i].diagnosa_id+'</td><td>'+data[i].diagnosis.value+'</td><td>'+data[i].diagnosa_jenis+'</td><td>'+data[i].diagnosa_kasus+'</td></tr>');
     }
     $('#modal-xl').modal('show');
  });
  </script>