
<?php

include 'models.php';
require 'vendor\twig\twig\lib\Twig\Autoloader.php';

$current_count = updateImageCount($_GET['file']);

    try {
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('templates_twig');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('full_image.tmpl');   
        $content = $template->render(array(
          'path' => $_GET['path'],
          'file' => $_GET['file'],
          'current_count' => $current_count+1,
        ));
        echo $content;
        
      } catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
      }
?>