<?php

namespace App\Form;

use App\Entity\Checkout;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NameOnCard')
            ->add('cardNumber')
            ->add('expiryDate')
            ->add('seat');
//            ->add('my_file', FileType::class, [
//                'mapped' => false,
//                'label' => " If Payment is Accepted please upload receipt",
//                'required'=> false
//                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Checkout::class,
        ]);
    }
}
