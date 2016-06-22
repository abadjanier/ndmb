<?php

namespace Ndmb\FrontendBundle\Controller;


use Ndmb\CoreBundle\Entity\Administrator;
use Ndmb\CoreBundle\Entity\User;
use Ndmb\CoreBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class RegisterController extends Controller
{

    public function registerAction(Request $request)
    {

        $session = new Session();
        //si el usuario a hecho login no le dejamos entrar a esta vista
        if ($user = $this->getUser()) {
           // $session->getFlashBag()->set('error', $this->get('translator')->trans('no.access.first.logout', array(), 'info-alerts'));
            //return $this->redirectToRoute("onemycom_frontend_homepage");
        }

        $em = $this->getDoctrine()->getManager();

        // 1) build the form
        $user = new Administrator();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

           /* $token = new UsernamePasswordToken($user, $user->getPassword(), "admin", $user->getRoles());
            $this->get("security.token_storage")->setToken($token);*/

            return $this->redirectToRoute('ndmb_frontend_homepage');
        }

        return $this->render('NdmbFrontendBundle:Registration:register.html.twig', array(
            'form' => $form->createView()
        ));


    }



}


