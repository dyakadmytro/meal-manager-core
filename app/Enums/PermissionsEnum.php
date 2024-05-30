<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case CREATE_PRODUCT = 'create product';
    case EDIT_PRODUCT = 'edit product';
    case DELETE_PRODUCT = 'delete product';
    case VIEW_PRODUCT = 'view product';
    case ALL_PRODUCT = 'all product';

    public function label(): string
    {
        return match ($this) {
            self::CREATE_PRODUCT => 'Create Product',
            self::EDIT_PRODUCT => 'Edit Product',
            self::DELETE_PRODUCT => 'Delete Product',
            self::VIEW_PRODUCT => 'View Product',
            self::ALL_PRODUCT => 'All Product',
        };
    }
}
