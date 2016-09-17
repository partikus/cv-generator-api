<?php

namespace AppBundle\Form\Employee;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class LanguageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('iso3', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('level', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ]);
    }
}
