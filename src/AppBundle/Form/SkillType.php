<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;

class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('description', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                ]
            ])
            ->add('url', TextType::class, [
                'constraint' => [
                    new NotBlank(),
                    new Url(),
                ]
            ]);
    }
}
