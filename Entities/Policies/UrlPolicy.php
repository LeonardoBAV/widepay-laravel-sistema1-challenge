<?php

namespace Modules\WidePayLaravelSistema1Challenge\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\WidePayLaravelSistema1Challenge\Entities\Url;

class UrlPolicy
{
    use HandlesAuthorization;


    public function update(User $user, Url $url)
    {
        dd('2');
        return $user->id === $url->user_id;
    }
}
