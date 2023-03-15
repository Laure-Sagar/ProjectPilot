<?php

namespace App\Actions\Jetstream;

use DateTime;
use App\Models\Team;
use App\Models\User;
use App\Models\Project;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Gate;
use Laravel\Jetstream\Events\AddingTeam;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\CreatesTeams;

class CreateTeam implements CreatesTeams
{
    public $name = '';
    /**
     * Validate and create a new team for the given user.
     *
     * @param  array<string, string>  $input
     */
    public function create(User $user, array $input): Team
    {
        Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createTeam');

        AddingTeam::dispatch($user);

        $user->switchTeam($team = $user->ownedTeams()->create([
            'name' => $input['name'],
            'personal_team' => false,
        ]));

        return $team;
    }
}
