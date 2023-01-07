<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $formfill = $request->validate([
            'email' => 'required|string|exists:users,email',
            'password' => 'required|string',
        ]);


        try {
            $user = User::where('email', $formfill['email'])->first();
        } catch (\Illuminate\Database\QueryException $th) {
            return response(['message' => "Not found user"]);
        }

        if (!$user || !Hash::check($formfill['password'], $user->password)) {
            return response([
                'message' => "Invalid Credentials"
            ], 401);
        }

        $token = $user->createToken('myappToken')->plainTextToken;
        $response = [
            'token' => $token,
            'user'  => $user
        ];
        if (Auth()->attempt($formfill)) {
            session()->regenerate();
            return response($response, 201);
        }
    }


    public function index()
    {
        $users =  User::with('roles')->get();
        return $users;
    }

    public function add(Request $request)
    {

        try {
            $formfill = $request->validate([
                'name' => 'required|string',
                'email' => 'required|unique:users,email',
                'surname' => 'required',
                'password' => 'required|min:3|confirmed',
                'role'     => 'required|string'
            ]);

            $user = User::create([
                'name' => $formfill['name'],
                'email' => $formfill['email'],
                'surname' => $formfill['surname'],
                'password' => bcrypt($formfill['password']),
            ]);
            $token = $user->createToken('myappToken')->plainTextToken;
            $user->syncRoles($request->role);

            $response = [
                'user' => $user,
                'token' => $token,
                'message' => 'User added successfully'
            ];

            return response($response, 200);
        } catch (\Spatie\Permission\Exceptions\RoleDoesNotExist $e) {
            $user = User::where('id', $user->id)->firstorfail()->delete();
            return response()->error(["For 'role' only you can select: Super-Admin, Admin, Standard-User"], 401);
        }
    }
}
