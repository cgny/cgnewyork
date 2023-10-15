<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/13/21
 * Time: 12:22 PM
 */

$author  = postInput('author');
$email   = postInput('email');
$url     = postInput('url');
$comment = postInput('comment');
$submit  = postInput('submit');

if($email)
{

    mail($email,'CGNY - Contact Me',$comment);
    mail('christian@cgnewyork.com.com','CGNY - Contacted You',$comment);

}

header('Location: http://cgnewyork.com');

function postInput( $arg )
{
    if (isset($_POST[$arg]))
    {
        return $_POST[$arg];
    }
    else
    {
        return false;
    }
}

