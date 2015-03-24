<?php
/**
 * CashflowFixture
 *
 */
class CashflowFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'prio' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'cashflow' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'type_identifier' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'cash_remarks' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date' => '2014-11-14',
			'prio' => 1,
			'amount' => 1,
			'cashflow' => 1,
			'type' => 'Lorem ipsum dolor sit amet',
			'type_identifier' => 1,
			'cash_remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2014-11-14 14:44:02',
			'modified' => '2014-11-14 14:44:02'
		),
	);

}
