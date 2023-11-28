<?php

namespace App\Policies;

use App\Models\Envelope;
use App\Models\User;

class EnvelopePolicy
{
    public function view(User $user, Envelope $envelope): bool
    {
        return $user->id === $envelope->user->id;
    }

    public function update(User $user, Envelope $envelope): bool
    {
        return $this->view($user, $envelope);
    }

    public function delete(User $user, Envelope $envelope): bool
    {
        return $this->view($user, $envelope);
    }
}
