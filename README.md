# Test PIM

    ``test/module-pim``


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
![Enabled Product](https://github.com/magento-dev27/test_pim/assets/20458538/c3830d67-f875-4c3a-91a6-08ede65b01cc)
![Disabled Product](https://github.com/magento-dev27/test_pim/assets/20458538/5140b1c4-e768-49f3-9445-6f144417eaee)
![New Product](https://github.com/magento-dev27/test_pim/assets/20458538/16c9870c-4a06-4c74-a1ec-995a181d3c18)
![Sample-Req-Response](https://github.com/magento-dev27/test_pim/assets/20458538/3e983e24-6901-4b23-a39c-53b6493f5311)
![Postman API call](https://github.com/magento-dev27/test_pim/assets/20458538/37d4a842-1384-49f0-84fc-304df54e0365)
![Code Quality](https://github.com/magento-dev27/test_pim/assets/20458538/6bb7ad2f-0b86-456e-bd62-6c381dd71901)
![Coverage](https://github.com/magento-dev27/test_pim/assets/20458538/276c06e2-6346-4209-b2f4-279ded9d628d)




    
