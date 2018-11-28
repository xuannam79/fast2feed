<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Model\Admin\Account;
use App\Model\Admin\Shipper;
use Illuminate\Support\Facades\DB;



class Kernel extends ConsoleKernel
{
    public function __construct(Account $account, Shipper $shipper)
    {
        $this->account = $account;
        $this->shipper = $shipper;
    }
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       // $schedule->call(function () {
            
       //          DB::table('shipper')->where('account_id', '21')->update(['active' => '0']);
       //  })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
