<?php

namespace App\Console\Commands;

use App\Models\ProjectTasks;
use Illuminate\Console\Command;

class TaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project-task:progress';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

      $tasks=  ProjectTasks::where('status',0)->get();

        foreach ($tasks as $task){
            $status = $task->status;
            if ($status<100 && $status>0){
                $task->updat([
                    'status'=> $status+1
                ]);
            }

        }
    }
}
