<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('agendas', [
            'agendas' => Agenda::orderBy('agenda_date', 'desc')
                ->paginate(12)
        ]);
    }
}
