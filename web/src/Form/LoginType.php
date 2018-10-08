<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LoginType extends AbstractType
{

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'email',
                TextType::class,
                array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'form-control',
                        'type'  => 'email'
                    )
                )
            )
            ->add(
                'password',
                PasswordType::class,
                array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )
            ->add(
                'login',
                SubmitType::class,
                array(
                    'label' => 'Login',
                    'attr' => array(
                        'class' => 'btn btn-lg btn-primary btn-block'
                    )
                )
            );
    }

}
