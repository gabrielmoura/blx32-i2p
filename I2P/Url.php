<?php
/**
 * User: blx32
 * Date: 8/11/17
 * Time: 8:02 PM
 */

namespace Blx32\I2P;

use Blx32\Base32;

class Url
{
    protected $env;

    /**
     * Cria um link em base32
     * @param $b64
     * @return string
     */
    public static function b32($b64)
    {
        $b32 = strtolower(Base32::encode(hash('sha256', self::base64i2p_decode($b64), true), false));
        return $b32 . '.b32.i2p';
    }

    /**
     * Cria um barcode do link em base32
     * @param $b32
     * @return string
     */
    public static function b32_barcode($b32)
    {
        return self::$env->BARCODE_URL . $b32;
    }

    /**
     * Cria um barcode para o salto DNS
     * @param $url
     * @param $b64
     * @return string
     */
    public static function i2pHelperBarcode($url, $b64)
    {
        return self::$env->BARCODE_URL . $url . '?i2paddresshelper=' . $b64;
    }

    /**
     * Cria um link para o salto DNS
     * @param $url
     * @param $b64
     * @return string
     */
    public static function i2pHelperAddress($url, $b64)
    {
        return $url . '?i2paddresshelper=' . $b64;
    }

    private function base64i2p_encode($data, $pad = null)
    {
        $data = str_replace(['+', '/'], ['-', '~'], base64_encode($data));
        if (!$pad) {
            $data = rtrim($data, '=');
        }
        return $data;
    }

    private function base64i2p_decode($data)
    {
        return base64_decode(str_replace(['-', '~'], ['+', '/'], $data), false);
    }
}