<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 18.07.15
 * Time: 17:02
 */

namespace KiselevMusic\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class PosterFormType
 * @package KiselevMusic\AdminBundle\Form\Type
 */
class PosterFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'date', array(
                'widget'    => 'single_text',
                'attr'      => array(
                    'class' => 'form-control dp'
                ),
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('description', 'textarea', array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KiselevMusic\AdminBundle\Entity\Poster',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'poster_form_type';
    }
} 