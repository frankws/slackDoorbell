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
use Storage;

/**
 * Class DoorbellController
 * @package App\Http\Controllers
 */
class DoorbellController
{
    /**
     * @author Frank Wichers Schreur <f.wichers@texemus.com>
     *
     * @param $lang
     * @return mixed
     *
     */
    public function changeLocale($lang)
    {
        App::setLocale($lang);
        Session::set('locale', $lang);

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

    /**
     * @author Frank Wichers Schreur <f.wichers@texemus.com>
     *
     * @return View
     *
     */
    public function ringForm()
    {
        return View::make('ringForm');
    }

    /**
     * @author Frank Wichers Schreur <f.wichers@texemus.com>
     *
     * @return View
     *
     */
    public function ringRing()
    {
        if (Request::hasFile('picture')) {
            if (Request::file('picture')->isValid()) {
                $pic = Request::file('picture')->store('visitors');
            }
        }

        $user = new User();
        $user->notify(new RingRing($pic));

        return View::make('home')->withMessage('Hallo '. Request::get('name') . ', er komt iemand naar de deur');
    }
}