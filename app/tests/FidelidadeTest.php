<?php

class FidelidadeTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */


	public function testPublicRouteName()
	{
		$this->client->request('GET', Route('isonhei-club-loja'));
		$this->assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', Route('isonhei-club-produto', array(1)));
        $this->assertTrue($this->client->getResponse()->isOk());
	}

}
