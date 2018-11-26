<?php

namespace App\Console\Commands;


use App\Models\Role;
use App\Models\Permission;
use Illuminate\Console\Command;

class SyncRolesAndPermissions extends Command
{

    protected $signature = 'admin:syncroles';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates required roles and permissions in the database and assign neccessary priviledges';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $passcode = $this->secret('enter passcode to continue with this delicate operation?');

        if ($passcode == 'admindevpassword') {

            $permissionsToSync = Permission::allPermissions();
            $rolesToSync = Role::defaultRoles();
            $examOfficerPermissions = Permission::examOfficerPermissions();
            $studentPermissions = Permission::studentPermissions();
//            $userPerms = [];

            // create permissions
            foreach ($permissionsToSync as $permName) {
                $perm  = Permission::firstOrCreate(
                    ['name' => $permName],
                    ['guard_name' => 'api']
                );

            }
            $this->info('Permissions successfully synced');

            // create roles
            foreach ($rolesToSync as $roleName) {

                $role = Role::firstOrCreate(
                    ['name' => $roleName],
                    ['guard_name' => 'api']
                );

                if ($role->name == 'administrator') {
                    // assign all permissions
                    $role->syncPermissions(Permission::all());
                    $this->info('Admin role granted all the permissions: ' . implode(', ', $permissionsToSync));
                }

                if ($role->name == 'exam_officer') {
                    // assign exam officer permissions
                    $role->syncPermissions($examOfficerPermissions);
                    $this->info('Exam officer role granted permissions: ' . implode(', ', $examOfficerPermissions));
                }

                if ($role->name == 'student') {
                    // assign student permissions
                    $role->syncPermissions($studentPermissions);
                    $this->info('Student role granted permissions: ' . implode(', ', $studentPermissions));
                }
            }

            $this->info('ALL SYNC OPERATIONS COMPLETED SUCCESSFULLY!!!');

        } else {
            $this->error('YOU CANNOT PERFORM THIS OPERATION!!!');
        }
    }
}
