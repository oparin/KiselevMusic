<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 2/15/15
 * Time: 3:16 PM
 */

namespace KiselevMusic\AdminBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class PhotoFormType
 * @package KiselevMusic\AdminBundle
 */
class PhotoFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', 'file', array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('public', 'checkbox', array(
                'required'  => false
            ))
            ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KiselevMusic\PhotoBundle\Entity\Photo',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'photo_form_type';
    }
}