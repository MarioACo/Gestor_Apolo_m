
create database prueba;
use prueba;
drop database prueba;

#####################################################################################################

CREATE TABLE `sistemas` (
  `clave` varchar(225) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `creditos` varchar(225) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`clave`);


INSERT INTO `sistemas`(`clave`,`nombre`,`creditos`,`semestre`) VALUES			('ACF-0901','Cálculo Diferencial','3-2-5','1'),
																				('SCD-1008','Fundamentos de Programación','2-3-5','1'),
																				('ACA-0907','Taller de Ética','0-4-4','1'),
																				('AEF-1041','Matemáticas Discretas','3-2-5','1'),
																				('SCH-1024','Taller de Administración','1-3-4','1'),
																				('ACC-0906','Fundamentos de Investigación','2-2-4','1'),
                                                                        
																				('ACF-0902','Cálculo Integral ','3-2-5','2'),
																				('SCD-1020','Programación Orientada a Objetos','2-3-5','2'),
																				('SCC-1010','Graficación','2-2-4','2'),
																				('AEC-1058','Química','2-2-4','2'),
																				('ACF-0903','Algebra Lineal','3-2-5','2'),
																				('AEF-1052 ','Probabilidad y Estadistica','3-2-5','2'),
                                                                        
																				('ACF-0904','Cálculo Vectorial','3-2-5','3'),
																				('AED-1026','Estructura de Datos','2-3-5','3'),
																				('SCC-1013','Investigación de Operaciones','2-2-4','3'),
																				('AEF-1031','Fundamentos de Base de Datos','3-2-5','3'),
																				('ACD-0908','Desarrollo Sustentable','2-3-5','3'),
																				('AEC-1008','Contabilidad Financiera','2-2-4','3'),
                                                                                
                                                                                ('ACF-0905','Ecuaciones Diferenciales','3-2-5','4'),
																				('SCD-1027','Topicos Avanzados de Programación','2-3-5','4'),
																				('SCC-1017','Métodos Numéricos','2-2-4','4'),
																				('SCA-1025','Taller de Base de Datos','0-4-4','4'),
																				('SCF-1006 ','Física General','3-2-5','4'),
																				('SCD-1018','Principios Eléctricos y Aplicaciones Digitales','2-3-5','4'),
																				('SCC-1005 ','Cultura Empresarial','2-2-4','4'),
                                                                                
                                                                                ('AEC-1034','Fundamentos de Telecomunicaciones','2-2-4','5'),
                                                                                ('AEB-1055','Programación Web','1-4-5','5'),
                                                                                ('AEC-1061','Sistemas Operativos','2-2-4','5'),
                                                                                ('SCB-1001','Administración de Bases de Datos','1-4-5','5'),
                                                                                ('SCD-1022','Simulación','2-3-5','5'),
                                                                                ('SCD-1003','Arquitectura de Computadoras','2-3-5','5'),
                                                                                
                                                                                ('SCD-1015','Lenguajes y Autómatas I','2-3-5','6'),
                                                                                ('DSB-1903','Sistemas WEB','1-4-5','6'),
                                                                                ('SCA-1026','Taller de Sistemas Operativos','0-4-4','6'),
                                                                                ('SCD-1021','Redes de Computadoras','2-3-5','6'),
                                                                                ('SCC-1007','Fundamentos de Ingeniería de Software','2-2-4','6'),
                                                                                ('SCC-1014','Lenguajez de Interfáz','2-2-4','6'),
                                                                                
                                                                                ('SCD-1016','Lenguajes y Autómatas II','2-3-5','7'),
                                                                                ('DSB-1901','Aplicaciones Móviles','1-4-5','7'),
                                                                                ('ACA-0909','Taller de Investigación','0-4-4 ','7'),
                                                                                ('SCD-1004','Conmutación y Enrutamient en Redes de Datos','2-3-5 ','7'),
                                                                                ('SCD-1011','Ingeniería de Software','2-3-5','7'),
                                                                                ('SCC-1023','Sistemas Programables','2-2-4','7'),
                                                                                
                                                                                ('SCC-1019','Programación Lógica y Funcional','2-2-4','8'),
                                                                                ('DSB-1902','Virtualización de Servidores','1-4-5','8'),
                                                                                ('ACA-0910','Taller de Investigación II','0-4-4','8'),
                                                                                ('SCA-1002','Administración de Redes','0-4-4','8'),
                                                                                ('SCG-1009','Gestión de Proyectos de Software','3-3-6','8'),
                                                                                ('DSB-1904','MEAN Stack para Front-End','1-4-5','8'),
                                                                                
                                                                                ('SCC-1012','Inteligencia Artificial','2-2-4','9'),
                                                                                ('DSX-1905','MEAN Stack para Back-End','1-5-6','9');
													
                                                                        
#-----------------------------------------------------------------------------------------------------------------------------------                        
CREATE TABLE `gestion` (
  `clave` varchar(225) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `creditos` varchar(225) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


ALTER TABLE `gestion`
  ADD PRIMARY KEY (`clave`);


INSERT INTO `gestion`(`clave`,`nombre`,`creditos`,`semestre`) VALUES ('ACC-09606','Fundamentos de Investigación','2-2-4','1'),
																	 ('ACF-0901','Cálculo Diferencial','3-2-5','1'),
                                                                     ('GEC-0905','Desarrollo Humano','2-2-4','1'),
                                                                     ('AEF-1074','Fundamentos de Gestión Empresarial','3-2-5','1'),
                                                                     ('GEC-0909','Fundamentos de Física','2-2-4','1'),
                                                                     ('GEF-0910','Fundamentos de Química','3-2-5','1'),
                                                                     
                                                                     ('AEB-1082','Software de Aplcación Ejecutivo','1-4-5','2'),
                                                                     ('ACF-0902','Cálculo Integral','3-2-5','2'),
                                                                     ('GED-0903','Contabilidad Orientada a los Negocios','2-3-5','2'),
                                                                     ('AEC-1014','Dinámica Social','2-2-4','2'),
                                                                     ('ACA-0907','Taller de Ética','0-4-4','2'),
                                                                     ('GEE-0918','Legislación Laboral','3-1-4','2'),
                                                                     
                                                                     ('AEC-1078','Marco Legal de las Organizaciones','2-2-4','3'),
                                                                     ('GED-0921','Probabilidad y Estadística Descriptiva','2-3-5','3'),
                                                                     ('GED-0904','Costos Empresariales','2-3-5','3'),
                                                                     ('GEC-0913','Habilidades Directivas I','2-2-4','3'),
                                                                     ('AEF-1071','Economía Empresarial','3-2-5','3'),
                                                                     ('ACF-0903','Algebra Lineal','3-2-5','3'),
                                                                     
                                                                     ('GEF-0916','Ingeniería Económica','3-2-5','4'),
                                                                     ('GEG-0907','Estadística Inferencial I','3-3-6','4'),
                                                                     ('GED-0917','Instrumentos de Presupuestación Empresarial','2-3-5','4'),
                                                                     ('GEC-0914','Habilidades Directivas II','2-2-4','4'),
                                                                     ('GEF-0906','Entorno Macroeconómico','3-2-5','4'),
                                                                     ('AEF-1076','Investigación de Operaciones','3-2-5','4'),
                                                                     
                                                                     ('AEF-1073','Finanzas en las Organizaciones','3-2-5','5'),
																	 ('GEC-0908','Estadística Inferencial II','3-3-6','5'),
																	 ('GEF-0915','Ingeniería de Procesos','3-2-5','5'),
																	 ('AEG-0909','Gestión del Capital Humano','3-3-6','5'),
																	 ('ACA-0909','Taller de Investigación I','0-4-4','5'),
																	 ('GEF-0919','Mercadotecnía','3-2-5','5'),
                                                                     ('AED-1072','El emprendedor y la Innovación','2-3-5','5'),
                                                                     
                                                                     ('GEF-0901','Administración de la Salud y Seguridad Ocupacional','3-2-5','6'),
                                                                     ('GEC-0911','Gestión de la Producción I','2-2-4','6'),
                                                                     ('AED-1015','Diseño Organizacional','2-3-5','6'),
                                                                     ('ACA-0910','Taller de Investigación II','0-4-4','6'),
                                                                     ('GED-0922','Sistemas de Información de la Mercadotecnia','2-3-5','6'),
                                                                     ('GDH-2001','Administración de la Micro, Pequeña y Mediana Empresa','1-3-4','6'),
                                                                     ('GDC-2002','Análisis Regional del Entorno desde una Perspectiva de Negocio.','2-2-4','6'),
                                                                     
                                                                     ('AED-1069','Calidad Aplicada a la Gestión Empresarial','2-3-5','7'),
                                                                     ('GED-0920','Plan de Negocios','2-3-5','7'),
                                                                     ('GEC-0912','Gestión de la producción II','2-2-4','7'),
                                                                     ('AED-1035','Gestión Estratégica','2-3-5','7'),
                                                                     ('ACD-0908','Desarrollo Sustentable','2-3-5','7'),
                                                                     ('GDG-2003','Entorno Legal y Fiscal de las organizaciones','3-3-6','7'),
                                                                     ('GDM-2004','Mercadotecnia 4.0 y la Inoovación','2-3-5','7'),
                                                                     
																	 ('AEB-1045','Mercadotecnia Electrónica','1-4-5','8'),
                                                                     ('GDM-2005','Tópicos para la gestión integral de las organizaciones','2-4-6','8'),
                                                                     ('GDF-2006','La innovación Empresarial y los Sistemas de Calidad','3-2-5','8'),
                                                                     ('GEF-092','Cadena de Suministros','3-2-5','8');
                                                                     
                                                                     
#-------------------------------------------------------------------------------------------------------------------------------------------------------------------

CREATE TABLE `industrial` (
  `clave` varchar(225) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `creditos` varchar(225) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


ALTER TABLE `industrial`
  ADD PRIMARY KEY (`clave`);


INSERT INTO `industrial`(`clave`,`nombre`,`creditos`,`semestre`) VALUES ('ACC-09606','Fundamentos de Investigación','2-2-4','1'),
																		('ACF-0901','Cálculo Diferencial','3-2-5','1'),
                                                                        ('INC-1025','Química','2-2-4','1'),
                                                                        ('INH-1029','Taller de Herramientas','1-3-4','1'),
                                                                        ('INN-1008','Dibujo Industrial','0-6-6','1'),
                                                                        ('ACA-0907','Taller de Etica','0-4-4','1'),
                                                                        
                                                                        ('INC-1013','Física','2-2-4','2'),
                                                                        ('ACF-0902','Cálculo Integral','3-2-5','2'),
                                                                        ('AEC-1048','Metrología y Normalización','2-2-4','2'),
                                                                        ('INR-1017','Ingeniería de Sistemas','2-1-3','2'),
                                                                        ('AEC-1053','Probabilidad y Estadística','2-2-4','2'),
                                                                        ('INQ-1006','Análisis de la Realidad Nacional','1-2-3','2'),
                                                                        ('INC-1030','Taller de Liderazgo','2-2-4','2'),
                                                                     
																		('INC-1024','Propiedad de los Materiales','2-2-4','3'),
                                                                        ('ACF-0903','Algebra Lineal','3-2-5','3'),
                                                                        ('INC-1023','Procesos de Fabricación','2-2-4','3'),
                                                                        ('AEC-10-18','Economía','2-2-4','3'),
                                                                        ('AEF-1024','Estadística Inferencial I','3-2-5','3'),
                                                                        ('INJ-1011','Estudio del Trabajo I','4-2-6','3'),
                                                                        
                                                                        ('ACF-0904','Cálculo Vectorial','3-2-5','4'),
                                                                        ('INC-1009','Electricidad y Electrónica Industrial','2-2-4','4'),
                                                                        ('INC-1005','Algoritmos y Lenguajes de','2-2-4','4'),
                                                                        ('INC-1018','Investigación de Operaciones I','2-2-4','4'),
                                                                        ('AEF-1025','Estadística Inferencial II','3-2-5','4'),
                                                                        ('INJ-1012','Estudio del Trabajo II','4-2-6','4'),
                                                                        ('INF-1016','Higiene y Seguridad Industrial','3-2-5','4'),
                                                                        
                                                                        ('INR-1003','Administración de Proyectos','2-1-3','5'),
                                                                        ('INC-1014','Gestión de Costos','2-2-4','5'),
                                                                        ('INC-1001','Administración de las Operaciones I','2-2-4','5'),
                                                                        ('INC-1019','Investigación de las Operaciones II','2-2-4','5'),
                                                                        ('INF-1007','Control Estadístico de la Calidad','3-2-5','5'),
                                                                        ('INF-1010','Ergonomía','3-2-5','5'),
                                                                        ('ACD-0908','Desarrollo Sustentable','2-3-5','5'),
                                                                        
                                                                        ('ACA-0909','Taller de Investigación I','0-4-4','6'),
                                                                        ('AEC-1037','Ingeniería Económica','2-2-4','6'),
                                                                        ('INC-1002','Administración de las Operaciones II','2-2-4','6'),
                                                                        ('INC-1027','Simulación','2-2-4','6'),
                                                                        ('INC-1004','Administración del Mantenimiento','2-2-4','6'),
                                                                        ('AEC-1044','Mercadotecnia','2-3-5','6'),
																		('INC-1015 ','Gestión de los Sistemas de Calidad','2-2-4','6'),
                                                                        
                                                                        ('ACA-0910','Taller de Investigación II','0-4-4','7'),
                                                                        ('INC-1021','Planeación Financiera','2-2-4','7'),
                                                                        ('INC-1022','Planeación y Diseño de','2-2-4','7'),
                                                                        ('INF-1028','Sistemas de Manufactura','3-2-5','7'),
                                                                        ('INH-1020','Logística y Cadenas de Suministro','1-3-4','7'),
                                                                        ('DMD-1706','MANUFACTURA SUSTENTABLE','2-3-5','7'),
                                                                        ('DMM-1701','DISEÑO ASISTIDO POR COMPUTADOR','2-4-6','7'),

																		('AED-1030','Formulación y Evaluación de','2-3-5','8'),
                                                                        ('INC-1026','Relaciones Industriales','2-2-4','8'),
                                                                        ('DMM-1703','DISEÑO ASISTIDO POR','2-4-6','8'),
                                                                        ('DMD-1702','TECNOLOGIAS PARA EL','2-3-5','8'),
                                                                        ('DMD-1705','CONTROLADORES LÓGICOS PROGRAMABLES','2-3-5','8'),
                                                                        ('DMD-1704','MANUFACTURA ESBELTA','2-2-4','8');
                                                                     
                                                                     
