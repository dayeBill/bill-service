<?php

use DayeBill\BillCore\UI\Http\BillRoute;
use Illuminate\Support\Facades\Route;
use RedJasmine\User\UI\Http\User\UserRoute;

UserRoute::api();

Route::group([
    'prefix'     => 'bill',
    'middleware' => ['auth:api']
], function () {

    BillRoute::route();

});

