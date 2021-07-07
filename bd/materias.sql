-- Estructura de la tabla sistemas -----------------
use apolo;
CREATE TABLE `materia` (
  `clave` varchar(225) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `creditos` varchar(225) NOT NULL,
  `semestre` int(11) NOT NULL
  `carrera` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- -----------------------------------------------

ALTER TABLE `materia`
  ADD PRIMARY KEY (`clave`);

--------------------------------------------------

INSERT INTO `materia`(`clave`,`nombre`,`creditos`,`semestre`,`carrera`) VALUES ('ACF-0901','Cálculo Diferencial','3-2-5','1','sistemas'),
																	            ('SCD-1008','Fundamentos de Programación','2-3-5','1','sistemas'),
                                                                                ('ACA-0907','Taller de Ética','0-4-4','1','sistemas'),
                                                                                ('AEF-1041','Matemáticas Discretas','3-2-5','1','sistemas'),
                                                                                ('SCH-1024','Taller de Administración','1-3-4','1','sistemas'),
                                                                                ('ACC-0906','Fundamentos de Investigación','2-2-4','1','sistemas'),
                                                                                    
                                                                                ('ACF-0902','Cálculo Integral ','3-2-5','2','sistemas'),
                                                                                ('SCD-1020','Programación Orientada a Objetos','2-3-5','2','sistemas'),
                                                                                ('SCC-1010','Graficación','2-2-4','2','sistemas'),
                                                                                ('AEC-1058','Química','2-2-4','2','sistemas'),
                                                                                ('ACF-0903','Algebra Lineal','3-2-5','2','sistemas'),
                                                                                ('AEF-1052 ','Probabilidad y Estadistica','3-2-5','2','sistemas'),
                                                                                    
                                                                                ('ACF-0904','Cálculo Vectorial','3-2-5','3','sistemas'),
                                                                                ('AED-1026','Estructura de Datos','2-3-5','3','sistemas'),
                                                                                ('SCC-1013','Investigación de Operaciones','2-2-4','3','sistemas')
                                                                                ('AEF-1031','Fundamentos de Base de Datos','3-2-5','3','sistemas'),
                                                                                ('ACD-0908','Desarrollo Sustentable','2-3-5','3','sistemas'),
                                                                                ('AEC-1008','Contabilidad Financiera','2-2-4','3','sistemas'),
                                                                                
                                                                                ('ACF-0905','Ecuaciones Diferenciales','3-2-5','4','sistemas'),
																				('SCD-1027','Topicos Avanzados de Programación','2-3-5','4','sistemas'),
																				('SCC-1017','Métodos Numéricos','2-2-4','4','sistemas'),
																				('SCA-1025','Taller de Base de Datos','0-4-4','4','sistemas'),
																				('SCF-1006 ','Física General','3-2-5','4','sistemas'),
																				('SCD-1018','Principios Eléctricos y Aplicaciones Digitales','2-3-5','4','sistemas'),
																				('SCC-1005 ','Cultura Empresarial','2-2-4','4','sistemas'),
                                                                                
                                                                                ('AEC-1034','Fundamentos de Telecomunicaciones','2-2-4','5','sistemas'),
                                                                                ('AEB-1055','Programación Web','1-4-5','5','sistemas'),
                                                                                ('AEC-1061','Sistemas Operativos','2-2-4','5','sistemas'),
                                                                                ('SCB-1001','Administración de Bases de Datos','1-4-5','5','sistemas'),
                                                                                ('SCD-1022','Simulación','2-3-5','5','sistemas'),
                                                                                ('SCD-1003','Arquitectura de Computadoras','2-3-5','5','sistemas'),
                                                                                
                                                                                ('SCD-1015','Lenguajes y Autómatas I','2-3-5','6','sistemas'),
                                                                                ('DSB-1903','Sistemas WEB','1-4-5','6','sistemas'),
                                                                                ('SCA-1026','Taller de Sistemas Operativos','0-4-4','6','sistemas'),
                                                                                ('SCD-1021','Redes de Computadoras','2-3-5','6','sistemas'),
                                                                                ('SCC-1007','Fundamentos de Ingeniería de Software','2-2-4','6','sistemas'),
                                                                                ('SCC-1014','Lenguajez de Interfáz','2-2-4','6','sistemas'),
                                                                                
                                                                                ('SCD-1016','Lenguajes y Autómatas II','2-3-5','7','sistemas'),
                                                                                ('DSB-1901','Aplicaciones Móviles','1-4-5','7','sistemas'),
                                                                                ('ACA-0909','Taller de Investigación','0-4-4 ','7','sistemas'),
                                                                                ('SCD-1004','Conmutación y Enrutamient en Redes de Datos','2-3-5 ','7','sistemas'),
                                                                                ('SCD-1011','Ingeniería de Software','2-3-5','7','sistemas'),
                                                                                ('SCC-1023','Sistemas Programables','2-2-4','7','sistemas'),
                                                                                
                                                                                ('SCC-1019','Programación Lógica y Funcional','2-2-4','8','sistemas'),
                                                                                ('DSB-1902','Virtualización de Servidores','1-4-5','8','sistemas'),
                                                                                ('ACA-0910','Taller de Investigación II','0-4-4','8','sistemas'),
                                                                                ('SCA-1002','Administración de Redes','0-4-4','8','sistemas'),
                                                                                ('SCG-1009','Gestión de Proyectos de Software','3-3-6','8','sistemas'),
                                                                                ('DSB-1904','MEAN Stack para Front-End','1-4-5','8','sistemas'),
                                                                                
                                                                                ('SCC-1012','Inteligencia Artificial','2-2-4','9','sistemas'),
                                                                                ('DSX-1905','MEAN Stack para Back-End','1-5-6','9','sistemas'),



                                                                                ('ACC-09606','Fundamentos de Investigación','2-2-4','1','gestion'),
                                                                                ('ACF-0901','Cálculo Diferencial','3-2-5','1','gestion'),
                                                                                ('GEC-0905','Desarrollo Humano','2-2-4','1','gestion'),
                                                                                ('AEF-1074','Fundamentos de Gestión Empresarial','3-2-5','1','gestion'),
                                                                                ('GEC-0909','Fundamentos de Física','2-2-4','1','gestion'),
                                                                                ('GEF-0910','Fundamentos de Química','3-2-5','1','gestion'),
                                                                                
                                                                                ('AEB-1082','Software de Aplcación Ejecutivo','1-4-5','2','gestion'),
                                                                                ('ACF-0902','Cálculo Integral','3-2-5','2','gestion'),
                                                                                ('GED-0903','Contabilidad Orientada a los Negocios','2-3-5','2','gestion'),
                                                                                ('AEC-1014','Dinámica Social','2-2-4','2','gestion'),
                                                                                ('ACA-0907','Taller de Ética','0-4-4','2','gestion'),
                                                                                ('GEE-0918','Legislación Laboral','3-1-4','2','gestion'),
                                                                                
                                                                                ('AEC-1078','Marco Legal de las Organizaciones','2-2-4','3','gestion'),
                                                                                ('GED-0921','Probabilidad y Estadística Descriptiva','2-3-5','3','gestion'),
                                                                                ('GED-0904','Costos Empresariales','2-3-5','3','gestion'),
                                                                                ('GEC-0913','Habilidades Directivas I','2-2-4','3','gestion'),
                                                                                ('AEF-1071','Economía Empresarial','3-2-5','3','gestion'),
                                                                                ('ACF-0903','Algebra Lineal','3-2-5','3','gestion'),
                                                                                
                                                                                ('GEF-0916','Ingeniería Económica','3-2-5','4','gestion'),
                                                                                ('GEG-0907','Estadística Inferencial I','3-3-6','4','gestion'),
                                                                                ('GED-0917','Instrumentos de Presupuestación Empresarial','2-3-5','4','gestion'),
                                                                                ('GEC-0914','Habilidades Directivas II','2-2-4','4','gestion'),
                                                                                ('GEF-0906','Entorno Macroeconómico','3-2-5','4','gestion'),
                                                                                ('AEF-1076','Investigación de Operaciones','3-2-5','4','gestion'),
                                                                                
                                                                                ('AEF-1073','Finanzas en las Organizaciones','3-2-5','5','gestion'),
                                                                                ('GEC-0908','Estadística Inferencial II','3-3-6','5','gestion'),
                                                                                ('GEF-0915','Ingeniería de Procesos','3-2-5','5','gestion'),
                                                                                ('AEG-0909','Gestión del Capital Humano','3-3-6','5','gestion'),
                                                                                ('ACA-0909','Taller de Investigación I','0-4-4','5','gestion'),
                                                                                ('GEF-0919','Mercadotecnía','3-2-5','5','gestion'),
                                                                                ('AED-1072','El emprendedor y la Innovación','2-3-5','5','gestion'),
                                                                                
                                                                                ('GEF-0901','Administración de la Salud y Seguridad Ocupacional','3-2-5','6','gestion'),
                                                                                ('GEC-0911','Gestión de la Producción I','2-2-4','6','gestion'),
                                                                                ('AED-1015','Diseño Organizacional','2-3-5','6','gestion'),
                                                                                ('ACA-0910','Taller de Investigación II','0-4-4','6','gestion'),
                                                                                ('GED-0922','Sistemas de Información de la Mercadotecnia','2-3-5','6','gestion'),
                                                                                ('GDH-2001','Administración de la Micro, Pequeña y Mediana Empresa','1-3-4','6','gestion'),
                                                                                ('GDC-2002','Análisis Regional del Entorno desde una Perspectiva de Negocio.','2-2-4','6','gestion'),
                                                                                
                                                                                ('AED-1069','Calidad Aplicada a la Gestión Empresarial','2-3-5','7','gestion'),
                                                                                ('GED-0920','Plan de Negocios','2-3-5','7','gestion'),
                                                                                ('GEC-0912','Gestión de la producción II','2-2-4','7','gestion'),
                                                                                ('AED-1035','Gestión Estratégica','2-3-5','7','gestion'),
                                                                                ('ACD-0908','Desarrollo Sustentable','2-3-5','7','gestion'),
                                                                                ('GDG-2003','Entorno Legal y Fiscal de las organizaciones','3-3-6','7','gestion'),
                                                                                ('GDM-2004','Mercadotecnia 4.0 y la Inoovación','2-3-5','7','gestion'),
                                                                                
                                                                                ('AEB-1045','Mercadotecnia Electrónica','1-4-5','8','gestion'),
                                                                                ('GDM-2005','Tópicos para la gestión integral de las organizaciones','2-4-6','8','gestion'),
                                                                                ('GDF-2006','La innovación Empresarial y los Sistemas de Calidad','3-2-5','8','gestion'),
                                                                                ('GEF-092','Cadena de Suministros','3-2-5','8','gestion'),



                                                                                ('ACC-09606','Fundamentos de Investigación','2-2-4','1','industrial'),
                                                                                ('ACF-0901','Cálculo Diferencial','3-2-5','1','industrial'),
                                                                                ('INC-1025','Química','2-2-4','1','industrial'),
                                                                                ('INH-1029','Taller de Herramientas','1-3-4','1','industrial'),
                                                                                ('INN-1008','Dibujo Industrial','0-6-6','1','industrial'),
                                                                                ('ACA-0907','Taller de Etica','0-4-4','1','industrial'),
                                                                                
                                                                                ('INC-1013','Física','2-2-4','2','industrial'),
                                                                                ('ACF-0902','Cálculo Integral','3-2-5','2','industrial'),
                                                                                ('AEC-1048','Metrología y Normalización','2-2-4','2','industrial'),
                                                                                ('INR-1017','Ingeniería de Sistemas','2-1-3','2','industrial'),
                                                                                ('AEC-1053','Probabilidad y Estadística','2-2-4','2','industrial'),
                                                                                ('INQ-1006','Análisis de la Realidad Nacional','1-2-3','2','industrial'),
                                                                                ('INC-1030','Taller de Liderazgo','2-2-4','2','industrial'),
                                                                            
                                                                                ('INC-1024','Propiedad de los Materiales','2-2-4','3','industrial'),
                                                                                ('ACF-0903','Algebra Lineal','3-2-5','3','industrial'),
                                                                                ('INC-1023','Procesos de Fabricación','2-2-4','3','industrial'),
                                                                                ('AEC-10-18','Economía','2-2-4','3','industrial'),
                                                                                ('AEF-1024','Estadística Inferencial I','3-2-5','3','industrial'),
                                                                                ('INJ-1011','Estudio del Trabajo I','4-2-6','3','industrial'),
                                                                                
                                                                                ('ACF-0904','Cálculo Vectorial','3-2-5','4','industrial'),
                                                                                ('INC-1009','Electricidad y Electrónica Industrial','2-2-4','4','industrial'),
                                                                                ('INC-1005','Algoritmos y Lenguajes de','2-2-4','4','industrial'),
                                                                                ('INC-1018','Investigación de Operaciones I','2-2-4','4','industrial'),
                                                                                ('AEF-1025','Estadística Inferencial II','3-2-5','4','industrial'),
                                                                                ('INJ-1012','Estudio del Trabajo II','4-2-6','4','industrial'),
                                                                                ('INF-1016','Higiene y Seguridad Industrial','3-2-5','4','industrial'),
                                                                                
                                                                                ('INR-1003','Administración de Proyectos','2-1-3','5','industrial'),
                                                                                ('INC-1014','Gestión de Costos','2-2-4','5','industrial'),
                                                                                ('INC-1001','Administración de las Operaciones I','2-2-4','5','industrial'),
                                                                                ('INC-1019','Investigación de las Operaciones II','2-2-4','5','industrial'),
                                                                                ('INF-1007','Control Estadístico de la Calidad','3-2-5','5','industrial'),
                                                                                ('INF-1010','Ergonomía','3-2-5','5','industrial'),
                                                                                ('ACD-0908','Desarrollo Sustentable','2-3-5','5','industrial'),
                                                                                
                                                                                ('ACA-0909','Taller de Investigación I','0-4-4','6','industrial'),
                                                                                ('AEC-1037','Ingeniería Económica','2-2-4','6','industrial'),
                                                                                ('INC-1002','Administración de las Operaciones II','2-2-4','6','industrial'),
                                                                                ('INC-1027','Simulación','2-2-4','6','industrial'),
                                                                                ('INC-1004','Administración del Mantenimiento','2-2-4','6','industrial'),
                                                                                ('AEC-1044','Mercadotecnia','2-3-5','6','industrial'),
                                                                                ('INC-1015 ','Gestión de los Sistemas de Calidad','2-2-4','6','industrial'),
                                                                                
                                                                                ('ACA-0910','Taller de Investigación II','0-4-4','7','industrial'),
                                                                                ('INC-1021','Planeación Financiera','2-2-4','7','industrial'),
                                                                                ('INC-1022','Planeación y Diseño de','2-2-4','7','industrial'),
                                                                                ('INF-1028','Sistemas de Manufactura','3-2-5','7','industrial'),
                                                                                ('INH-1020','Logística y Cadenas de Suministro','1-3-4','7','industrial'),
                                                                                ('DMD-1706','MANUFACTURA SUSTENTABLE','2-3-5','7','industrial'),
                                                                                ('DMM-1701','DISEÑO ASISTIDO POR COMPUTADOR','2-4-6','7','industrial'),

                                                                                ('AED-1030','Formulación y Evaluación de','2-3-5','8','industrial'),
                                                                                ('INC-1026','Relaciones Industriales','2-2-4','8','industrial'),
                                                                                ('DMM-1703','DISEÑO ASISTIDO POR','2-4-6','8','industrial'),
                                                                                ('DMD-1702','TECNOLOGIAS PARA EL','2-3-5','8','industrial'),
                                                                                ('DMD-1705','CONTROLADORES LÓGICOS PROGRAMABLES','2-3-5','8','industrial'),
                                                                                ('DMD-1704','MANUFACTURA ESBELTA','2-2-4','8','industrial');