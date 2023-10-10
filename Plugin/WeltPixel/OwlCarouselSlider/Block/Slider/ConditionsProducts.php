<?php

declare(strict_types=1);

namespace Magefan\WebPWeltPixelOwlCarouselSlider\Plugin\WeltPixel\OwlCarouselSlider\Block\Slider;

use Magefan\WebP\Model\Config;

class ConditionsProducts
{

    /**
     * @var Config
     */
    private $config;

    public function __construct(
        Config $config
    ) {
        $this->config = $config;
    }

     public function beforeToHtml($subject)
      {
          if ($this->config->isEnabled()) {
              $subject->setTemplate('Magefan_WebPWeltPixelOwlCarouselSlider::sliders/products.phtml');
          }
      }
}
