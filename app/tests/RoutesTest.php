<?php

class RoutesTest extends TestCase {
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testSlashRoute()
	{
		// http://symfony.com/doc/current/book/testing.html
		// Esse client request provém do symfony
		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testAdmin()
	{
		$crawler = $this->client->request('GET', 'admin');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testAdminLogin()
	{
		$crawler = $this->client->request('GET', 'login');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testUserPostAuth()
	{
		$this->call('POST', 'user/auth');
		$this->assertResponseStatus(302);
		$this->assertRedirectedTo('login');
	}

	public function testMissingRoute()
	{
		// test missing route, 404
		// more info http://stackoverflow.com/questions/20712643/when-running-unit-tests-with-laravel-how-do-you-test-your-apperror-implemen
		try {
			$this->call('GET', '/asdasdas');
		} catch (Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
			//$this->assertResponseStatus(404);
			//dd($e);
			$this->assertEquals($e->getStatusCode(), 404);
		}
		//$this->assertTrue($client->getResponse()->isNotFound());
	}

	

	
}
