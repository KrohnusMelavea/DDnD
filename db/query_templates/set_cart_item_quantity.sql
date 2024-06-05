UPDATE TB_CartItems
SET TB_CartItems.iQuantity = %u
WHERE
 TB_CartItems.vProfileUUID = UNHEX('%s') AND
 TB_CartItems.vProductListingUUID = UNHEX('%s');