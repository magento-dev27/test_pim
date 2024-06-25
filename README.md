# Test PIM

    ``test/module-pim``

- [Main Functionalities](#markdown-header-main-functionalities)
- [Installation](#markdown-header-installation)
- [Specifications](#markdown-header-specifications)
- [Attributes](#markdown-header-attributes)
- [Attribute Set](#markdown-header-attributeset)

## Main Functionalities

To add new product attributes and expose to graphql

## Installation

In production mode please use the `--keep-generated` option

### Type 1: Zip file

- Unzip the zip file in `app/code/Test`
- Enable the module by running `php bin/magento module:enable Test_PIM`
- Apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

- Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
- Add the composer repository to the configuration by
  running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
- Install the module composer by running `composer require test/module-pim`
- enable the module by running `php bin/magento module:enable Test_PIM`
- apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`

## Specifications

## Attributes

- Product - Product Label (product_label)

## GraphQL

- Query - Get Products (getProducts)
  - products (product_label)
