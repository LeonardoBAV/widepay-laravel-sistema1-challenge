<?php

namespace Modules\WidePayLaravelSistema1Challenge\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;

class UrlPolicy {
    
    use HandlesAuthorization;


    public function store(User $user)
    {
        return $user->id == request()->user_id;
    }

    public function edit(User $user, Url $url)
    {
        return $user->id === $url->user_id;
    }

    public function update(User $user, Url $url)
    {
        return $user->id === $url->user_id;
    }

    public function delete(User $user, Url $url)
    {
        return $user->id === $url->user_id;
    }

}
