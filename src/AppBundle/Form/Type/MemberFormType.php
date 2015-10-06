<?php
namespace AppBundle\Form\Type;

use AppBundle\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', ['label' => 'Nombre']);
        $builder->add('surname1', 'text', ['label' => 'Primer apellido']);
        $builder->add('surname2', 'text', ['label' => 'Segundo apellido']);
        $builder->add('birth', 'date', ['years' => $this->getyears(), 'label' => 'Fecha de nacimiento']);
        $builder->add('dni', 'text', ['label' => 'DNI']);
        $builder->add('address', 'text', ['label' => 'Dirección']);
        $builder->add('phone', 'text', ['label' => 'Teléfono']);
        $builder->add('username', 'text', ['label' => 'Email']);
        $builder->add('change_password', 'password', ['mapped' => false, 'label' => 'Contraseña', 'required' => false]);
        $builder->add('status', 'choice', ['choices' => [0 => 'Inactivo', 1 => 'Activo'], 'label' => 'Estado']);
        $builder->add('rol', 'choice', ['choices' => Member::getRolOptions()]);
        $builder->add('send', 'submit', ['label' => 'Guardar']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Member',
        ));
    }

    public function getName()
    {
        return 'member';
    }

    /**
     * @return array
     */
    public function getYears()
    {
        $years = [];
        $thisYear = date("Y");
        for ($i = $thisYear - 60; $i < $thisYear - 14; $i++) {
            $years[] = $i;
        }

        return $years;
    }
}
