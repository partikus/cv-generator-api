<?php

namespace AppBundle\Form\Employee;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('role', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('responsibilities', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('description', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('startDate', DateTimeType::class, [
                'constraints' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ])
            ->add('endDate', DateTimeType::class, [
                'constraints' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ]);
    }
}
