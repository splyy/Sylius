<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\PromotionsBundle\Form\Type;

use Doctrine\Common\Persistence\ObjectRepository;
use Sylius\Bundle\PromotionsBundle\Form\DataTransformer\CouponToCodeTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Coupon to code type.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class CouponToCodeType extends AbstractType
{
    /**
     * Coupon manager.
     *
     * @var ObjectRepository
     */
    private $couponRepository;

    /**
     * See CouponType description for information about data class.
     *
     * @param ObjectRepository $couponRepository
     */
    public function __construct(ObjectRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new CouponToCodeTransformer($this->couponRepository));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => null
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sylius_coupon_to_code';
    }
}
