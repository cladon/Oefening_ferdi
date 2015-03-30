<?php
App::uses('AppModel', 'Model');
/**
 * Cashflow Model
 *
 */
class Cashflow extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prio' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'amount' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cashflow' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type_identifier' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

//	public function calculateCashflow($data, $paydate) {
//		//hier komt de logica om Cashflows te berekenen
//
//		//test of we hier komen als we een invoice editeren
//		//die_dump('functie calculate Cashflow wordt aangeroepen');
//
//	}

    public function calculateCashflow($data, $paydate){
        // inladen model invoice.php
        App::import('Model','Invoice');

        // aanmaken van een nieuwe instantie

        $invoice = new Invoice();

        // verwijder alle records in de Cashflow met een datum groter dan of gelijk aan de betaaldatum van de factuur.
        // we verwijderen de records ipv ze te updaten zodat deze functie ook gebruikt kan worden bij deleten van een record.

        $this->deleteAll(array('date >=' => $paydate), false);

        //selecteer van de overgebleven record de laatst toegevoegde
        $lastCashflowRecord = $this->find('first', array('order' => array('Cashflow.id DESC'),));  // id ia ALTIJD uniek, cashflow.date gaat niet als de datum meermaals voorkomt

        //die_dump($lastCashflowRecord);

        //haal van dit record de cashflow balans op
        $lastCashflowBalance = $lastCashflowRecord['Cashflow']['cashflow'];
        echo '<br />01b $lastCashflowBalance => ' .$lastCashflowBalance;

        $amount = $data['Invoice']['amount_incl'];
        echo '<br />01c Invoice amount => ' .$amount;
        echo '<br />01d paydate => ' .$paydate;

        //haal alle invoices op met een paydate groter of gelijk aan de nieuwe / aangepaste record
        $invoicesToProcess = $invoice->find('all',array(
                'conditions' => array('paydate >=' => $paydate),
                'order' => array( 'invoice_type_id' =>  'asc'))
        );

        // die_dump ($invoicesToProcess);

        //loop over de invoices en voeg per invoice een record toe aan Cashflow
        foreach ($invoicesToProcess as $key => $value) :
            if ($value['Invoice']['invoice_type_id']=='2') {
                //Uitgaande factuur
                $newCashflowBalance = $lastCashflowBalance + $value['Invoice']['amount_incl'];
                $amount = $value['Invoice']['amount_incl'];
            } else {
                //inkomende factuur
                $newCashflowBalance = $lastCashflowBalance - $value['Invoice']['amount_incl'];
                $amount = $value['Invoice']['amount_incl'] * (-1);
            }
            $lastCashflowBalance = $newCashflowBalance;

            $this->create();

            $this->set(array(
                'date' => $value['Invoice']['paydate'],
                'prio' => '0',
                'amount' => $amount,
                'cashflow' => $newCashflowBalance,
                'type' => 'Invoice',
                'type_identifier' => $value['Invoice']['id']
            ));

            //schrijf de cashflow record weg
            $this->save();
            //deze create na de save zetten om een nieuwe Cashflow record te maken


        endforeach;

        return true;

    }


}
