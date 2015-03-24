<?php
App::uses('Cashflow', 'Model');

/**
 * Cashflow Test Case
 *
 */
class CashflowTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cashflow'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cashflow = ClassRegistry::init('Cashflow');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cashflow);

		parent::tearDown();
	}

}
