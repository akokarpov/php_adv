<?php


include 'models.php';
require 'vendor\twig\twig\lib\Twig\Autoloader.php';

try {
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('templates_twig');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('gallery.tmpl');   
    $content = $template->render(array(
      'images' => getImages(),
    ));
    echo $content;
    
  } catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
  }

?>