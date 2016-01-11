--------------------------------------------------------
--  File created - mercredi-novembre-25-2015   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table acceder
--------------------------------------------------------

  CREATE TABLE "acceder" 
   (	"matricule" CHAR(32), 
	"idopt" NUMBER(2,0), 
	"idprofil" NUMBER(2,0), 
	"typeprivilege" CHAR(32)
   ) ;
--------------------------------------------------------
--  DDL for Table affecter
--------------------------------------------------------

  CREATE TABLE "affecter" 
   (	"codebien" NUMBER(14,2), 
	"codebureau" CHAR(10), 
	"dt" DATE, 
	"numAffectation" NUMBER
   ) ;
--------------------------------------------------------
--  DDL for Table appartenirmarque
--------------------------------------------------------

  CREATE TABLE "appartenirmarque" 
   (	"codebien" NUMBER(14,2), 
	"modele" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table appartenirmodelvehicule
--------------------------------------------------------

  CREATE TABLE "appartenirmodelvehicule" 
   (	"modele" VARCHAR2(128), 
	"marque" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table beneficiere
--------------------------------------------------------

  CREATE TABLE "beneficiere" 
   (	"idben" NUMBER(6,0), 
	"nomben" VARCHAR2(255), 
	"prenomben" VARCHAR2(255), 
	"tel" VARCHAR2(255), 
	"email" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table bien
--------------------------------------------------------

  CREATE TABLE "bien" 
   (	"codebien" NUMBER(14,2), 
	"numfacture" NUMBER(6,0), 
	"numcmd" NUMBER(6,0), 
	"typebien" VARCHAR2(255), 
	"designationbien" VARCHAR2(255), 
	"dateacquisition" DATE, 
	"statutbien" VARCHAR2(128), 
	"etatbien" VARCHAR2(128), 
	"prixachat" NUMBER(13,2), 
	"tauxamort" NUMBER(10,2), 
	"typeamort" CHAR(32), 
	"dureevie" NUMBER(3,0), 
	"commentaire" VARCHAR2(255), 
	"poids" NUMBER(5,2), 
	"datedebugarantie" DATE, 
	"dateenr" DATE, 
	"codesousfamille" VARCHAR2(255), 
	"datefingarantie" DATE, 
	"modele" VARCHAR2(128), 
	"path" VARCHAR2(255), 
	"seq" NUMBER(*,0)
   ) ;
--------------------------------------------------------
--  DDL for Table bureau
--------------------------------------------------------

  CREATE TABLE "bureau" 
   (	"codebureau" CHAR(10), 
	"designationbureau" VARCHAR2(255), 
	"codestructure" VARCHAR2(11 CHAR)
   ) ;
--------------------------------------------------------
--  DDL for Table commande
--------------------------------------------------------

  CREATE TABLE "commande" 
   (	"numcmd" NUMBER(6,0), 
	"datecmd" DATE
   ) ;
--------------------------------------------------------
--  DDL for Table comptecomptable
--------------------------------------------------------

  CREATE TABLE "comptecomptable" 
   (	"codecomptecomptable" NUMBER, 
	"designationcomptecomptable" VARCHAR2(255), 
	"comptecomptableref" NUMBER, 
	"designationccref" VARCHAR2(255), 
	"type" VARCHAR2(20)
   ) ;
--------------------------------------------------------
--  DDL for Table comptecomptableamort
--------------------------------------------------------

  CREATE TABLE "comptecomptableamort" 
   (	"codecomptecomptable" NUMBER, 
	"designationcomptecomptable" VARCHAR2(20), 
	"comptecomptableref" VARCHAR2(20), 
	"designationccref" VARCHAR2(20), 
	"type" VARCHAR2(20)
   ) ;
--------------------------------------------------------
--  DDL for Table compteutilisateur
--------------------------------------------------------

  CREATE TABLE "compteutilisateur" 
   (	"matricule" CHAR(32), 
	"nom" VARCHAR2(128), 
	"prenom" VARCHAR2(128), 
	"usr" VARCHAR2(128), 
	"psw" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table dat
--------------------------------------------------------

  CREATE TABLE "dat" 
   (	"dt" DATE
   ) ;
--------------------------------------------------------
--  DDL for Table ecartpositif
--------------------------------------------------------

  CREATE TABLE "ecartpositif" 
   (	"idecartpos" NUMBER(2,0), 
	"codebureau" CHAR(32), 
	"anneeinv" NUMBER(10,2), 
	"designationecartpos" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table exerciceinventaire
--------------------------------------------------------

  CREATE TABLE "exerciceinventaire" 
   (	"anneeinv" NUMBER(10,2), 
	"seuil_compte" NUMBER(5,2)
   ) ;
--------------------------------------------------------
--  DDL for Table facture
--------------------------------------------------------

  CREATE TABLE "facture" 
   (	"numfacture" NUMBER(6,0), 
	"regcomm" VARCHAR2(128), 
	"datefact" DATE, 
	"tva" NUMBER(10,2)
   ) ;
--------------------------------------------------------
--  DDL for Table famille
--------------------------------------------------------

  CREATE TABLE "famille" 
   (	"codefamille" NUMBER, 
	"designationfamille" VARCHAR2(255), 
	"codecomptecomptable" NUMBER
   ) ;
--------------------------------------------------------
--  DDL for Table fonction
--------------------------------------------------------

  CREATE TABLE "fonction" 
   (	"idfonction" CHAR(32), 
	"designationfonc" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table fournisseur
--------------------------------------------------------

  CREATE TABLE "fournisseur" 
   (	"regcomm" VARCHAR2(128), 
	"designation" VARCHAR2(255), 
	"adressfourn" VARCHAR2(255), 
	"telfourn" VARCHAR2(255), 
	"fax" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table immobilier
--------------------------------------------------------

  CREATE TABLE "immobilier" 
   (	"codebien" NUMBER(14,2), 
	"superfice" VARCHAR2(128), 
	"adresse" VARCHAR2(255), 
	"nbretage" NUMBER(2,0), 
	"typebien" VARCHAR2(255), 
	"designationbien" VARCHAR2(255), 
	"dateacquisition" DATE, 
	"statutbien" VARCHAR2(128), 
	"etatbien" VARCHAR2(128), 
	"prixachat" NUMBER(13,2), 
	"tauxamort" NUMBER(10,2), 
	"typeamort" CHAR(32), 
	"dureevie" NUMBER(3,0), 
	"commentaire" VARCHAR2(255), 
	"poids" NUMBER(5,2), 
	"garantie" NUMBER(10,2), 
	"datedebugarantie" DATE
   ) ;
--------------------------------------------------------
--  DDL for Table instance
--------------------------------------------------------

  CREATE TABLE "instance" 
   (	"codebien" NUMBER(14,2), 
	"dt" DATE, 
	"status" VARCHAR2(128 CHAR), 
	"codestructure" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table intervenant
--------------------------------------------------------

  CREATE TABLE "intervenant" 
   (	"idintervenant" NUMBER, 
	"typeinter" VARCHAR2(128), 
	"titre" VARCHAR2(20), 
	"adresse" VARCHAR2(255), 
	"mail" VARCHAR2(255), 
	"tel" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table inventorier
--------------------------------------------------------

  CREATE TABLE "inventorier" 
   (	"codebien" NUMBER(14,2), 
	"anneeinv" NUMBER(10,0), 
	"comptage1" NUMBER, 
	"obs" VARCHAR2(255), 
	"comptage2" NUMBER, 
	"comptage3" NUMBER, 
	"bureau" VARCHAR2(20), 
	"inventairephysic" VARCHAR2(20)
   ) ;
--------------------------------------------------------
--  DDL for Table locataire
--------------------------------------------------------

  CREATE TABLE "locataire" 
   (	"idlocataire" NUMBER(4,0), 
	"libeleloc" CHAR(32), 
	"fct_locat" CHAR(32), 
	"fix" NUMBER(10,2), 
	"fax" CHAR(32), 
	"tel" CHAR(32), 
	"mail" CHAR(32)
   ) ;
--------------------------------------------------------
--  DDL for Table loger
--------------------------------------------------------

  CREATE TABLE "loger" 
   (	"codebien" NUMBER(14,2), 
	"idben" NUMBER(6,0), 
	"dt" DATE, 
	"datefonlog" DATE
   ) ;
--------------------------------------------------------
--  DDL for Table louer
--------------------------------------------------------

  CREATE TABLE "louer" 
   (	"codebien" NUMBER(14,2), 
	"idlocataire" NUMBER(4,0), 
	"dt" DATE, 
	"dureelocation" NUMBER(2,0), 
	"unite" CHAR(32)
   ) ;
--------------------------------------------------------
--  DDL for Table marque
--------------------------------------------------------

  CREATE TABLE "marque" 
   (	"marque" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table materielbureautique
--------------------------------------------------------

  CREATE TABLE "materielbureautique" 
   (	"codebien" NUMBER(14,2), 
	"dimenssion" VARCHAR2(255), 
	"couleur" VARCHAR2(128), 
	"matiere_fabrication" VARCHAR2(128), 
	"typebien" NVARCHAR2(255), 
	"designationbien" VARCHAR2(255), 
	"dateacquisition" DATE, 
	"statutbien" VARCHAR2(128), 
	"etatbien" VARCHAR2(128), 
	"prixachat" NUMBER(13,2), 
	"tauxamort" NUMBER(10,2), 
	"typeamort" CHAR(32), 
	"dureevie" NUMBER(3,0), 
	"commentaire" VARCHAR2(255), 
	"poids" NUMBER(5,2), 
	"datefingarantie" DATE, 
	"datedebugarantie" DATE
   ) ;
--------------------------------------------------------
--  DDL for Table materielchaudfroid
--------------------------------------------------------

  CREATE TABLE "materielchaudfroid" 
   (	"codebien" NUMBER(14,2), 
	"ref" VARCHAR2(128), 
	"cptchaud" NUMBER(10,2), 
	"cptfroid" NUMBER(10,2), 
	"debitair" NUMBER(10,2), 
	"typebien" CHAR(32), 
	"designationbien" VARCHAR2(255), 
	"dateacquisition" DATE, 
	"statutbien" VARCHAR2(128), 
	"etatbien" VARCHAR2(128), 
	"prixachat" NUMBER(13,2), 
	"tauxamort" NUMBER(10,2), 
	"typeamort" CHAR(32), 
	"dureevie" NUMBER(3,0), 
	"commentaire" VARCHAR2(255), 
	"poids" NUMBER(5,2), 
	"datefingarantie" DATE, 
	"datedebugarantie" DATE, 
	"modele" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table materielinformatique
--------------------------------------------------------

  CREATE TABLE "materielinformatique" 
   (	"codebien" NUMBER(14,2), 
	"ram" VARCHAR2(128), 
	"disquedur" VARCHAR2(128), 
	"os" VARCHAR2(128), 
	"cartegraph" VARCHAR2(128), 
	"processur" VARCHAR2(128), 
	"camera" VARCHAR2(128), 
	"numserie" VARCHAR2(128), 
	"typebien" VARCHAR2(255), 
	"designationbien" VARCHAR2(255), 
	"dateacquisition" DATE, 
	"statutbien" VARCHAR2(128), 
	"etatbien" VARCHAR2(128), 
	"prixachat" NUMBER(13,2), 
	"tauxamort" NUMBER(10,2), 
	"typeamort" CHAR(32), 
	"dureevie" NUMBER(3,0), 
	"commentaire" VARCHAR2(255), 
	"poids" NUMBER(5,2), 
	"datefingarantie" DATE, 
	"datedebugarantie" DATE, 
	"modele" VARCHAR2(128), 
	"seq" NUMBER(*,0)
   ) ;
--------------------------------------------------------
--  DDL for Table modele
--------------------------------------------------------

  CREATE TABLE "modele" 
   (	"modele" VARCHAR2(128), 
	"marque" VARCHAR2(128), 
	"codesousfamille" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table natureprestation
--------------------------------------------------------

  CREATE TABLE "natureprestation" 
   (	"natureprestation" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table occupebenif
--------------------------------------------------------

  CREATE TABLE "occupebenif" 
   (	"idben" NUMBER(6,0), 
	"idfonction" CHAR(32), 
	"dt" DATE
   ) ;
--------------------------------------------------------
--  DDL for Table operation
--------------------------------------------------------

  CREATE TABLE "operation" 
   (	"idopt" NUMBER(2,0), 
	"designationopt" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table prestataire
--------------------------------------------------------

  CREATE TABLE "prestataire" 
   (	"num_reg" CHAR(32), 
	"designation" CHAR(32), 
	"adresse" VARCHAR2(128), 
	"tel" CHAR(32), 
	"fax" CHAR(32), 
	"email" CHAR(32), 
	"natureprestation" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table profil
--------------------------------------------------------

  CREATE TABLE "profil" 
   (	"idprofil" NUMBER(2,0), 
	"modif" NUMBER(1,0), 
	"consult" NUMBER(1,0), 
	"supp" NUMBER(1,0), 
	"imprim" NUMBER(1,0), 
	"creer" NUMBER(1,0)
   ) ;
--------------------------------------------------------
--  DDL for Table reevaluer
--------------------------------------------------------

  CREATE TABLE "reevaluer" 
   (	"codebien" NUMBER(14,2), 
	"dt" DATE, 
	"cout_reeval" NUMBER(13,2)
   ) ;
--------------------------------------------------------
--  DDL for Table reforme
--------------------------------------------------------

  CREATE TABLE "reforme" 
   (	"datereforme" VARCHAR2(20), 
	"refpvreforme" VARCHAR2(128), 
	"numdecisionreforme" CHAR(32), 
	"conclusionreforme" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table reformer
--------------------------------------------------------

  CREATE TABLE "reformer" 
   (	"datereforme" DATE, 
	"codebien" NUMBER(14,2), 
	"idintervenant" NUMBER(6,0), 
	"typereforme" VARCHAR2(20), 
	"titre" VARCHAR2(185), 
	"prixvente" FLOAT(126), 
	"booleann" VARCHAR2(20), 
	"codestructure" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table reparer
--------------------------------------------------------

  CREATE TABLE "reparer" 
   (	"codebien" NUMBER(14,2), 
	"num_reg" CHAR(32), 
	"dt" DATE, 
	"numreparation" NUMBER(6,0), 
	"datefin" DATE, 
	"motif" VARCHAR2(255), 
	"codestructure" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table sousfamille
--------------------------------------------------------

  CREATE TABLE "sousfamille" 
   (	"designationsousfamille" VARCHAR2(128), 
	"codefamille" NUMBER, 
	"codesousfamille" VARCHAR2(255), 
	"designationfamille" VARCHAR2(255)
   ) ;
--------------------------------------------------------
--  DDL for Table structure
--------------------------------------------------------

  CREATE TABLE "structure" 
   (	"typestructure" VARCHAR2(255 CHAR), 
	"adressestruct" VARCHAR2(255 CHAR), 
	"designation" VARCHAR2(255 CHAR), 
	"codestructure" VARCHAR2(11), 
	"codestructure_struct_chef" VARCHAR2(11)
   ) ;
--------------------------------------------------------
--  DDL for Table transferer
--------------------------------------------------------

  CREATE TABLE "transferer" 
   (	"codebien" NUMBER(14,2), 
	"motif" VARCHAR2(255), 
	"dt" DATE, 
	"codebureau" CHAR(10)
   ) ;
--------------------------------------------------------
--  DDL for Table transfererrefinv
--------------------------------------------------------

  CREATE TABLE "transfererrefinv" 
   (	"codecomptecomptable" VARCHAR2(20), 
	"codecomptecomptableref" VARCHAR2(20), 
	"dat" VARCHAR2(20), 
	"mnt" VARCHAR2(20)
   ) ;
--------------------------------------------------------
--  DDL for Table transfererrefinvamort
--------------------------------------------------------

  CREATE TABLE "transfererrefinvamort" 
   (	"codecomptecomptable" VARCHAR2(20), 
	"codecomptecomptableref" VARCHAR2(20), 
	"dat" VARCHAR2(20), 
	"mnt" VARCHAR2(20)
   ) ;
--------------------------------------------------------
--  DDL for Table transport
--------------------------------------------------------

  CREATE TABLE "transport" 
   (	"codebien" NUMBER(14,2), 
	"matricule" VARCHAR2(255), 
	"annee_fab" VARCHAR2(255), 
	"numchassie" VARCHAR2(255), 
	"energie" VARCHAR2(255), 
	"puisscv" VARCHAR2(255), 
	"charge" VARCHAR2(255), 
	"nb_place" VARCHAR2(255), 
	"typebien" CHAR(32), 
	"designationbien" VARCHAR2(255), 
	"dateacquisition" DATE, 
	"statutbien" VARCHAR2(128), 
	"etatbien" VARCHAR2(128), 
	"prixachat" NUMBER(13,2), 
	"tauxamort" NUMBER(10,2), 
	"typeamort" CHAR(32), 
	"dureevie" NUMBER(3,0), 
	"commentaire" VARCHAR2(255), 
	"poids" NUMBER(5,2), 
	"datefingarantie" DATE, 
	"datedebugarantie" DATE, 
	"modele" VARCHAR2(128)
   ) ;
--------------------------------------------------------
--  DDL for Table travaille
--------------------------------------------------------

  CREATE TABLE "travaille" 
   (	"idben" NUMBER(6,0), 
	"codestructure" CHAR(32), 
	"dt" DATE
   ) ;
--------------------------------------------------------
--  DDL for Table user
--------------------------------------------------------

  CREATE TABLE "user" 
   (	"id" NUMBER(11,0), 
	"username" VARCHAR2(255), 
	"auth_key" VARCHAR2(32), 
	"password_hash" VARCHAR2(255), 
	"password_reset_token" VARCHAR2(255), 
	"email" VARCHAR2(255), 
	"status" NUMBER(6,0), 
	"created_at" NUMBER(11,0), 
	"updated_at" NUMBER(11,0)
   ) ;

---------------------------------------------------
--   DATA FOR TABLE acceder
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "acceder"

---------------------------------------------------
--   END DATA FOR TABLE acceder
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE affecter
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "affecter"
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218450020514,'0100/02/07',to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),19);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000118,'0100/02/07',to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),39);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000120,'0100/02/07',to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),39);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000121,'0100/02/07',to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),39);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218450020515,'0100/02/07',to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),39);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218450020516,'0100/02/07',to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),39);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000119,'0100/02/07',to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),39);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000117,'0100/02/07',to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),39);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (21844004032,'0100/02/05',to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),14);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (21844004034,'0100/02/07',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),12);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (21844004035,'0100/02/07',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),12);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000312,'0100/02/07',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (21844004036,'0100/02/07',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000313,'0100/02/07',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000311,'0100/02/07',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (21845200039,'0100/02/07',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (218452000310,'0100/02/07',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46);
Insert into "affecter" ("codebien","codebureau","dt","numAffectation") values (21845002128,'0100/02/07',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46);

---------------------------------------------------
--   END DATA FOR TABLE affecter
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE appartenirmarque
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "appartenirmarque"

---------------------------------------------------
--   END DATA FOR TABLE appartenirmarque
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE appartenirmodelvehicule
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "appartenirmodelvehicule"

---------------------------------------------------
--   END DATA FOR TABLE appartenirmodelvehicule
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE beneficiere
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "beneficiere"

---------------------------------------------------
--   END DATA FOR TABLE beneficiere
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE bien
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "bien"
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (2110000001,7,7,null,'Terrain',to_timestamp('18/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'bon','acquis',1236,null,'lineaire                        ',5,null,null,to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'21100000',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,1);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000119,6,5,null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184520001',to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,19);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000117,6,5,null,'Micro ordinateur',to_timestamp('01/01/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184520001',to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,17);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000118,6,5,null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'transfere','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184520001',to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,18);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000120,6,5,null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'sortirf','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184520001',to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,20);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000121,6,5,null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'sortirf','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('05/10/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184520001',to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,21);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21844004034,123,123,null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184400403',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A',null,4);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21844004035,123,123,null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'sortirf','noeuf',1000000,null,'Lineaire                        ',10,null,null,to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184400403',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A',null,5);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21844004036,123,123,null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'reformer','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184400403',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A',null,6);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21844004032,123,123,null,'voiture classique',to_timestamp('31/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'sortirf','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184400403',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A',null,2);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21844004033,123,123,null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'mis en instance','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184400403',to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A',null,3);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020514,19,18,null,'Armoire',to_timestamp('21/09/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'transfere','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('20/09/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,14);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020515,19,18,null,'Armoire',to_timestamp('21/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('20/09/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,15);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020516,19,18,null,'Armoire',to_timestamp('21/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('20/09/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,16);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020522,18,18,null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,22);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020523,18,18,null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,23);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020524,18,18,null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,24);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020525,18,18,null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,25);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218450020526,18,18,null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500205',to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,26);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000311,84,77,null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'en rÃ©paration','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184520003',to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,11);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000312,84,77,null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'sortirf','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184520003',to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,12);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000313,84,77,null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'en rÃ©paration','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184520003',to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,13);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21845200039,84,77,null,'Onduleur',to_timestamp('03/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'sortirf','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'2184520003',to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,9);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (218452000310,84,77,null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'en rÃ©paration','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184520003',to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',null,10);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21845002127,65,36,null,'Table ronde',to_timestamp('27/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'mis en instance','bon',10000,null,'Lineaire                        ',2,null,null,to_timestamp('25/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500212',to_timestamp('29/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,7);
Insert into "bien" ("codebien","numfacture","numcmd","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datedebugarantie","dateenr","codesousfamille","datefingarantie","modele","path","seq") values (21845002128,65,36,null,'Table ronde',to_timestamp('27/02/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'en rÃ©paration','bon',10000,null,'Lineaire                        ',2,null,null,to_timestamp('25/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,'2184500212',to_timestamp('29/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),null,null,8);

---------------------------------------------------
--   END DATA FOR TABLE bien
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE bureau
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "bureau"
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0100/02/07','bureau inventaire','01/08/02');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0100/02/06','bureau financier','01/08/02');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0100/02/05','bureau appro','01/08/02');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0100/02/08','bureau patrimoine','01/08/02');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0200/01/01','bureau 1 service investissement','02/09');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0300/02/04','bureau investissement','03/09');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0400/02/01','bureau investissement','04/09');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0500/03/04','bureau investissement','05/09');
Insert into "bureau" ("codebureau","designationbureau","codestructure") values ('0600/03/02','bureau investissement','06/07');

---------------------------------------------------
--   END DATA FOR TABLE bureau
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE commande
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "commande"
Insert into "commande" ("numcmd","datecmd") values (5,to_timestamp('02/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "commande" ("numcmd","datecmd") values (7,to_timestamp('28/07/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "commande" ("numcmd","datecmd") values (123,to_timestamp('03/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "commande" ("numcmd","datecmd") values (18,to_timestamp('04/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "commande" ("numcmd","datecmd") values (77,to_timestamp('30/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "commande" ("numcmd","datecmd") values (36,to_timestamp('11/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));

---------------------------------------------------
--   END DATA FOR TABLE commande
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE comptecomptable
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "comptecomptable"
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2110,'Terrains de construction',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2116,'Autres terrains',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (212,'Agencements et aménagements de terrain',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (213,'Consrtuction',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2134,'Consrtuction',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (213400,'Autres constructions',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (213401,' Autres constructions ascensseur',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (213402,'Autres constructions climatisation',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2135,'Construction sociaux',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (213500,'Autres constructions sociaux',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (213501,'Autres constructions sociaux ascensseurs',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (213502,'Autres constructions sociaux climatisation',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218,'Autres immobilisations corporelles',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (211,'Terrains',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2182,'Matériel, outillage, mobilier et équipement ménagers',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218251,'Materiels',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218252,'Mobilier et équipement ménagers',218952,'Mobilier et équipement ménagers',null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2184,'Equipement de bureau et informatique',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218430,'Matériels',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218431,'Outillage',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218440,'Matériel automobile',218940,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218450,'Mobilier de bureau',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218451,'Matériel de bureau',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218452,'Materiel informatique',218952,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218499,'Equpement de production reformé',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218599,'Equipement sociaux reformé des OS',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2050,'Concession et droitssimilaires, brevets, licences marques détenus',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (20,'Immobilisations incorporelles',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (21,'Imoobilisations corporelles',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (2040,'Logiciels en exploitation',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (27,'Autres immobilisations financières',null,null,null);
Insert into "comptecomptable" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (272,'Titres représentatifs de droits de créances obligations et bons',null,null,null);

---------------------------------------------------
--   END DATA FOR TABLE comptecomptable
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE comptecomptableamort
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "comptecomptableamort"
Insert into "comptecomptableamort" ("codecomptecomptable","designationcomptecomptable","comptecomptableref","designationccref","type") values (218452,'test','218652','test',null);

---------------------------------------------------
--   END DATA FOR TABLE comptecomptableamort
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE compteutilisateur
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "compteutilisateur"

---------------------------------------------------
--   END DATA FOR TABLE compteutilisateur
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE dat
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "dat"
Insert into "dat" ("dt") values (to_timestamp('01/01/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('02/02/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('31/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('13/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('27/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('21/09/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('04/02/14 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('29/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('03/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('04/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('07/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('09/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('10/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('18/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "dat" ("dt") values (to_timestamp('04/10/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));

---------------------------------------------------
--   END DATA FOR TABLE dat
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE ecartpositif
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "ecartpositif"

---------------------------------------------------
--   END DATA FOR TABLE ecartpositif
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE exerciceinventaire
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "exerciceinventaire"

---------------------------------------------------
--   END DATA FOR TABLE exerciceinventaire
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE facture
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "facture"
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (6,'3',to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17);
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (123,'1',to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17);
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (19,'2',to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17);
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (18,'3',to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17);
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (7,'1',to_timestamp('28/07/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),4);
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (84,'3',to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17);
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (65,'3',to_timestamp('25/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17);
Insert into "facture" ("numfacture","regcomm","datefact","tva") values (62,'2',to_timestamp('02/02/14 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17);

---------------------------------------------------
--   END DATA FOR TABLE facture
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE famille
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "famille"
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845101,'Materiel de reprographie et comptable',218451);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845104,'Materiel de securité',218451);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845200,'Materiel informatique',218452);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845102,'Materiel de telecommunication',218451);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845103,'Materiel de froid et de chaffage',218451);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845105,'Matériel publicitaire',218451);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845106,'Autres materiel de bureau',218451);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21845002,'Mobilier de bureau',218450);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (21844004,'Matériel automobile',218440);
Insert into "famille" ("codefamille","designationfamille","codecomptecomptable") values (211000,'Terrains de construction',2110);

---------------------------------------------------
--   END DATA FOR TABLE famille
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE fonction
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "fonction"

---------------------------------------------------
--   END DATA FOR TABLE fonction
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE fournisseur
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "fournisseur"
Insert into "fournisseur" ("regcomm","designation","adressfourn","telfourn","fax") values ('3','Chergui','alger','021050505','021060606');
Insert into "fournisseur" ("regcomm","designation","adressfourn","telfourn","fax") values ('1','vendeurDZ','Batna','0663897288','021456598');
Insert into "fournisseur" ("regcomm","designation","adressfourn","telfourn","fax") values ('2','Capcode','setif','0663897289','021458736');

---------------------------------------------------
--   END DATA FOR TABLE fournisseur
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE immobilier
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "immobilier"

---------------------------------------------------
--   END DATA FOR TABLE immobilier
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE instance
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "instance"
Insert into "instance" ("codebien","dt","status","codestructure") values (218450020514,to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','siege');
Insert into "instance" ("codebien","dt","status","codestructure") values (21845002127,to_timestamp('13/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'mis en instance','siege');
Insert into "instance" ("codebien","dt","status","codestructure") values (21844004032,to_timestamp('18/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','siege');
Insert into "instance" ("codebien","dt","status","codestructure") values (21844004033,to_timestamp('18/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'mis en instance','siege');
Insert into "instance" ("codebien","dt","status","codestructure") values (218450020522,to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'affecte','siege');

---------------------------------------------------
--   END DATA FOR TABLE instance
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE intervenant
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "intervenant"
Insert into "intervenant" ("idintervenant","typeinter","titre","adresse","mail","tel") values (null,'Cession','Commissaire Ahmed','Batna','s_chergui@esi.dz','0663897288');
Insert into "intervenant" ("idintervenant","typeinter","titre","adresse","mail","tel") values (null,'Cession','Commissaire Rabah','Alger','rabah@hotmail.fr','0669854785');
Insert into "intervenant" ("idintervenant","typeinter","titre","adresse","mail","tel") values (null,'Don','CAAT','Alger','assistante@caat.dz','021458796');
Insert into "intervenant" ("idintervenant","typeinter","titre","adresse","mail","tel") values (null,'Don','CARAMA','ALger','carama@gmail.com','021654251');

---------------------------------------------------
--   END DATA FOR TABLE intervenant
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE inventorier
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "inventorier"
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (218452000119,2015,1,null,1,null,'0100/02/07','1');
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (218452000118,2015,1,null,1,null,'0100/02/06','1');
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (218450020515,2015,1,null,1,null,'0100/02/07','1');
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (218450020516,2015,null,null,1,null,'0100/02/07',null);
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (218452000117,2015,null,null,1,null,'0100/02/07',null);
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (21844004034,2015,null,null,1,null,'0100/02/07',null);
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (218450020514,2015,1,null,1,null,'0100/02/07','1');
Insert into "inventorier" ("codebien","anneeinv","comptage1","obs","comptage2","comptage3","bureau","inventairephysic") values (218452000121,2015,1,null,1,null,'0100/02/07','1');

---------------------------------------------------
--   END DATA FOR TABLE inventorier
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE locataire
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "locataire"

---------------------------------------------------
--   END DATA FOR TABLE locataire
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE loger
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "loger"

---------------------------------------------------
--   END DATA FOR TABLE loger
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE louer
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "louer"

---------------------------------------------------
--   END DATA FOR TABLE louer
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE marque
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "marque"
Insert into "marque" ("marque") values ('DELL');
Insert into "marque" ("marque") values ('HP');
Insert into "marque" ("marque") values ('LG');
Insert into "marque" ("marque") values ('Mercedes');
Insert into "marque" ("marque") values ('Panasonic');
Insert into "marque" ("marque") values ('Renault');
Insert into "marque" ("marque") values ('Sumsung');
Insert into "marque" ("marque") values ('TOSHIBA');
Insert into "marque" ("marque") values ('volkswagen');

---------------------------------------------------
--   END DATA FOR TABLE marque
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE materielbureautique
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "materielbureautique"
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020516,'2*1*3','marron','bois',null,'Armoire',to_timestamp('21/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('20/09/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020514,'2*1*3','marron','bois',null,'Armoire',to_timestamp('21/09/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('20/09/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020515,'2*1*3','marron','bois',null,'Armoire',to_timestamp('21/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('20/09/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('20/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020522,'2*1*3','marr','bois',null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020523,'2*1*3','marr','bois',null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020524,'2*1*3','marr','bois',null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020525,'2*1*3','marr','bois',null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (218450020526,'2*1*3','marr','bois',null,'Armoire',to_timestamp('01/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('08/03/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('15/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (21845002127,'R=1','n','bois',null,'Table ronde',to_timestamp('27/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','bon',10000,null,'Lineaire                        ',2,null,null,to_timestamp('29/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('25/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));
Insert into "materielbureautique" ("codebien","dimenssion","couleur","matiere_fabrication","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie") values (21845002128,'R=1','n','bois',null,'Table ronde',to_timestamp('27/02/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','bon',10000,null,'Lineaire                        ',2,null,null,to_timestamp('29/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('25/02/13 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'));

---------------------------------------------------
--   END DATA FOR TABLE materielbureautique
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE materielchaudfroid
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "materielchaudfroid"

---------------------------------------------------
--   END DATA FOR TABLE materielchaudfroid
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE materielinformatique
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "materielinformatique"
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000117,null,null,null,null,null,null,'1236',null,'Micro ordinateur',to_timestamp('01/01/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'H',16);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000118,'1','1','xp','1','intel','1','12364',null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',16);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000119,'1','1','xp','1','intel','1','12364',null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',16);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000120,'1','1','xp','1','intel','1','12364',null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',16);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000121,'1','1','xp','1','intel','1','12364',null,'Micro ordinateur',to_timestamp('01/01/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',50000,null,'Lineaire                        ',5,null,null,to_timestamp('31/08/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('25/12/09 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',16);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000311,'2','1','1','1','1','1','1235ab123',null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',8);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (21845200039,'2','1','1','1','1','1','1235ab123',null,'Onduleur',to_timestamp('03/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',8);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000310,'2','1','1','1','1','1','1235ab123',null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',8);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000312,'2','1','1','1','1','1','1235ab123',null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',8);
Insert into "materielinformatique" ("codebien","ram","disquedur","os","cartegraph","processur","camera","numserie","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele","seq") values (218452000313,'2','1','1','1','1','1','1235ab123',null,'Onduleur',to_timestamp('03/09/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',30000,null,'Lineaire                        ',3,null,null,to_timestamp('31/01/17 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'HP',8);

---------------------------------------------------
--   END DATA FOR TABLE materielinformatique
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE modele
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "modele"
Insert into "modele" ("modele","marque","codesousfamille") values ('Golf','volkswagen','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('Polo','volkswagen','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('Passat','volkswagen','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('CLS','Mercedes','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('AMG','Mercedes','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('Classe A','Mercedes','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('HP','HP','informatique');
Insert into "modele" ("modele","marque","codesousfamille") values ('Clio','Renault','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('Master','Renault','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('Maxity','Renault','transport');
Insert into "modele" ("modele","marque","codesousfamille") values ('Climatiseur SPLIT','LG','chaud');
Insert into "modele" ("modele","marque","codesousfamille") values ('Climatiseur non plasma','LG','chaud');
Insert into "modele" ("modele","marque","codesousfamille") values ('Climatiseur  plasma','LG','chaud');

---------------------------------------------------
--   END DATA FOR TABLE modele
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE natureprestation
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "natureprestation"
Insert into "natureprestation" ("natureprestation") values ('TS informatique');
Insert into "natureprestation" ("natureprestation") values ('mecanicien');

---------------------------------------------------
--   END DATA FOR TABLE natureprestation
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE occupebenif
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "occupebenif"

---------------------------------------------------
--   END DATA FOR TABLE occupebenif
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE operation
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "operation"

---------------------------------------------------
--   END DATA FOR TABLE operation
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE prestataire
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "prestataire"
Insert into "prestataire" ("num_reg","designation","adresse","tel","fax","email","natureprestation") values ('2                               ','Boualam                         ','setif','0663897288                      ','021457896                       ','Boualam@hotmail.fr              ','TS informatique');
Insert into "prestataire" ("num_reg","designation","adresse","tel","fax","email","natureprestation") values ('1                               ','dz-reparation                   ','alger','0214587                         ','02145869                        ','rep@repa.dz                     ','mecanicien');
Insert into "prestataire" ("num_reg","designation","adresse","tel","fax","email","natureprestation") values ('3                               ','Benadjimi                       ','alger','0558745896                      ','021547896                       ','benadjimi@hotmail.fr            ','mecanicien');

---------------------------------------------------
--   END DATA FOR TABLE prestataire
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE profil
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "profil"

---------------------------------------------------
--   END DATA FOR TABLE profil
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE reevaluer
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "reevaluer"

---------------------------------------------------
--   END DATA FOR TABLE reevaluer
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE reforme
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "reforme"
Insert into "reforme" ("datereforme","refpvreforme","numdecisionreforme","conclusionreforme") values ('2015',null,null,null);

---------------------------------------------------
--   END DATA FOR TABLE reforme
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE reformer
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "reformer"
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),21844004035,null,'Cession','Commissaire Ahmed',3000,'2','siege');
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),21844004036,null,'Perdu',null,null,null,'siege');
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),218452000118,null,'Cession','Commissaire Ahmed',3000,'2',null);
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('05/10/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),218452000121,null,'Cession','Commissaire Ahmed',3000,'2',null);
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),21845200039,null,'Cession','Commissaire Ahmed',3000,'2','siege');
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),21844004032,null,'Cession','Commissaire Ahmed',3000,'2',null);
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),218452000312,null,'Cession','samira',3000,'2','siege');
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),218452000313,null,'Cession','Commissaire Ahmed',3000,'2','siege');
Insert into "reformer" ("datereforme","codebien","idintervenant","typereforme","titre","prixvente","booleann","codestructure") values (to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),218452000120,null,'Cession','Commissaire Ahmed',3000,'2',null);

---------------------------------------------------
--   END DATA FOR TABLE reformer
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE reparer
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "reparer"
Insert into "reparer" ("codebien","num_reg","dt","numreparation","datefin","motif","codestructure") values (218452000313,'2                               ',to_timestamp('09/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),3,null,null,'siege');
Insert into "reparer" ("codebien","num_reg","dt","numreparation","datefin","motif","codestructure") values (218450020514,'2                               ',to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),19,null,null,'siege');
Insert into "reparer" ("codebien","num_reg","dt","numreparation","datefin","motif","codestructure") values (218452000310,'1                               ',to_timestamp('07/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),12,null,null,'siege');
Insert into "reparer" ("codebien","num_reg","dt","numreparation","datefin","motif","codestructure") values (21844004032,'1                               ',to_timestamp('18/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),48,null,null,'siege');
Insert into "reparer" ("codebien","num_reg","dt","numreparation","datefin","motif","codestructure") values (21845002128,'1                               ',to_timestamp('02/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),35,null,null,'siege');
Insert into "reparer" ("codebien","num_reg","dt","numreparation","datefin","motif","codestructure") values (218452000311,'2                               ',to_timestamp('04/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),46,null,null,'Succursale Cheraga');
Insert into "reparer" ("codebien","num_reg","dt","numreparation","datefin","motif","codestructure") values (218452000118,'1                               ',to_timestamp('04/10/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),17,null,'xxx','siege');

---------------------------------------------------
--   END DATA FOR TABLE reparer
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE sousfamille
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "sousfamille"
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Lecteur de disquette',21845200,'2184520004','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Imprimante',21845200,'2184520002','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Onduleur',21845200,'2184520003','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Disque dur',21845200,'2184520005','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Modem',21845200,'2184520006','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Scanner',21845200,'2184520007','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Autres materiels informatiques',21845200,'2184520008','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Mini ordinateur',21845200,'2184520000','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('micro ordinateur',21845200,'2184520001','Materiel informatique');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Terrains de construction',211000,'21100000','Terrains de construction');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Vehicule de tourisme',21844004,'2184400400','Materiel automobile');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Vehicule poids lourd',21844004,'2184400401','Materiel automobile');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Vehicule commerciale',21844004,'2184400402','Materiel automobile');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Transport du personnel',21844004,'2184400403','Materiel automobile');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Motocycle',21844004,'2184400404','Materiel automobile');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Equipement GPL',21844004,'2184400405','Materiel automobile');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Ridelle',21844004,'2184400406','Materiel automobile');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Climatiseur',21845103,'2184510600','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Ventilateur',21845103,'2184510301','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Thermo-ventilateur',21845103,'2184510302','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Radiateur electrique',21845103,'2184510303','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Resistence electrique',21845103,'2184510304','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Chaffage au gaz',21845103,'2184510305','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Poele de mazout',21845103,'2184510306','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Chaudiere',21845103,'2184510307','Materiel de froid et de chaud');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Bibliotheque de direction en bois',21845002,'2184500200','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Bibliotheque metalique',21845002,'2184500201','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Bibliotheque classeur',21845002,'2184500202','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Armoire a porte coulissante',21845002,'2184500203','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Armoire a deux porte coulissante',21845002,'2184500204','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Armoire en bois',21845002,'2184500205','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Armoire metalique',21845002,'2184500206','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Bureau de directeur en bois',21845002,'2184500207','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Bureau de chef de section en bois',21845002,'2184500208','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Bureau de redacteur en bois',21845002,'2184500209','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Bureau de dactylo en bois',21845002,'2184500210','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Table de salon en bois',21845002,'2184500211','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Table de travail en bois',21845002,'2184500212','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Table de telephone en bois',21845002,'2184500213','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Table de telephone en metallique',21845002,'2184500214','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Fauteuil de directeur',21845002,'2184500215','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Fauteuil fixe en skai',21845002,'2184500216','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Fauteuil tournant en skai',21845002,'2184500217','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Fauteuil de reception',21845002,'2184500218','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Chaise en bois',21845002,'2184500219','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Chaise en skai',21845002,'2184500220','Mobilier de bureau');
Insert into "sousfamille" ("designationsousfamille","codefamille","codesousfamille","designationfamille") values ('Chaise rembouree',21845002,'2184500221','Mobilier de bureau');

---------------------------------------------------
--   END DATA FOR TABLE sousfamille
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE structure
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "structure"
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('siege','alger','siege central','01',null);
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('succursale','alger','Succursale Cheraga','02','01');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('succursale','Annaba','Succursale Annaba','03','01');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('succursale','Oran','Succursale Oran','04','01');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('succursale','Constantine','Succursale Constantine','05','01');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('succursale','Alger','Succursale Bouzareah','06','01');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('direction','Alger','Direction administrative des moyens','01/08','01');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('sous-direction','Alger','sous-direction des investissements','01/08/02','01/08');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('service','Alger','service patrimoine','01/08/02/02','01/08/02');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('departement','Alger,chéraga','departement de l''administration des moyens','02/09','02');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('service','Alger','service investissement','01/09/01','01/09');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('departement','annaba','departement de l''administration des moyens','03/09','03');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('departement','oran','departement de l''administration des moyens','04/09','04');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('departement','constantine','departement de l''administration des moyens','05/09','05');
Insert into "structure" ("typestructure","adressestruct","designation","codestructure","codestructure_struct_chef") values ('departement','alger, bouzereah','departement de l''administration des moyens','06/07','06');

---------------------------------------------------
--   END DATA FOR TABLE structure
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE transferer
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "transferer"
Insert into "transferer" ("codebien","motif","dt","codebureau") values (218450020514,null,to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'0100/02/05');
Insert into "transferer" ("codebien","motif","dt","codebureau") values (218452000118,'ccc',to_timestamp('05/10/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'0100/02/06');
Insert into "transferer" ("codebien","motif","dt","codebureau") values (218450020514,null,to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'0100/02/07');
Insert into "transferer" ("codebien","motif","dt","codebureau") values (21844004032,null,to_timestamp('21/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'0100/02/06');

---------------------------------------------------
--   END DATA FOR TABLE transferer
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE transfererrefinv
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "transfererrefinv"

---------------------------------------------------
--   END DATA FOR TABLE transfererrefinv
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE transfererrefinvamort
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "transfererrefinvamort"

---------------------------------------------------
--   END DATA FOR TABLE transfererrefinvamort
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE transport
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "transport"
Insert into "transport" ("codebien","matricule","annee_fab","numchassie","energie","puisscv","charge","nb_place","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele") values (21844004034,'234541516','2010','125639','diesel','65','45','5',null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A');
Insert into "transport" ("codebien","matricule","annee_fab","numchassie","energie","puisscv","charge","nb_place","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele") values (21844004032,'234541516','2010','125639','diesel','65','45','5',null,'voiture classique',to_timestamp('31/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A');
Insert into "transport" ("codebien","matricule","annee_fab","numchassie","energie","puisscv","charge","nb_place","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele") values (21844004033,'234541516','2010','125639','diesel','65','45','5',null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A');
Insert into "transport" ("codebien","matricule","annee_fab","numchassie","energie","puisscv","charge","nb_place","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele") values (21844004035,'234541516','2010','125639','diesel','65','45','5',null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A');
Insert into "transport" ("codebien","matricule","annee_fab","numchassie","energie","puisscv","charge","nb_place","typebien","designationbien","dateacquisition","statutbien","etatbien","prixachat","tauxamort","typeamort","dureevie","commentaire","poids","datefingarantie","datedebugarantie","modele") values (21844004036,'234541516','2010','125639','diesel','65','45','5',null,'voiture classique',to_timestamp('31/08/01 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'acquis','noeuf',10000000000,null,'Lineaire                        ',10,null,null,to_timestamp('19/09/15 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),to_timestamp('30/08/10 00:00:00,000000000','DD/MM/RR HH24:MI:SS,FF'),'Classe A');

---------------------------------------------------
--   END DATA FOR TABLE transport
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE travaille
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "travaille"

---------------------------------------------------
--   END DATA FOR TABLE travaille
---------------------------------------------------


---------------------------------------------------
--   DATA FOR TABLE user
--   FILTER = none used
---------------------------------------------------
REM INSERTING into "user"
Insert into "user" ("id","username","auth_key","password_hash","password_reset_token","email","status","created_at","updated_at") values (1,'admin','O0WMUQ5CFMNraIs3eW7LWVEsrkt50S01','$2y$13$W5VM2RCVhsMYBb0AsJz.ke0thLKDTWkdUfxbW6SpNXd8ihKGaapnS',null,'ai_adjissa@esi.dz',10,1434735027,1434735027);

---------------------------------------------------
--   END DATA FOR TABLE user
---------------------------------------------------

--------------------------------------------------------
--  Constraints for Table famille
--------------------------------------------------------

  ALTER TABLE "famille" ADD CONSTRAINT "pk_famille" PRIMARY KEY ("codefamille") ENABLE;
  ALTER TABLE "famille" MODIFY ("codefamille" NOT NULL ENABLE);
  ALTER TABLE "famille" MODIFY ("codecomptecomptable" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table locataire
--------------------------------------------------------

  ALTER TABLE "locataire" ADD CONSTRAINT "pk_locataire" PRIMARY KEY ("idlocataire") ENABLE;
  ALTER TABLE "locataire" MODIFY ("tel" NOT NULL ENABLE);
  ALTER TABLE "locataire" MODIFY ("fct_locat" NOT NULL ENABLE);
  ALTER TABLE "locataire" MODIFY ("libeleloc" NOT NULL ENABLE);
  ALTER TABLE "locataire" MODIFY ("idlocataire" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table exerciceinventaire
--------------------------------------------------------

  ALTER TABLE "exerciceinventaire" ADD CONSTRAINT "pk_exerciceinventaire" PRIMARY KEY ("anneeinv") ENABLE;
  ALTER TABLE "exerciceinventaire" MODIFY ("anneeinv" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table appartenirmodelvehicule
--------------------------------------------------------

  ALTER TABLE "appartenirmodelvehicule" ADD CONSTRAINT "pk_appartenirmodelvehicule" PRIMARY KEY ("modele") ENABLE;
  ALTER TABLE "appartenirmodelvehicule" MODIFY ("modele" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table inventorier
--------------------------------------------------------

  ALTER TABLE "inventorier" MODIFY ("anneeinv" NOT NULL ENABLE);
  ALTER TABLE "inventorier" MODIFY ("codebien" NOT NULL ENABLE);
  ALTER TABLE "inventorier" ADD CONSTRAINT "inventorier_PK" PRIMARY KEY ("codebien", "anneeinv") ENABLE;
--------------------------------------------------------
--  Constraints for Table louer
--------------------------------------------------------

  ALTER TABLE "louer" ADD CONSTRAINT "pk_louer" PRIMARY KEY ("codebien", "idlocataire", "dt") ENABLE;
  ALTER TABLE "louer" MODIFY ("unite" NOT NULL ENABLE);
  ALTER TABLE "louer" MODIFY ("dureelocation" NOT NULL ENABLE);
  ALTER TABLE "louer" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "louer" MODIFY ("idlocataire" NOT NULL ENABLE);
  ALTER TABLE "louer" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table transferer
--------------------------------------------------------

  ALTER TABLE "transferer" ADD CONSTRAINT "transferer_PK" PRIMARY KEY ("codebien", "dt", "codebureau") ENABLE;
  ALTER TABLE "transferer" MODIFY ("codebureau" NOT NULL ENABLE);
  ALTER TABLE "transferer" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "transferer" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table user
--------------------------------------------------------

  ALTER TABLE "user" ADD CONSTRAINT "user_PK" PRIMARY KEY ("id") ENABLE;
  ALTER TABLE "user" MODIFY ("created_at" NOT NULL ENABLE);
  ALTER TABLE "user" MODIFY ("status" NOT NULL ENABLE);
  ALTER TABLE "user" MODIFY ("email" NOT NULL ENABLE);
  ALTER TABLE "user" MODIFY ("password_hash" NOT NULL ENABLE);
  ALTER TABLE "user" MODIFY ("auth_key" NOT NULL ENABLE);
  ALTER TABLE "user" MODIFY ("username" NOT NULL ENABLE);
  ALTER TABLE "user" MODIFY ("id" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table commande
--------------------------------------------------------

  ALTER TABLE "commande" ADD CONSTRAINT "pk_commande" PRIMARY KEY ("numcmd") ENABLE;
  ALTER TABLE "commande" MODIFY ("numcmd" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table modele
--------------------------------------------------------

  ALTER TABLE "modele" ADD CONSTRAINT "pk_modele" PRIMARY KEY ("modele") ENABLE;
  ALTER TABLE "modele" MODIFY ("modele" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table comptecomptable
--------------------------------------------------------

  ALTER TABLE "comptecomptable" ADD CONSTRAINT "pk_comptecomptable" PRIMARY KEY ("codecomptecomptable") ENABLE;
  ALTER TABLE "comptecomptable" MODIFY ("codecomptecomptable" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table ecartpositif
--------------------------------------------------------

  ALTER TABLE "ecartpositif" ADD CONSTRAINT "pk_ecartpositif" PRIMARY KEY ("idecartpos") ENABLE;
  ALTER TABLE "ecartpositif" MODIFY ("anneeinv" NOT NULL ENABLE);
  ALTER TABLE "ecartpositif" MODIFY ("codebureau" NOT NULL ENABLE);
  ALTER TABLE "ecartpositif" MODIFY ("idecartpos" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table transport
--------------------------------------------------------

  ALTER TABLE "transport" ADD CONSTRAINT "transport_PK" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "transport" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table fournisseur
--------------------------------------------------------

  ALTER TABLE "fournisseur" ADD CONSTRAINT "pk_fournisseur" PRIMARY KEY ("regcomm") ENABLE;
  ALTER TABLE "fournisseur" MODIFY ("designation" NOT NULL ENABLE);
  ALTER TABLE "fournisseur" MODIFY ("regcomm" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table transfererrefinv
--------------------------------------------------------

  ALTER TABLE "transfererrefinv" ADD CONSTRAINT "transfererrefinv_PK" PRIMARY KEY ("codecomptecomptable", "dat") ENABLE;
  ALTER TABLE "transfererrefinv" MODIFY ("dat" NOT NULL ENABLE);
  ALTER TABLE "transfererrefinv" MODIFY ("codecomptecomptable" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table transfererrefinvamort
--------------------------------------------------------

  ALTER TABLE "transfererrefinvamort" ADD CONSTRAINT "transfererrefinvamort_PK" PRIMARY KEY ("codecomptecomptable", "dat") ENABLE;
  ALTER TABLE "transfererrefinvamort" MODIFY ("dat" NOT NULL ENABLE);
  ALTER TABLE "transfererrefinvamort" MODIFY ("codecomptecomptable" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table affecter
--------------------------------------------------------

  ALTER TABLE "affecter" ADD CONSTRAINT "affecter_PK" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "affecter" MODIFY ("numAffectation" NOT NULL ENABLE);
  ALTER TABLE "affecter" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "affecter" MODIFY ("codebureau" NOT NULL ENABLE);
  ALTER TABLE "affecter" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table compteutilisateur
--------------------------------------------------------

  ALTER TABLE "compteutilisateur" ADD CONSTRAINT "pk_compteutilisateur" PRIMARY KEY ("matricule") ENABLE;
  ALTER TABLE "compteutilisateur" MODIFY ("psw" NOT NULL ENABLE);
  ALTER TABLE "compteutilisateur" MODIFY ("usr" NOT NULL ENABLE);
  ALTER TABLE "compteutilisateur" MODIFY ("prenom" NOT NULL ENABLE);
  ALTER TABLE "compteutilisateur" MODIFY ("nom" NOT NULL ENABLE);
  ALTER TABLE "compteutilisateur" MODIFY ("matricule" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table reparer
--------------------------------------------------------

  ALTER TABLE "reparer" ADD CONSTRAINT "pk_reparer" PRIMARY KEY ("codebien", "num_reg", "dt") ENABLE;
  ALTER TABLE "reparer" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "reparer" MODIFY ("num_reg" NOT NULL ENABLE);
  ALTER TABLE "reparer" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table facture
--------------------------------------------------------

  ALTER TABLE "facture" ADD CONSTRAINT "pk_facture" PRIMARY KEY ("numfacture") ENABLE;
  ALTER TABLE "facture" MODIFY ("regcomm" NOT NULL ENABLE);
  ALTER TABLE "facture" MODIFY ("numfacture" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table reevaluer
--------------------------------------------------------

  ALTER TABLE "reevaluer" ADD CONSTRAINT "pk_reevaluer" PRIMARY KEY ("codebien", "dt") ENABLE;
  ALTER TABLE "reevaluer" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "reevaluer" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table sousfamille
--------------------------------------------------------

  ALTER TABLE "sousfamille" MODIFY ("codefamille" NOT NULL ENABLE);
  ALTER TABLE "sousfamille" ADD CONSTRAINT "sousfamille_PK" PRIMARY KEY ("codesousfamille") ENABLE;
  ALTER TABLE "sousfamille" MODIFY ("codesousfamille" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table travaille
--------------------------------------------------------

  ALTER TABLE "travaille" ADD CONSTRAINT "pk_travaille" PRIMARY KEY ("idben", "codestructure", "dt") ENABLE;
  ALTER TABLE "travaille" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "travaille" MODIFY ("codestructure" NOT NULL ENABLE);
  ALTER TABLE "travaille" MODIFY ("idben" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table beneficiere
--------------------------------------------------------

  ALTER TABLE "beneficiere" ADD CONSTRAINT "pk_beneficiere" PRIMARY KEY ("idben") ENABLE;
  ALTER TABLE "beneficiere" MODIFY ("prenomben" NOT NULL ENABLE);
  ALTER TABLE "beneficiere" MODIFY ("nomben" NOT NULL ENABLE);
  ALTER TABLE "beneficiere" MODIFY ("idben" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table reformer
--------------------------------------------------------

  ALTER TABLE "reformer" MODIFY ("codebien" NOT NULL ENABLE);
  ALTER TABLE "reformer" ADD CONSTRAINT "reformer_PK" PRIMARY KEY ("codebien") ENABLE;
--------------------------------------------------------
--  Constraints for Table materielchaudfroid
--------------------------------------------------------

  ALTER TABLE "materielchaudfroid" ADD CONSTRAINT "pk_materielchaudfroid" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "materielchaudfroid" MODIFY ("prixachat" NOT NULL ENABLE);
  ALTER TABLE "materielchaudfroid" MODIFY ("etatbien" NOT NULL ENABLE);
  ALTER TABLE "materielchaudfroid" MODIFY ("statutbien" NOT NULL ENABLE);
  ALTER TABLE "materielchaudfroid" MODIFY ("dateacquisition" NOT NULL ENABLE);
  ALTER TABLE "materielchaudfroid" MODIFY ("designationbien" NOT NULL ENABLE);
  ALTER TABLE "materielchaudfroid" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table materielbureautique
--------------------------------------------------------

  ALTER TABLE "materielbureautique" ADD CONSTRAINT "pk_materielbureautique" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "materielbureautique" MODIFY ("prixachat" NOT NULL ENABLE);
  ALTER TABLE "materielbureautique" MODIFY ("etatbien" NOT NULL ENABLE);
  ALTER TABLE "materielbureautique" MODIFY ("statutbien" NOT NULL ENABLE);
  ALTER TABLE "materielbureautique" MODIFY ("dateacquisition" NOT NULL ENABLE);
  ALTER TABLE "materielbureautique" MODIFY ("designationbien" NOT NULL ENABLE);
  ALTER TABLE "materielbureautique" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table marque
--------------------------------------------------------

  ALTER TABLE "marque" ADD CONSTRAINT "pk_marque" PRIMARY KEY ("marque") ENABLE;
  ALTER TABLE "marque" MODIFY ("marque" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table materielinformatique
--------------------------------------------------------

  ALTER TABLE "materielinformatique" ADD CONSTRAINT "pk_materielinformatique" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "materielinformatique" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table immobilier
--------------------------------------------------------

  ALTER TABLE "immobilier" ADD CONSTRAINT "pk_immobilier" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "immobilier" MODIFY ("prixachat" NOT NULL ENABLE);
  ALTER TABLE "immobilier" MODIFY ("etatbien" NOT NULL ENABLE);
  ALTER TABLE "immobilier" MODIFY ("statutbien" NOT NULL ENABLE);
  ALTER TABLE "immobilier" MODIFY ("dateacquisition" NOT NULL ENABLE);
  ALTER TABLE "immobilier" MODIFY ("designationbien" NOT NULL ENABLE);
  ALTER TABLE "immobilier" MODIFY ("adresse" NOT NULL ENABLE);
  ALTER TABLE "immobilier" MODIFY ("superfice" NOT NULL ENABLE);
  ALTER TABLE "immobilier" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table dat
--------------------------------------------------------

  ALTER TABLE "dat" ADD CONSTRAINT "pk_dat" PRIMARY KEY ("dt") ENABLE;
  ALTER TABLE "dat" MODIFY ("dt" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table reforme
--------------------------------------------------------

  ALTER TABLE "reforme" MODIFY ("datereforme" NOT NULL ENABLE);
  ALTER TABLE "reforme" ADD CONSTRAINT "reforme_PK" PRIMARY KEY ("datereforme") ENABLE;
--------------------------------------------------------
--  Constraints for Table occupebenif
--------------------------------------------------------

  ALTER TABLE "occupebenif" ADD CONSTRAINT "pk_occupebenif" PRIMARY KEY ("idben", "idfonction", "dt") ENABLE;
  ALTER TABLE "occupebenif" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "occupebenif" MODIFY ("idfonction" NOT NULL ENABLE);
  ALTER TABLE "occupebenif" MODIFY ("idben" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table profil
--------------------------------------------------------

  ALTER TABLE "profil" ADD CONSTRAINT "pk_profil" PRIMARY KEY ("idprofil") ENABLE;
  ALTER TABLE "profil" MODIFY ("idprofil" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table acceder
--------------------------------------------------------

  ALTER TABLE "acceder" ADD CONSTRAINT "pk_acceder" PRIMARY KEY ("matricule", "idopt", "idprofil") ENABLE;
  ALTER TABLE "acceder" MODIFY ("typeprivilege" NOT NULL ENABLE);
  ALTER TABLE "acceder" MODIFY ("idprofil" NOT NULL ENABLE);
  ALTER TABLE "acceder" MODIFY ("idopt" NOT NULL ENABLE);
  ALTER TABLE "acceder" MODIFY ("matricule" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table fonction
--------------------------------------------------------

  ALTER TABLE "fonction" ADD CONSTRAINT "pk_fonction" PRIMARY KEY ("idfonction") ENABLE;
  ALTER TABLE "fonction" MODIFY ("idfonction" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table intervenant
--------------------------------------------------------

  ALTER TABLE "intervenant" MODIFY ("titre" NOT NULL ENABLE);
  ALTER TABLE "intervenant" MODIFY ("typeinter" NOT NULL ENABLE);
  ALTER TABLE "intervenant" ADD CONSTRAINT "pk_intervenant" PRIMARY KEY ("titre") ENABLE;
--------------------------------------------------------
--  Constraints for Table structure
--------------------------------------------------------

  ALTER TABLE "structure" MODIFY ("designation" NOT NULL ENABLE);
  ALTER TABLE "structure" MODIFY ("typestructure" NOT NULL ENABLE);
  ALTER TABLE "structure" ADD CONSTRAINT "structure_PK" PRIMARY KEY ("codestructure") ENABLE;
  ALTER TABLE "structure" MODIFY ("codestructure" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table operation
--------------------------------------------------------

  ALTER TABLE "operation" ADD CONSTRAINT "pk_operation" PRIMARY KEY ("idopt") ENABLE;
  ALTER TABLE "operation" MODIFY ("idopt" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table bien
--------------------------------------------------------

  ALTER TABLE "bien" ADD CONSTRAINT "pk_bien" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "bien" MODIFY ("designationbien" NOT NULL ENABLE);
  ALTER TABLE "bien" MODIFY ("numcmd" NOT NULL ENABLE);
  ALTER TABLE "bien" MODIFY ("numfacture" NOT NULL ENABLE);
  ALTER TABLE "bien" MODIFY ("codesousfamille" NOT NULL ENABLE);
  ALTER TABLE "bien" MODIFY ("codebien" NOT NULL ENABLE);
  ALTER TABLE "bien" MODIFY ("dateacquisition" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table comptecomptableamort
--------------------------------------------------------

  ALTER TABLE "comptecomptableamort" ADD CONSTRAINT "comptecomptableamort_PK" PRIMARY KEY ("codecomptecomptable") ENABLE;
  ALTER TABLE "comptecomptableamort" MODIFY ("codecomptecomptable" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table instance
--------------------------------------------------------

  ALTER TABLE "instance" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "instance" ADD CONSTRAINT "instance_PK" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "instance" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table loger
--------------------------------------------------------

  ALTER TABLE "loger" ADD CONSTRAINT "pk_loger" PRIMARY KEY ("codebien", "idben", "dt") ENABLE;
  ALTER TABLE "loger" MODIFY ("dt" NOT NULL ENABLE);
  ALTER TABLE "loger" MODIFY ("idben" NOT NULL ENABLE);
  ALTER TABLE "loger" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table prestataire
--------------------------------------------------------

  ALTER TABLE "prestataire" ADD CONSTRAINT "pk_prestataire" PRIMARY KEY ("num_reg") ENABLE;
  ALTER TABLE "prestataire" MODIFY ("num_reg" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table natureprestation
--------------------------------------------------------

  ALTER TABLE "natureprestation" MODIFY ("natureprestation" NOT NULL ENABLE);
  ALTER TABLE "natureprestation" ADD CONSTRAINT "pk_natureprestation" PRIMARY KEY ("natureprestation") ENABLE;
--------------------------------------------------------
--  Constraints for Table appartenirmarque
--------------------------------------------------------

  ALTER TABLE "appartenirmarque" ADD CONSTRAINT "pk_appartenirmarque" PRIMARY KEY ("codebien") ENABLE;
  ALTER TABLE "appartenirmarque" MODIFY ("codebien" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table bureau
--------------------------------------------------------

  ALTER TABLE "bureau" MODIFY ("codestructure" NOT NULL ENABLE);
  ALTER TABLE "bureau" ADD CONSTRAINT "pk_bureau" PRIMARY KEY ("codebureau") ENABLE;
  ALTER TABLE "bureau" MODIFY ("codebureau" NOT NULL ENABLE);
--------------------------------------------------------
--  DDL for Index pk_acceder
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_acceder" ON "acceder" ("matricule", "idopt", "idprofil") 
  ;
--------------------------------------------------------
--  DDL for Index sousfamille_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "sousfamille_PK" ON "sousfamille" ("codesousfamille") 
  ;
--------------------------------------------------------
--  DDL for Index pk_bureau
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_bureau" ON "bureau" ("codebureau") 
  ;
--------------------------------------------------------
--  DDL for Index transport_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "transport_PK" ON "transport" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index pk_immobilier
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_immobilier" ON "immobilier" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_appartenirmodelvehicule_m
--------------------------------------------------------

  CREATE INDEX "i_fk_appartenirmodelvehicule_m" ON "appartenirmodelvehicule" ("marque") 
  ;
--------------------------------------------------------
--  DDL for Index pk_marque
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_marque" ON "marque" ("marque") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_ecartpositif_exerciceinve
--------------------------------------------------------

  CREATE INDEX "i_fk_ecartpositif_exerciceinve" ON "ecartpositif" ("anneeinv") 
  ;
--------------------------------------------------------
--  DDL for Index pk_reevaluer
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_reevaluer" ON "reevaluer" ("codebien", "dt") 
  ;
--------------------------------------------------------
--  DDL for Index pk_materielbureautique
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_materielbureautique" ON "materielbureautique" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index affecter_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "affecter_PK" ON "affecter" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_occupebenif_beneficiere
--------------------------------------------------------

  CREATE INDEX "i_fk_occupebenif_beneficiere" ON "occupebenif" ("idben") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_louer_locataire
--------------------------------------------------------

  CREATE INDEX "i_fk_louer_locataire" ON "louer" ("idlocataire") 
  ;
--------------------------------------------------------
--  DDL for Index pk_bien
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_bien" ON "bien" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_bien_commande
--------------------------------------------------------

  CREATE INDEX "i_fk_bien_commande" ON "bien" ("numcmd") 
  ;
--------------------------------------------------------
--  DDL for Index instance_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "instance_PK" ON "instance" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_sousfamille_famille
--------------------------------------------------------

  CREATE INDEX "i_fk_sousfamille_famille" ON "sousfamille" ("designationsousfamille") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_bien_modele
--------------------------------------------------------

  CREATE INDEX "i_fk_bien_modele" ON "bien" ("modele") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_structure_structure
--------------------------------------------------------

  CREATE INDEX "i_fk_structure_structure" ON "structure" ("codestructure_struct_chef") 
  ;
--------------------------------------------------------
--  DDL for Index pk_operation
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_operation" ON "operation" ("idopt") 
  ;
--------------------------------------------------------
--  DDL for Index pk_ecartpositif
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_ecartpositif" ON "ecartpositif" ("idecartpos") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_loger_bien
--------------------------------------------------------

  CREATE INDEX "i_fk_loger_bien" ON "loger" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index comptecomptableamort_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "comptecomptableamort_PK" ON "comptecomptableamort" ("codecomptecomptable") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_reevaluer_dat
--------------------------------------------------------

  CREATE INDEX "i_fk_reevaluer_dat" ON "reevaluer" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_acceder_operation
--------------------------------------------------------

  CREATE INDEX "i_fk_acceder_operation" ON "acceder" ("idopt") 
  ;
--------------------------------------------------------
--  DDL for Index pk_prestataire
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_prestataire" ON "prestataire" ("num_reg") 
  ;
--------------------------------------------------------
--  DDL for Index fk_prestataire_naturepresta
--------------------------------------------------------

  CREATE INDEX "fk_prestataire_naturepresta" ON "prestataire" ("natureprestation") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_bien_facture
--------------------------------------------------------

  CREATE INDEX "i_fk_bien_facture" ON "bien" ("numfacture") 
  ;
--------------------------------------------------------
--  DDL for Index pk_appartenirmodelvehicule
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_appartenirmodelvehicule" ON "appartenirmodelvehicule" ("modele") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_reparer_prestataire
--------------------------------------------------------

  CREATE INDEX "i_fk_reparer_prestataire" ON "reparer" ("num_reg") 
  ;
--------------------------------------------------------
--  DDL for Index pk_fournisseur
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_fournisseur" ON "fournisseur" ("regcomm") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_acceder_profil
--------------------------------------------------------

  CREATE INDEX "i_fk_acceder_profil" ON "acceder" ("idprofil") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_travaille_beneficiere
--------------------------------------------------------

  CREATE INDEX "i_fk_travaille_beneficiere" ON "travaille" ("idben") 
  ;
--------------------------------------------------------
--  DDL for Index reformer_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "reformer_PK" ON "reformer" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_acceder_compteutilisateur
--------------------------------------------------------

  CREATE INDEX "i_fk_acceder_compteutilisateur" ON "acceder" ("matricule") 
  ;
--------------------------------------------------------
--  DDL for Index pk_facture
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_facture" ON "facture" ("numfacture") 
  ;
--------------------------------------------------------
--  DDL for Index pk_louer
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_louer" ON "louer" ("codebien", "idlocataire", "dt") 
  ;
--------------------------------------------------------
--  DDL for Index transfererrefinvamort_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "transfererrefinvamort_PK" ON "transfererrefinvamort" ("codecomptecomptable", "dat") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_occupebenif_fonction
--------------------------------------------------------

  CREATE INDEX "i_fk_occupebenif_fonction" ON "occupebenif" ("idfonction") 
  ;
--------------------------------------------------------
--  DDL for Index transferer_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "transferer_PK" ON "transferer" ("codebien", "dt", "codebureau") 
  ;
--------------------------------------------------------
--  DDL for Index pk_commande
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_commande" ON "commande" ("numcmd") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_loger_dat
--------------------------------------------------------

  CREATE INDEX "i_fk_loger_dat" ON "loger" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_louer_dat
--------------------------------------------------------

  CREATE INDEX "i_fk_louer_dat" ON "louer" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index pk_modele
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_modele" ON "modele" ("modele") 
  ;
--------------------------------------------------------
--  DDL for Index pk_fonction
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_fonction" ON "fonction" ("idfonction") 
  ;
--------------------------------------------------------
--  DDL for Index pk_compteutilisateur
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_compteutilisateur" ON "compteutilisateur" ("matricule") 
  ;
--------------------------------------------------------
--  DDL for Index inventorier_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "inventorier_PK" ON "inventorier" ("codebien", "anneeinv") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_facture_fournisseur
--------------------------------------------------------

  CREATE INDEX "i_fk_facture_fournisseur" ON "facture" ("regcomm") 
  ;
--------------------------------------------------------
--  DDL for Index pk_famille
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_famille" ON "famille" ("codefamille") 
  ;
--------------------------------------------------------
--  DDL for Index user_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "user_PK" ON "user" ("id") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_reparer_bien
--------------------------------------------------------

  CREATE INDEX "i_fk_reparer_bien" ON "reparer" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index pk_dat
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_dat" ON "dat" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index structure_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "structure_PK" ON "structure" ("codestructure") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_travaille_dat
--------------------------------------------------------

  CREATE INDEX "i_fk_travaille_dat" ON "travaille" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_ecartpositif_bureau
--------------------------------------------------------

  CREATE INDEX "i_fk_ecartpositif_bureau" ON "ecartpositif" ("codebureau") 
  ;
--------------------------------------------------------
--  DDL for Index transfererrefinv_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "transfererrefinv_PK" ON "transfererrefinv" ("codecomptecomptable", "dat") 
  ;
--------------------------------------------------------
--  DDL for Index pk_materielchaudfroid
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_materielchaudfroid" ON "materielchaudfroid" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index pk_intervenant
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_intervenant" ON "intervenant" ("titre") 
  ;
--------------------------------------------------------
--  DDL for Index pk_occupebenif
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_occupebenif" ON "occupebenif" ("idben", "idfonction", "dt") 
  ;
--------------------------------------------------------
--  DDL for Index pk_natureprestation
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_natureprestation" ON "natureprestation" ("natureprestation") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_bureau_structure
--------------------------------------------------------

  CREATE INDEX "i_fk_bureau_structure" ON "bureau" ("codestructure") 
  ;
--------------------------------------------------------
--  DDL for Index pk_loger
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_loger" ON "loger" ("codebien", "idben", "dt") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_affecter_bureau
--------------------------------------------------------

  CREATE INDEX "i_fk_affecter_bureau" ON "affecter" ("codebureau") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_modele_marque
--------------------------------------------------------

  CREATE INDEX "i_fk_modele_marque" ON "modele" ("marque") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_appartenirmarque_modele
--------------------------------------------------------

  CREATE INDEX "i_fk_appartenirmarque_modele" ON "appartenirmarque" ("modele") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_reparer_dat
--------------------------------------------------------

  CREATE INDEX "i_fk_reparer_dat" ON "reparer" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index pk_beneficiere
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_beneficiere" ON "beneficiere" ("idben") 
  ;
--------------------------------------------------------
--  DDL for Index pk_exerciceinventaire
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_exerciceinventaire" ON "exerciceinventaire" ("anneeinv") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_louer_bien
--------------------------------------------------------

  CREATE INDEX "i_fk_louer_bien" ON "louer" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_occupebenif_dat
--------------------------------------------------------

  CREATE INDEX "i_fk_occupebenif_dat" ON "occupebenif" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_reevaluer_bien
--------------------------------------------------------

  CREATE INDEX "i_fk_reevaluer_bien" ON "reevaluer" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_travaille_structure
--------------------------------------------------------

  CREATE INDEX "i_fk_travaille_structure" ON "travaille" ("codestructure") 
  ;
--------------------------------------------------------
--  DDL for Index pk_appartenirmarque
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_appartenirmarque" ON "appartenirmarque" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index I_FK_FAMILLE_COMPTECOMPTABLE
--------------------------------------------------------

  CREATE INDEX "I_FK_FAMILLE_COMPTECOMPTABLE" ON "famille" ("codecomptecomptable") 
  ;
--------------------------------------------------------
--  DDL for Index pk_reparer
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_reparer" ON "reparer" ("codebien", "num_reg", "dt") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_affecter_dat
--------------------------------------------------------

  CREATE INDEX "i_fk_affecter_dat" ON "affecter" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index i_pk_instance_dat
--------------------------------------------------------

  CREATE INDEX "i_pk_instance_dat" ON "instance" ("dt") 
  ;
--------------------------------------------------------
--  DDL for Index pk_materielinformatique
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_materielinformatique" ON "materielinformatique" ("codebien") 
  ;
--------------------------------------------------------
--  DDL for Index pk_locataire
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_locataire" ON "locataire" ("idlocataire") 
  ;
--------------------------------------------------------
--  DDL for Index pk_comptecomptable
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_comptecomptable" ON "comptecomptable" ("codecomptecomptable") 
  ;
--------------------------------------------------------
--  DDL for Index i_fk_loger_beneficiere
--------------------------------------------------------

  CREATE INDEX "i_fk_loger_beneficiere" ON "loger" ("idben") 
  ;
--------------------------------------------------------
--  DDL for Index pk_profil
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_profil" ON "profil" ("idprofil") 
  ;
--------------------------------------------------------
--  DDL for Index pk_travaille
--------------------------------------------------------

  CREATE UNIQUE INDEX "pk_travaille" ON "travaille" ("idben", "codestructure", "dt") 
  ;
--------------------------------------------------------
--  DDL for Index reforme_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "reforme_PK" ON "reforme" ("datereforme") 
  ;
--------------------------------------------------------
--  Ref Constraints for Table acceder
--------------------------------------------------------

  ALTER TABLE "acceder" ADD CONSTRAINT "fk_acceder_compteutilisateur" FOREIGN KEY ("matricule")
	  REFERENCES "compteutilisateur" ("matricule") ENABLE;
  ALTER TABLE "acceder" ADD CONSTRAINT "fk_acceder_operation" FOREIGN KEY ("idopt")
	  REFERENCES "operation" ("idopt") ENABLE;
  ALTER TABLE "acceder" ADD CONSTRAINT "fk_acceder_profil" FOREIGN KEY ("idprofil")
	  REFERENCES "profil" ("idprofil") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table affecter
--------------------------------------------------------

  ALTER TABLE "affecter" ADD CONSTRAINT "fk_affecter_bureau" FOREIGN KEY ("codebureau")
	  REFERENCES "bureau" ("codebureau") ENABLE;
  ALTER TABLE "affecter" ADD CONSTRAINT "fk_affecter_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table appartenirmarque
--------------------------------------------------------

  ALTER TABLE "appartenirmarque" ADD CONSTRAINT "fk_appartenirmarque_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
  ALTER TABLE "appartenirmarque" ADD CONSTRAINT "fk_appartenirmarque_modele" FOREIGN KEY ("modele")
	  REFERENCES "modele" ("modele") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table appartenirmodelvehicule
--------------------------------------------------------

  ALTER TABLE "appartenirmodelvehicule" ADD CONSTRAINT "fk_appartenirmodelvehicule_mar" FOREIGN KEY ("marque")
	  REFERENCES "marque" ("marque") ENABLE;
  ALTER TABLE "appartenirmodelvehicule" ADD CONSTRAINT "fk_appartenirmodelvehicule_mod" FOREIGN KEY ("modele")
	  REFERENCES "modele" ("modele") ENABLE;

--------------------------------------------------------
--  Ref Constraints for Table bien
--------------------------------------------------------

  ALTER TABLE "bien" ADD CONSTRAINT "fk_bien_commande" FOREIGN KEY ("numcmd")
	  REFERENCES "commande" ("numcmd") ENABLE;
  ALTER TABLE "bien" ADD CONSTRAINT "fk_bien_facture" FOREIGN KEY ("numfacture")
	  REFERENCES "facture" ("numfacture") ENABLE;
  ALTER TABLE "bien" ADD CONSTRAINT "fk_bien_modele" FOREIGN KEY ("modele")
	  REFERENCES "modele" ("modele") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table bureau
--------------------------------------------------------

  ALTER TABLE "bureau" ADD CONSTRAINT "fk_bureau_structure" FOREIGN KEY ("codestructure")
	  REFERENCES "structure" ("codestructure") ENABLE;





--------------------------------------------------------
--  Ref Constraints for Table ecartpositif
--------------------------------------------------------

  ALTER TABLE "ecartpositif" ADD CONSTRAINT "fk_ecartpositif_bureau" FOREIGN KEY ("codebureau")
	  REFERENCES "bureau" ("codebureau") ENABLE;
  ALTER TABLE "ecartpositif" ADD CONSTRAINT "fk_ecartpositif_exerciceinvent" FOREIGN KEY ("anneeinv")
	  REFERENCES "exerciceinventaire" ("anneeinv") ENABLE;

--------------------------------------------------------
--  Ref Constraints for Table facture
--------------------------------------------------------

  ALTER TABLE "facture" ADD CONSTRAINT "fk_facture_fournisseur" FOREIGN KEY ("regcomm")
	  REFERENCES "fournisseur" ("regcomm") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table famille
--------------------------------------------------------

  ALTER TABLE "famille" ADD CONSTRAINT "fk_famille_comptecomptable" FOREIGN KEY ("codecomptecomptable")
	  REFERENCES "comptecomptable" ("codecomptecomptable") ENABLE;


--------------------------------------------------------
--  Ref Constraints for Table immobilier
--------------------------------------------------------

  ALTER TABLE "immobilier" ADD CONSTRAINT "fk_immobilier_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table instance
--------------------------------------------------------

  ALTER TABLE "instance" ADD CONSTRAINT "pk_instance_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;



--------------------------------------------------------
--  Ref Constraints for Table loger
--------------------------------------------------------

  ALTER TABLE "loger" ADD CONSTRAINT "fk_loger_beneficiere" FOREIGN KEY ("idben")
	  REFERENCES "beneficiere" ("idben") ENABLE;
  ALTER TABLE "loger" ADD CONSTRAINT "fk_loger_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
  ALTER TABLE "loger" ADD CONSTRAINT "fk_loger_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table louer
--------------------------------------------------------

  ALTER TABLE "louer" ADD CONSTRAINT "fk_louer_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
  ALTER TABLE "louer" ADD CONSTRAINT "fk_louer_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;
  ALTER TABLE "louer" ADD CONSTRAINT "fk_louer_locataire" FOREIGN KEY ("idlocataire")
	  REFERENCES "locataire" ("idlocataire") ENABLE;

--------------------------------------------------------
--  Ref Constraints for Table materielbureautique
--------------------------------------------------------

  ALTER TABLE "materielbureautique" ADD CONSTRAINT "fk_materielbureautique_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table materielchaudfroid
--------------------------------------------------------

  ALTER TABLE "materielchaudfroid" ADD CONSTRAINT "fk_materielchaudfroid_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;

--------------------------------------------------------
--  Ref Constraints for Table modele
--------------------------------------------------------

  ALTER TABLE "modele" ADD CONSTRAINT "fk_modele_marque" FOREIGN KEY ("marque")
	  REFERENCES "marque" ("marque") ENABLE;

--------------------------------------------------------
--  Ref Constraints for Table occupebenif
--------------------------------------------------------

  ALTER TABLE "occupebenif" ADD CONSTRAINT "fk_occupebenif_beneficiere" FOREIGN KEY ("idben")
	  REFERENCES "beneficiere" ("idben") ENABLE;
  ALTER TABLE "occupebenif" ADD CONSTRAINT "fk_occupebenif_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;
  ALTER TABLE "occupebenif" ADD CONSTRAINT "fk_occupebenif_fonction" FOREIGN KEY ("idfonction")
	  REFERENCES "fonction" ("idfonction") ENABLE;

--------------------------------------------------------
--  Ref Constraints for Table prestataire
--------------------------------------------------------

  ALTER TABLE "prestataire" ADD CONSTRAINT "fk_prestataire_naturepresta" FOREIGN KEY ("natureprestation")
	  REFERENCES "natureprestation" ("natureprestation") ENABLE;

--------------------------------------------------------
--  Ref Constraints for Table reevaluer
--------------------------------------------------------

  ALTER TABLE "reevaluer" ADD CONSTRAINT "fk_reevaluer_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
  ALTER TABLE "reevaluer" ADD CONSTRAINT "fk_reevaluer_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;


--------------------------------------------------------
--  Ref Constraints for Table reparer
--------------------------------------------------------

  ALTER TABLE "reparer" ADD CONSTRAINT "fk_reparer_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
  ALTER TABLE "reparer" ADD CONSTRAINT "fk_reparer_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;
  ALTER TABLE "reparer" ADD CONSTRAINT "fk_reparer_prestataire" FOREIGN KEY ("num_reg")
	  REFERENCES "prestataire" ("num_reg") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table sousfamille
--------------------------------------------------------

  ALTER TABLE "sousfamille" ADD CONSTRAINT "fk_sousfamille_famille" FOREIGN KEY ("codefamille")
	  REFERENCES "famille" ("codefamille") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table structure
--------------------------------------------------------

  ALTER TABLE "structure" ADD CONSTRAINT "fk_structure_structure" FOREIGN KEY ("codestructure")
	  REFERENCES "structure" ("codestructure") ENABLE;



--------------------------------------------------------
--  Ref Constraints for Table transport
--------------------------------------------------------

  ALTER TABLE "transport" ADD CONSTRAINT "fk_transport_bien" FOREIGN KEY ("codebien")
	  REFERENCES "bien" ("codebien") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table travaille
--------------------------------------------------------

  ALTER TABLE "travaille" ADD CONSTRAINT "fk_travaille_beneficiere" FOREIGN KEY ("idben")
	  REFERENCES "beneficiere" ("idben") ENABLE;
  ALTER TABLE "travaille" ADD CONSTRAINT "fk_travaille_dat" FOREIGN KEY ("dt")
	  REFERENCES "dat" ("dt") ENABLE;

