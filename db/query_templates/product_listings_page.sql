SELECT TB_ProductListings.vUUID as vProductListingUUID, vProductUUID, sName, iStore, sDescription, iStock, iPrice, dtStart 
FROM TB_ProductListings JOIN TB_Products ON vProductUUID = TB_Products.vUUID 
ORDER BY %s %s
LIMIT %u OFFSET %u