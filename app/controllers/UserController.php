<?php

class UserController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function postAuth()
    {

        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(array('username' => $username, 'password' => $password)))
        {
            return Redirect::intended(URL::route('admin'));
            //return "logou";
        } else {
            return Redirect::to(URL::route('login'))->withErrors('O usuário ou senha estão incorretos.');
            //return "eh eh"
        }
    }

    /**
     * Exibe a página de login da seção de admin
     * GET /admin/login
     *
     * @return Response
     */
    public function getLogin()
    {
        //$view_style['input']['attr'] = ['class' => 'form-control', 'required']; // $view->input->class('asda')->required()->...
        //$view_style['label']['attr'] = ['class' => 'sr-only']; // $view->label->class('sr-only')
        return View::make('login.index');
    }

}
