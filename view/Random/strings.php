<?php
namespace CryptLibExamples\Random;
require_once dirname(dirname(__DIR__)) . '/lib/CryptLib/bootstrap.php';


$factory = new \CryptLib\Random\Factory;
$generator = $factory->getLowStrengthGenerator();

function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}
srand(make_seed());
$randval = rand();

if($randval%3==0)
{
$number = $generator->generate(8);

printf("\nHere's our first random string: %s\n", bin2hex($number));
}
else if($randval%3==1)
{
$number = $generator->generate(8);
printf("\nHere's a base64 encoded random string: %s\n", base64_encode($number));

}
else
{
$characters = '0123456789abcdefghijklmnopqrstuvwxyz' .
              'ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&;<>?';

$string = $generator->generateString(16, $characters);

printf("\nHere's our token: %s\n", $string);
}