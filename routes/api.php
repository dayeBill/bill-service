<?php

use DayeBill\BillCore\UI\Http\BillRoute;
use Illuminate\Support\Facades\Route;
use RedJasmine\User\UI\Http\User\UserRoute;

Route::group([
    'prefix' => 'login',
], function () {


    UserRoute::api();


});

Route::group([
    'prefix'     => 'bill',
    'middleware' => ['auth']
], function () {

    BillRoute::route();

});

