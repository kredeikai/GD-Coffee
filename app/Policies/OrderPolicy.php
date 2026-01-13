<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isSuperAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isCustomer();
    }

    public function updateStatus(User $user, Order $order): bool
    {
        return $user->isAdmin();
    }
}
