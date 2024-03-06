<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
 * Génère et affiche un captcha
 */
function generateAndDisplayCaptcha() {
/**
 * Génère un string aléatoire
 *
 * @param string $characters liste des charactères possible
 * @param integer $strength taille du string à retourner
 * @return string
 */
function generate_string(string $characters, int $strength = 10): string {
    $randStr = "";
    for ($i = 0; $i < $strength; $i++) {
        $randStr .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randStr;
}

    // Liste des characters possibles pour le captcha
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    // Création de l'image Gd
    $image = imagecreatetruecolor(200, 50);
    // Active les fonctions d'antialiasing pour améliorer la qualité de l'image
    imageantialias($image, true);

    $colors = [];
    // On choisi une plage de couleur aléatoire
    $red = rand(125, 175);
    $green = rand(125, 175);
    $blue = rand(125, 175);

    for ($i = 0; $i < 5; $i++) {
        $colors[] = imagecolorallocate($image, $red - 20 * $i, $green - 20 * $i, $blue - 20 * $i);
    }

    imagefill($image, 0, 0, $colors[0]);

    for ($i = 0; $i < 10; $i++) {
        imagesetthickness($image, rand(2, 10));
        imagerectangle(
            $image,
            rand(-10, 190),
            rand(-10, 10),
            rand(-10, 190),
            rand(40, 60),
            $colors[rand(1, 4)]
        );
    }

    $textColors = [imagecolorallocate($image, 0, 0, 0), imagecolorallocate($image, 255, 255, 255)];
    $fonts = [
        __DIR__ . "/../font/Acme-Regular.ttf",
        __DIR__ . "/../font/arial.ttf",
        __DIR__ . "/../font/typewriter.ttf"
    ];

    $strLength = 6;
    $captchaStr = generate_string($characters, $strLength);
    $_SESSION["captchaStr"] = $captchaStr;

    for ($i = 0; $i < $strLength; $i++) {
        $letterSpace = 170 / $strLength;
        $initial = 15;

        imagettftext(
            $image,
            24,
            rand(-15, 15),
            (int)($initial + $i * $letterSpace),
            rand(25, 45),
            $textColors[rand(0, 1)],
            $fonts[array_rand($fonts)],
            $captchaStr[$i]
        );
    }

    header("Content-type: image/png");
    imagepng($image);
    imagedestroy($image); // Libère la mémoire associée à l'image
}
?>
