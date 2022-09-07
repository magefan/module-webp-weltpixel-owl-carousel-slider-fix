<?php
/**
* Copyright © Magefan (support@magefan.com). All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magefan\WebPWeltPixelOwlCarouselSlider\Plugin\WeltPixel\OwlCarouselSlider\Block\Slider;

use Magefan\WebP\Api\CreateWebPImageInterface;
use Magefan\WebP\Api\GetWebPUrlInterface;
use Magefan\WebP\Model\Config;
use Magento\Store\Model\StoreManagerInterface;

class Custom
{
    /**
     * @var CreateWebPImageInterface
     */
    private $createWebPImage;

    /**
     * @var GetWebPUrlInterface
     */
    private $getWebPUrl;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var
     */
    protected $mediaUrl;

    /**
     * Gallery constructor.
     * @param CreateWebPImageInterface $createWebPImage
     * @param GetWebPUrlInterface $getWebPUrl
     * @param Config $config
     */
    public function __construct(
        CreateWebPImageInterface $createWebPImage,
        GetWebPUrlInterface $getWebPUrl,
        Config $config,
        StoreManagerInterface $storeManager

    ) {
        $this->createWebPImage = $createWebPImage;
        $this->getWebPUrl = $getWebPUrl;
        $this->config = $config;
        $this->_storeManager = $storeManager;
    }

    /**
     * @param \WeltPixel\OwlCarouselSlider\Block\Slider\Custom $subject
     */
  /*  public function beforeToHtml(\WeltPixel\OwlCarouselSlider\Block\Slider\Custom $subject)
    {
        if ($this->config->isEnabled()) {
            $subject->setTemplate('Magefan_WebPWeltPixelOwlCarouselSlider::sliders/custom.phtml');
        }
    }*/

    /**
     * @param \WeltPixel\OwlCarouselSlider\Block\Slider\Custom $subject
     * @param $result
     * @return mixed
     */
    public function afterGetSliderConfiguration(\WeltPixel\OwlCarouselSlider\Block\Slider\Custom $subject, $result)
    {
        if (!$this->config->isEnabled()) {
            return $result;
        }

        if (isset($result['banner_config'])) {
            $banners = $result['banner_config'];

            foreach ($banners as $key => $banner) {
                foreach (['image', 'mobile_image', 'thumb_image'] as $imageType) {
                    if ($banner[$imageType]) {
                        $banner[$imageType] = $this->convertToWebp($banner[$imageType]);
                    }
                }

                $banners[$key] = $banner;
            }

            $result['banner_config'] = $banners;
        }

        return $result;
    }

    /**
     * Replace original image on webp image
     * @param string $image
     * @return string
     */
    private function convertToWebp(string $imageUrl)
    {
        $imageUrl = $this->getMediaUrl() . $imageUrl;

        if ($this->createWebPImage->execute($imageUrl)) {
            $imageUrl = $this->getWebPUrl->execute($imageUrl);
            $imageUrl = str_replace($this->getMediaUrl(), '', $imageUrl);
        }

        return $imageUrl;
    }

    /**
     * @return mixed
     */
    public function getMediaUrl()
    {
        if (!$this->mediaUrl) {
            $this->mediaUrl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        }

        return $this->mediaUrl;
    }
}
