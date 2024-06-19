SELECT vUUID, sAddress, iStatus, dtOrdered 
FROM TB_Orders 
WHERE TB_Orders.vProfileUUID = UNHEX('%s');