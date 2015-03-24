<?php
App::uses('AppController', 'Controller');
/**
 * InvoiceTypes Controller
 *
 * @property InvoiceType $InvoiceType
 * @property PaginatorComponent $Paginator
 */
class InvoiceTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->InvoiceType->recursive = 0;
		$this->set('invoiceTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InvoiceType->exists($id)) {
			throw new NotFoundException(__('Invalid invoice type'));
		}
		$options = array('conditions' => array('InvoiceType.' . $this->InvoiceType->primaryKey => $id));
		$this->set('invoiceType', $this->InvoiceType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InvoiceType->create();
			if ($this->InvoiceType->save($this->request->data)) {
				$this->Session->setFlash(__('The invoice type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InvoiceType->exists($id)) {
			throw new NotFoundException(__('Invalid invoice type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InvoiceType->save($this->request->data)) {
				$this->Session->setFlash(__('The invoice type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invoice type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InvoiceType.' . $this->InvoiceType->primaryKey => $id));
			$this->request->data = $this->InvoiceType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->InvoiceType->id = $id;
		if (!$this->InvoiceType->exists()) {
			throw new NotFoundException(__('Invalid invoice type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->InvoiceType->delete()) {
			$this->Session->setFlash(__('The invoice type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The invoice type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
