<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Test\PIM\Test\Unit\Model\Product\Attribute\Source;

use PHPUnit\Framework\TestCase;
use Test\PIM\Model\Product\Attribute\Source\ProductLabel;

class ProductLabelTest extends TestCase
{
    /**
     * @var ProductLabel
     */
    private $model;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->model = new ProductLabel();
    }

    /**
     * Test get all options method
     *
     * @return void
     */
    public function testGetAllOptions()
    {
        $expectedResult = [
            ['value' => '', 'label' => ' '],
            ['value' => '0', 'label' => __('New')],
            ['value' => '1', 'label' => __('Sale')],
            ['value' => '2', 'label' => __('Exclusive')]
        ];
        $this->assertEquals($expectedResult, $this->model->getAllOptions());
    }
}
