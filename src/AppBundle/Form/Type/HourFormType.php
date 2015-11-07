<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HourFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('hour_start', 'integer', ['label' => 'Hora de inicio']);
        $builder->add('hour_end', 'integer', ['label' => 'Hora de finalización']);
        $builder->add('day', 'choice', [
            'label' => 'Día de la semana',
            'choices' => [
                0 => 'Lunes',
                1 => 'Martes',
                2 => 'Miércoles',
                3 => 'Jueves',
                4 => 'Viernes',
                5 => 'Sábado',
                6 => 'Domingo',
            ]]);
        $builder->add('room', 'choice', [
            'label' => 'Sala',
            'choices' => [
                1 => 'Sala 1',
                2 => 'Sala 2',
            ]]);
        $builder->add('status', 'choice', [
            'label' => 'Estado',
            'choices' => [
                0 => 'Activo',
                1 => 'Inactivo',
            ]]);
        $builder->add('send', 'submit', ['label' => 'Guardar']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Hour',
        ));
    }

    public function getName()
    {
        return 'hour';
    }
}
