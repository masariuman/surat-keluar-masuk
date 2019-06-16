<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluar;
use Validator;
use Storage;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['keluar'] = keluar::where('stats',1)->get();
        return view('beken.keluar.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('beken.keluar.create');
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
                $upload_path = 'tenpureto/dokumen_keluar';
                $request->file('dokumen')->move($upload_path,$dokumen_name);
                $input['dokumen'] = $dokumen_name;
            }
        }
    	Keluar::create($input);
        return redirect('surat-keluar')->with('new','Data Baru Telah Dibuat.');
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
        $data['keluar'] = Keluar::findOrFail($id);
        $data['keluar']['tanggal'] = date('m/d/Y',strtotime($data['keluar']['tanggal']));
        return view('beken.keluar.edit', $data);

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
        $keluar = Keluar::findOrFail($id);
        $input = $request->all();
        $input['tanggal'] = date('Y-m-d',strtotime($input['tanggal']));
        if($request->hasFile('dokumen')){
            $exist = Storage::disk('dokumen_keluar')->exists($keluar->dokumen);
            if(isset($keluar->dokumen) && $exist) {
                $delete = Storage::disk('dokumen_keluar')->delete($keluar->dokumen);
            }
            $dokumen = $request->file('dokumen');
            $ext = $dokumen->getClientOriginalExtension();
            if($request->file('dokumen')->isValid()){
                $dokumen_name = date('YmdHis').".$ext";
                $upload_path = 'tenpureto/dokumen_keluar';
                $request->file('dokumen')->move($upload_path,$dokumen_name);
                $input['dokumen'] = $dokumen_name;
            }
        }
        $keluar->update($input);
        return redirect('surat-keluar')->with('edit','Data Telah Diubah.');

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
        $keluar = Keluar::findOrFail($id);
        $keluar->update(['stats' => '0']);
        return redirect('surat-keluar')->with('delete','Data Telah Dihapus.');
    }
}
