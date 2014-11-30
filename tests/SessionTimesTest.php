<?php

class SessionTimesTest extends TestCase {

	/** @test */
	public function it_fetches_sessions()
	{
		// act
		$response = $this->call('GET', 'api/v1/sessions');
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());

	}




}
