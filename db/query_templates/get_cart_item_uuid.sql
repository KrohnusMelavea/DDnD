SELECT vUUID
FROM TB_CartItems
WHERE
 TB_CartItems.vProfileUUID = UNHEX('%s') AND
 TB_CartItems.vProductListingUUID = UNHEX('%s');