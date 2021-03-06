<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Template
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $bands = $this->getDoctrine()->getRepository('AppBundle:MemberGroup')->findAll();
        $events = $this->getDoctrine()->getRepository('AppBundle:Event')->findAll();
        $rivasRuido = $this->getDoctrine()->getRepository('AppBundle:RivasRuido')->find(1);

        return [
            'bands' => $bands,
            'events' => $events,
            'rivasRuido' => $rivasRuido,
        ];
    }
}
