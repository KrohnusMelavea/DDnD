USE DB_DDnD;

INSERT INTO TB_Manufacturers (vUUID, sName) VALUES
(UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'Bungo'),
(UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'Frungo');

INSERT INTO TB_Products (vUUID, vManufacturerUUID, sName, iStore, sDescription) VALUES
(UNHEX('02f9d80964984490a50629acb160eca6'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 0', 0, 'product description'),
(UNHEX('035b306abe244bbfad16bc252a5d724c'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 1', 0, 'product description'),
(UNHEX('169066638eaa4fb9b23d0ad89cd015a6'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 2', 0, 'product description'),
(UNHEX('16ea503b29e24bfca94749da15d51122'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 3', 0, 'product description'),
(UNHEX('27868d9691fa46daad4f3f6b227d0e09'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 4', 0, 'product description'),
(UNHEX('27fd38ae8f474c96b77a755d4ad7d1b0'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 5', 0, 'product description'),
(UNHEX('36ee4a2a13c24f80a4bf4f71ec299c47'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 6', 0, 'product description'),
(UNHEX('584bc574f1fa433f90b2d1fafba6b032'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 7', 0, 'product description'),
(UNHEX('63cb7d930eda431095faacde7a638af4'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 8', 0, 'product description'),
(UNHEX('877e48f40303451192eb363894841eb6'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 9', 0, 'product description'),
(UNHEX('8fd2f4353186497685b021d89bebbd15'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 10', 1, 'product description'),
(UNHEX('974dc3cbfba34f0d80a3fffaa3edae63'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 11', 1, 'product description'),
(UNHEX('978c4b4f72414c5fb4ed65e3a6a99104'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 12', 1, 'product description'),
(UNHEX('9a06a3d87fa340ed9f9c860cd2be1a46'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 13', 1, 'product description'),
(UNHEX('ad908a47c2ed4ea395ad078bd280ee89'), UNHEX('ebc0f0b132914e81a654c93bd3611bff'), 'product 14', 1, 'product description'),
(UNHEX('ce586142efbf43c88f9508727f00e6d7'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 15', 1, 'product description'),
(UNHEX('e18d0ec88db3442ab477b65cbc5faa3d'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 16', 1, 'product description'),
(UNHEX('e5014df7d0984d019cd5f39476a1759c'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 17', 1, 'product description'),
(UNHEX('e630e14a3bd540829ae43aa6bc50a892'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 18', 1, 'product description'),
(UNHEX('f4ce5996eaa24db295582885a9cbbfaa'), UNHEX('02dacfe1216f42248dd9d338983d1fe3'), 'product 19', 1, 'product description');

INSERT INTO TB_ProductListings (vUUID, vProductUUID, iStock, iPrice, dtStart, dtEnd) VALUES
(UNHEX('69a9d7e39c554f15ad503688fa8089b7'), UNHEX('02f9d80964984490a50629acb160eca6'), 0, 200, NOW(), NULL),
(UNHEX('fc2b7514fd6b449299635194685b2f5d'), UNHEX('035b306abe244bbfad16bc252a5d724c'), 1, 190, NOW(), NULL),
(UNHEX('7b3522befd7a48098cdb909ffd332a1b'), UNHEX('169066638eaa4fb9b23d0ad89cd015a6'), 2, 180, NOW(), NULL),
(UNHEX('d32d5a7d8c7842c38a2bfa62c207a6c6'), UNHEX('16ea503b29e24bfca94749da15d51122'), 3, 170, NOW(), NULL),
(UNHEX('89a3532dfcc042ffa52bcfe75f879008'), UNHEX('27868d9691fa46daad4f3f6b227d0e09'), 4, 160, NOW(), NULL),
(UNHEX('923a20e6a36e42c3a2163f3786ed1f7d'), UNHEX('27fd38ae8f474c96b77a755d4ad7d1b0'), 5, 150, NOW(), NULL),
(UNHEX('88b1ef516f9c429b9a611560a5b8cb69'), UNHEX('36ee4a2a13c24f80a4bf4f71ec299c47'), 6, 140, NOW(), NULL),
(UNHEX('efbec854007840758ee7f3a342131fe6'), UNHEX('584bc574f1fa433f90b2d1fafba6b032'), 7, 130, NOW(), NULL),
(UNHEX('51b072009a3f4d42ac625fedcba435cf'), UNHEX('63cb7d930eda431095faacde7a638af4'), 8, 120, NOW(), NULL),
(UNHEX('7aa152b4a9b2449187f130d219949a69'), UNHEX('877e48f40303451192eb363894841eb6'), 9, 110, NOW(), NULL),
(UNHEX('28fe190fb30f4d0eaf805c89c77acbf8'), UNHEX('8fd2f4353186497685b021d89bebbd15'), 10, 100, NOW(), NULL),
(UNHEX('9664c538da4c4f0890de2562884ee5c9'), UNHEX('974dc3cbfba34f0d80a3fffaa3edae63'), 11, 90, NOW(), NULL),
(UNHEX('50dbc6d54a6b4307a89945dd6057b327'), UNHEX('978c4b4f72414c5fb4ed65e3a6a99104'), 12, 80, NOW(), NULL),
(UNHEX('8df3b92da11248109a5a43d88a92f960'), UNHEX('9a06a3d87fa340ed9f9c860cd2be1a46'), 13, 70, NOW(), NULL),
(UNHEX('92b7e05aa2724758896d06bb54433e66'), UNHEX('ad908a47c2ed4ea395ad078bd280ee89'), 14, 60, NOW(), NULL),
(UNHEX('71b51d158bac4ce5aba0db8279c90f3f'), UNHEX('ce586142efbf43c88f9508727f00e6d7'), 15, 50, NOW(), NULL),
(UNHEX('8e0891eed4d6407c8e70725aa5a2989f'), UNHEX('e18d0ec88db3442ab477b65cbc5faa3d'), 16, 40, NOW(), NULL),
(UNHEX('ded81d365b9a4a1bb3a9dbc854320166'), UNHEX('e5014df7d0984d019cd5f39476a1759c'), 17, 30, NOW(), NULL),
(UNHEX('46ea70f462ef488f8bdce3d04e253790'), UNHEX('e630e14a3bd540829ae43aa6bc50a892'), 18, 20, NOW(), NULL),
(UNHEX('3e6a95783b3440e0a61fc2c07a5d7773'), UNHEX('f4ce5996eaa24db295582885a9cbbfaa'), 19, 10, NOW(), NULL);

INSERT INTO TB_ProductListingImages (vUUID, vProductListingUUID, iIndex, sPhotoURL, sCaption) VALUES
(UNHEX('7c7f48e582ed42c2a9c7b07f5e9ec7eb'), UNHEX('69a9d7e39c554f15ad503688fa8089b7'), 0, '/db/products/69a9d7e39c554f15ad503688fa8089b7/image.png', ''),
(UNHEX('dcb6e063a4434f78b1111bb2b0c6b65c'), UNHEX('fc2b7514fd6b449299635194685b2f5d'), 0, '/db/products/fc2b7514fd6b449299635194685b2f5d/image.png', ''),
(UNHEX('628700f0ca60481596b94601dc2f830c'), UNHEX('7b3522befd7a48098cdb909ffd332a1b'), 0, '/db/products/7b3522befd7a48098cdb909ffd332a1b/image.png', ''),
(UNHEX('09e2b3398a674b56b8e832aabd55680e'), UNHEX('d32d5a7d8c7842c38a2bfa62c207a6c6'), 0, '/db/products/d32d5a7d8c7842c38a2bfa62c207a6c6/image.png', ''),
(UNHEX('7ec126699414465eb0baea50506e49b8'), UNHEX('89a3532dfcc042ffa52bcfe75f879008'), 0, '/db/products/89a3532dfcc042ffa52bcfe75f879008/image.png', ''),
(UNHEX('fe429183d5a04622af46f49b78d8e1e3'), UNHEX('923a20e6a36e42c3a2163f3786ed1f7d'), 0, '/db/products/923a20e6a36e42c3a2163f3786ed1f7d/image.png', ''),
(UNHEX('da262808f7134ce4ade81c7c014e9a83'), UNHEX('88b1ef516f9c429b9a611560a5b8cb69'), 0, '/db/products/88b1ef516f9c429b9a611560a5b8cb69/image.png', ''),
(UNHEX('2328a12773da4f6e861a8a212c6ca43c'), UNHEX('efbec854007840758ee7f3a342131fe6'), 0, '/db/products/efbec854007840758ee7f3a342131fe6/image.png', ''),
(UNHEX('b9b4eaa75e564878ab43198d0c93b24c'), UNHEX('51b072009a3f4d42ac625fedcba435cf'), 0, '/db/products/51b072009a3f4d42ac625fedcba435cf/image.png', ''),
(UNHEX('b30c96aec06243ebb34ea2bc8063af67'), UNHEX('7aa152b4a9b2449187f130d219949a69'), 0, '/db/products/7aa152b4a9b2449187f130d219949a69/image.png', ''),
(UNHEX('90e7ccac006d4b71bdef612802e40130'), UNHEX('28fe190fb30f4d0eaf805c89c77acbf8'), 0, '/db/products/28fe190fb30f4d0eaf805c89c77acbf8/image.png', ''),
(UNHEX('3b07e892b0ee4f928acea608ec18f809'), UNHEX('9664c538da4c4f0890de2562884ee5c9'), 0, '/db/products/9664c538da4c4f0890de2562884ee5c9/image.png', ''),
(UNHEX('ffd70e329b0b42288c3bf66883fda63d'), UNHEX('50dbc6d54a6b4307a89945dd6057b327'), 0, '/db/products/50dbc6d54a6b4307a89945dd6057b327/image.png', ''),
(UNHEX('14450ebbcfdd40069fe7327e10c33e0f'), UNHEX('8df3b92da11248109a5a43d88a92f960'), 0, '/db/products/8df3b92da11248109a5a43d88a92f960/image.png', ''),
(UNHEX('d2ab0a1235664c3a97d17b9ed8a7b0da'), UNHEX('92b7e05aa2724758896d06bb54433e66'), 0, '/db/products/92b7e05aa2724758896d06bb54433e66/image.png', ''),
(UNHEX('50122689c09c452dac06623fb9f1a004'), UNHEX('71b51d158bac4ce5aba0db8279c90f3f'), 0, '/db/products/71b51d158bac4ce5aba0db8279c90f3f/image.png', ''),
(UNHEX('a5fc8c0e72164603ad2f0291f29d9cd6'), UNHEX('8e0891eed4d6407c8e70725aa5a2989f'), 0, '/db/products/8e0891eed4d6407c8e70725aa5a2989f/image.png', ''),
(UNHEX('b0d65c0200854847a0091b637191c326'), UNHEX('ded81d365b9a4a1bb3a9dbc854320166'), 0, '/db/products/ded81d365b9a4a1bb3a9dbc854320166/image.png', ''),
(UNHEX('2582b8a2586a43ee9726a96938e32949'), UNHEX('46ea70f462ef488f8bdce3d04e253790'), 0, '/db/products/46ea70f462ef488f8bdce3d04e253790/image.png', ''),
(UNHEX('459296869e0742d2b52337bd92049bfa'), UNHEX('3e6a95783b3440e0a61fc2c07a5d7773'), 0, '/db/products/3e6a95783b3440e0a61fc2c07a5d7773/image.png', '');