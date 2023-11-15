<?php

namespace App\Services;

class CaesarCipher
{
    public function cipher($text, $shiftValue)
    {
        return $this->walkAndShift($text, $shiftValue);
    }

    public function deCipher($text, $shiftValue)
    {
        return $this->walkAndShift($text, $shiftValue * -1);
    }

    private function walkAndShift($text, $shiftValue)
    {
        $result = "";
        foreach (str_split($text) as $char) {
            $result .= $this->shift($char, $shiftValue);
        }
        return $result;
    }


    private function shift($ch, $shiftValue)
    {
        if (!ctype_alpha($ch))
            return $ch;

        $char = ord($ch) + $shiftValue % 26;
        $char = ctype_upper($ch)
            ? $this->adjustForUpperCase($char)
            : $this->adjustForLowerCase($char);


        return chr($char);
    }

    private function adjustForUpperCase($char)
    {
        if ($char < 65) {
            $char += 26;
        }

        if ($char > 90) {
            $char -= 26;
        }

        return $char;
    }

    private function adjustForLowerCase($char)
    {
        if ($char < 97) {
            $char += 26;
        }

        if ($char > 122) {
            $char -= 26;
        }

        return $char;
    }
}
