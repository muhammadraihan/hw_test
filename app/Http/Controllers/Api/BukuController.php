<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();

        return $buku;
    }

    public function pinjam()
    {
        $pinjam = Buku::where('status', '=', '1')->get();

        return $pinjam;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'kategori' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $post = Buku::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => '0'
        ]);

        try{
            $result;
            }catch(exception $e){
            return response()->json([
            'status' => false,
            'message' => $e->getMessage(),
            'data' => $post
            ]);
            }
            return response()->json([
            'status' => true,
            'message' => 'berhasil',
            'data' => $post
            ]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'judul' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $post = Buku::where('uuid', $request->uuid)->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        if(!empty('tgl_pinjam')){
            $post = Buku::where('uuid', $request->uuid)->update([
                'status' => '1'
            ]);

            try{
                $post;
                }catch(exception $e){
                return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => $post
                ]);
                }
                return response()->json([
                'status' => true,
                'message' => 'berhasil',
                'data' => $post
                ]);

        }elseif(!empty('tgl_kembali')){
            $post = Buku::where('uuid', $request->uuid)->update([
                'status' => '0'
            ]);
            try{
                $post;
                }catch(exception $e){
                return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => $post
                ]);
                }
                return response()->json([
                'status' => true,
                'message' => 'berhasil',
                'data' => $post
                ]);
        }


        try{
            $post;
            }catch(exception $e){
            return response()->json([
            'status' => false,
            'message' => $e->getMessage(),
            'data' => $post
            ]);
            }
            return response()->json([
            'status' => true,
            'message' => 'berhasil',
            'data' => $post
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Buku::where('uuid', $request->uuid)->delete();

        try{
            $post;
            }catch(exception $e){
            return response()->json([
            'status' => false,
            'message' => $e->getMessage(),
            'data' => $post
            ]);
            }
            return response()->json([
            'status' => true,
            'message' => 'berhasil',
            'data' => $post
            ]);
    }
}
