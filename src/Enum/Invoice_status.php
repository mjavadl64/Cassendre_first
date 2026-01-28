<?php

Namespace App\Enum;

enum Invoice_status: string
{
    case PAID = 'PAID';
    case CANCELLED = 'CANCELLED';
    case PENDING = 'PENDING';
    case UNPAID = 'UNPAID';
}