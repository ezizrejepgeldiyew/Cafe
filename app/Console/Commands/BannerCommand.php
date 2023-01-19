<?php

namespace App\Console\Commands;

use App\Models\Banner;
use DateTimeZone;
use Illuminate\Console\Command;

class BannerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'banner:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Banner Delete';

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
        $la_time = new DateTimeZone('Asia/Ashgabat');
        $date = now()->setTimezone($la_time);
        $date = $date->format('Y-m-d H:m:s');
        $bool = (bool)Banner::whereStatus('success')->where('date','<=', $date)->delete();
         return ($bool == true) ? "Success" : "not";

    }
}
