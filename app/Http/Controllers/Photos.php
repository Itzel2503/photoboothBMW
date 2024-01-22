<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class Photos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Obtener la imagen en formato base64
        $base64Image = $request->input('image_file');

        // Decodificar el contenido base64 y guardarlo en un archivo temporal
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        $tempPath = tempnam(sys_get_temp_dir(), 'img');
        file_put_contents($tempPath, $imageData);

        // Obtener la información necesaria del formulario
        $namePhoto = $request->input('name_photo');
        $destinationPath = $request->input('destination_path');

        // Crear una instancia de File para el archivo temporal
        $imageFile = new File($tempPath);

        // Guardar el archivo en el almacenamiento local
        Storage::disk('local')->put('/' . $namePhoto . '.jpg', file_get_contents($tempPath));


        DB::table('photos')->insert([
            'name' => $request->name_photo,
            'created_at' => Carbon::now(),
        ]);

        return redirect('/camera');
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
    public function update(Request $request, $id)
    {
        //
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
    }
}
