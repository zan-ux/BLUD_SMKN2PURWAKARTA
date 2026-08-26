<?php
// app/Traits/LogsActivity.php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            $model->logActivity('created', "{$model->getTable()} record created");
        });

        static::updated(function ($model) {
            $model->logActivity('updated', "{$model->getTable()} record updated");
        });

        static::deleted(function ($model) {
            $model->logActivity('deleted', "{$model->getTable()} record deleted");
        });
    }

    public function logActivity($action, $description = null)
    {
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'action' => $action,
                'description' => $description ?? "{$this->getTable()} record {$action}",
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        }
    }
}