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
use Session;
use App;

/**
 * Class DoorbellController
 * @package App\Http\Controllers
 */
class DoorbellController
{
    public function changeLocale($lang)
    {
        App::setLocale($lang);

        Session::set('locale', $lang);

//        dd(Session::get('locale'));
        return Redirect::back();
    }

    /**
     * @author Frank Wichers Schreur <f.wichers@texemus.com>
     *
     * @return mixed
     *
     */
    public function index()
    {
        return View::make('home');
    }

    public function ringForm()
    {
        return View::make('ringForm');
    }

    public function ringRing()
    {
        $user = new User();
        $user->notify(new RingRing());

        return View::make('home')->withMessage('Hallo '. Request::get('name') . ', er komt iemand naar de deur');
    }
}