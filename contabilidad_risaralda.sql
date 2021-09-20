# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.2.1                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Project2.dez                                    #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2020-09-04 21:11                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "PRESUPUESTO"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `PRESUPUESTO` (
    `numero_registro_presu` INTEGER NOT NULL AUTO_INCREMENT,
    `valor_presupuesto` FLOAT,
    `anho_presupuesto` YEAR,
    `fecha_registro` DATE,
    `eliminar_registro` VARCHAR(1),
    CONSTRAINT `PK_PRESUPUESTO` PRIMARY KEY (`numero_registro_presu`)
);

# ---------------------------------------------------------------------- #
# Add table "PRESUPUESTO_ASIGNADO"                                       #
# ---------------------------------------------------------------------- #

CREATE TABLE `PRESUPUESTO_ASIGNADO` (
    `nro_registro` INTEGER NOT NULL AUTO_INCREMENT,
    `porcentaje_entidad` DECIMAL,
    `valor_presu_entidad` FLOAT,
    `fecha_registro` DATE,
    `eliminar_registro` VARCHAR(1),
    `numero_registro_presu` INTEGER,
    `nro_registro_entidad` INTEGER,
    CONSTRAINT `PK_PRESUPUESTO_ASIGNADO` PRIMARY KEY (`nro_registro`)
);

# ---------------------------------------------------------------------- #
# Add table "ENTIDADES"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `ENTIDADES` (
    `nro_registro_entidad` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre_entidad` VARCHAR(30),
    `fecha_registro` DATE,
    `eliminar_registro` VARCHAR(1),
    CONSTRAINT `PK_ENTIDADES` PRIMARY KEY (`nro_registro_entidad`)
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `PRESUPUESTO_ASIGNADO` ADD CONSTRAINT `PRESUPUESTO_PRESUPUESTO_ASIGNADO` 
    FOREIGN KEY (`numero_registro_presu`) REFERENCES `PRESUPUESTO` (`numero_registro_presu`);

ALTER TABLE `PRESUPUESTO_ASIGNADO` ADD CONSTRAINT `ENTIDADES_PRESUPUESTO_ASIGNADO` 
    FOREIGN KEY (`nro_registro_entidad`) REFERENCES `ENTIDADES` (`nro_registro_entidad`);
