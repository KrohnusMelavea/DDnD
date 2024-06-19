SELECT * 
FROM TB_Products 
WHERE TB_Products.vUUID IN (
 SELECT vProductUUID 
 FROM TB_ProductListings 
 WHERE TB_ProductListings.vUUID = UNHEX('%s')
);