<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\PostComment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClearOldDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete posts and comments older than 3 hours';

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
        $date  = Carbon::now()
            ->subHours(3);
        
        Post::where('created_at', '<=', $date)
            ->update([
                'is_in_trash' => true
            ]);
        
        PostComment::where('created_at', '<=', $date)
            ->update([
                'is_in_trash' => true
            ]);
        
        return 0;
    }
}
