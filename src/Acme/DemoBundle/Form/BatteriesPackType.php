<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BatteriesPackType extends AbstractType
{
    //todo: there is a possibility to define data_class in form. Then form will generate entity automatically.
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', 'choice', ['choices' => [
            //todo: there is the same definition in controller. Consider creating method in this form that will return the array. And re-use it in controller
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
