<?php

namespace Ndmb\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NdmbCoreBundle:Default:index.html.twig');
    }
}
