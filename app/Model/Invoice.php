<?php
App::uses('AppModel', 'Model');
/**
 * Invoice Model
 *
 * @property Company $Company
 * @property InvoiceType $InvoiceType
 */
class Invoice extends AppModel {
	//delete
private $paydateInvoice;
	//edit
private $paydateEdit;
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'company_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'invoice_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'amount_excl' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'VAT' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'amount_incl' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'date_exp' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'paydate' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'InvoiceType' => array(
			'className' => 'InvoiceType',
			'foreignKey' => 'invoice_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    var $invoice;
    var $paydate;

    public function beforeSave($options = array()) {
        //selecteer de record uit de tabel invoices die aangepast werd. als het resultaat van deze select leeg is, ging het om een insert en niet om een update.
        $this->invoice = $this->find('first', array(
            'conditions' => array('Invoice.id' => $this->id),
        ));

        //als het om een insert gaat
        if (!$this->invoice) {
            //is de paydate de ingevoerde datum
            $this->paydate = $this->data['Invoice']['paydate'];
        } else {
            //als het om een update gaat nemen we de kleinste datum
            if ($this->data['Invoice']['paydate'] < $this->invoice['Invoice']['paydate']) {
                $this->paydate = $this->data['Invoice']['paydate'];
            } else {
                $this->paydate = $this->invoice['Invoice']['paydate'];
            }
        }
    }

    public function afterSave($created, $options = null) {
        //created geeft aan of het om een insert of een update gaat, is een boolean

        //aanduiden dat we met het model Cashflow gaan werken; om functies te kunnen gebuiken hierin (te vergelijken met uses in de Controllers)
        //import is een functie van de class App
        App::import('Model','Cashflow');

        //nog aanpassen : als je een factuur naar een latere datum aanpast werkt het niet

        //maak een nieuwe instance van Cashflow aan
        $cashflow = new Cashflow();

        //$paydate = $this->data['Invoice']['paydate'];

        //functie aanroepen
        $cashflow->calculateCashflow($this->data,  $this->paydate);



        return true;
    }

    public function beforeDelete($cascade = true) {

        //haal de gegevens op van de te verwijderen invoice
        $this->invoice = $this->find('first', array(
            'conditions' => array('Invoice.id' => $this->id),
        ));

        //haal de paydate van de te verwijderen invoice op
        $this->paydate = $this->invoice['Invoice']['paydate'];

        return true;

    }

    public function afterDelete() {
        App::import('Model','Cashflow');
        $cashflow = new Cashflow();

        //stuur de gegevens die in de beforeDelete opgehaald werden naar de functie calculateCashflow in Cashflow
        $cashflow->calculateCashflow($this->invoice, $this->paydate);
        return true;
    }
	
}
