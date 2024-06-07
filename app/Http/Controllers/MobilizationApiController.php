<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EngineerStore;
use App\Models\Mobilization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MobilizationApiController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        // Retrieve user details from the 'engineer' table based on the provided email
        $mobilization = EngineerStore::where('email', $request->email)->first();
    
        if (!$mobilization) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // If the engineer exists, verify the password
        if (!Hash::check($request->password, $mobilization->password)) {
            return response()->json(['error' => 'Invalid password'], 401);
        }
    
        // Attempt to authenticate the user
        if ($mobilization) {
            // Authentication successful, generate token if needed
            // $token = $engineer->createToken('API Token')->plainTextToken;
    
            // Return response with token and user data
            return response()->json([
                'User'=>'Mobilization Team View',
                'user' => $mobilization,
            ], 200);
        } else {
            // Authentication failed
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

        public function view()
        {
            $mobilization = Mobilization::all();
            if ($mobilization->isNotEmpty()) {
                return response()->json([
                    'Response' => $mobilization,
                ], 200);
            } else {
                return response()->json(['error' => 'No Data Found'], 404);
            }
        }
    }
    
