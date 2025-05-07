<?php

namespace Kapil\OutOfStockSort\Plugin;

use Kapil\OutOfStockSort\Model\Config;
 

class SortStockStatusPlugin
{   
    public $config;

    public function __construct(
        Config $config
    ){
        $this->config = $config;
    }
    public function afterGetLoadedProductCollection(
        $subject,
        $result
        
    ) { 
        if($this->config->isEnabled())
        {$filteredItems = [];

        foreach ($result as $product) {
            if ($product->isSalable()) {
                $filteredItems[$product->getId()] = $product;
            }
        }
        foreach ($result as $product) {
            if (!$product->isSalable()) {
                $filteredItems[$product->getId()] = $product;
            }
        }
        $reflection = new \ReflectionClass($result);
        $itemsProperty = $reflection->getProperty('_items');
        $itemsProperty->setAccessible(true);
        $itemsProperty->setValue($result, $filteredItems);
        }

       
        return $result;
    }

}
