<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masuk;
use Validator;
use Storage;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['masuk'] = Masuk::where('stats',1)->get();
        return view('beken.masuk.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('beken.masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['tanggal'] = date('Y-m-d',strtotime($input['tanggal']));
        if($request->hasFile('dokumen')){
            $dokumen = $request->file('dokumen');
            $ext = $dokumen->getClientOriginalExtension();
            if($request->file('dokumen')->isValid()){
                $dokumen_name = date('YmdHis').".$ext";
                $upload_path = 'tenpureto/dokumen';
                $request->file('dokumen')->move($upload_path,$dokumen_name);
                $input['dokumen'] = $dokumen_name;
            }
        }
    	Masuk::create($input);
        return redirect('surat-masuk')->with('new','Data Baru Telah Dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['masuk'] = Masuk::findOrFail($id);
        $data['masuk']['tanggal'] = date('m/d/Y',strtotime($data['masuk']['tanggal']));
        return view('beken.masuk.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $masuk = Masuk::findOrFail($id);
        $input = $request->all();
        $input['tanggal'] = date('Y-m-d',strtotime($input['tanggal']));
        if($request->hasFile('dokumen')){
            $exist = Storage::disk('dokumen')->exists($masuk->dokumen);
            if(isset($masuk->dokumen) && $exist) {
                $delete = Storage::disk('dokumen')->delete($masuk->dokumen);
            }
            $dokumen = $request->file('dokumen');
            $ext = $dokumen->getClientOriginalExtension();
            if($request->file('dokumen')->isValid()){
                $dokumen_name = date('YmdHis').".$ext";
                $upload_path = 'tenpureto/dokumen';
                $request->file('dokumen')->move($upload_path,$dokumen_name);
                $input['dokumen'] = $dokumen_name;
            }
        }
        $masuk->update($input);
        return redirect('surat-masuk')->with('edit','Data Telah Diubah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $masuk = Masuk::findOrFail($id);
        $masuk->update(['stats' => '0']);
        return redirect('surat-masuk')->with('delete','Data Telah Dihapus.');
    }
}
