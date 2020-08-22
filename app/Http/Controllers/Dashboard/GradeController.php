<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\GradesExport;
use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GradeController extends Controller
{
    protected $base_view_path = 'dashboard.grades.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = request()->get('page', 1);
        $data['counter_offset'] = ($index * 20) - 20;

        $data['resources'] = Grade::with(['user', 'exam'])
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return view($this->base_view_path . 'index', $data);
    }

    /**
     * Export a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new GradesExport, 'users.xlsx');
    }
}
