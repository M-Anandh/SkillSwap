<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Meeting;
use Illuminate\Support\Carbon;

class UpdateCompletedStatus extends Command
{
    protected $signature = 'update:completed-status';

    protected $description = 'Update completed status for meetings';

    public function handle()
    {
        $now = Carbon::now();

        Meeting::where('datetime', '<', $now)
            ->where('completed', false)
            ->update(['completed' => true]);

        $this->info('Completed status updated successfully.');
    }
}
