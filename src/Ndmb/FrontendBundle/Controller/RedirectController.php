<?php

    namespace Ndmb\FrontendBundle\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\RedirectResponse;
    use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
    use Symfony\Component\HttpFoundation\Request;


    class RedirectController extends Controller {

        //funcion por si se pone una url sin el idioma (/es), redireccionamos al idioma guardado en session
        //si la variable que le mando es un idioma, redirecciono directamente a ese idioma
        public function languageAction($language = null, Request $request){
            //si es nulo significa que vengo de la funcion checkAction y ya tengo el idioma
            if ($language == null) {
                $language = $this->returnLanguage($request);
            }

            return $this->redirectToRoute('ndmb_frontend_homepage', array('_locale' => $language));

        }

        //funcion por si ponen una ruta sin el idioma delante o escriben el idioma sin la / al final
        public function checkAction(Request $request){

            $word = $request->get('word');

            //para pillar el idioma por defecto seleccionado o no
            $language = $this->returnLanguage($request);

            $router = $this->get('router');

            //guardo todos los idiomas que tiene la aplicacion
            $locale = explode('|', $this->getParameter('_locale'));

            //si no es un idioma salta no hace nada
            foreach ($locale as $lg) {
                if ($lg == $word) {
                    return $this->languageAction($word);
                }
            }

            //si esta ruta no existe lanzo una excepcion 404 (igual no es optimo comprobarlo de esta manera)
            if (array_key_exists('ndmb_frontend_'.$request->get('word'),$router->getRouteCollection()->all())){

                return $this->redirectToRoute("ndmb_frontend_".$word,  array('_locale' => $language));

            } else {

                return $this->redirectToRoute("ndmb_frontend_homepage", array("_locale" => "es"));

            }

        }

        //me devuelve un idioma (el que hay por defecto o el que el usuario selecciono)
        public function returnLanguage(Request $request) {

            if ($request->getSession()->get('_locale') != null) {

                $language = $request->getSession()->get('_locale');

            } else {

                $language = $request->getLocale();

            }

            return $language;

        }

    }