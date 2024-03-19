CREATE DATABASE PIA_Proweb;
USE PIA_Proweb;

CREATE TABLE `Usuario` (
  `user_ID` int,
  `correo_us` varchar(50),
  `psw_us` varchar(50),
  `nom_us` varchar(50),
  `ap_us` varchar(50),
  `tel_us` int,
  `dir_us` varchar(50),
  `cp_us` varchar(50),
  PRIMARY KEY (`user_ID`)
);

CREATE TABLE `contacto` (
  `cont_ID` int,
  `user_ID` int,
  `comment` varchar(50),
  PRIMARY KEY (`cont_ID`),
  CONSTRAINT `FK_contacto.user_ID`
    FOREIGN KEY (`user_ID`)
      REFERENCES `Usuario`(`user_ID`)
);

CREATE TABLE `Descuento` (
  `desct_ID` int,
  `fecha_inic` int,
  `fecha_fin` int,
  `cant_desc` float,
  `descr_desct` varchar(50),
  PRIMARY KEY (`desct_ID`)
);

CREATE TABLE `Departamento` (
  `Dept_ID` int,
  `nom_dept` varchar(50),
  PRIMARY KEY (`Dept_ID`)
);

CREATE TABLE `Producto` (
  `prod_ID` int,
  `Dept_ID` int,
  `img_prod` varchar(50),
  `nom_prod` varchar(50),
  `cost_prod` float,
  `peso_prod` float,
  `cant_prod` int,
  `desct_ID` int,
  PRIMARY KEY (`prod_ID`),
  CONSTRAINT `FK_Producto.desct_ID`
    FOREIGN KEY (`desct_ID`)
      REFERENCES `Descuento`(`desct_ID`),
  CONSTRAINT `FK_Producto.Dept_ID`
    FOREIGN KEY (`Dept_ID`)
      REFERENCES `Departamento`(`Dept_ID`)
);

CREATE TABLE `detalle_carrito` (
  `user_ID` int,
  `prod_ID` int,
  `cantidad` int,
  CONSTRAINT `FK_detalle_carrito.user_ID`
    FOREIGN KEY (`user_ID`)
      REFERENCES `Usuario`(`user_ID`),
  CONSTRAINT `FK_detalle_carrito.prod_ID`
    FOREIGN KEY (`prod_ID`)
      REFERENCES `Producto`(`prod_ID`)
);

CREATE INDEX `PK FK` ON  `detalle_carrito` (`user_ID`, `prod_ID`);

CREATE TABLE `Pedido` (
  `pedido_ID` int,
  `cant_ped` int,
  `costot_ped` float,
  `pagado` boolean,
  `user_ID` inT,
  `fecha_ped` int,
  PRIMARY KEY (`pedido_ID`),
  CONSTRAINT `FK_Pedido.user_ID`
    FOREIGN KEY (`user_ID`)
      REFERENCES `Usuario`(`user_ID`)
);

CREATE TABLE `detalle_prodped` (
  `prod_ID` int,
  `pedido_ID` int,
  CONSTRAINT `FK_detalle_prodped.prod_ID`
    FOREIGN KEY (`prod_ID`)
      REFERENCES `Producto`(`prod_ID`),
  CONSTRAINT `FK_detalle_carrito.pedido_ID`
    FOREIGN KEY (`pedido_ID`)
      REFERENCES `Pedido`(`pedido_ID`)
);

CREATE INDEX `PK FK` ON  `detalle_prodped` (`prod_ID`, `pedido_ID`);

CREATE TABLE `Tipo de Pago` (
  `pt_ID` int,
  `metodo` varchar(50),
  PRIMARY KEY (`pt_ID`)
);

CREATE TABLE `Pago` (
  `pago_ID` int,
  `user_ID` int,
  `pt_ID` int,
  `cantidad` float,
  PRIMARY KEY (`pago_ID`),
  CONSTRAINT `FK_Pago.user_ID`
    FOREIGN KEY (`user_ID`)
      REFERENCES `Usuario`(`user_ID`),
  CONSTRAINT `FK_Pago.pt_ID`
    FOREIGN KEY (`pt_ID`)
      REFERENCES `Tipo de Pago`(`pt_ID`)
);

CREATE TABLE `Rol` (
  `no_rol` int,
  `nom_rol` varchar(50),
  `fun_rol` varchar(50),
  PRIMARY KEY (`no_rol`)
);

CREATE TABLE `detalle_UR` (
  `user_ID` int,
  `no_rol` int,
  CONSTRAINT `FK_detalle_UR.user_ID`
    FOREIGN KEY (`user_ID`)
      REFERENCES `Usuario`(`user_ID`),
  CONSTRAINT `FK_detalle_UR.no_rol`
    FOREIGN KEY (`no_rol`)
      REFERENCES `Rol`(`no_rol`)
);

CREATE INDEX `PK FK` ON  `detalle_UR` (`user_ID`, `no_rol`);