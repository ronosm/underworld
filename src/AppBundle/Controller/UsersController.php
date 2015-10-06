<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Member;
use AppBundle\Form\Type\MemberFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UsersController extends Controller
{
    /**
     * @return array
     * @Template
     * @Route("/user_menu/admin/users/list", name="users_list")
     * @throws HttpException
     */
    public function usersListAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $users = $this->getDoctrine()->getRepository('AppBundle:Member')->findBy([], [
            'surname1' => 'ASC',
            'surname2' => 'ASC',
            'name' => 'ASC',
            ]
        );

        return [
            'users' => $users,
        ];
    }

    /**
     * @param Request $request
     * @return array
     * @Template
     * @Route("/user_menu/admin/users/add", name="users_add")
     * @throws HttpException
     */
    public function usersAddAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $member = new Member();
        $form = $this->createForm(new MemberFormType(), $member);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Set creation datetime
            $member->setCreated(new \DateTime());

            // Set encoded password
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($member);
            $member->setPassword($encoder->encodePassword($member->getPassword(), $member->getSalt()));

            // save on database
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();

            $this->addFlash(
                'notice',
                'Usuario creado'
            );

            return $this->redirectToRoute('users_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @param Member  $member
     * @param Request $request
     * @return array
     * @Template
     * @Route("/user_menu/admin/users/edit/{id}", requirements={"id" = "\d+"}, name="users_edit")
     * @ParamConverter("member", class="AppBundle:Member")
     * @throws HttpException
     */
    public function usersEditAction(Member $member, Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        $form = $this->createForm(new MemberFormType(), $member);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // Set encoded password
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($member);
            $member->setPassword($encoder->encodePassword($request->get('change_password'), $member->getSalt()));

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'notice',
                'Cambios guardados'
            );

            return $this->redirectToRoute('users_list');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @param Member $member
     * @return array
     * @Template
     * @Route("/user_menu/admin/users/delete/{id}", requirements={"id" = "\d+"}, name="users_delete")
     * @ParamConverter("member", class="AppBundle:Member")
     * @throws HttpException
     */
    public function usersDeleteAction(Member $member)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw new HttpException("Page not found");
        }

        if ($member) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($member);
            $em->flush();

            $this->addFlash(
                'notice',
                'Usuario eliminado'
            );

            return $this->redirectToRoute('users_list');
        }

        $this->addFlash(
            'error',
            'Usuario eliminado'
        );

        return [];
    }
}
