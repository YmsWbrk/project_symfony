<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact/{id}", name="app_contact")
     */
    public function index(Request $request): Response
    {
        $isConnect = $this->getUser();
        if($isConnect){
            
        if($request->request->count() > 0){
            if ($request->request->get('submitForm')) {
                    if (filter_var($request->request->get('email'), FILTER_VALIDATE_EMAIL)) {
                        $mail = $request->request->get('email');
                        $to = $request->request->get('name');;
                        $msg = htmlspecialchars($request->request->get('msg'));
                        //Construction de mon email
                        $headers = "MIME-Version: 1.0\r\n";
                        $headers = "From:$mail" . PHP_EOL;
                        $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
                        mail("contact@webarki.fr", $to, $msg, $headers);
                        return $this->redirectToRoute('contact_success');
                    } else {
                        return $this->redirectToRoute('contact_error');
                    }
                }
            }
        }
        return $this->render('contact/index.html.twig');
        }

     /**
     * @Route("/contact/", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('contact/index.html.twig');
    }

        /**
         * @Route("/success/contact", name="contact_success")
         */
        public function succesContact(): Response
        { 
        return $this->render("contact/success.html.twig");
        }

         /**
         * @Route("/error/contact", name="contact_error")
         */
        public function errorContact(): Response
        { 
        return $this->render("contact/error.html.twig");
        }
    
}
