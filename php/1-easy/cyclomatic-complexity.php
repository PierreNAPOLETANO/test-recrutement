<?php

/**
 * J'ai décidé dans un 1er temps de créer un tableau contenant tout les unités de stockage
 * 
 * J'ai créé une variable $factor qui est le nombre de bytes dans une unité de stockage supérieure
 * et qui va être utile si on besoin de la modifier et éviter de la modifier à plusieurs endroits
 * 
 * J'ai préférer utiliser un boucle while me permettant d'itérer sur le tableau des unités de stockage
 * et de pouvoir effectué des actions tant que ma condition est vrai en plus de mon itération sur le tableau
 * 
 * Pour finir je retourne le calcul obtenu dans ma boucle
 */
function convertSize($bytes, $precision = 2) {
  $sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB', 'HB'];
  $factor = 1024;
  $i = 0;
  
  while ($bytes >= $factor && $i < count($sizes) - 1) {
    $bytes /= $factor;
    $i++;
  }

  return round($bytes, $precision) . ' ' . $sizes[$i];
}

echo "\n";
echo convertSize2(50000);