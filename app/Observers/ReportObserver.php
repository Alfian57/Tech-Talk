<?php

namespace App\Observers;

use App\Models\Report;
use App\Models\UserLog;

class ReportObserver
{
    public function created(Report $report): void
    {
        UserLog::create([
            'user_id' => $report->user_id,
            'action' => 'report-create',
            'description' => 'User melaporkan '.($report->comment_id ? 'komentar' : 'postingan').' dengan id: '.($report->comment_id ? $report->comment_id : $report->post_id),
        ]);
    }

    public function updated(Report $report): void
    {
        UserLog::create([
            'user_id' => $report->user_id,
            'action' => 'report-update',
            'description' => 'User mengubah laporan '.($report->comment_id ? 'komentar' : 'postingan').' dengan id: '.($report->comment_id ? $report->comment_id : $report->post_id),
        ]);
    }

    public function deleted(Report $report): void
    {
        UserLog::create([
            'user_id' => $report->user_id,
            'action' => 'report-delete',
            'description' => 'User menghapus laporan '.($report->comment_id ? 'komentar' : 'postingan').' dengan id: '.($report->comment_id ? $report->comment_id : $report->post_id),
        ]);
    }
}
