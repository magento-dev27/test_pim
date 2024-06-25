# Test PIM

    ``test/module-pim``

- [Main Functionalities](#markdown-header-main-functionalities)
- [Installation](#markdown-header-installation)
- [Specifications](#markdown-header-specifications)
- [Attributes](#markdown-header-attributes)
- [GraphQl](#markdown-header-graphQl)
- [How does it work?](#markdown-header-working)

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

## How does it work ?
![New Product](https://github.com/magento-dev27/test_pim/assets/20458538/cc50d199-0c3d-4285-b419-936e3e2528a9)
![Enabled Product](https://github.com/magento-dev27/test_pim/assets/20458538/197d1122-1b58-422f-aeb9-cab3753b75c0)
![Disabled Product](https://github.com/magento-dev27/test_pim/assets/20458538/8c2a571a-95cf-40e4-9556-8ba7d66c575e)
![Postman API call](https://github.com/magento-dev27/test_pim/assets/20458538/f613f64b-f256-4f31-8541-4c598a6af12f)
![Uploading Sample Req Res.png](https://github.com/magento-dev27/test_pim/assets/20458538/4b3a43c5-e738-40ae-8fa1-4abe92d4a613)


    
