<?php
class SollicitantValidator
{
    /**
     * Create info message.
     * @param string $message
     * @param string $type
     * @return string
     */
    public static function GetInfoMessage(string $message, string $type): string
    {
        $cssInfoMessage  = ' <link rel="stylesheet" href="' . URLROOT . '/public/css/style.css">';
        $cssInfoMessage .= '<div class="alert ' . $type . '">';
        $cssInfoMessage .= $message;
        $cssInfoMessage .= '</div>';

        return print($cssInfoMessage);
    }
}
