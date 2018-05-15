<?php

function _public($folder, $file)
{
    return url(join(DIRECTORY_SEPARATOR, array('public', $folder, $file)));
}

function css($file)
{
    return _public('css', $file);
}

function js($file)
{
    return _public('js', $file);
}

function upload($file)
{
    return _public('uploads', $file);
}

?>
