<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Employee
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('username', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('jobTitle', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            // Details
            ->add('experience', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('education', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('hobbies', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            // Email
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Email(),
                ]
            ]);
    }
}
