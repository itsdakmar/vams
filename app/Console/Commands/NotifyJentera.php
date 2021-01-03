<?php

namespace App\Console\Commands;

use App\Mail\NotificationDayBeforeMail;
use App\Mail\NotifyKetuaBalaiMail;
use App\Models\ServiceHistory;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Sms\SmsGateway;

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
        //Notice day before
        $notices = ServiceHistory::whereDate('tarikh', Carbon::today()->addDay())
            ->with('vehicle','vehicle.office.users')->get();

        if($notices->count() > 0){
            foreach ($notices as $notice){

                Mail::to($notice->vehicle->office->getKetuaBalaiForNotify->pluck('email'))
                    ->send(new NotifyKetuaBalaiMail($notice));

                Mail::to($notice->vehicle->office->getPegawaiJenteraForNotify->pluck('email'))
                    ->send(new NotificationDayBeforeMail($notice));

                $this->configSms($notice);
            }
        }

        $notices_2 = ServiceHistory::whereDate('tarikh', Carbon::today())
            ->where('status', 'confirmation')
            ->with('vehicle','vehicle.office.users')->get();

        if($notices_2->count() > 0){
            foreach ($notices_2 as $notice_2){

                Mail::to($notice_2->vehicle->office->getKetuaBalaiForNotify->pluck('email'))
                    ->send(new NotifyKetuaBalaiMail($notice_2));

                Mail::to($notice_2->vehicle->office->getPegawaiJenteraForNotify->pluck('email'))
                    ->send(new NotificationDayBeforeMail($notice_2));

                $this->configSms($notice_2);
            }
        }
    }

    public function configSms($notice){
        $phones = $notice->vehicle->office->getUsersForNotify->pluck('phone')->implode(';');
        $no_kenderaan = $notice->vehicle->no_kenderaan;
        $tarikh = $notice->tarikh->format('d/m/Y');

//        $destination = urlencode($phones);
        $destination = urlencode('0126360644;0179743007');
        $message = "Perhatian!, Jentera untuk $no_kenderaan perlu di selenggara pada tarikh $tarikh. Sekian Terima Kasih, Vehicle Alert Management System. JBPM Melaka";
        $message = html_entity_decode($message, ENT_QUOTES, 'utf-8');
        $message = urlencode($message);
        $username = urlencode("vams");
        $password = urlencode("4o3]TK!Xu4tE4g");
        $sender_id = urlencode("VAMS");
        $agreed = urlencode("YES");
        $type = 1;
        $fp = "https://smsportal.exabytes.my/isms_send.php";
        $fp .= "?un=$username&pwd=$password&agreedterm=$agreed&dstno=$destination&msg=$message&type=$type&sendid=$sender_id";

        $this->smsCurl($fp);
    }

    public function smsCurl($link){

        $http = curl_init($link);

        curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
        $http_result = curl_exec($http);
        $http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        curl_close($http);

        return $http_result;

    }
}
