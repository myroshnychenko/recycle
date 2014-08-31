<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BatteriesPackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', 'choice', ['choices' => [
            '1' => 'AA',
            '2' => 'AAA',
            '3' => 'Undefined'
        ]]);
        $builder->add('count', 'integer');
        $builder->add('name', 'text', ['required' => false]);
        $builder->add('create', 'submit');
    }

    public function getName()
    {
        return 'batteriesPack';
    }
}
