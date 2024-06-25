<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Test\PIM\Model\Resolver;

use Magento\Eav\Model\Config;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * @inheritdoc
 */
class ProductLabelResolver implements ResolverInterface
{
    private const ATTRIBUTE_CODE = 'product_label';

    /**
     * @param Config $eavConfig
     */
    public function __construct(
        protected Config $eavConfig
    ) {
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field       $field,
        $context,
        ResolveInfo $info,
        array       $value = null,
        array       $args = null
    ) {
        if (!isset($value[self::ATTRIBUTE_CODE])) {
            return null;
        }

        $attribute = $this->eavConfig->getAttribute('catalog_product', self::ATTRIBUTE_CODE);
        $options = $attribute->getSource()->getAllOptions();
        foreach ($options as $option) {
            if ($option['value'] == $value[self::ATTRIBUTE_CODE]) {
                return $option['label'] === " " ? null : $option['label'];
            }
        }
        return null;
    }
}
