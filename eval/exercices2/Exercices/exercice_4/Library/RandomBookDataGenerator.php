<?php

namespace Library;

abstract class RandomBookDataGenerator
{

	/**
	 * Données de base pour générer des données aléatoires
	 * Extraites de https://github.com/fzaninotto/Faker
	 */
	protected static $wordList = ['alias','consequatur','aut','perferendis','sit','voluptatem','accusantium','doloremque','aperiam','eaque','ipsa','quae','ab','illo','inventore','veritatis','et','quasi','architecto','beatae','vitae','dicta','sunt','explicabo','aspernatur','aut','odit','aut','fugit','sed','quia','consequuntur','magni','dolores','eos','qui','ratione','voluptatem','sequi','nesciunt','neque','dolorem','ipsum','quia','dolor','sit','amet','consectetur','adipisci','velit','sed','quia','non','numquam','eius','modi','tempora','incidunt','ut','labore','et','dolore','magnam','aliquam','quaerat','voluptatem','ut','enim','ad','minima','veniam','quis','nostrum','exercitationem','ullam','corporis','nemo','enim','ipsam','voluptatem','quia','voluptas','sit','suscipit','laboriosam','nisi','ut','aliquid','ex','ea','commodi','consequatur','quis','autem','vel','eum','iure','reprehenderit','qui','in','ea','voluptate','velit','esse','quam','nihil','molestiae','et','iusto','odio','dignissimos','ducimus','qui','blanditiis','praesentium','laudantium','totam','rem','voluptatum','deleniti','atque','corrupti','quos','dolores','et','quas','molestias','excepturi','sint','occaecati','cupiditate','non','provident','sed','ut','perspiciatis','unde','omnis','iste','natus','error','similique','sunt','in','culpa','qui','officia','deserunt','mollitia','animi','id','est','laborum','et','dolorum','fuga','et','harum','quidem','rerum','facilis','est','et','expedita','distinctio','nam','libero','tempore','cum','soluta','nobis','est','eligendi','optio','cumque','nihil','impedit','quo','porro','quisquam','est','qui','minus','id','quod','maxime','placeat','facere','possimus','omnis','voluptas','assumenda','est','omnis','dolor','repellendus','temporibus','autem','quibusdam','et','aut','consequatur','vel','illum','qui','dolorem','eum','fugiat','quo','voluptas','nulla','pariatur','at','vero','eos','et','accusamus','officiis','debitis','aut','rerum','necessitatibus','saepe','eveniet','ut','et','voluptates','repudiandae','sint','et','molestiae','non','recusandae','itaque','earum','rerum','hic','tenetur','a','sapiente','delectus','ut','aut','reiciendis','voluptatibus','maiores','doloribus','asperiores','repellat'];
	protected static $firstName = ['Adélaïde','Adèle','Adrienne','Agathe','Agnès','Aimée','Alexandrie','Alix','Alexandria','Alex','Alice','Amélie','Anaïs','Anastasie','Andrée','Anne','Anouk','Antoinette','Arnaude','Astrid','Audrey','Aurélie','Aurore','Bernadette','Brigitte','Capucine','Caroline','Catherine','Cécile','Céline','Célina','Chantal','Charlotte','Christelle','Christiane','Christine','Claire','Claudine','Clémence','Colette','Constance','Corinne','Danielle','Denise','Diane','Dorothée','Édith','Éléonore','Élisabeth','Élise','Élodie','Émilie','Emmanuelle','Françoise','Frédérique','Gabrielle','Geneviève','Hélène','Henriette','Hortense','Inès','Isabelle','Jacqueline','Jeanne','Jeannine','Joséphine','Josette','Julie','Juliette','Laetitia','Laure','Laurence','Lorraine','Louise','Luce','Lucie','Lucy','Madeleine','Manon','Marcelle','Margaux','Margaud','Margot','Marguerite','Margot','Margaret','Maggie','Marianne','Marie','Marine','Marthe','Martine','Maryse','Mathilde','Michèle','Michelle','Michelle','Monique','Nathalie','Nath','Nathalie','Nicole','Noémi','Océane','Odette','Olivie','Patricia','Paulette','Pauline','Pénélope','Philippine','Renée','Sabine','Simone','Sophie','Stéphanie','Susanne','Suzanne','Susan','Suzanne','Sylvie','Thérèse','Valentine','Valérie','Véronique','Victoire','Virginie','Zoé','Camille','Dominique', 'Adrien', 'Aimé', 'Alain', 'Alexandre', 'Alfred', 'Alphonse', 'André', 'Antoine', 'Arthur', 'Auguste', 'Augustin','Benjamin', 'Benoît', 'Bernard', 'Bertrand', 'Charles', 'Christophe', 'Daniel', 'David', 'Denis', 'Édouard', 'Émile','Emmanuel', 'Éric', 'Étienne', 'Eugène', 'François', 'Franck', 'Frédéric', 'Gabriel', 'Georges', 'Gérard', 'Gilbert','Gilles', 'Grégoire', 'Guillaume', 'Guy', 'William', 'Henri', 'Honoré', 'Hugues', 'Isaac', 'Jacques', 'Jean', 'Jérôme','Joseph', 'Jules', 'Julien', 'Laurent', 'Léon', 'Louis', 'Luc', 'Lucas', 'Marc', 'Marcel', 'Martin', 'Matthieu','Maurice', 'Michel', 'Nicolas', 'Noël', 'Olivier', 'Patrick', 'Paul', 'Philippe', 'Pierre', 'Raymond', 'Rémy', 'René','Richard', 'Robert', 'Roger', 'Roland', 'Sébastien', 'Stéphane', 'Théodore', 'Théophile', 'Thibaut', 'Thibault', 'Thierry','Thomas', 'Timothée', 'Tristan', 'Victor', 'Vincent', 'Xavier', 'Yves', 'Zacharie', 'Claude', 'Dominique'];
	protected static $lastName = ['Martin','Bernard','Thomas','Robert','Petit','Dubois','Richard','Garcia','Durand','Moreau','Lefebvre','Simon','Laurent','Michel','Leroy','Martinez','David','Fontaine','Da Silva','Morel','Fournier','Dupont','Bertrand','Lambert','Rousseau','Girard','Roux','Vincent','Lefevre','Boyer','Lopez','Bonnet','Andre','Francois','Mercier','Muller','Guerin','Legrand','Sanchez','Garnier','Chevalier','Faure','Perez','Clement','Fernandez','Blanc','Robin','Morin','Gauthier','Pereira','Perrin','Roussel','Henry','Duval','Gautier','Nicolas','Masson','Marie','Noel','Ferreira','Lemaire','Mathieu','Riviere','Denis','Marchand','Rodriguez','Dumont','Payet','Lucas','Dufour','Dos Santos','Joly','Blanchard','Meunier','Rodrigues','Caron','Gerard','Fernandes','Brunet','Meyer','Barbier','Leroux','Renard','Goncalves','Gaillard','Brun','Roy','Picard','Giraud','Roger','Schmitt','Colin','Arnaud','Vidal','Gonzalez','Lemoine','Roche','Aubert','Olivier','Leclercq','Pierre','Philippe','Bourgeois','Renaud','Martins','Leclerc','Guillaume','Lacroix','Lecomte','Benoit','Fabre','Carpentier','Vasseur','Louis','Hubert','Jean','Dumas','Rolland','Grondin','Rey','Huet','Gomez','Dupuis','Guillot','Berger','Moulin','Hoarau','Menard','Deschamps','Fleury','Adam','Boucher','Poirier','Bertin','Charles','Aubry','Da Costa','Royer','Dupuy','Maillard','Paris','Baron','Lopes','Guyot','Carre','Jacquet','Renault','Herve','Charpentier','Klein','Cousin','Collet','Leger','Ribeiro','Hernandez','Bailly','Schneider','Le Gall','Ruiz','Langlois','Bouvier','Gomes','Prevost','Julien','Lebrun','Breton','Germain','Millet','Boulanger','Remy','Le Roux','Daniel','Marques','Maillot','Leblanc','Le Goff','Barre','Perrot','Leveque','Marty','Benard','Monnier','Hamon','Pelletier','Alves','Etienne','Marchal','Poulain','Tessier','Lemaitre','Guichard','Besson','Mallet','Hoareau','Gillet','Weber','Jacob','Collin','Chevallier','Perrier','Michaud','Carlier','Delaunay','Chauvin','Alexandre','Marechal','Antoine','Lebon','Cordier','Lejeune','Bouchet','Pasquier','Legros','Delattre','Humbert','De Oliveira','Briand','Lamy','Launay','Gilbert','Perret','Lesage','Gay','Nguyen','Navarro','Besnard','Pichon','Hebert','Cohen','Pons','Lebreton','Sauvage','De Sousa','Pineau','Albert','Jacques','Pinto','Barthelemy','Turpin','Bigot','Lelievre','Georges','Reynaud','Ollivier','Martel','Voisin','Leduc','Guillet','Vallee','Coulon','Camus','Marin','Teixeira','Costa','Mahe','Didier','Charrier','Gaudin','Bodin','Guillou','Gregoire','Gros','Blanchet','Buisson','Blondel','Paul','Dijoux','Barbe','Hardy','Laine','Evrard','Laporte','Rossi','Joubert','Regnier','Tanguy','Gimenez','Allard','Devaux','Morvan','Levy','Dias','Courtois','Lenoir','Berthelot','Pascal','Vaillant','Guilbert','Thibault','Moreno','Duhamel','Colas','Masse','Baudry','Bruneau','Verdier','Delorme','Blin','Guillon','Mary','Coste','Pruvost','Maury','Allain','Valentin','Godard','Joseph','Brunel','Marion','Texier','Seguin','Raynaud','Bourdon','Raymond','Bonneau','Chauvet','Maurice','Legendre','Loiseau','Ferrand','Toussaint','Techer','Lombard','Lefort','Couturier','Bousquet','Diaz','Riou','Clerc','Weiss','Imbert','Jourdan','Delahaye','Gilles','Guibert','Begue','Descamps','Delmas','Peltier','Dupre','Chartier','Martineau','Laroche','Leconte','Maillet','Parent','Labbe','Potier','Bazin','Normand','Pottier','Torres','Lagarde','Blot','Jacquot','Lemonnier','Grenier','Rocher','Bonnin','Boutin','Fischer','Munoz','Neveu','Lacombe','Mendes','Delannoy','Auger','Wagner','Fouquet','Mace','Ramos','Pages','Petitjean','Chauveau','Foucher','Peron','Guyon','Gallet','Rousset','Traore','Bernier','Vallet','Letellier','Bouvet','Hamel','Chretien','Faivre','Boulay','Thierry','Samson','Ledoux','Salmon','Gosselin','Lecoq','Pires','Leleu','Becker','Diallo','Merle','Valette'];

	/**
	 * Extrait un élément d'un tableau au hasard 
	 */	
	protected static function getRandomArrayElement($array)
	{
		$index = array_rand($array);
		return $array[$index];		
	}

	/**
	 * Génère un titre aléatoire
	 */
	public static function generateTitle()
	{
		$words = [];
		$numWords = rand(3,8);

		for($i=0; $i<$numWords; $i++){
			$words[] = self::getRandomArrayElement(self::$wordList);
		}

		$title = implode(" ", $words);

		return ucfirst($title);
	}

	/**
	 * Génère un nom aléatoire
	 */
	public static function generateAuthor()
	{
		$name = self::getRandomArrayElement(self::$firstName) . " " . self::getRandomArrayElement(self::$lastName);
		return $name;
	}

	/**
	 * Génère une année aléatoire entre 1850 et aujourd'hui
	 */
	public static function generateYear()
	{
		return rand(1850, date("Y"));
	}

	/**
	 * Génère une date aléatoire au format MySQL entre il y a 6 mois et aujourd'hui
	 */
	public static function generateDate()
	{
		$start = strtotime("- 6 months");
		$time = rand($start, time());
		return date("Y-m-d H:i:s", $time);
	}

}