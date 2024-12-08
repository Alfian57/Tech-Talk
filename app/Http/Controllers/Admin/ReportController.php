<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.report.index', [
            'title' => 'List Laporan',
            'reports' => Report::where('status', 'opened')->with('user')->latest()->get()
        ]);
    }

    public function show(Report $report)
    {
        return view('dashboard.pages.report.show', [
            'title' => 'Detail Laporan',
            'report' => $report
        ]);
    }

    public function close(Report $report)
    {
        $report->update(['status' => 'closed']);

        toast('Laporan berhasil ditutup', 'success');
        return redirect()->back();
    }
}
