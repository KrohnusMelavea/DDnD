SELECT *
FROM TB_CartItems
WHERE TB_CartItems.vProfileUUID = UNHEX('%s');