<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class AuthConfigRepository
{
    /**
     * Fetch the authentication configuration.
     *
     * @return object|null
     */
    public function getAuthConfig()
    {
        return DB::table('auth_config')->first();
    }

    /**
     * Update the authentication configuration.
     *
     * @param array $data
     * @return int
     */
    public function updateAuthConfig(array $data)
    {
        return DB::table('auth_config')->update($data);
    }
}