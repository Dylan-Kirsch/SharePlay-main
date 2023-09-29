CREATE DATABASE IF NOT EXISTS share_play;

CREATE TABLE IF NOT EXISTS utilisateur
(

    id INT primary key AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL

);


CREATE TABLE IF NOT EXISTS administrateur
(

    id INT primary key AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    pseudo VARCHAR(255) NOT NULL

);

CREATE TABLE IF NOT EXISTS type_affichage
(

    id INT primary key AUTO_INCREMENT,
    types VARCHAR(255) NOT NULL,
    route VARCHAR(255) NOT NULL

);



CREATE TABLE IF NOT EXISTS photo
(
    id INT primary key AUTO_INCREMENT,
    photo VARCHAR(255) NOT NULL,
);


CREATE TABLE IF NOT EXISTS console
(

    id INT primary key AUTO_INCREMENT,
    libelle VARCHAR(255) NOT NULL

);


CREATE TABLE IF NOT EXISTS news
(

    id INT primary key AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    information text NOT NULL,
    photo VARCHAR(255) NOT NULL

);

CREATE TABLE IF NOT EXISTS tag
(

    id INT primary key AUTO_INCREMENT,
    libelle VARCHAR(255) NOT NULL

);

CREATE TABLE IF NOT EXISTS utilisateur
(

    id INT primary key AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    langue VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS jeu
(
    id INT primary key AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    photo_defaut VARCHAR(255) NOT NULL
);

INSERT INTO `jeu` (`id`, `title`, `photo_defaut`) VALUES
(1, 'Atomic Heart' ,'atomic-heart.jpg'),
(2, 'Battlefield 2042' ,'battlefield-2042.jpeg'),
(3, 'Dead island 2' ,'dead-island-2.jpg'),
(4, 'Demon Souls' ,'demon-souls-ps5.jpg'),
(5, 'Destiny 2' ,'destiny-2-lightfall.jpeg'),
(6, 'Elden Ring' ,'elden-ring.jpg'),
(7, 'Final Fantasy 7' ,'final-fantasy-7.jpg'),
(8, 'Ghost of Tsushima' ,'ghost-of-tsushima.jpg'),
(9, 'Hogwarts Legacy' ,'hogwarts-legacy.png'),
(10, 'Star wars Battlefront 2' ,'star-wars-battlefront-2.jpg'),
(11, 'Star wars jedi survivor' ,'star-wars-jedi-survivor.jpg'),
(12, 'Sun Wukong' ,'sun-wukong.png'),
(13, 'Tchia' ,'tchia-ps5.png');

CREATE TABLE IF NOT EXISTS univers
(

    id INT primary key AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    photo_default VARCHAR(255) NOT NULL

);

INSERT INTO `univers` (`id`, `titre`, `photo_default`) VALUES
(1, 'Action' ,'jeux-action.jpg'),
(2, 'Aventure' ,'jeux-aventure.png'),
(3, 'Course' ,'jeux-course.jpg'),
(4, 'Combat' ,'jeux-combat.jpg'),
(5, 'Jeux indée' ,'jeux-indee.jpg'),
(6, 'Survivol Horror' ,'jeux-horror.jpg'),
(7, 'Jeux de rôle' ,'jeux-de-role.png');


CREATE TABLE IF NOT EXISTS galerie
(

    id INT primary key AUTO_INCREMENT,
    num_jeu int NOT NULL,
    num_univers int NOT NULL,
    num_photo int NOT NULL,
    num_tag int NOT NULL,
    num_type_affichage int NOT NULL,
    num_utilisateur int NOT NULL,
    FOREIGN KEY (num_jeu) REFERENCES jeu(id),
    FOREIGN KEY (num_univers) REFERENCES univers (id),
    FOREIGN KEY (num_type_affichage) REFERENCES type_affichage (id),
    -- FOREIGN KEY (num_photo) REFERENCES photo (id),
    FOREIGN KEY (num_tag) REFERENCES tag (id),
    FOREIGN KEY (num_utilisateur) REFERENCES utilisateur (id)
);

CREATE USER 'dylan'@'localhost' IDENTIFIED BY '*****';
GRANT UPDATE, SELECT, INSERT on share_play.* TO 'dylan'@'localhost' WITH GRANT OPTION;