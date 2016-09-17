<?php

namespace AppBundle\Form\Employee;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateTimeType::class, [
                'constraint' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ])
            ->add('lastUsage', DateTimeType::class, [
                'constraint' => [
                    new NotBlank(),
                    new DateTime(),
                ]
            ])
            ->add('level', IntegerType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ]);
    }
}
