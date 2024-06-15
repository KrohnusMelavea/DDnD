INSERT INTO TB_Orders
(vUUID, vProfileUUID, sAddress, iStatus, dtOrdered) VALUES
(UNHEX('%s'), UNHEX('%s'), '%s', 0, NOW());