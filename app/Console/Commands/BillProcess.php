<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Billings;

class BillProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bill:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Customer Bills every month';

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

        $timestamp = Carbon::now()->toDateString();
        $year = Carbon::parse($timestamp)->year;
        $month = Carbon::parse($timestamp)->month;

        $subscriberData = DB::table("subscribers")->select('client_id', 'client_name')->where('connection_status','=',1)->get()->toArray();
        $countSubscriber = DB::table("subscribers")->count();

        if ($countSubscriber == 0) {
            
        } else {
            foreach ($subscriberData as $item) {

                $clientCount = DB::table("billings")->where('client_id', "=", $item->client_id)->where('bill_month', '=', $month)->where('bill_year', '=', $year)->count();

                $billAmount=DB::table("subscribers")->select("subscribers.bill_amount")->where('client_id', "=", $item->client_id) ->first();

                $bill = "150";

                if ($clientCount === 0) {

                    $subscriber = Billings::create([
                        'client_id' => $item->client_id,
                        'client_name' => $item->client_name,
                        'bill_month' => $month,
                        'bill_year' => $year,
                        'bill_amount' => $billAmount->bill_amount,
                        'billing_status' => false,
                    ]);
                }
            }
        }

    }
}

