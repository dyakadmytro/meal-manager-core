<?php

namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case GUEST = 'guest';
    case CUSTOMER = 'customer';


    public function label(): string
    {
        return match ($this) {
            static::ADMIN => 'Admin',
            static::MANAGER => 'Manager',
            static::GUEST => 'Guest',
            static::CUSTOMER => 'Customer',
        };
    }
}
