<?php
/**
 * @package     Joomla_Payments
 * @subpackage  plg_payments_epayco
 *
 * @author      Techjoomla <extensions@techjoomla.com>
 * @copyright   Copyright (C) 2009 - 2018 Techjoomla. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
   function openCheckout() {
      var orderData = <?php echo json_encode($vars); ?>;
      var checkoutData = {
         name: "Order #" + orderData.order_id,
         description: orderData.item_name,
         invoice: orderData.order_id,
         currency: orderData.currency_code,
         amount: orderData.amount,
         tax_base: "0",
         tax: "0",
         lang: "en",
         confirmation: orderData.confirmUrl,
         response: orderData.return,
         external: orderData.external.toString()
      };
      var checkoutHandler = ePayco.checkout.configure({
         key: orderData.publicKey,
         test: orderData.test
      });

      checkoutHandler.open(checkoutData);
   }
</script>
<button 
   style="padding: 0; background: none; border: none; cursor: pointer;" 
   class="epayco-button-render"
   onclick="openCheckout()">
      <img src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/boton_de_cobro_epayco2.png">
</button>