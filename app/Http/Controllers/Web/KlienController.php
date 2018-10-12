<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class KlienController extends Controller
{
    function __construct()
	{
		$this->page = 'klien';
	}

	function index($value='')
    {
    	return view('pages/admin/klien/index', ['page'=>$this->page]);
    }

    function set_aktif($id='', Request $request)
    {
        $klien = User::findOrFail($id);
        $klien->status = 1;
        $klien->save();

        $request->session()->flash('alert-success', 'Klien berhasil diaktifkan');
        return redirect()->route('admin.klien');
    }

    function set_suspend($id='')
    {
        $klien = User::findOrFail($id);
        $klien->status = -1;
        $klien->save();
        return "success";
    }
}
