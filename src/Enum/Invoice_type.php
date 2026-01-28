<?php
namespace App\Enum;

enum Invoice_type: string
{
    case AUDIT = 'AUDIT';
    case CERTFICATON = 'CERTFICATON';
}