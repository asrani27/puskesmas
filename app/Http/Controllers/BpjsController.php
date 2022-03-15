<?php

namespace App\Http\Controllers;

use App\AkunBpjs;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BpjsController extends Controller
{
    public function index()
    {
        if (AkunBpjs::first() == null) {
            $data = null;
        } else {
            $data = AkunBpjs::first();
        }

        return view('master.bpjs.index', compact('data'));
    }

    public function store(Request $req)
    {
        if (AkunBpjs::first() == null) {
            $n = new AkunBpjs;
            $n->cons_id = $req->cons_id;
            $n->secret_key = $req->secret_key;
            $n->username_pcare = $req->username_pcare;
            $n->password_pcare = $req->password_pcare;
            $n->save();
            toast('Berhasil Disimpan', 'success');
            return redirect('/pengaturan/akun_bpjs');
        } else {
            $u = AkunBpjs::first();
            $u->cons_id = $req->cons_id;
            $u->secret_key = $req->secret_key;
            $u->username_pcare = $req->username_pcare;
            $u->password_pcare = $req->password_pcare;
            $u->save();
            toast('Berhasil Diupdate', 'success');
            return redirect('/pengaturan/akun_bpjs');
        }
    }

    public function testConnect()
    {
        if (AkunBpjs::first() == null) {
            toast('Data Akun Kosong, Harap Di isi', 'info');
            return back();
        } else {

            $base_url = "https://new-api.bpjs-kesehatan.go.id/pcare-rest-v3.0/dokter/0/3";
            $akunBPJS = AkunBpjs::first();
            $cons_id = $akunBPJS->cons_id;
            $secret_key = $akunBPJS->secret_key;

            // $client = new Client(['base_uri' => 'https://new-api.bpjs-kesehatan.go.id/pcare-rest-v3.0/']);
            // $response = $client->request('GET', '/dokter/0/3');
            // dd($response);
            date_default_timezone_set('UTC');
            $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
            $signature = hash_hmac('sha256', $cons_id . "&" . $tStamp, $secret_key, true);
            $encodedSignature = base64_encode($signature);
            $urlencodedSignature = urlencode($encodedSignature);

            $username_pcare = $akunBPJS->username_pcare;
            $password_pcare = $akunBPJS->password_pcare;
            $kdAplikasi = '095';

            $Authorization = base64_encode($username_pcare . ':' . $password_pcare . ':' . $kdAplikasi);

            $header['X-cons-id'] = $cons_id;
            $header['X-Timestamp'] = $tStamp;
            $header['X-Signature'] = $encodedSignature;
            $header['X-Authorization'] = $Authorization;

            toast('Berhasil Connect ke BPJS', 'success');
            return back();
        }
    }
}
