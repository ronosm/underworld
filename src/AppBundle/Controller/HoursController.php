<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Hour;
use AppBundle\Form\Type\HourFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HoursController extends Controller
{
    /**
     * @return array
     * @Template
     * @Route("/hour_menu/admin/hours/list", name="hours_list")
     * @throws HttpException
     */
    public function hoursListAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $hours = $this->getDoctrine()->getRepository('AppBundle:Hour')->findBy([], [
            'day' => 'ASC',
            'room' => 'ASC',
            'hourStart' => 'ASC',
            ]
        );

        return [
            'hours' => $hours,
        ];
    }

    /**
     * @param Request $request
     * @return array
     * @Template
     * @Route("/hour_menu/admin/hours/add", name="hours_add")
     * @throws HttpException
     */
    public function hoursAddAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $hour = new Hour();
        $form = $this->createForm(new HourFormType(), $hour);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Set creation datetime
            $hour->setCreated(new \DateTime());

            // save on database
            $em = $this->getDoctrine()->getManager();
            $em->persist($hour);
            $em->flush();

            $this->addFlash(
                'notice',
                'Hora creada'
            );

            return $this->redirectToRoute('hours_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @param Hour  $hour
     * @param Request $request
     * @return array
     * @Template
     * @Route("/hour_menu/admin/hours/edit/{id}", requirements={"id" = "\d+"}, name="hours_edit")
     * @ParamConverter("hour", class="AppBundle:Hour")
     * @throws HttpException
     */
    public function hoursEditAction(Hour $hour, Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $form = $this->createForm(new HourFormType(), $hour);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Cambios guardados'
            );

            return $this->redirectToRoute('hours_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @param Hour $hour
     * @return array
     * @Template
     * @Route("/hour_menu/admin/hours/delete/{id}", requirements={"id" = "\d+"}, name="hours_delete")
     * @ParamConverter("hour", class="AppBundle:Hour")
     * @throws HttpException
     */
    public function hoursDeleteAction(Hour $hour)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        if ($hour) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hour);
            $em->flush();

            $this->addFlash(
                'notice',
                'Hora eliminada'
            );

            return $this->redirectToRoute('hours_list');
        }

        $this->addFlash(
            'error',
            'Hora eliminada'
        );

        return [];
    }
}
