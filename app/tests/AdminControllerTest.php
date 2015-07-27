<?php 

class AdminControllerTest extends TestCase{

    public function testGetIndex(){
        $response = $this->call('GET', '/admin/index');
        $this->assertResponseOk();
    }

    

    

  
}