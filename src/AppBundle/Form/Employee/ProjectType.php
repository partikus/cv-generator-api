<?php

namespace AppBundle\Form\Employee;

use AppBundle\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('company', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('role', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('responsibilities', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('description', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('startDate', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank(),
                    new DateTime(),
                ],
            ])
            ->add('endDate', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank(),
                    new DateTime(),
                ],
            ])
            ->add('skills', CollectionType::class, [
                'entry_type' => ProjectSkillType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class
        ]);
    }
}
