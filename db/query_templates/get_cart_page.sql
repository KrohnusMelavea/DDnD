SELECT vProductListingUUID, sName, sDescription, iPrice, iQuantity
FROM TB_CartItems 
JOIN TB_ProductListings ON TB_CartItems.vProductListingUUID = TB_ProductListings.vUUID
JOIN TB_Products ON TB_ProductListings.vProductUUID = TB_Products.vUUID
WHERE TB_CartItems.vProfileUUID = UNHEX('%s')
ORDER BY %s %s
LIMIT %u OFFSET %u;