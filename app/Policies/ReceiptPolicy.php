<?php

namespace App\Policies;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReceiptPolicy
{
    public function view(User $user, Receipt $receipt): bool
    {
        return $user->can('view', $receipt->envelope);
    }

    public function update(User $user, Receipt $receipt): bool
    {
        return $this->view($user, $receipt);
    }

    public function delete(User $user, Receipt $receipt): bool
    {
        return $this->view($user, $receipt);
    }
}
