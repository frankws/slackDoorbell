<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 4-11-16
 * Time: 15:51
 */

namespace App\Http\Controllers;

use App\User;
use App\Notifications\RingRing;
use Redirect;
use View;
use Request;

class DoorbellController
{
    public function ringRing()
    {
        $user = new User();
        $user->notify(new RingRing());

        return View::make('welcome')->withMessage('Hallo '. Request::get('name') . ', er komt iemand naar de deur');
    }
}