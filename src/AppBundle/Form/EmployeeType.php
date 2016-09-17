<?php

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use AppBundle\Entity\EmployeeLanguage;
use AppBundle\Form\Employee\EmployeeLanguageType;
use AppBundle\Form\Employee\EmployeeSkillType;
use AppBundle\Form\Employee\ProjectType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('username', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('jobTitle', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('experience', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('education', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('hobbies', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Email(),
                ]
            ])
            ->add('languages', CollectionType::class, [
                'entry_type' => EmployeeLanguageType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
            ->add('projects', CollectionType::class, [
                'entry_type' => ProjectType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
            ->add('skills', CollectionType::class, [
                'entry_type' => EmployeeSkillType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class
        ]);
    }
}
