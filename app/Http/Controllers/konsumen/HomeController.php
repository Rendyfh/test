<?php

namespace App\Http\Controllers\konsumen;

use App\Models\Jual;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    public function index()
    {
        $jual = Jual::whereRaw("konsumen_id=? AND status_jual<>'TIBA'
        AND status_jual<>'BATAL'", [auth()->user()->id])->first();
        return view('konsumen.home.index', compact('jual'));
    }
}
