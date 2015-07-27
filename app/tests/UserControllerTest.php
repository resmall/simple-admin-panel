<?php

class UserControllerTest extends TestCase{
    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function testPostAuthMethod() {
        $user = "tiago";
        $password = "1234";
        // criar um usuario com os dados testados
        $response = $this->action('POST', 'UserController@postAuth', ['username' => 'tiago', 'password' => '1234']);
    }

    public function testUserAuthRouteWithoutCredentials() {
        $response = $this->action('POST', 'UserController@postAuth');
        //$crawler = $this->client->request('POST', 'user.auth');
        $this->assertRedirectedToAction('UserController@getLogin');
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testLoginForm()
    {
        // http://symfony.com/doc/current/book/testing.html
        // Esse client request provém do symfony
        $crawler = $this->client->request('GET', 'login');
        // 1 - verifica se veio o form
        // 2 - manda os dados do login e valida/autentica

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testUserLogin()
    {
        $user = new User;
        $user->username = 'admin';
        $user->password = Hash::make('admin');
        $user->email = 'admin@admin.local';
        $this->assertTrue($user->save());

        print "\nID do usuário criado :::: $user->id : $user->username : $user->password ::";

        // assert the user is not loggedin
        $this->assertFalse(Auth::check());

        $user_find = User::find($user->id);
        $this->assertTrue($user_find->id == 1); // melhorar
        $this->assertTrue(Hash::check('admin', $user_find->password));

        $this->assertTrue( Auth::validate( array(
            'username' => $user->username,
            'password' => 'admin')
        ));


        $this->assertTrue(Auth::attempt()); // if attempt returns true the user is auth

    }
}
