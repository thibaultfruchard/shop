# Shop

1. Faire la découpe des templates html

2. Afficher l'année courante dans le footer

3. Créer une base de données "shop"

4. Créer une table "products" avec les colonnes :
	* id
	* category INT(3),
	* name,
	* description,
	* price DECIMAL(11,2),
	* picture,
	* rating DECIMAL(1,1),
	* date

5. Insérer du contenu dans la table "products"
	- BONUS : Adapter un script *_generator.php pour automatiser l'insertion du contenu

6. Dans index.php :
	- Afficher les 6 produits les plus récents
	- BONUS : Afficher 2 produits aléatoires parmi les mieux notés dans la sidebar

7. Dans product.php :
	- Afficher 1 produit par rapport à un identifiant passé en paramètre
	- BONUS : Afficher 3 produits associés dans la sidebar

8. Dans les listes de produits (index.php, search.php, ...etc) :
	- N'afficher qu'un extrait de la description du produit
	- Renvoyer vers la page product.php pour afficher le produit en entier

9. Dans search.php :
	- Récupérer les données du formulaire de recherche rapide dans le header
	- Faire la requête qui va chercher les produits correspondants à la recherche

10. BONUS : Gérer la navigation en affichant la page active

11. BONUS : Gérer la recherche avancée

12. BONUS : Gérer les catégories de produits :
	- Création de table product_category avec les colonnes id, label
	- Passer par le moteur de recherche avancée pour filtrer sur une catégorie de produit
