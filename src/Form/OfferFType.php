<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Motive;
use App\Repository\StatusRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Skill;
use App\Entity\Status;
use App\Entity\Type as AppEntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class OfferFType extends AbstractType
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            'attr' => [
                'placeholder' => 'Enter title'
            ]
        ])
        ->add('description', TextType::class, [
            'attr' => [
                'placeholder' => 'Enter description'
            ]
        ])
        ->add('author', EmailType::class, [
            'attr' => array(
                'placeholder' => 'Enter author email'
            )
        ])
        ->add('CreatedAt', DateType::class,[
            'widget'=>'single_text',
        ])
        ->add('motive', EntityType::class, [
            'class' => Motive::class,
            'placeholder' => 'Select a motive', 
        ])
        ->add('type', EntityType::class, [
            'class' => AppEntityType::class,
            'placeholder' => 'Select your offer type', 
        ])
        ->add('location', EntityType::class, [
            'class' => Location::class,
            'placeholder' => 'Select offer location', 
        ])
        ->add('status', EntityType::class, [
            'class' => Status::class,
            'expanded' => true,
            'multiple' => false,
            'query_builder' => function (StatusRepository $repository) {
                return $repository->createQueryBuilder('s');
            },
        ])
        ->add('file', FileType::class, [
            'label' => 'Upload An Image/PDF',
            'required' => false, // Set to true if the file upload is mandatory
        ]);

}
}
