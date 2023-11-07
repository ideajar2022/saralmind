<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateAccountType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accounts:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update account type to FREE for premium users after one year.';

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
     * @return int
     */
    public function handle()
    {
        // Find users with 'PREMIUM' account type and created_at more than one year ago
        $usersToUpdate = User::where('account_type', 'PREMIUM')
            ->where('created_at', '<=', Carbon::now()->subYear())
            ->get();

        // Update the account type for each user
        foreach ($usersToUpdate as $user) {
            $user->account_type = 'FREE';
            $user->save();
        }

        $this->info('Account types updated for ' . count($usersToUpdate) . ' users.');
    }
}
