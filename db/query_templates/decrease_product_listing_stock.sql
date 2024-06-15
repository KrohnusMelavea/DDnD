UPDATE TB_ProductListings
SET TB_ProductListings.iStock = TB_ProductListings.iStock - %u
WHERE TB_ProductListings.vUUID = UNHEX('%s');