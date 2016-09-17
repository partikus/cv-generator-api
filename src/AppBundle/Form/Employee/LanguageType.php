<?php

namespace AppBundle\Form\Employee;

use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class LanguageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('iso3', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('level', IntegerType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ]);
    }
}
