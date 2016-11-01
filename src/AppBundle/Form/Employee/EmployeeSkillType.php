<?php

namespace AppBundle\Form\Employee;

use AppBundle\Entity\EmployeeLanguage;
use AppBundle\Entity\EmployeeSkill;
use AppBundle\Entity\Language;
use AppBundle\Entity\Skill;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeSkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('startDate', DateTimeType::class, [
            'widget' => 'single_text',
        ]);
        $builder->add('lastUsage', DateTimeType::class, [
            'widget' => 'single_text',
        ]);
        $builder->add('level', IntegerType::class);
        $builder->add('skill', EntityType::class, [
            'class' => Skill::class,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmployeeSkill::class
        ]);
    }
}
