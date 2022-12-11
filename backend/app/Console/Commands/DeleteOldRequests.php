<?php

namespace App\Console\Commands;

use App\Models\Request;
use Illuminate\Console\Command;

class DeleteOldRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-old-requests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаляет старые завершенные заявки';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $requests = Request::query()
            ->where('status_id', Request::DONE)
            ->whereRaw('DATE_ADD(updated_at, INTERVAL 3 DAY) - NOW() <= 0')
            ->get();
        $count = $requests->count();
        foreach ($requests as $request){
            foreach ($request->image as $image){
                $image->delete();
            }
            $request->text->delete();
            $request->delete();
        }

        echo "Удалено '$count' заявок!".PHP_EOL;
        return Command::SUCCESS;
    }
}
