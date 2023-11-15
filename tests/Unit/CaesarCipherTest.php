<?php

namespace Tests\Unit;

use App\Services\CaesarCipher;
use PHPUnit\Framework\TestCase;

class CaesarCipherTest extends TestCase
{

    /**
     * @dataProvider cipherTestCases
     */
    public function test_cipher($initial, $expected, $shiftValue)
    {
        $caesarCipher = new CaesarCipher();
        $result = $caesarCipher->cipher($initial, $shiftValue);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider cipherTestCases
     */
    public function test_decipher($expected, $initial, $shiftValue)
    {
        $caesarCipher = new CaesarCipher();
        $result = $caesarCipher->deCipher($initial, $shiftValue);
        $this->assertEquals($expected, $result);
    }

    public static function cipherTestCases()
    {
        return [
            ['abcxyz', 'bcdyza', 1],
            ['ABCXYZ', 'BCDYZA', 27],
        ];
    }
}
