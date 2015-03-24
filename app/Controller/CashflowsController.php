<?php
App::uses('AppController', 'Controller');
/**
 * Cashflows Controller
 *
 * @property Cashflow $Cashflow
 * @property PaginatorComponent $Paginator
 */
class CashflowsController extends AppController {

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
		$this->Cashflow->recursive = 0;
		$this->set('cashflows', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cashflow->exists($id)) {
			throw new NotFoundException(__('Invalid cashflow'));
		}
		$options = array('conditions' => array('Cashflow.' . $this->Cashflow->primaryKey => $id));
		$this->set('cashflow', $this->Cashflow->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cashflow->create();
			if ($this->Cashflow->save($this->request->data)) {
				$this->Session->setFlash(__('The cashflow has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cashflow could not be saved. Please, try again.'));
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
		if (!$this->Cashflow->exists($id)) {
			throw new NotFoundException(__('Invalid cashflow'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cashflow->save($this->request->data)) {
				$this->Session->setFlash(__('The cashflow has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cashflow could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cashflow.' . $this->Cashflow->primaryKey => $id));
			$this->request->data = $this->Cashflow->find('first', $options);
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
		$this->Cashflow->id = $id;
		if (!$this->Cashflow->exists()) {
			throw new NotFoundException(__('Invalid cashflow'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cashflow->delete()) {
			$this->Session->setFlash(__('The cashflow has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cashflow could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
