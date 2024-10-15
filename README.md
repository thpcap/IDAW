# IDAW
TPs of the Module IDAW of IMT Nord Europe
N.B. some of the data is for demonstration purpouses it might be wrong
login and passwords for the website
'Thomas'=> 'CAPRON',
'Anakin'=> 'pasmaitrejedi'
N.B.2 TP3 integreated in the sitepro V3
wordpress id: WordPress password:W0rdPr355


API Users tp4: data de type form data

GET localhost/IDAW/tp4/exo5/users.php :liste des user en json

POST localhost/IDAW/tp4/exo5/users.php avec des datas "add" avec un "email" et un "name" il rajoutera un user dans la table et revera un json avec les donnés de l'user crée en json

POST localhost/IDAW/tp4/exo5/users.php avec des datas "update" avec un "id" (non null) un "email" (si null recuperera l'email de l'user déja dans la base) et un "name" (si null recuperera len name  de l'user déja dans la base) il mettra à jour le user avec le bon id et renverra la version modifiée

POST localhost/IDAW/tp4/exo5/users.php avec des datas "delete" avec un "id" (non null) il suprimera le user avec le bon id
