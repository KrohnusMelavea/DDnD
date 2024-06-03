SELECT vProductListingUUID, vProductUUID, sName, iStore, sDescription, iStock, iPrice, dtStart FROM (
 SELECT @rank := @idx + 1 AS idx, vUUID as vProductListingUUID, vProductUUID, iStock, iPrice, dtStart FROM
  (SELECT @idx = %u) dummy
  JOIN TB_ProductListings ORDER BY %s ASC) sorted
  JOIN TB_Products ON vProductUUID = TB_Products.vUUID
 ORDER BY IF(idx <= %u, idx, %u);