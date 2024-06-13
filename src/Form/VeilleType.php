<?php

namespace App\Form;

use App\Entity\Veille;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;

class VeilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('dateD',DateType::class, [
				'widget' => 'single_text',
				'label' => "Date d'acquisition"
			])
            ->add('acquisition')
            ->add('veilleContinue')
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Veille::class,
        ]);
    }
}
