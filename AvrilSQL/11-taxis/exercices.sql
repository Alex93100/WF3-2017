--******************************
-- EXERCICES
--******************************

-- 1. Qui conduit la voiture d'id_vehicule 503 ?

SELECT prenom FROM conducteur WHERE id_conducteur = (SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule ='503');


-- 2. Qui (prenom) conduit quel modele ?

SELECT c.prenom, v.modele
FROM conducteur c
INNER JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
INNER JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;

-- 3. Insérez vous dans la table conducteur. 
-- Puis afficher tous les conducteurs (même ceux qui n'ont pas de véhicule affecté) ainsi que les modeles de véhicules.
INSERT INTO conducteur(id_conducteur, prenom, nom) VALUES ('6', 'Alexandre', 'Rodrigues');

SELECT c.prenom, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;


-- 4. Ajoutez l'enregistrement suivant :
INSERT INTO vehicule(marque, modele, couleur, immatriculation) VALUES ('Renault', 'Espace', 'noir', 'ZE-123-RT');

-- Puis afficher tous les modèles de vehicule, y compris ceux qui n'ont pas de chauffeur affecté, et le prénom des conducteurs.
SELECT c.prenom, v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;

-- 5. Afficher les prénoms des conducteurs (y compris ceux qui n'ont pas de vehicule) et tous les modèles (y compris ceux qui n'ont pas de chauffeur).
(SELECT c.prenom, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule)
UNION
(SELECT c.prenom, v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON c.id_conducteur = a.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule);