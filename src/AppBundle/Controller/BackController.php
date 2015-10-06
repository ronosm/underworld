<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Member;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BackController extends Controller
{
    /**
     * @Template
     * @Route("/user_menu", name="user_menu")
     */
    public function indexAction(Request $request)
    {
        $rivasRuido = $this->getDoctrine()->getRepository('AppBundle:RivasRuido')->find(1);

        return [
            'rivasRuido' => $rivasRuido,
        ];
    }
}
