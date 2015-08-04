<?php

namespace Mukhin\ContactsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $departmentManager = $this->get('mukhin.contacts.manager.department');
        return $this->render('MukhinContactsBundle:Default:index.html.twig', array(
            'departments' => $departmentManager->findMajor()
        ));
    }
}
