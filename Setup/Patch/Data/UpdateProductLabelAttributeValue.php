<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Test\PIM\Setup\Patch\Data;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Area;
use Magento\Framework\App\State;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Psr\Log\LoggerInterface;

class UpdateProductLabelAttributeValue implements DataPatchInterface
{
    private const ATTRIBUTE_CODE = 'product_label';

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteria
     * @param State $state
     * @param LoggerInterface $logger
     */
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private SearchCriteriaBuilder $searchCriteria,
        private State $state,
        private LoggerInterface $logger
    ) {
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies(): array
    {
        return [
            AddProductLabelAttribute::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        try {
            $this->state->getAreaCode();
        } catch (LocalizedException $e) {
            $this->state->setAreaCode(Area::AREA_ADMINHTML);
        }

        $searchCriteria = $this->searchCriteria->addFilter('status', Status::STATUS_ENABLED)->create();
        $products = $this->productRepository->getList($searchCriteria)->getItems();

        foreach ($products as $product) {
            try {
                $product->setData(self::ATTRIBUTE_CODE, 0);
                $this->productRepository->save($product);
            } catch (LocalizedException $e) {
                $this->logger->error(
                    'Encountered an error while updating product (SKU: ' . $product->getSku() . '): ' . $e->getMessage()
                );
            }
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getAliases(): array
    {
        return [];
    }
}
