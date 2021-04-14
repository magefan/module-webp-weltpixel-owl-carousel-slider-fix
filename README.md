# Fix for # [Magento 2 WebP Extension](https://magefan.com/magento-2-webp-optimized-images) by Magefan and WeltPixel OwlCarouselSlider

    ``magefan/module-webp-weltpixel-owl-carousel-slider-fix``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Fix the incompatibility.

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Magefan/WebPWeltPixelOwlCarouselSlider`
 - Run the commands:
``
  php bin/magento module:enable Magefan_WebPWeltPixelOwlCarouselSlider
  
  php bin/magento setup:upgrade\*
  
  php bin/magento cache:flush
  ``

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require magefan/module-webpweltpixelowlcarouselslider`
 - enable the module by running `php bin/magento module:enable Magefan_WebPWeltPixelOwlCarouselSlider`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - Plugin
	- afterGetSliderConfiguration - WeltPixel\OwlCarouselSlider\Block\Slider\Custom > Magefan\WebPWeltPixelOwlCarouselSlider\Plugin\WeltPixel\OwlCarouselSlider\Block\Slider\Custom


## Attributes



