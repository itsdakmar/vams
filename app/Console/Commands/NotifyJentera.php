<?php

namespace App\Console\Commands;

use App\Mail\NotificationDayBeforeMail;
use App\Models\ServiceHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyJentera extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify User For Service Vehicles';

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
        $notices = ServiceHistory::whereDate('tarikh', Carbon::today()->addDay())
            ->with('vehicle','vehicle.office.users')->get();

        if($notices->count() > 0){
            foreach ($notices as $notice){

                Mail::to($notice->vehicle->office->users->pluck('email'))
                    ->send(new NotificationDayBeforeMail($notice));
            }
        }
    }
}
