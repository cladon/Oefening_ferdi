<?php
App::uses('AppController', 'Controller');
/**
 * Invoices Controller
 *
 * @property Invoice $Invoice
 * @property PaginatorComponent $Paginator
 */
class InvoicesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $uses = array('Invoice', 'Company', 'InvoiceType');
/**
 * index method
 *
 * @return void
 */
	public function index() {
	
		$this->Invoice->recursive = 0;
		$this->set('invoices', $this->Invoice->find('all', array('order' => 'Invoice.paydate ASC')));
		
	}
/**
 * search method
 *
 * @return void
 */
	public function search() {
		
		$this->Company->recursive = 0;
		$companies = $this->Company->find('all');
		$invoiceTypes = $this->InvoiceType->find('all');
		$companies = Hash::combine($companies, '{n}.Company.id', '{n}.Company.name');
		$invoiceTypes = Hash::combine($invoiceTypes, '{n}.InvoiceType.id', '{n}.InvoiceType.name');
		
		
		
		$this->set('companies', $companies);
		$this->set('invoiceTypes', $invoiceTypes);
		
		if ($this->request->is('post')) {
			//die_dump($this->request->data);
			
			$conditions = array();
			$data = $this->request->data;
			
			$companyid = Hash::extract($data, 'Invoice.companyid');
			//$companyid = implode(",", $companyid);
			if(!empty($companyid[0])){$conditions['company_id'] = $companyid;}
			
			$invoiceType = Hash::extract($data, 'Invoice.invoiceType');
			//$invoiceType = implode(",", $invoiceType);
			if(!empty($invoiceType[0])){$conditions['invoice_type_id'] = $invoiceType;}
			
			$virtual = Hash::extract($data, 'Invoice.virtual');
			//$virtual = implode(",", $virtual);
			
			if($virtual != ""){$conditions['virtual'] = $virtual;}
			
			$paid = Hash::extract($data, 'Invoice.paid');
			//$paid = implode(",", $paid);
			if($paid != ""){$conditions['paid'] = $paid;}
			
			$invoice_number_int = Hash::extract($data, 'Invoice.invoice_number_int');
			if(!empty($invoice_number_int[0])){$conditions['invoice_number_int'] = $invoice_number_int;}
			
			$invoice_number_ext = Hash::extract($data, 'Invoice.invoice_number_ext');
			if(!empty($invoice_number_ext[0])){$conditions['invoice_number_ext'] = $invoice_number_ext;}
			
			$amount_excl_min = Hash::extract($data, 'Invoice.amount_excl_min');
			$amount_excl_max = Hash::extract($data, 'Invoice.amount_excl_max');
			if(!empty($amount_excl_max[0])){
				$conditions['amount_excl BETWEEN ? AND ?'] = array($amount_excl_min[0], $amount_excl_max[0]);
			}else{
				if(!empty($amount_excl_min[0])){
					$sign_excl = Hash::extract($data, 'Invoice.sign_excl');
					
					$conditions['amount_excl '.$sign_excl[0]. ' '] = $amount_excl_min[0];
				}
			}
			
			$amount_incl_min = Hash::extract($data, 'Invoice.amount_incl_min');
			$amount_incl_max = Hash::extract($data, 'Invoice.amount_incl_max');
			if(!empty($amount_incl_max[0])){
				$conditions['amount_incl BETWEEN ? AND ?'] = array($amount_incl_min[0], $amount_incl_max[0]);
			}else{
				if(!empty($amount_incl_min[0])){
					$sign_incl = Hash::extract($data, 'Invoice.sign_incl');
					
					$conditions['amount_incl '.$sign_incl[0]. ' '] = $amount_incl_min[0];
				}
			}
			
			$begindateInvoicedate = Hash::extract($data, 'Invoice.begindateInvoicedate');
			$enddateInvoicedate = Hash::extract($data, 'Invoice.enddateInvoicedate');
			
			$conditions['date BETWEEN ? AND ?'] = array($begindateInvoicedate[0], $enddateInvoicedate[0]);
			
			$begindateInvoicedateexp = Hash::extract($data, 'Invoice.begindateInvoicedateexp');
			$enddateInvoicedateexp = Hash::extract($data, 'Invoice.enddateInvoicedateexp');
			
			$conditions['date_exp BETWEEN ? AND ?'] = array($begindateInvoicedateexp[0], $enddateInvoicedateexp[0]);
			
			$begindateInvoicepaydate = Hash::extract($data, 'Invoice.begindateInvoicepaydate');
			$enddateInvoicepaydate = Hash::extract($data, 'Invoice.enddateInvoicepaydate');
			
			$conditions['paydate BETWEEN ? AND ?'] = array($begindateInvoicepaydate[0], $enddateInvoicepaydate[0]);
			
			//die_dump($conditions);
			$toShowInvoices = $this->Invoice->find('all', array(
				'conditions' => $conditions,
				'recursive' => 0,
				'order' => array('Invoice.paydate ASC')
			
			));
			
			//die_dump($toShowInvoices);
			
			$this->set('invoices', $toShowInvoices);
			$this->render('index');
						
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
		$this->set('invoice', $this->Invoice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
/*	public function add() {
		$ok = 5;
		
		if ($this->request->is('post')) {
			$ok = 0;
			$repeat = $this->request->data['Invoice']['repeat'];
			
			if($this->request->data['Invoice']['repeat'] == 0){
			$this->Invoice->create();	
			
			if(!$this->Invoice->save($this->request->data)){
			$ok = $ok + 1;	
				
			}
			}else{
			$begindate = $this->request->data['Invoice']['date'];
			$enddate = $this->request->data['Invoice']['date_exp'];
			$paydate = $this->request->data['Invoice']['paydate'];
			
			$beginMaand = (int) date('n',strtotime($begindate));
			$beginJaar = (int) date('Y', strtotime($begindate));
			$beginDag = (int) date('d', strtotime($begindate));
			
			$eindMaand = (int) date('n',strtotime($enddate));
			$eindJaar = (int) date('Y', strtotime($enddate));
			$eindDag = (int) date('d', strtotime($enddate));
			
			$payMaand = (int) date('n',strtotime($paydate));
			$payJaar = (int) date('Y', strtotime($paydate));
			$payDag = (int) date('d', strtotime($paydate));
			
			$ok = 5;
			for ($i=0; $i < $repeat; $i++) {
			
				
			$dataArray = $this->request->data;
				$dataArray['Invoice']['date'] = $begindate;
				$dataArray['Invoice']['date_exp'] = $enddate;
				$dataArray['Invoice']['paydate'] = $paydate;
				
			$this->Invoice->create();	
			
			if(!$this->Invoice->save($dataArray)){
			$ok = $ok + 1;	
				
			}
			
			
			
			$this->Invoice->clear();
			
			$beginMaand = $beginMaand + 1;
			
			if($beginMaand > 12){
				
				$beginMaand = 1;
				$beginJaar = $beginJaar + 1;
			}
			
			$eindMaand = $eindMaand + 1;
			
			if($eindMaand > 12){
				
				$eindMaand = 1;
				$eindJaar = $eindJaar + 1;
			}
			
			$payMaand = $payMaand + 1;
			
			if($payMaand > 12){
				
				$payMaand = 1;
				$payJaar = $payJaar + 1;
			}
			
			$begindate = date('y-m-d', strtotime($beginJaar.'-'.$beginMaand.'-'.$beginDag));
			$enddate = date('y-m-d', strtotime($eindJaar.'-'.$eindMaand.'-'.$eindDag));
			$paydate = date('y-m-d', strtotime($payJaar.'-'.$payMaand.'-'.$payDag));
			//die_dump($begindate);
			}
			}
			
			if ($ok = 5) {
				$this->Session->setFlash(__('The invoice has been saved.'));
				//die_dump('test');
				return $this->redirect(array('controller'=> 'invoices', 'action' => 'index'));
				
			} else {
				$this->Session->setFlash(__('The invoice could not be saved. Please, try again.'));
			}
		}
		
		$companies = $this->Invoice->Company->find('list');
		$invoiceTypes = $this->Invoice->InvoiceType->find('list');
		$this->set(compact('companies', 'invoiceTypes'));
	
	}*/

/**
 * edit method
 *
 */
	public function edit($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid invoice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invoice->save($this->request->data)) {
				return $this->redirect(array('action' => 'index'));
			} else {
			}
		} else {
			$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
			$this->request->data = $this->Invoice->find('first', $options);
		}
		$companies = $this->Invoice->Company->find('list');
		$invoiceTypes = $this->Invoice->InvoiceType->find('list');
		$this->set(compact('companies', 'invoiceTypes'));
	}


	function add()
	{


		if($this->request->is('post')){
			//die_dump($this->request->data);

// Invoice factuur = new Invoice();
			$this->Invoice->create();
			//array meegeven aan de save functie, kolommen in database worden automatisch gemapt met keys in de 2de array
			$this->Invoice->save($this->request->data);

			//redirecten naar de functie index binnenin deze controller
			$this->redirect(array('action'=>'index'));
		}

		$companies = $this->Invoice->Company->find('list');
		$invoiceTypes = $this->Invoice->InvoiceType->find('list');
		$this->set(compact('companies', 'invoiceTypes'));

	}


	/**
	 * delete method
	 *
	 */


	function delete($id){
		//id wordt meegegeven aan functie -> zie index.ctp van Invoices
		//die_dump($this->request->data);

		$this->Invoice->delete($id);
		//redirecten naar de functie index binnenin deze controller
		$this->redirect(array('action'=>'index'));

		// Delete with array conditions similar to find()
		//$this->Comment->deleteAll(array('Comment.spam' => true), false);


	}


}
