<?php

namespace App\Http\Controllers;

use App\Repositories\AuthConfigRepository;
use Illuminate\Http\Request;

class AuthConfigController extends Controller
{
    protected $authConfigRepository;

    public function __construct(AuthConfigRepository $authConfigRepository)
    {
        $this->authConfigRepository = $authConfigRepository;
    }

    public function fetchAuthConfig()
    {
        try
        {
            $authConfig = $this->authConfigRepository->getAuthConfig();
            
            return response()->json($authConfig, 200);

        } catch (\Exception $e) {
            
            return response()->json([
                'error' => 'Failed to fetch authentication configuration'
            ], 500);
        }
    }

    public function updateAuthConfig(Request $request)
    {
        $data = $request->only(['client_id', 'client_secret', 'tenant_id']);

        try
        {
            $this->authConfigRepository->updateAuthConfig($data);
            return response()->json([
                'message' => 'Authentication configuration updated successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update authentication configuration'
            ], 500);
        }
    }
}
