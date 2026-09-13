<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Entities\Admin\Tender;
use App\Entities\Admin\Client;
use App\Notifications\TenderPublished;

class SendTenderPublishedEmails extends Command{

    protected $signature = 'tender:send-published-emails';
    protected $description = 'Send email notifications to clients when tenders are published.';

    public function __construct()
    {
        parent::__construct();
    }
 
    public function handle()
    {
        $tenders = Tender::whereNull('send_at')->where('publication_date', '<=', now())
            ->where(function ($query) {
                $query->whereNull('client_id')->orWhere(function ($subQuery) {$subQuery->whereNotNull('client_id')
                    ->whereNotNull('approved_by');});
            })->get();
    
        if (getSettingValue('is_free') == 1) {
            $clients = Client::where('active', 1)->get();
        } else {
            $clients = Client::where('active', 1)->where('end_subscription', '>=', now())->get();
        }
        foreach ($clients as $client) {
            $clientTenders = $tenders->filter(function ($tender) use ($client) {
                $hasCommonCategories = $tender->categories->pluck('id')->intersect($client->categories->pluck('id'))->isNotEmpty();
                $matchesCountry = $tender->country_id ? $tender->country_id == $client->country_id : true; // إذا لم يكن هناك بلد، تعتبر المناقصة مطابقة
                return $hasCommonCategories && $matchesCountry;
            });
            if ($clientTenders->isNotEmpty()) {
                $client->notify(new TenderPublished($clientTenders));
            }
        }
        $tenders->each(function ($tender) {
            $tender->send_at = now();
            $tender->save();
        });
    
        $this->info('Emails sent for لديك مناقصات اليوم. Total: ' . $tenders->count());
    }
        
    
}
