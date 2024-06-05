DROP DATABASE IF EXISTS DB_DDnD;
CREATE DATABASE DB_DDnD;
USE DB_DDnD;

CREATE TABLE TB_Profiles (
 vUUID      BINARY(16) NOT NULL,

 sName      TEXT       NOT NULL,
 sEmail     TEXT       NOT NULL,
 sCellphone TEXT           NULL,
 sAddress   TEXT       NOT NULL,
 sUsername  TEXT       NOT NULL,
 sPassword  TEXT       NOT NULL,

 CONSTRAINT TB_Profiles_PK PRIMARY KEY (vUUID)
);
CREATE TABLE TB_Manufacturers (
 vUUID BINARY(16) NOT NULL,

 sName TEXT       NOT NULL,

 CONSTRAINT TB_Manufacturers_PK PRIMARY KEY (vUUID)
);
CREATE TABLE TB_Products (
 vUUID             BINARY(16) NOT NULL,

 vManufacturerUUID BINARY(16) NOT NULL,

 sName             TEXT       NOT NULL,
 iStore            INTEGER    NOT NULL,
 sDescription      TEXT       NOT NULL,

 CONSTRAINT TB_Products_PK PRIMARY KEY (vUUID),
 CONSTRAINT TB_Products_Manufacturer_FK FOREIGN KEY (vManufacturerUUID) REFERENCES TB_Manufacturers(vUUID)
);
CREATE TABLE TB_ProductListings (
 vUUID        BINARY(16) NOT NULL,

 vProductUUID BINARY(16) NOT NULL,

 iStock       INTEGER    NOT NULL,
 iPrice       INTEGER    NOT NULL,
 dtStart      TIMESTAMP  NOT NULL,
 dtEnd        TIMESTAMP      NULL,

 CONSTRAINT TB_ProductListings_PK PRIMARY KEY (vUUID),
 CONSTRAINT TB_ProductListings_Product_FK FOREIGN KEY (vProductUUID) REFERENCES TB_Products(vUUID)
);
CREATE TABLE TB_CartItems (
 vUUID               BINARY(16) NOT NULL,

 vProfileUUID        BINARY(16) NOT NULL,
 vProductListingUUID BINARY(16) NOT NULL,

 iQuantity           INTEGER    NOT NULL,

 CONSTRAINT TB_CartItems_PK PRIMARY KEY (vUUID),
 CONSTRAINT TB_CartItems_Profile_FK FOREIGN KEY (vProfileUUID) REFERENCES TB_Profiles(vUUID),
 CONSTRAINT TB_CartItems_ProductListing_FK FOREIGN KEY (vProductListingUUID) REFERENCES TB_ProductListings(vUUID)
);
CREATE TABLE TB_ProductListingImages (
 vUUID               BINARY(16) NOT NULL,

 vProductListingUUID BINARY(16) NOT NULL,

 iIndex              INTEGER    NOT NULL,
 sPhotoURL           TEXT       NOT NULL,
 sCaption            TEXT           NULL,

 CONSTRAINT TB_ProductListingImages_PK PRIMARY KEY (vUUID),
 CONSTRAINT TB_ProductListingImages_ProductListing_FK FOREIGN KEY (vProductListingUUID) REFERENCES TB_ProductListings(vUUID)
);
CREATE TABLE TB_Reviews (
 vUUID               BINARY(16) NOT NULL,

 vProfileUUID        BINARY(16) NOT NULL,
 vProductListingUUID BINARY(16) NOT NULL,

 iRating             INTEGER    NOT NULL,
 sComment            TEXT           NULL,
 dtTime              TIMESTAMP  NOT NULL,

 CONSTRAINT TB_Reviews_PK PRIMARY KEY (vUUID),
 CONSTRAINT TB_Reviews_Profile_FK FOREIGN KEY (vProfileUUID) REFERENCES TB_Profiles(vUUID),
 CONSTRAINT TB_Reviews_ProductListing_FK FOREIGN KEY (vProductListingUUID) REFERENCES TB_ProductListings(vUUID)
);
CREATE TABLE TB_Orders (
 vUUID        BINARY(16) NOT NULL,

 vProfileUUID BINARY(16) NOT NULL,
 
 sAddress     TEXT       NOT NULL,
 iStatus      INTEGER    NOT NULL,
 dtOrdered    TIMESTAMP  NOT NULL,
 dtPaid       TIMESTAMP      NULL,
 dtConcluded  TIMESTAMP      NULL,

 CONSTRAINT TB_Orders_PK PRIMARY KEY (vUUID),
 CONSTRAINT TB_Orders_Profile_FK FOREIGN KEY (vProfileUUID) REFERENCES TB_Profiles(vUUID)
);
CREATE TABLE TB_OrderProductListings (
 vOrderUUID          BINARY(16) NOT NULL,
 vProductListingUUID BINARY(16) NOT NULL,

 iQuantity           INTEGER    NOT NULL,

 CONSTRAINT TB_OrderProductListings_PK PRIMARY KEY (vOrderUUID, vProductListingUUID),
 CONSTRAINT TB_OrderProductListings_Order_FK FOREIGN KEY (vOrderUUID) REFERENCES TB_Orders(vUUID),
 CONSTRAINT TB_OrderProductListings_ProductListing_FK FOREIGN KEY (vProductListingUUID) REFERENCES TB_ProductListings(vUUID)
);