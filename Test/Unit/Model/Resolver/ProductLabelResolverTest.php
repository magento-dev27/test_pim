<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Test\PIM\Test\Unit\Model\Resolver;

use Magento\Eav\Model\Config;
use Magento\Eav\Model\Entity\Attribute\AbstractAttribute;
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Test\PIM\Model\Resolver\ProductLabelResolver;

class ProductLabelResolverTest extends TestCase
{
    /**
     * @var Config|MockObject
     */
    protected $eavConfigMock;

    /**
     * @var ProductLabelResolver
     */
    private $model;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->eavConfigMock = $this->createMock(Config::class);
        $this->model = new ProductLabelResolver($this->eavConfigMock);
    }

    /**
     *  Test resolve method
     *
     * @param string|null $attributeValue
     * @param string|null $expectedResult
     * @return void
     * @dataProvider resolveDataProvider
     * @throws \Exception
     */
    public function testResolve(?string $attributeValue, ?string $expectedResult): void
    {
        $options = [
            ['value' => '', 'label' => ' '],
            ['value' => '0', 'label' => __('New')],
            ['value' => '1', 'label' => __('Sale')],
            ['value' => '2', 'label' => __('Exclusive')]
        ];

        $sourceMock = $this->createMock(AbstractSource::class);
        $attributeMock = $this->createMock(AbstractAttribute::class);
        $field = $this->createMock(Field::class);
        $context = $this->createMock(ContextInterface::class);
        $resolveInfo = $this->createMock(ResolveInfo::class);

        $sourceMock->expects($this->any())
            ->method('getAllOptions')
            ->willReturn($options);

        $attributeMock->expects($this->any())
            ->method('getSource')
            ->willReturn($sourceMock);

        $this->eavConfigMock->expects($this->any())
            ->method('getAttribute')
            ->willReturn($attributeMock);

        $value = ['product_label' => $attributeValue];

        $result = $this->model->resolve($field, $context, $resolveInfo, $value, []);
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * DataProvider for testResolve method
     *
     * @return array
     */
    protected function resolveDataProvider(): array
    {
        return [
            [null, null],
            ['', null],
            ['0', 'New'],
            ['1', 'Sale'],
            ['2', 'Exclusive'],
            ['3', null]
        ];
    }
}
