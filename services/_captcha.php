<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Liste des characters possibles pour le captcha
$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
/**
 * Génère un string aléatoire
 *
 * @param string $characters liste des charactères possible
 * @param integer $strength taille du string à retourner
 * @return string
 */
// prend un string et un nombre, commence avec un string vide et fait une boucle de 0 à mon paramètre et génére une chaîne de caractères aléatoire
function generate_string(string $characters, int $strength = 10): string {
    $randStr = "";
    for ($i=0; $i < $strength; $i++) { 
        $randStr .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randStr;
}
/* 
    Le code suivant utilise des fonctions de la bibliothèque PHP "GD"
    La bibliothèque se trouve dans notre dockerfile RUN apt install -y libfreetype6-dev \
&& docker-php-ext-configure gd --with-freetype=/usr/include/freetype2/ \
&& docker-php-ext-install pdo_mysql gd

    imagecreatetruecolor(largeur, hauteur) génère une image qui est un objet de classe GdImage
*/
$image = imagecreatetruecolor(200, 50);
// Active les fonctions d'antialiasing pour améliorer la qualité de l'image
imageantialias($image, true);

$colors = [];
// On choisi une plage de couleur aléatoire
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);

for ($i=0; $i < 5; $i++) { 
    /* 
        imagecolorallocate prend un objet GbImage en 1er argument puis 3 valeurs numériques représentant les niveaux de couleur rgb 
        Retourne un INT qui représente l'identifiant pour la couleur généré
    */
    $colors[] = imagecolorallocate($image, $red-20*$i, $green-20*$i, $blue-20*$i);
}
/* 
    Rempli un objet GdImage donné en 1er argument à partir des positions données en snd et 3e argument avec l'identifiant de couleur donnée en 4e argument
*/
imagefill($image, 0, 0, $colors[0]);

for ($i=0; $i < 10; $i++) { 
    // Paramètre l'épaisseur des lignes
    imagesetthickness($image, rand(2,10));
    /* 
        Dessine un rectangle dans l'image en 1er argument 
        Avec le coin haut gauche aux positions x, y en snd et 3eme argument
        et le coin bas droit aux postions x,y en 4eme et 5em argument 
        de la couleur en 6e argument
    */
    imagerectangle(
        $image,
        rand(-10, 190),
        rand(-10, 10),
        rand(-10, 190),
        rand(40, 60),
        $colors[rand(1, 4)]
    );
}
// Couleurs possible pour le texte
$textColors = [imagecolorallocate($image, 0, 0, 0), imagecolorallocate($image, 255, 255, 255)];
// Polices possible pour le texte
$fonts = [
    __DIR__."/../font/Acme-Regular.ttf",
    __DIR__."/../font/arial.ttf",
    __DIR__."/../font/typewriter.ttf"
];
// nombre de charactères pour le captcha :
$strLength = 6;

// string aléatoire
$captchaStr = generate_string($characters, $strLength);

// On sauvegarde le string en session :
$_SESSION["captchaStr"] = $captchaStr;

// On ajoute les characters à l'image
for ($i=0; $i < $strLength; $i++) { 
    // on calcule l'espacement entre les lettres
    $letterSpace = 170/$strLength;

    // On choisi une position initial pour les lettres : 
    $initial = 15;

    /*  imagettftext permet d'écrire du texte dans notre image en utilisant une police au format ttf.
        premier argument : l'image dans laquelle écrire.
        second argument : taille en pixel pour le texte.
        troisième argument : un angle en degré. 
        quatrième et cinquième argument : position x et y.
        sixième argument : une couleur.
        septième argument : une police d'écriture.
        huitième argument : le texte à écrire. */
    imagettftext(
        $image,
        24,
        rand(-15, 15),
        (int)($initial + $i * $letterSpace),
        rand(25, 45),
        $textColors[rand(0,1)],
        $fonts[array_rand($fonts)],
        $captchaStr[$i]
    );
}

// On indique le type de fichier qui est rendu au navigateur :
header("Content-type: image/png");

// On transforme notre objet GdImage en image au format png :
imagepng($image);

?>