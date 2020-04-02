<tbody style="font-size:13px;">
    <tr class="line_1">
        <input type="hidden" name="MtbsDetail[rows][1][0]">
        <td width="45%" colspan="2">
            <div class="col-sm-12 form-group"><b>Memeriksa Tanda Bahaya Umum?</b></div>
            <div class="input-group">
                <div class="col-sm-12"><label><input type="checkbox" value="1" name="MtbsDetail[P][1][0_1]"> Tidak bisa minum atau menyusui</label> </div>
                <div class="col-sm-12"><label><input type="checkbox" value="1" name="MtbsDetail[P][1][0_2]"> Memuntahkan semuanya</label> </div>
                <div class="col-sm-12"><label><input type="checkbox" value="1" name="MtbsDetail[P][1][0_3]"> Kejang</label> </div>
                <div class="col-sm-12"><label><input type="checkbox" value="1" name="MtbsDetail[P][1][0_4]"> Rewel atau gelisah, letargis atau tidak sadar </label></div>
                <div class="col-sm-12"><label><input type="checkbox" value="1" name="MtbsDetail[P][1][0_5]"> Ada Stridor </label></div>
                <div class="col-sm-12"><label><input type="checkbox" value="1" name="MtbsDetail[P][1][0_6]"> Biru <i>(Cynanosis)</i> </label></div>
                <div class="col-sm-12"><label><input type="checkbox" value="1" name="MtbsDetail[P][1][0_7]"> Ujung tangan dan kaki pucat dan dingin</label> </div>
            </div>
        </td>
        <td valign="middle" align="center">
            <div class="col-sm-12 line_1_hidden"><b>Penyakit sangat berat</b></div>
        </td>
        <td>
            <textarea height="100%" name="MtbsDetail[X][1][0_text]" class="form-control input-sm line_1_hidden" rows="3"></textarea>
        </td>
    </tr>
    <tr class="line_2">
        <input type="hidden" name="MtbsDetail[rows][2][0]">
        <td>
            <div class="col-sm-12 form-group"><b>Apakah anak batuk atau sukar bernapas ?</b></div>
            <div class="input-group line_2_action_hidden" >
                <div class="col-sm-12"> Sudah berapa lama? <input class="text-field" name="MtbsDetail[P][2][0_1]" size="2"> hari </div>
                <div class="col-sm-12"> Hitung napas dalam 1 menit : <input class="text-field" name="MtbsDetail[P][2][0_2]" size="2" value="42"> kali/menit </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][2][0_3]"> Nafas cepat? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][2][0_4]"> Ada tarikan dinding dada ke dalam </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][2][0_5]"> Ada Wheezing </div>
                <div class="col-sm-12"> Saturasi oksigen <input class="text-field" name="MtbsDetail[P][2][0_6]" size="2"> %</div>
            </div>
        </td>
        <td width="10%">
            <div class="input-group">
                <label>
                    <input type="radio" class="line_2_action" name="MtbsDetail[P][2][0_keterangan]" value="1" data-id="ya"> Ya <br>
                </label>
                <label>
                    <input type="radio" class="line_2_action" name="MtbsDetail[P][2][0_keterangan]" value="2" data-id="tidak"> Tidak
                </label>
            </div>
        </td>
        <td>
            <select  class="form-control form-control-sm line_2_action_hidden" "="" name="MtbsDetail[K][2][0_klasifikasi]">
                <option value="-"> - PILIH - </option>
                <option value="1">Pneumonia berat</option>
                <option value="2">Pneumonia</option>
                <option value="3">Batuk bukan pneumonia</option>
            </select>
        </td>
        <td>
            <textarea  class="form-control form-control-sm line_2_action_hidden" "="" name="MtbsDetail[X][2][0_text]" rows="3"></textarea>
        </td>

    </tr>
    <tr class="line_3">
        <input type="hidden" name="MtbsDetail[rows][3][0]">
        <td>
            <div class="col-sm-12 form-group"><b>Apakah anak diare?</b></div>
            <div class="input-group line_3_action_hidden" >
                <div class="col-sm-12">Berapa lama? <input class="text-field" name="MtbsDetail[P][3][0_1]" size="2" value=""> hari</div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][3][0_2]"> Adakah darah dalam tinja?</div>
                <div class="col-sm-12">
                    Lihat keadaan umum anak :
                    <div class="input-group">
                        <div class="radio-inline"> <input type="radio" value="1" name="MtbsDetail[P][3][0_3]"> Letargis atau tidak sadar </div>
                        <div class="radio-inline"> <input type="radio" value="2" name="MtbsDetail[P][3][0_3]"> Gelisah atau rewel </div>
                    </div>
                </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][3][0_4]"> Mata cekung</div>
                <div class="col-sm-12">
                    Beri anak minum :
                    <div class="input-group">
                        <div class="radio-inline"> <input type="radio" value="1" name="MtbsDetail[P][3][0_5]"> Tidak bisa minum atau malas minum </div>
                        <div class="radio-inline"> <input type="radio" value="2" name="MtbsDetail[P][3][0_5]"> Sangat lambar (Lebih dari 2 detik) </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    Cubit kulit perut, apakah kembalinya :
                    <div class="input-group">
                        <div class="radio-inline"> <input type="radio" value="1" name="MtbsDetail[P][3][0_6]"> Tidak bisa minum atau malas minum </div>
                        <div class="radio-inline"> <input type="radio" value="2" name="MtbsDetail[P][3][0_6]"> Sangat lambar (Lebih dari 2 detik) </div>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="input-group">
                <label>
                    <input type="radio" class="line_3_action" value="1" name="MtbsDetail[P][3][0_keterangan]" data-id="ya"> Ya <br>
                </label>
                <label>
                    <input type="radio" class="line_3_action" value="2" name="MtbsDetail[P][3][0_keterangan]" data-id="tidak"> Tidak
                </label>
            </div>
        </td>
        <td>
          <div  class="line_3_action_hidden">
            <div class="col-sm-12"> <input type="checkbox" value="7" name="MtbsDetail[K][3][0_13]">Tidak Diare</div>
            <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[K][3][0_7]">Diare dehidrasi berat</div>
            <div class="col-sm-12"> <input type="checkbox" value="2" name="MtbsDetail[K][3][0_8]">Diare dehidrasi ringan/sedang</div>
            <div class="col-sm-12"> <input type="checkbox" value="3" name="MtbsDetail[K][3][0_9]">Diare tanpa dehidrasi</div>
            <div class="col-sm-12"> <input type="checkbox" value="4" name="MtbsDetail[K][3][0_10]">Diare persisten berat</div>
            <div class="col-sm-12"> <input type="checkbox" value="5" name="MtbsDetail[K][3][0_11]">Diare persisten</div>
            <div class="col-sm-12"> <input type="checkbox" value="6" name="MtbsDetail[K][3][0_12]">Disentri</div>
          </div>
        </td>
        <td>
            <textarea  class="form-control input-sm line_3_action_hidden" name="MtbsDetail[X][3][0_text]" rows="3"></textarea>
        </td>

    </tr>
    <tr class="line_4">
        <input type="hidden" name="MtbsDetail[rows][4][0]">
        <td>
            <div class="col-sm-12 form-group"><b>Apakah anak demam?</b><br>(
                <label>
                    <input type="checkbox" value="1" name="MtbsDetail[P][4][0_10]"> Anamnesis
                </label>
                <label>
                    <input type="checkbox" value="1" name="MtbsDetail[P][4][0_11]"> Teraba panas
                </label>
                <label>
                    <input type="checkbox" value="1" name="MtbsDetail[P][4][0_12]"> Suhu≥ 37,5°C)
                </label>
            </div>
            <div class="input-group">
                <div class="col-sm-12">
                    Tentukan Daerah Endemis Malaria :
                    <div class="input-group">
                        <label>
                            <input type="radio" value="1" name="MtbsDetail[P][4][0_1]"> Tinggi 
                        </label>
                        &nbsp; 
                        <label>
                            <input type="radio" value="2" name="MtbsDetail[P][4][0_1]"> Rendah 
                        </label>
                        &nbsp; 
                        <label>
                            <input type="radio" value="3" name="MtbsDetail[P][4][0_1]"> Non Endemis 
                        </label>
                    </div>
                </div>
                <div class="col-sm-12"> Jika daerah non endemis, tanyakan riwayat bepergian ke daerah endemis malaria dalam<br> 2 minggu terakhir dan tentukan daerah endemis sesuai tempat yang dikunjungi. </div>
                <div class="col-sm-12"> Sudah berapa lama ?&nbsp;<input class="text-field" size="2" name="MtbsDetail[P][4][0_2]">&nbsp;hari </div>
                <div class="col-sm-12">
                    <label>
                        <input type="checkbox" value="1" name="MtbsDetail[P][4][0_3]"> Jika lebih dari 7 hari, apakah demam terjadi setiap hari? 
                    </label> 
                </div>
                <div class="col-sm-12"> 
                    <input type="checkbox" value="1" name="MtbsDetail[P][4][0_4]"> Apakah pernah sakit malaria atau minum obat malaria? </div>
                <div class="col-sm-12"> 
                    <input type="checkbox" value="1" name="MtbsDetail[P][4][0_5]"> Apakah anak sakit campak dalam 3 bulan terakhir? </div>
                <div class="col-sm-12"> 
                    <input type="checkbox" value="1" name="MtbsDetail[P][4][0_6]"> Lihat dan periksa adanya kaku kuduk </div>
                <div class="col-sm-12"> 
                    <input type="checkbox" value="1" name="MtbsDetail[P][4][0_7]"> Lihat adanya penyebab lain dari demam </div>
                <div class="col-sm-12">
                    <li>Lihat adanya tanda-tanda CAMPAK saat ini:</li>
                </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][4][0_8]"> Ruam kemerahan di kulit yang menyeluruh DAN </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][4][0_9]"> Salah satu dari: batuk, pilek atau mata merah. </div>
                <div class="col-sm-12"> LAKUKAN TES MALARIA jika tidak ada klasifikasi penyakit berat :</div>
                <div class="col-sm-12">
                    <li>Pada semua kasus demam di daerah Endemis Malaria tinggi</li>
                </div>
                <div class="col-sm-12">
                    <li>Jika tidak ditemukan penyebab pasti demam di daerah Endemis Malaria rendah</li>
                </div>
            </div>
        </td>
        <td>
            <div class="input-group line_4_hidden" style="">
                <label>
                    <input type="radio" value="1" name="MtbsDetail[P][4][0_keterangan]" data-id="ya"> Ya <br>
                </label>
                <label>
                    <input type="radio" value="2" name="MtbsDetail[P][4][0_keterangan]" data-id="tidak"> Tidak
                </label>
            </div>
        </td>
        <td>
            <select style="" class="form-control form-control-sm line_4_hidden" id="klasifikasi_4" name="MtbsDetail[K][4][0_klasifikasi]">
                <option value="-"> - PILIH - </option>
                <option value="11">Penyakit berat dengan demam</option>
                <option value="12">Penyakit malaria</option>
                <option value="13">Demam mungkin bukan malaria</option>
                <option value="31">Penyakit berat dengan demam</option>
                <option value="32">Demam bukan malaria</option>
            </>
        </td>
        <td>
            <div style="" class="line_4_hidden">
                <p>Lakukan Tes Malaria, hasil :</p>
                <p>RDT (+)/(-)</p>
                <input type="text" name="MtbsDetail[X][4][1_text]">
                <p>Mikroskopis :</p>
                <input type="text" name="MtbsDetail[X][4][2_text]">
            </div>
            <br><br><br>
            <textarea style="" class="form-control input-sm line_4_hidden" name="MtbsDetail[X][4][0_text]" rows="3"></textarea>
        </td>
    </tr>
    <tr class="line_5">
        <input type="hidden" name="MtbsDetail[rows][5][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>Jika anak sakit campak saat ini atau dalam 3 bulan terakhir</b></div>
            <div class="input-group" id="tanda4ya">
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][5][0_1]"> Lihat adanya luka di mulut</div>
                <div class="col-sm-12"> Jika ya, apakah <input type="checkbox" value="1" name="MtbsDetail[P][5][0_2]"> dalam <input type="checkbox" value="1" name="MtbsDetail[P][5][0_3]"> atau luas</div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][5][0_4]"> Lihat adanya nanah di mata</div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][5][0_5]"> Lihat adanya kekeruhan di kornea</div>
            </div>
        </td>
        <td>
            <select class="form-control form-control-sm" id="klasifikasi_5" name="MtbsDetail[K][5][0_klasifikasi]">
                <option value="-"> - PILIH - </option>
                <option value="1">Campak komplikasi berat</option>
                <option value="2">Campak komplikasi pada mata</option>
                <option value="3">Campak komplikasi pada mulut</option>
                <option value="4">Campak komplikasi pada mata dan mulut</option>
                <option value="5">Campak</option>
            </>
        </td>
        <td>
            <textarea class="form-control input-sm" name="MtbsDetail[X][5][0_text]" rows="3"></textarea>
        </td>

    </tr>
    <tr class="line_6">
        <input type="hidden" name="MtbsDetail[rows][6][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>Klasifikasikan demam berdarah jika demam 2 hari sampai dengan 7 hari</b></div>
            <div class="input-group">
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_1]"> Apakah demam mendadak tinggi dan terus-menerus? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_2]"> Apakah ada bintik merah di kulit atau perdarahan hidung/gusi? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_3]"> Apakah anak sering muntah? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_4]"> Apakah muntah dengan darah atau seperti kopi? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_5]"> Apakah berak berwarna hitam? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_6]"> Apakah nyeri ulu hati atau gelisah? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_7]"> Perhatikan tanda-tanda : Ujung ekstremitas teraba dingin DAN nadi sangat lemah atau tidak teraba. </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_8]"> Lihat adanya perdarahan dari hidung/gusi atau bintik perdarahan di kulit (petekie) </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_10]"> Jika petekie sedikit DAN tidak ada tanda lain dari DBD, lakukan uji torniket, jika mungkin.<br> 
                    Hasil uji torniket : 
                    Positif <input type="radio" value="1" name="MtbsDetail[P][6][0_12]">
                    Negatif <input type="radio" value="2" name="MtbsDetail[P][6][0_12]">
                </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][6][0_11]"> Jika petekie sedikit TANPA tanda lain dari DBD DAN uji torniket tidak dapat dilakukan, klasiﬁkasikan sebagai DBD. </div>
            </div>
        </td>
        <td>
            <select class="form-control form-control-sm" id="klasifikasi_6" name="MtbsDetail[K][6][0_klasifikasi]">
                <option value="-"> - PILIH - </option>
                <option value="1">Penyakit DBD</option>
                <option value="2">Demam mungkin DBD</option>
                <option value="3">Demam mungkin bukan DBD</option>
            </select>
        </td>
        <td>
            <textarea class="form-control form-control-sm" name="MtbsDetail[X][6][0_text]" rows="3"></textarea>
        </td>

    </tr>
    <tr class="line_7">
        <input type="hidden" name="MtbsDetail[rows][7][0]">
        <td>
            <div class="col-sm-12 form-group"><b>Apakah anak mempunyai masalah telinga?</b></div>
            <div class="input-group line_7_action_hidden">
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][7][0_1]"> Apakah ada nyeri telinga? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][7][0_2]"> Adakah rasa penuh di telinga? </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][7][0_3]"> Adakah cairan/nanah keluar dari telinga? </div>
                <div class="col-sm-12"> Jika ya, sudah berapa lama? <input class="text-field" size="2" name="MtbsDetail[P][7][0_4]"> Hari </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][7][0_5]"> Lihat adanya cairan atau nanah keluar dari telinga </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][7][0_6]"> Raba adanya pembengkakan yang nyeri di belakang telinga </div>
            </div>
        </td>
        <td>
            <div class="input-group">
                <label>
                    <input type="radio" class="line_7_action" value="1" name="MtbsDetail[P][7][0_keterangan]" data-id="ya"> Ya <br>
                </label>
                <label>
                    <input type="radio" class="line_7_action" value="2" name="MtbsDetail[P][7][0_keterangan]" data-id="tidak"> Tidak
                </label>
            </div>
        </td>
        <td>
            <select  class="form-control form-control-sm line_7_action_hidden" name="MtbsDetail[K][7][0_klasifikasi]">
                <option value="-"> - PILIH - </option>
                <option value="1">Mastoiditis</option>
                <option value="2">Infeksi telinga akut</option>
                <option value="3">Infeksi telinga kronis</option>
                <option value="4">Tidak ada infeksi telinga</option>
            </select>
        </td>
        <td>
            <textarea  class="form-control input-sm line_7_action_hidden" name="MtbsDetail[X][7][0_text]" rows="3"></textarea>
        </td>
    </tr>
    <tr>
        <input type="hidden" name="MtbsDetail[rows][8][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>Memeriksa status gizi</b></div>
            <div class="input-group">
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][8][0_1]"> Lihat apakah anak tampak sangat kurus. </div>
                <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][8][0_2]"> Lihat dan raba adanya pembengkakan di kedua punggung kaki/tangan </div>
                <div class="col-sm-12"> Tentukan berat badan (BB) menurut panjang badan (PB) atau tinggi badan (TB) </div>
                <div class="col-sm-12">
                    <div class="radio-inline">
                        <input type="radio" value="1" name="MtbsDetail[P][8][0_3]"> BB menurut PB atau TB : &lt; -3 SD <input class="form-control input-sm" name="MtbsDetail[P][8][3_0]" type="text" value="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio-inline">
                        <input type="radio" value="2" name="MtbsDetail[P][8][0_3]"> BB menurut PB atau TB : ≥ -3 SD - &lt; -2 SD <input class="form-control input-sm" name="MtbsDetail[P][8][3_1]" type="text" value="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio-inline">
                        <input type="radio" value="3" name="MtbsDetail[P][8][0_3]"> BB menurut PB atau TB : ≥ -2 SD <input class="form-control input-sm" name="MtbsDetail[P][8][3_2]" type="text" value="">
                    </div>
                </div>
                <div class="col-sm-12"> Tentukan lingkar lengan atas (LiLA) untuk anak umur 6 bulan atau lebih </div>
                <div class="col-sm-12">
                    <div class="radio-inline">
                        <input type="radio" value="1" name="MtbsDetail[P][8][0_4]"> LiLA &lt; 11,5 cm <input class="form-control input-sm" name="MtbsDetail[P][8][4_0]" type="text" value="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio-inline">
                        <input type="radio" value="2" name="MtbsDetail[P][8][0_4]"> LiLA 11,5 cm - 12,5 cm <input class="form-control input-sm" name="MtbsDetail[P][8][4_1]" type="text" value="">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="radio-inline">
                        <input type="radio" value="3" name="MtbsDetail[P][8][0_4]"> LiLA ≥ 12,5 cm <input class="form-control input-sm" name="MtbsDetail[P][8][4_2]" type="text" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-12"> Jika BB menurut PB atau TB &lt; -3 SD ATAU Lingkar Lengan Atas &lt; 11,5 cm <br> periksa komplikasi medis : </div>
            <div class="col-sm-12">
                <div class="radio-inline">
                    <input type="radio" value="1" name="MtbsDetail[P][8][0_5]"> Apakah ada tanda bahaya umum?
                </div>
            </div>
            <div class="col-sm-12">
                <div class="radio-inline">
                    <input type="radio" value="2" name="MtbsDetail[P][8][0_5]"> Apakah ada klasiﬁkasi berat?
                </div>
            </div>
            <div class="col-sm-12"> Jika tidak ada komplikasi medis, nilai pemberian ASI pada anak umur &lt; 6 bulan </div>
            <div class="col-sm-12"> <input type="checkbox" value="1" name="MtbsDetail[P][8][0_6]"> Apakah anak memiliki masalah pemberian ASI? </div>

        </td>
        <td>
            <select class="form-control form-control-sm" id="klasifikasi_8" name="MtbsDetail[K][8][0_klasifikasi]">
                <option value="-"> - PILIH - </option>
                <option value="1">Gizi buruk dengan komplikasi</option>
                <option value="2">Gizi buruk tanpa komplikasi</option>
                <option value="3">Gizi kurang</option>
                <option value="4">Gizi baik</option>
            </select>
        </td>
        <td>
            <textarea class="form-control form-control-sm" name="MtbsDetail[X][8][0_text]" rows="3"></textarea>
        </td>
    </tr>
    <tr>
        <input type="hidden" name="MtbsDetail[rows][9][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>Memeriksa anemia</b></div>
            <div class="input-group">
                <div class="col-sm-12"> Lihat adanya kepucatan pada telapak tangan : </div>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="radio" value="1" name="MtbsDetail[P][9][0_1]"> Sangat pucat
                        <input type="radio" value="2" name="MtbsDetail[P][9][0_1]"> Agak pucat
                    </div>
                </div>
            </div>
        </td>
        <td>
            <select class="form-control form-control-sm" id="klasifikasi_9" name="MtbsDetail[K][9][0_klasifikasi]">
                <option value="-"> - PILIH - </option>
                <option value="2">Anemia </option>
                <option value="3">Anemia berat</option>
                <option value="1">Tidak anemia</option>
            </select>
        </td>
        <td>
            <textarea class="form-control form-control-sm" name="MtbsDetail[X][9][0_text]" rows="3"></textarea>
        </td>
    </tr>
    <tr>
        <input type="hidden" name="MtbsDetail[rows][14][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>MEMERIKSA STATUS HIV</b></div>
            <div class="input-group">
                <div class="col-sm-12"> Jika anak menderita pneumonia berulang atau diare persisten/berulang atau gizi buruk atau Anemia Berat. </div>
                <div class="col-sm-12">
                    <hr>
                    <strong> Apakah anak pernah tes HIV? <br></strong>
                    <input type="radio" name="MtbsDetail[P][14][0_1]" value="1">Ya &nbsp; &nbsp;
                    <input type="radio" name="MtbsDetail[P][14][0_1]" value="2">Tidak
                </div>
                <div class="col-sm-12">
                    Jika ya, kapan? <br>
                    <input type="date" class="text-field" name="MtbsDetail[P][14][0_4]" size="20">
                    <br> Apa hasilnya ? <br>
                    <input type="radio" name="MtbsDetail[P][14][0_5]" value="1">Positif &nbsp; &nbsp;
                    <input type="radio" name="MtbsDetail[P][14][0_5]" value="2">Negatif
                </div>
                <div class="col-sm-12">
                    <hr>
                    <strong>Apakah ibu pernah diperiksa HIV?</strong> <br>
                    <input type="radio" name="MtbsDetail[P][14][0_3]" value="1">Ya &nbsp; &nbsp;
                    <input type="radio" name="MtbsDetail[P][14][0_3]" value="2">Tidak
                </div>
                <div class="col-sm-12">
                    Jika ya, kapan? <br>
                    <input type="date" class="text-field" name="MtbsDetail[P][14][0_10]" size="20">
                    <br> Apa hasilnya ? <br>
                    <input type="radio" name="MtbsDetail[P][14][0_11]" value="1">Positif &nbsp; &nbsp;
                    <input type="radio" name="MtbsDetail[P][14][0_11]" value="2">Negatif
                </div>
                <div class="col-sm-12">
                    <hr>
                    <strong> Apakah anak memiliki orang tua kandung dan / atau saudara kandung : </strong>
                </div>
                <div class="col-sm-12">
                    Yang terdiagnosis HIV? <br>
                    <input type="radio" name="MtbsDetail[P][14][0_6]" value="1">Ya &nbsp; &nbsp;
                    <input type="radio" name="MtbsDetail[P][14][0_6]" value="2">Tidak
                </div>
                <div class="col-sm-12">
                    Yang meninggal karena penyebab tidak diketahui tapi masih mungkin karena HIV?<br>
                    <input type="radio" name="MtbsDetail[P][14][0_7]" value="1">Ya &nbsp; &nbsp;
                    <input type="radio" name="MtbsDetail[P][14][0_7]" value="2">Tidak
                </div>

                <div class="col-sm-12">
                    Lihat, adakah bercak putih di Rongga mulut ? <br>
                    <input type="radio" name="MtbsDetail[P][14][0_9]" value="1">Ya &nbsp; &nbsp;
                    <input type="radio" name="MtbsDetail[P][14][0_9]" value="2">Tidak
                </div>
            </div>
        </td>
        <td>
            <select class="form-control form-control-sm" name="MtbsDetail[K][14][0_klasifikasi]" id="klasifikasi_14">
                <option value="-"> - PILIH - </option>
                <option value="2">Terpajan HIV</option>
                <option value="3">Diduga Terinfeksi HIV</option>
                <option value="4">Infeksi HIV Terkonfirmasi</option>
                <option value="1">Mungkin Bukan Infeksi HIV</option>
            </select>
        </td>
        <td>
            <textarea class="form-control form-control-sm" name="MtbsDetail[X][14][0_text]" rows="3"></textarea>
        </td>

    </tr>

    <tr>
        <input type="hidden" name="MtbsDetail[rows][10][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>Memeriksa status imunisasi</b><br>(PILIH imunisasi yang dibutuhkan hari ini)</div>
            <div class="input-group">
                <div class="col-sm-12"> 
                                                                        <label>
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="hb_0" name="MtbsDetail[P][10][0_1]"> HB-0 
                        </label>
                                                                </div>
                <div class="col-sm-12">
                                                                        <label>
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="ipv" name="MtbsDetail[P][10][0_2]"> IPV 
                        </label>
                                                                </div>
                <div class="col-sm-12"> 
                                                                        <label>
                        <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="bgc" name="MtbsDetail[P][10][0_3]"> BCG 
                        </label>
                                                                </div>
                <div class="col-sm-12">
                                                                        <label> 
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="campak" name="MtbsDetail[P][10][0_4]"> Campak 
                        </label>
                                                                </div>
                <div class="col-sm-12">
                                                                        <label> 
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="campak_lan" name="MtbsDetail[P][10][0_5]"> Campak (Lanjutan) 
                        </label>
                                                                </div>
                <div class="col-sm-12"> 
                                                                        <label>
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="hib_1" name="MtbsDetail[P][10][0_6]"> DPT-HB-Hib 1 
                        </label>
                                                                </div>
                <div class="col-sm-12"> 
                                                                    <label>
                        <span class="checkmark"></span>
                        <input type="checkbox" value="1" id="hib_2" name="MtbsDetail[P][10][0_7]"> DPT-HB-Hib 2 
                    </label>
                                                                </div>
                <div class="col-sm-12"> 
                                                                        <label>
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="hib_3" name="MtbsDetail[P][10][0_8]"> DPT-HB-Hib 3 
                        </label>
                                                                </div>
                <div class="col-sm-12"> 
                                                                        <label>
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="hib_lan" name="MtbsDetail[P][10][0_9]"> DPT-HB-Hib (Lanjutan) 
                        <label>
                                                                </label></label></div>
                <div class="col-sm-12"> 
                                                                    <label>
                        <span class="checkmark"></span>
                        <input type="checkbox" value="1" id="polio_1" name="MtbsDetail[P][10][0_10]"> Polio-1 
                    </label>
                                                                </div>
                <div class="col-sm-12"> 
                                                                        <label>
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="polio_2" name="MtbsDetail[P][10][0_11]"> Polio-2 
                        </label>
                                                                </div>
                <div class="col-sm-12"> 
                                                                        <label>
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="polio_3" name="MtbsDetail[P][10][0_12]"> Polio-3 
                        </label>
                                                                </div>
                <div class="col-sm-12">
                                                                        <label> 
                            <span class="checkmark"></span>
                            <input type="checkbox" value="1" id="polio_4" name="MtbsDetail[P][10][0_13]"> Polio-4 
                        </label>
                                                                </div>
            </div>
        </td>
        <td></td>
        <td>
            <div class="col-sm-12 form-group"><b style="vertical-align:top !important;">Imunisasi yang diberikan hari ini</b></div>
            <div class="input-group">
                <div class="col-sm-12"> 
                    <label style="display:none;" id="hb_0_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_1]"> HB-0 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="ipv_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_2]"> IPV 
                    </label>
                </div>
                <div class="col-sm-12">
                    <label style="display:none;" id="bgc_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_3]"> BCG 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="campak_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_4]"> Campak 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="campak_lan_hidden">
                        <input type="checkbox" value="1" id="campak_lan_hidden" name="MtbsDetail[T][10][0_5]"> Campak (Lanjutan) 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="hib_1_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_6]"> DPT-HB-Hib 1 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="hib_2_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_7]"> DPT-HB-Hib 2 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="hib_3_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_8]"> DPT-HB-Hib 3 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="hib_lan_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_9]"> DPT-HB-Hib (Lanjutan) 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="polio_1_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_10]"> Polio-1 
                    </label>
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="polio_2_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_11]"> Polio-2 
                    </label>
                </div>
                <div class="col-sm-12">
                    <label style="display:none;" id="polio_3_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_12]"> Polio-3 
                    </label> 
                </div>
                <div class="col-sm-12"> 
                    <label style="display:none;" id="polio_4_hidden">
                        <input type="checkbox" value="1" name="MtbsDetail[T][10][0_13]"> Polio-4 
                    </label>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <input type="hidden" name="MtbsDetail[rows][11][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>Memeriksa pemberian vitamin A</b></div>
            <div class="col-sm-12 form-group"><b>Dibutuhkan vitamin A ?</b></div>
            <div class="input-group">
                <label>
                    <input type="radio" value="1" name="MtbsDetail[P][11][0_1]"> Ya <br>
                </label>
                <label>
                    <input type="radio" value="2" name="MtbsDetail[P][11][0_1]"> Tidak
                </label>
            </div>
        </td>
        <td>
        </td>
        <td>
            <div class="col-sm-12 form-group"><b>Jumlah Dosis Vitamin</b></div>
            <textarea class="form-control input-sm" name="MtbsDetail[X][11][0_text]" rows="3"></textarea>
        </td>

    </tr>
    <tr>
        <input type="hidden" name="MtbsDetail[rows][12][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>Menilai masalah / keluhan lain</b></div>
            <textarea class="form-control input-sm" rows="3" name="MtbsDetail[P][12][0_1]"></textarea>
        </td>
        <td></td>
        <td>
            <textarea class="form-control input-sm" rows="3" id="tindakan_masalah_lain" name="MtbsDetail[X][12][0_text]"></textarea>
        </td>
    </tr>
    <tr>
        <input type="hidden" name="MtbsDetail[rows][13][0]">
        <td colspan="2">
            <div class="col-sm-12 form-group"><b>LAKUKAN PENILAIAN PEMBERIAN MAKAN</b></div>
            <div class="input-group">
                <div class="col-sm-12">
                  <input type="checkbox" value="1" name="MtbsDetail[P][13][0_14]">Jika anak &lt; 2 tahun
                  <br>
                  <input type="checkbox" value="2" name="MtbsDetail[P][13][0_15]">Giji Kurus
                  <br>
                  <input type="checkbox" value="3" name="MtbsDetail[P][13][0_16]">Anemia
                  <br>
                  <input type="checkbox" value="4" name="MtbsDetail[P][13][0_17]">anak tidak akan dirujuk segera
                </div>
                <div class="col-sm-12">
                  <br>
                    Apakah ibu menyusui anak ini?
                </div>
                <div class="col-sm-12">
                    <input type="radio" value="1" name="MtbsDetail[P][13][0_2]"> Ya
                    <input type="radio" value="2" name="MtbsDetail[P][13][0_2]"> Tidak
                    <div> Jika ya, berapa kali dalam 24jam? <input type="number" min="1" maxlength="3" class="text-field" name="MtbsDetail[P][13][0_3]" size="2"> kali </div>
                </div>
                <div class="col-sm-12">
                    Apakah menyusui juga di malam hari?
                </div>
                <div class="col-sm-12">
                    <input type="radio" value="1" name="MtbsDetail[P][13][0_4]"> Ya
                    <input type="radio" value="2" name="MtbsDetail[P][13][0_4]"> Tidak
                </div>

                <div class="col-sm-12">
                    Apakah anak mendapat makanan/minuman lain?
                </div>
                <div class="col-sm-12">
                    <input type="radio" value="1" name="MtbsDetail[P][13][0_5]"> Ya
                    <input type="radio" value="2" name="MtbsDetail[P][13][0_5]"> Tidak
                </div>
                <div class="col-sm-12"> Jika ya, makanan atau minuman apa? <input class="text-field" name="MtbsDetail[P][13][0_6]"> </div>
                <div class="col-sm-12"> Berapa kali sehari? <br><input class="text-field" type="number" min="1" maxlength="3" name="MtbsDetail[P][13][0_7]" size="2"> kali </div>
                <div class="col-sm-12"> Alat apa yang digunakan untuk memberi makan / minum anak? <br><input class="text-field" name="MtbsDetail[P][13][0_8]"> </div>
                <div class="col-sm-12"> Jika anak GIZI KURUS : </div>
                <div class="col-sm-12"> Berapa banyak makanan / minuman yang diberikan pada anak? <br><input class="text-field" type="number" min="1" maxlength="3" name="MtbsDetail[P][13][0_9]" size="3"> </div>

                <div class="col-sm-12">
                    Apakah anak mendapat makanan tersendiri?
                </div>
                <div class="col-sm-12">
                    <input type="radio" value="1" name="MtbsDetail[P][13][0_10]"> Ya
                    <input type="radio" value="2" name="MtbsDetail[P][13][0_10]"> Tidak
                </div>
                <div class="col-sm-12"> Siapa yang memberi makan dan bagaimana caranya? <br> <input class="text-field" name="MtbsDetail[P][13][0_11]"> </div>
                <div class="col-sm-12"> Selama sakit ini apakah ada perubahan pemberian makan pada anak? 
                    <input type="radio" value="1" name="MtbsDetail[P][13][0_13]"> Ya
                    <input type="radio" value="2" name="MtbsDetail[P][13][0_13]"> Tidak
                </div>
                <div class="col-sm-12"> Jika ya, bagaimana? <br><input class="text-field" name="MtbsDetail[P][13][0_12]"> </div>
            </div>
        </td>
        <td>
            &nbsp;
        </td>
        <td>
            <textarea class="form-control input-sm" rows="3" name="MtbsDetail[X][13][0_text]"></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td>
            <div class="col-sm-12">
                Nasihati kapan kembali segera <br>
                Kunjungan ulang <br>
                <input type="text" class="text-field" name="Mtbs[kunjungan_ulang]" value="" size="5"> Hari
            </div>
        </td>
    </tr>
</tbody>