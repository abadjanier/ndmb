<?php

namespace Ndmb\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        echo $this->get('translator')->trans('my.bank.accounts', array(), 'titles');
        return $this->render('NdmbFrontendBundle:Default:index.html.twig');
    }
}
