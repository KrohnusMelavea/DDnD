SELECT vProductUUID, sName, iStore, sDescription, TB_ProductListings.vUUID AS vProductListingUUID, iStock, iPrice, dtStart 
FROM TB_ProductListings JOIN TB_Products ON vProductUUID = TB_Products.vUUID 
ORDER BY %s %s
LIMIT %u OFFSET %u