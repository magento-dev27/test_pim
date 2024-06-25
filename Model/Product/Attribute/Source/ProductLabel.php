<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Test\PIM\Model\Product\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class ProductLabel extends AbstractSource
{
    /**
     * Product Label options
     *
     * @return array
     */
    public function getAllOptions(): array
    {
        $this->_options = [
            ['value' => '', 'label' => ' '],
            ['value' => '0', 'label' => __('New')],
            ['value' => '1', 'label' => __('Sale')],
            ['value' => '2', 'label' => __('Exclusive')]
        ];
        return $this->_options;
    }
}
