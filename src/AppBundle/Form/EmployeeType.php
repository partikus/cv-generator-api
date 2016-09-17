<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Employee
            ->add('first_name', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('last_name', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('username', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('job_title', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            // Details
            ->add('experience', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('education', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('hobbies', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            // Email
            ->add('email', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                    new Email(),
                ]
            ]);
    }
}
