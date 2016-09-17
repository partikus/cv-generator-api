<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('description', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('url', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Url(),
                ]
            ]);
    }
}
