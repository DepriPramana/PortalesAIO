<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HaciendaController extends Controller
{
    public function index()
    {
    	# code...
    }
    public function query_example()
    {
    	$sql = DB::connection('hacienda_sqlsrv')->table('imm_reister')->select()->where('lastname', 'BREWER')->where('room', 405)->orderBy('id', 'desc')->get()->first();
    }
}
