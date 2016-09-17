<?php

namespace AppBundle\Form\Employee;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjectForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', TextType::class, [
                'required' => true,
            ])
            ->add('role', TextType::class, [
                'required' => true,
            ])
            ->add('responsibilities', TextType::class, [
                'required' => true,
            ])
            ->add('description', TextType::class, [
                'required' => true,
            ])
            ->add('startDate', DateTimeType::class, [
                'required' => true,
            ])
            ->add('endDate', DateTimeType::class, [
                'required' => true,
            ]);
    }
}
