<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/20/2016
 * Time: 3:38 AM
 */

namespace Aaron\NavText\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Plugin
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function afterGetHtml(
        $subject,
        $html
    )
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $toggle = $this->scopeConfig->getValue('design/nav_text/toggle', $storeScope);
        if ($toggle === '1') {
            $text = $this->scopeConfig->getValue('design/nav_text/text', $storeScope);
            $html = '<span class="Aaron-Nav-Text">' . $text . '</span>' . $html;
            return $html;
        }
        return $html;
    }
}