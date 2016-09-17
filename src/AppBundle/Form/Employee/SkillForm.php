<?php

namespace AppBundle\Form\Employee;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SkillForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateTimeType::class, [
                'required' => true,
            ])
            ->add('lastUsage', DateTimeType::class, [
                'required' => true,
            ])
            ->add('level', IntegerType::class, [
                'required' => true,
            ]);
    }
}
