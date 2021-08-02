<?php

namespace App\Console\Commands;

use App\Mail\ReportSeller;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailyReportEmailSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mailReport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to send email daily sales report';

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
        Mail::to('mail_teste@tray.net.br')->send(new ReportSeller());
    }
}
