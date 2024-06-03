SELECT vUUID, vProductUUID, iStock, iPrice, dtStart FROM (
   SELECT @rank := @idx + 1 AS idx, vUUID, vProductUUID, iStock, iPrice, dtStart FROM
    (SELECT @idx = %u) dummy
    JOIN TB_ProductListings ORDER BY %s ASC) sorted
   ORDER BY IF(idx <= %u, idx, %u);