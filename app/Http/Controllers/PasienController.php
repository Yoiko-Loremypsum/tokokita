<?php
namespace App\Http\Controllers;
use App\Models\Pasien;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        $data = Pasien::all();
return view('pasien.index', compact('data'));    }
    public function create(){
        return view('Pasien.create');
    }

    public function store(Request $request)
    {
        Pasien::create($request->all());
        return redirect('/pasien');
    }
    public function edit($id)
{
    $data = Pasien::findOrFail($id);
    return view('Pasien.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $pasien = Pasien::findOrFail($id);
    $pasien->update($request->all());

    return redirect('/pasien');
}

public function destroy($id)
{
    $pasien = Pasien::findOrFail($id);
    $pasien->delete();
    return redirect('/pasien');
}
}
