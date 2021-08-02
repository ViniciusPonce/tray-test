<?php

namespace App\Mail;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


class ReportSeller extends Mailable
{
    use Queueable, SerializesModels;

    private $sales;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $today = Carbon::now()->format('Y-m-d');
        $sales = Sale::whereDate('created_at', $today);

        $totalSale = $sales->sum('id');
        $totalValue = $sales->sum('sale_value');

        return $this->view('mail.ReportSeller')->with([
                                                                   'totalSale' => $totalSale,
                                                                   'totalValue' => $totalValue
                                                               ]);

//        return $this->markdown('mail.ReportSeller', compact( 'totalSale', 'totalValue'));
    }
}
