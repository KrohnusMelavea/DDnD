SELECT vProductListingUUID, sName, iPrice, iQuantity 
FROM TB_OrderProductListings 
JOIN TB_ProductListings 
 ON TB_OrderProductListings.vProductListingUUID = TB_ProductListings.vUUID 
JOIN TB_Products 
 ON TB_ProductListings.vProductUUID = TB_Products.vUUID 
WHERE TB_OrderProductListings.vOrderUUID = UNHEX('%s');