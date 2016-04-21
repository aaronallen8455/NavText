<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/20/2016
 * Time: 1:25 AM
 */

namespace Aaron\NavText\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class NavText extends Template
{
    protected $scopeConfig;

    /*public function _construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }*/
    public function __construct(Template\Context $context, ScopeConfigInterface $scopeConfig, array $data)
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getText()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $text = $this->scopeConfig->getValue('design/nav_text/text', $storeScope);
        return $text;
    }
}