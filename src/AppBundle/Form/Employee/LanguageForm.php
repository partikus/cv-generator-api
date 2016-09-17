<?php

namespace AppBundle\Form\Employee;

use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LanguageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('iso3', TextType::class, [
                'required' => true,
            ])
            ->add('level', IntegerType::class, [
                'required' => true,
            ]);
    }
}
