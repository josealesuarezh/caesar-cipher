<?php

namespace Tests\Feature;

use Tests\TestCase;

class CaesarCipherTest extends TestCase
{

    public function test_redirect_to_cipher_decipher_page(): void
    {
        $this->get('/')->assertRedirect('/cipher-decipher');
    }

    /**
     * @dataProvider cipherTestCases
     */
    public function test_cipher_request($initial, $expected, $shiftValue)
    {
        $this->post('/cipher-decipher', [
            'text' => $initial,
            'shift_value' => $shiftValue,
            'cipher' => null
        ])
            ->assertViewIs('welcome')
            ->assertViewHas([
                'originalText' => $initial,
                'shiftValue' => $shiftValue,
                'resultText' => $expected
            ]);
    }

    /**
     * @dataProvider cipherTestCases
     */
    public function test_deCipher_request($expected, $initial, $shiftValue)
    {
        $this->post('/cipher-decipher', [
            'text' => $initial,
            'shift_value' => $shiftValue,
            'decipher' => null
        ])
            ->assertViewIs('welcome')
            ->assertViewHas([
                'originalText' => $initial,
                'shiftValue' => $shiftValue,
                'resultText' => $expected
            ]);
    }

    public static function cipherTestCases()
    {
        return [
            ['abcxyz', 'bcdyza', 1],
            ['ABCXYZ', 'BCDYZA', 27],
        ];
    }
}
