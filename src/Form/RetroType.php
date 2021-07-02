<?php

namespace App\Form;

use App\Entity\Retro;

use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use function Sodium\add;

class RetroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('retroName', TextType::class)
            ->add('teamName', TextType::class)
            ->add('start_date',DateTimeType::class,[
                'widget' => 'single_text',
                'html5'   => true
            ])
            ->add('end_date',DateTimeType::class,[
                'widget' => 'single_text',
                'html5'   => true
            ])
            ->add('create',SubmitType::class)

            ->getForm()
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Retro::class,
        ]);
    }
}
