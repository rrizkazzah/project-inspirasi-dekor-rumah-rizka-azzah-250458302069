<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:make-admin {email : Email user yang akan dijadikan admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Jadikan user sebagai admin berdasarkan email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            $this->error("User dengan email {$email} tidak ditemukan!");
            return 1;
        }
        
        if ($user->role === 'admin') {
            $this->info("User {$user->name} ({$email}) sudah menjadi admin!");
            return 0;
        }
        
        $user->update(['role' => 'admin']);
        
        $this->info("✅ Berhasil! User {$user->name} ({$email}) sekarang adalah admin!");
        
        return 0;
    }
}
