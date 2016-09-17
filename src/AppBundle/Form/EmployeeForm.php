<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;

class EmployeeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // Employee
            ->add('first_name', TextType::class, [
                'required' => true,
            ])
            ->add('last_name', TextType::class, [
                'required' => true,
            ])
            ->add('username', TextType::class, [
                'required' => true,
            ])
            ->add('job_title', TextType::class, [
                'required' => true,
            ])
            // Details
            ->add('experience', TextType::class, [
                'required' => true,
            ])
            ->add('job_title', TextType::class, [
                'eduction' => true,
            ])
            ->add('hobbies', TextType::class, [
                'required' => true,
            ])
            // Email
            ->add('email', TextType::class, [
                'required' => false,
                'constraint' => [
                    new Email()
                ]
            ]);
    }
}
