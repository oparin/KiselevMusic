<?php
/**
 * Created by PhpStorm.
 * User: kalyan
 * Date: 12/16/15
 * Time: 9:46 AM
 */

namespace KiselevMusic\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class VideoFormType
 * @package KiselevMusic\AdminBundle\Form\Type
 */
class VideoFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('file', 'file', array(
                'constraints' => array(
                    new NotBlank()
                ),
//                'mapping'   => 'video_upload'
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
            'data_class' => 'KiselevMusic\VideoBundle\Entity\Video',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'video_form_type';
    }
}
