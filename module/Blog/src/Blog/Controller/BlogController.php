<?php
namespace Blog\Controller;
 
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Form\ArticleForm;   
 
class BlogController extends AbstractActionController
{
   
    public function indexAction()
    {
         $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
 
        $articles = $objectManager
        ->getRepository('\Blog\Entity\Article')
        ->findBy(array(),array('date' => 'DESC'));

        $view = new ViewModel(array(
            'articles' => $articles,
        ));
       # $view->setEncoding('UTF-8');
        return $view;
    }
 
    public function addAction()
    {
        $form = new ArticleForm();
        $form->get('submit')->setValue('Add');
         
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
         
            if ($form->isValid()) {
                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
         
                $article = new \Blog\Entity\Article();
                 
                $article->exchangeArray($form->getData());
                 
                $article->setDate(date('Y-m-d H:i:s'));
    
                $objectManager->persist($article);
                $objectManager->flush();
         

                $message = 'Blogpost succesfully saved!';
                $this->flashMessenger()->addMessage($message);
                // Redirect to list of blogposts
                return $this->redirect()->toRoute('blog');
            }
        }
        return array('form' => $form);
    }

    public function viewAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            $this->flashMessenger()->addErrorMessage('Blogpost id doesn\'t set');
            return $this->redirect()->toRoute('blog');
        }
         
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
         
        $article = $objectManager->getRepository('\Blog\Entity\Article')->findOneBy(array('id' => $id));
         
        if (!$article) {
            $this->flashMessenger()->addErrorMessage(sprintf('Blogpost with id %s doesn\'t exists', $id));
            return $this->redirect()->toRoute('blog');
        }
         
        $view = new ViewModel(array(
            'article' => $article,
        ));

       # $view->setEncoding('UTF-8');
        return $view;
    }
 
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            $this->flashMessenger()->addErrorMessage('Blogpost id doesn\'t set');
             return $this->redirect()->toRoute('blog', array('action' => 'add'));
        }

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $article = $objectManager
            ->getRepository('\Blog\Entity\Article')
            ->findOneBy(array('id' => $id));

        if (!$article) {
            $this->flashMessenger()->addErrorMessage(sprintf('Blogpost with id %s doesn\'t exists', $id));
            return $this->redirect()->toRoute('blog');
        }

        $form = new \Blog\Form\ArticleForm();
        $form->get('submit')->setValue('Save');

        $form->bind($article);

        $request = $this->getRequest();
        if ($request->isPost()) {
             $form->setData($request->getPost());
             if ($form->isValid()) {

                $article->exchangeArray($form->getData());

                $objectManager->persist($article);
                $objectManager->flush();
                $message = 'Blogpost succesfully saved!';
                $this->flashMessenger()->addMessage($message);

                // Redirect to list of blogposts
                return $this->redirect()->toRoute('blog');
             }
        }
        
        return array(
            'id' => $id,
            'form' => $form,
        );
    }
 
    public function deleteAction()
    {
       $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            $this->flashMessenger()->addErrorMessage('Blogpost id doesn\'t set');
            return $this->redirect()->toRoute('blog');
        }

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $article = $objectManager->find('Blog\Entity\Article', $id);
                $objectManager->remove($article);
                $objectManager->flush();
                $this->flashMessenger()->addMessage(sprintf('Blogpost %s was succesfully deleted', $article->getTitle()));
            }
            return $this->redirect()->toRoute('blog');
        }

        return array(
            'id' => $id,
            'article' => $objectManager->find('Blog\Entity\Article', $id),
        );
    }
}
