SELECT *
FROM TB_OrderProductListings
WHERE TB_OrderProductListings.vOrderUUID = UNHEX('%s');