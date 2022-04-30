<?php

namespace Amaia\Base\Providers;

use Amaia\Base\Actions\Jetstream\AddTeamMember;
use Amaia\Base\Actions\Jetstream\CreateTeam;
use Amaia\Base\Actions\Jetstream\DeleteTeam;
use Amaia\Base\Actions\Jetstream\DeleteUser;
use Amaia\Base\Actions\Jetstream\InviteTeamMember;
use Amaia\Base\Actions\Jetstream\RemoveTeamMember;
use Amaia\Base\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Jetstream::useUserModel('Amaia\Base\Models\User');
        Jetstream::useTeamModel('Amaia\Base\Models\Team');
        Jetstream::useMembershipModel('Amaia\Base\Models\Membership');
        Jetstream::useTeamInvitationModel('Amaia\Base\Models\TeamInvitation');

        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', 'Administrator', [
            'create',
            'read',
            'update',
            'delete',
        ])->description('Administrator users can perform any action.');

        Jetstream::role('editor', 'Editor', [
            'read',
            'create',
            'update',
        ])->description('Editor users have the ability to read, create, and update.');
    }
}
