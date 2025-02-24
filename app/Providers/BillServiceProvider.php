<?php

namespace App\Providers;

use App\Hooks\Bills\VipBillCreateHook;
use Illuminate\Support\ServiceProvider;
use RedJasmine\Support\Facades\Hook;

class BillServiceProvider extends ServiceProvider
{
    public function register() : void
    {

    }

    public function boot() : void
    {
        Hook::register('bill-core.application.bill.command.create', VipBillCreateHook::class);
        Hook::register('bill-core.application.event.command.create', VipBillCreateHook::class);
        Hook::register('bill-core.application.contact.command.create', VipBillCreateHook::class);

        //
    }
}
