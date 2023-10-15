<?php

namespace classes;

class Ext
{

    static function determineExt( $k, $sub_k = '' )
    {
        $ext = "";
        if (file_exists("images/projects/c$k.jpg"))
        {
            $ext = "jpg";
        }
        elseif (file_exists("images/projects/c$k.jpeg"))
        {
            $ext = "jpeg";
        }
        elseif (file_exists("images/projects/c$k.png"))
        {
            $ext = "png";
        }

        if ($sub_k)
        {
            if (file_exists("images/projects/c$k-$sub_k.jpg"))
            {
                $ext = 'jpg';
            }
            elseif (file_exists("images/projects/c$k-$sub_k.jpeg"))
            {
                $ext = 'jpeg';
            }
            elseif (file_exists("images/projects/c$k-$sub_k.png"))
            {
                $ext = 'png';
            }
        }

        return $ext;
    }

}