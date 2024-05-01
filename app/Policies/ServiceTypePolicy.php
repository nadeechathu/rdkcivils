<?php

namespace App\Policies;

use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceTypePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, ServiceType $serviceType): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, ServiceType $serviceType): bool
    {
    }

    public function delete(User $user, ServiceType $serviceType): bool
    {
    }

    public function restore(User $user, ServiceType $serviceType): bool
    {
    }

    public function forceDelete(User $user, ServiceType $serviceType): bool
    {
    }
}
