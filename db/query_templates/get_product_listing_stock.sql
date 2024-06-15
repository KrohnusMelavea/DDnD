SELECT iStock
FROM TB_ProductListings
WHERE TB_ProductListings.vUUID = UNHEX('%s');