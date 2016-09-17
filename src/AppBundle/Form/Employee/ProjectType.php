<?php

namespace AppBundle\Form\Employee;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('role', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('responsibilities', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('description', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('startDate', DateTimeType::class, [
                'constraint' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ])
            ->add('endDate', DateTimeType::class, [
                'constraint' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ]);
    }
}
