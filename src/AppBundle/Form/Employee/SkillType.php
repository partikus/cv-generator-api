<?php

namespace AppBundle\Form\Employee;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateTimeType::class, [
                'constraints' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ])
            ->add('lastUsage', DateTimeType::class, [
                'constraints' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ])
            ->add('level', IntegerType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ]);
    }
}
