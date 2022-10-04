<?php
/**
 * Copyright © 2022 - Codegenixuk All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Codegenixuk\FooterUsp\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }

    public function getBlockEnable($block = 'block1')
    {
        return (bool) $this->scopeConfig->getValue(
            'codegenixuk_footerusp/' . $block . '/enabled',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getIcon($block = 'block1')
    {
        $icon = $this->scopeConfig->getValue(
            'codegenixuk_footerusp/' . $block . '/icon',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if (!empty($icon)) {
            return '<i class="icon ' . $icon . '"></i>';
        }

        return '';
    }

    public function getTitle($block = 'block1')
    {
        $title = $this->scopeConfig->getValue(
            'codegenixuk_footerusp/' . $block . '/title',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if (!empty($title)) {
            return '<h4>' . __($title) . '</h4>';
        }

        return '';
    }

    public function getIntro($block = 'block1')
    {
        $intro = $this->scopeConfig->getValue(
            'codegenixuk_footerusp/' . $block . '/introText',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if (!empty($intro)) {
            return '<p>' . __($intro) . '</p>';
        }

        return '';
    }

    public function getLink($block = 'block1')
    {
        $url = $this->scopeConfig->getValue(
            'codegenixuk_footerusp/' . $block . '/linkUrl',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        $text = $this->scopeConfig->getValue(
            'codegenixuk_footerusp/' . $block . '/linkText',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        if (!$url || !$text) {
            return '';
        }

        return '<a href="' . $url . '" class="action primary">' . __($text) . '</a>';
    }
}
