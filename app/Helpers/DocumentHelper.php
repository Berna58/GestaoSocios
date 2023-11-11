<?php

namespace App\Helpers;

class DocumentHelper
{
    public static function getIconByExtension($extension)
    {
        switch ($extension) {
            case 'pdf':
                return 'pdf-icon.png';
            case 'doc':
            case 'docx':
                return 'word-icon.png';
            case 'xls':
            case 'xlsx':
                return 'excel-icon.png';
            case 'ppt':
            case 'pptx':
                return 'powerpoint-icon.png';
            default:
                return 'generic-icon.png';
        }
    }
}
