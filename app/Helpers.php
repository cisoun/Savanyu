<?php

function css($file)
{
   return url(join(DIRECTORY_SEPARATOR, array('public', 'css', $file)));
}

function js($file)
{
   return url(join(DIRECTORY_SEPARATOR, array('public', 'js', $file)));
}

?>
