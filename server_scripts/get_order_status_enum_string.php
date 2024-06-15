<?php

function get_order_status_enum_string($status) {
 switch ($status) {
  case 0:
   return "Ordered";    /* Ordered, awaiting Delivery / Pickup */
  case 1:
   return "Complete";   /* Delivered / Picked Up */
  case 2:
   return "Incomplete"; /* No Delivery / Pickup was Possible */
  case 3:
   return "Partial";    /* Partial Delivery / Pickup Occurred */
  default:
   return "InvalidEnum";
 }
}

?>