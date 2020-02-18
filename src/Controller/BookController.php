<?php
declare(strict_types=1);

namespace App\Controller;


/**
 * Books Controller
 *
 * @property \App\Model\Table\BookTable $Book
 * @property \App\Model\Table\AuthorTable $Author
 */
class BookController extends AppController
{
    public function index(){
        $this->loadModel('Author');
        $authors = $this->Author->find('all');
        $this->set('authors', $authors);


        $books = $this->Book->find('all');
        $this->set('books', $books);


    }

    public function add(){
        $this->loadModel('Author');
        $authors = $this->Author->find('all');
        $list = array();
        foreach($authors as $author):
            $list[$author->id] = $author->name . " " . $author->lastname;
        endforeach;
        $this->set('authors', $list);

        $book = $this->Book->newEmptyEntity();
        
        if ($this->request->is('post')){

            $book = $this->Book->patchEntity($book, $this->request->getData());
            if ($this->Book->save($book)){
                //$this->Flash->success('El libro ha sido creado correctamente');
                return $this->redirect(['controller'=> 'Book', 'action'=>'index']);
            } 
            else {
                $this->Flash->error('El book no pudo ser creado. Por favor, intente nuevamente');
            }
        }

        $this->set(compact('book'));
    }

    public function edit($id){
        $this->loadModel('Author');
        $authors = $this->Author->find('all');
        $list = array();
        foreach($authors as $author):
            $list[$author->id] = $author->name . " " . $author->lastname;
        endforeach;
        $this->set('authors', $list);
        

        $book = $this->Book->get($id);

        if ($this->request->is(['patch', 'put', 'post'])){

            $book = $this->Book->patchEntity($book, $this->request->getData());
            if ($this->Book->save($book)){
                //$this->Flash->success('El libro ha sido creado correctamente');
                return $this->redirect(['controller'=> 'Book', 'action'=>'index']);
            } 
            else {
                $this->Flash->error('El book no pudo ser editador. Por favor, intente nuevamente');
            }
        }

        $this->set(compact('book'));

    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Book->get($id);

        if ($this->Book->delete($book)){
            $this->Flash->success('El libro ha sido eliminado correctamente');
        } 
        else {
            $this->Flash->error('El book no pudo ser eliminado. Por favor, intente nuevamente');
        }
        return $this->redirect(['controller'=> 'Book', 'action'=>'index']);

    }


}
