<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\StartMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment;
use Carbon\Carbon;



class StartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $commentCount = Comment::whereDate('created_at', Carbon::today()) ->count();
        Mail::to('itagirov2024@mail.ru')->send(new StartMail($commentCount));
    }
}
