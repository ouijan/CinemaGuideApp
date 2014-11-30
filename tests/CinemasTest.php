<?php

class CinemasTest extends TestCase {

	/** @test */
	public function it_fetches_cinemas()
	{
		// act
		$response = $this->call('GET', 'api/v1/cinemas');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		// test json response

	}

	


	/** @test */
	public function it_creates_a_new_cinema()
	{
		// act
		$response = $this->call('POST', 'api/v1/cinemas', [
			'name' => 'hoyts',
			'address' => '1234 fake st'
		]);
		
		// assert
		$this->assertEquals(201, $response->getStatusCode());
		
		
	}

	/** @test */
	public function it_fetches_a_cinema()
	{
		// act
		$response = $this->call('GET', 'api/v1/cinemas/1');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		
		
	}


	/** @test */
	public function it_returns_404_error_when_a_cinema_isnt_found()
	{
		// act
		$response = $this->call('GET', 'api/v1/cinemas/asf99');
		

		$responseSessions = $this->call('GET', 'api/v1/cinemas/asf99/sessions');
		
		// assert
		$this->assertEquals(404, $response->getStatusCode());

		$this->assertEquals(404, $responseSessions->getStatusCode());

		
		
	}

	/** @test */
	public function it_fetches_sessions_at_a_cinema()
	{
		// act
		$response = $this->call('GET', 'api/v1/cinemas/1/sessions');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		
		
	}

	/** @test */
	public function it_filters_sessions_by_date()
	{
		// act
		$response = $this->call('GET', 'api/v1/cinemas/1/sessions?date=2014');
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
		
		
	}
	
	/** @test */
	public function it_returns_error_when_failed_cinema_creation()
	{
		// act
		$response = $this->call('POST', 'api/v1/cinemas');
		
		
		// assert
		$this->assertEquals(400, $response->getStatusCode());
	}

	/** @test */
	public function it_updates_a_cinema()
	{
		// act
		$response = $this->call('PUT', 'api/v1/cinemas/1', [
			'id' => 1,
			'name' => 'hoyts',
		]);
		
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
	}



	/** @test */
	public function it_returns_error_when_failed_cinema_update()
	{
		// act
		$response = $this->call('PUT', 'api/v1/cinemas/1');
		
		// assert
		$this->assertEquals(400, $response->getStatusCode());
	}



	/** @test */
	public function it_deletes_a_cinema()
	{
		// act
		$response = $this->call('DELETE', 'api/v1/cinemas/1');
		
		// assert
		$this->assertEquals(200, $response->getStatusCode());
	}
}
