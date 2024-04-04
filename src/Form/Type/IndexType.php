<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IndexType extends AbstractType
{
    const DEFAULT_LANG = "ru"; 
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $i18n = json_decode(file_get_contents('./i18n.json'), true);
        $i18n = isset($i18n[$options["lang"]])?$i18n[$options["lang"]]:$i18n[self::DEFAULT_LANG];
        $builder
            ->add('firstname', TextType::class, ['label' => $i18n["firstname"]])
            ->add('lastname', TextType::class, ['label' => $i18n["lastname"]])
            ->add('description', TextType::class, ['label' => $i18n["description"]])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'lang' => "ru"
        ));
    }
    
}