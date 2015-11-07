<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberGroupFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', ['label' => 'Nombre']);
        $builder->add('level', 'integer', ['label' => 'Nivel']);
        $builder->add('hour1', 'entity', [
            'label' => 'Primera hora',
            'class' => 'AppBundle:Hour',
            'choice_label' => 'name',
        ]);
        $builder->add('hour2', 'entity', [
            'label' => 'Segunda hora',
            'class' => 'AppBundle:Hour',
            'choice_label' => 'name',
        ]);
        $builder->add('level', 'integer', ['label' => 'Nivel']);
        $builder->add('members', 'entity', [
            'label' => 'Miembros',
            'class' => 'AppBundle:Member',
            'choice_label' => 'completeName',
            'multiple' => true,
            'expanded' => true,
            ]);
        $builder->add('send', 'submit', ['label' => 'Guardar']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\MemberGroup',
        ));
    }

    public function getName()
    {
        return 'member_group';
    }
}
