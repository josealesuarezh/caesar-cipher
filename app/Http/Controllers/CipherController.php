<?php

namespace App\Http\Controllers;

use App\Services\CaesarCipher;
use Illuminate\Http\Request;

class CipherController extends Controller
{
    public function cipherDecipher(Request $request, CaesarCipher $caesarCipher)
    {
        $data = $request->validate([
            'text' => 'required',
            'shift_value' => 'required|integer',
        ]);

        if ($request->has('cipher')) {
            $resultText = $caesarCipher->cipher($data['text'], $data['shift_value']);
        } else {
            $resultText = $caesarCipher->deCipher($data['text'], $data['shift_value']);
        }

        return view('welcome')
            ->with([
                'originalText' => $data['text'],
                'shiftValue' => $data['shift_value'],
                'resultText' => $resultText
            ]);
    }
}
