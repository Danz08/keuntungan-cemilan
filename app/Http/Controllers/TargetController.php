<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TargetKeuntungan;

class TargetController extends Controller
{
    public function index()
    {
        $targets = TargetKeuntungan::orderBy('periode','desc')->get();
        return view('target.index', compact('targets'));
    }

    public function create()
    {
        return view('target.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'periode' => 'required|string',
            'target_nominal' => 'required|numeric|min:0'
        ]);
        TargetKeuntungan::create($data);
        return redirect()->route('target.index')->with('success','Target dibuat');
    }

    // update status/persentase dapat dibuat sesuai kebutuhan
}
