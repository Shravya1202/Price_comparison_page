<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Shoes Controller
 *
 * @method \App\Model\Entity\ShoesController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShoesController extends AppController
{
    public function index()
    {
        $this->loadModel('Shoes'); // Load the Shoes model

        // Fetch all shoe data from the database
        $shoes = $this->Shoes->find('all');

        // Pass the shoe data to the view template
        $this->set(compact('shoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Shoes Controller id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($shoes_id = null)
    {
        $shoe = $this->Shoes->get($shoes_id);

        $this->set(compact('shoe'));
        $shoe = $this->Shoes->get($shoes_id, [
            'contain' => ['Prices.Stores']
        ]);

        // Pass the shoe data to the view template
        $this->set(compact('shoe'));
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shoesController = $this->ShoesController->newEmptyEntity();
        if ($this->request->is('post')) {
            $shoesController = $this->ShoesController->patchEntity($shoesController, $this->request->getData());
            if ($this->ShoesController->save($shoesController)) {
                $this->Flash->success(__('The shoes controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shoes controller could not be saved. Please, try again.'));
        }
        $this->set(compact('shoesController'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Shoes Controller id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shoesController = $this->ShoesController->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shoesController = $this->ShoesController->patchEntity($shoesController, $this->request->getData());
            if ($this->ShoesController->save($shoesController)) {
                $this->Flash->success(__('The shoes controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shoes controller could not be saved. Please, try again.'));
        }
        $this->set(compact('shoesController'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shoes Controller id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shoesController = $this->ShoesController->get($id);
        if ($this->ShoesController->delete($shoesController)) {
            $this->Flash->success(__('The shoes controller has been deleted.'));
        } else {
            $this->Flash->error(__('The shoes controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}