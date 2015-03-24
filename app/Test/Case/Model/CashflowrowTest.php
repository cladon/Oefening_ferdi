<?php
App::uses('Cashflowrow', 'Model');

/**
 * Cashflowrow Test Case
 *
 */
class CashflowrowTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cashflowrow'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cashflowrow = ClassRegistry::init('Cashflowrow');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cashflowrow);

		parent::tearDown();
	}

}
