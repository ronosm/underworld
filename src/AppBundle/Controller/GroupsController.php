<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MemberGroup;
use AppBundle\Form\Type\MemberGroupFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpKernel\Exception\HttpException;

class GroupsController extends Controller
{
    /**
     * @return array
     * @Template
     * @Route("/group_menu/admin/groups/list", name="groups_list")
     * @throws HttpException
     */
    public function groupsListAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $groups = $this->getDoctrine()->getRepository('AppBundle:MemberGroup')->findBy([], [
            'name' => 'ASC',
            ]
        );

        return [
            'groups' => $groups,
        ];
    }

    /**
     * @param Request $request
     * @return array
     * @Template
     * @Route("/group_menu/admin/groups/add", name="groups_add")
     * @throws HttpException
     */
    public function groupsAddAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $memberGroup = new MemberGroup();
        $form = $this->createForm(new MemberGroupFormType(), $memberGroup);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Set creation datetime
            $memberGroup->setCreated(new \DateTime());

            // save on database
            $em = $this->getDoctrine()->getManager();
            $em->persist($memberGroup);
            $em->flush();

            $this->addFlash(
                'notice',
                'Usuario creado'
            );

            return $this->redirectToRoute('groups_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @param MemberGroup  $memberGroup
     * @param Request $request
     * @return array
     * @Template
     * @Route("/group_menu/admin/groups/edit/{id}", requirements={"id" = "\d+"}, name="groups_edit")
     * @ParamConverter("memberGroup", class="AppBundle:MemberGroup")
     * @throws HttpException
     */
    public function groupsEditAction(MemberGroup $memberGroup, Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $form = $this->createForm(new MemberGroupFormType(), $memberGroup);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Cambios guardados'
            );

            return $this->redirectToRoute('groups_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @param MemberGroup $memberGroup
     * @return array
     * @Template
     * @Route("/group_menu/admin/groups/delete/{id}", requirements={"id" = "\d+"}, name="groups_delete")
     * @ParamConverter("memberGroup", class="AppBundle:MemberGroup")
     * @throws HttpException
     */
    public function groupsDeleteAction(MemberGroup $memberGroup)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        if ($memberGroup) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($memberGroup);
            $em->flush();

            $this->addFlash(
                'notice',
                'Grupo eliminado'
            );

            return $this->redirectToRoute('groups_list');
        }

        $this->addFlash(
            'error',
            'Grupo eliminado'
        );

        return [];
    }
}
