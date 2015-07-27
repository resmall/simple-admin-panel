<?php
/**
 * Informações uteis sobre como testar no laravel, links:
 * Asserts http://laravel.com/api/4.2/Illuminate/Foundation/Testing/AssertionsTrait.html
 */

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

	public function setUp()
	{
	    parent::setUp(); // Don't forget this!
	    $this->prepareForTests();
	    $this->resetEvents();
	}

	public function prepareForTests(){
		Artisan::call('migrate');

		/* This method will prepare the database, and change the status of Laravel's Mailer class to pretend. 
		 * This way, the Mailer will not send any real email when running tests. Instead, it will log 
		 * the "sent" messages.  */
		Mail::pretend(true);
	}

	/**
	 * Permite o uso do Eloquent nos testes, modelos devem ser informados
	 *
	 * @return void
	 * @author Tiago R. Lammers
	 **/
	private function resetEvents()
	{
        $models = array('User');

        // Reset each model event listeners.
        foreach ($models as $model) {

            // Flush any existing listeners.
            call_user_func(array($model, 'flushEventListeners'));

            // Reregister them.
            call_user_func(array($model, 'boot'));
        }
    }

}
