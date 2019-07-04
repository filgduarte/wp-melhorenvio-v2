<?php

namespace Controllers;

use Controllers\HelperController;

class ProductsController 
{
    /**
     * @param [type] $order_id
     * @return void
     */
    public function getProductsOrder($order_id) 
    {
        $order  = wc_get_order( $order_id );

        $products = [];

        foreach( $order->get_items() as $item_id => $item_product ){

            $_product = $item_product->get_product();

            if (is_bool($_product)) {
                continue;
            }

            $products[] = [
                "name"            => $_product->get_name(),
                "quantity"        => $item_product->get_quantity(),
                "unitary_value"   => round($_product->get_price(), 2),
                "insurance_value" => round($_product->get_price(), 2),
                "weight"          => (new HelperController())->converterIfNecessary($_product->weight),
                "width"           => (new HelperController())->converterDimension($_product->width),
                "height"          => (new HelperController())->converterDimension($_product->height),
                "length"          => (new HelperController())->converterDimension($_product->length)
            ];
        }

        return $products;
    }


    /**
     * @param [type] $order_id
     * @return void
     */
    public function getInsuranceValue($order_id) 
    {
        $order  = wc_get_order( $order_id );
        $total = 0;

        foreach( $order->get_items() as $item_id => $item_product ){
            $_product = $item_product->get_product();
            $total = $total + ($_product->get_price() * $item_product->get_quantity());
        }   

        return round($total, 2);
    }
}
