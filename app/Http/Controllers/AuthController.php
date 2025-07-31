<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule; // For unique validation ignoring current user


class AuthController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            "username" => 'required',
            "password" => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Username and password are required'
            ], 200);
        } else {
            $credentials = request(['username', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'error' => true,
                    'message' => 'Username or password invalid'
                ], 200);
            }
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user, true);
            return response()->json([
                'error' => false,
                'message' => 'Success Login'
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // return redirect()->route("login");

        $request->session()->invalidate(); // Invalidate the current session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }

    /**
     * Store a newly created user in storage.
     * This method is typically called via AJAX from the settings page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users', // Username must be unique
            'password' => 'required|string|min:6', // 'confirmed' requires password_confirmation
            'repassword' => 'required|string|min:6',
            'role' => 'required|integer|in:0,1,2', // 0: Vendor, 1: Super Admin, 2: Admin
        ], [
            // 'name.required' => 'Nama pengguna wajib diisi.',
            // 'username.required' => 'Username wajib diisi.',
            // 'username.unique' => 'Username ini sudah digunakan.',
            // 'password.required' => 'Password wajib diisi.',
            // 'password.min' => 'Password minimal 8 karakter.',
            // 'password.confirmed' => 'Konfirmasi password tidak cocok.',
            // 'role.required' => 'Role pengguna wajib dipilih.',
            // 'role.in' => 'Role pengguna tidak valid.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($request->password == $request->repassword) {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return response()->json(['message' => 'Pengguna berhasil ditambahkan!', 'user' => $user], 201);
        }
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            // You can return a JSON response for API calls or redirect for web
            return response()->json(['message' => 'Pengguna tidak ditemukan.'], 404);
            // Or for a web view: abort(404);
        }

        // Return as JSON for API or pass to a view
        return response()->json($user);
        // Or return view('users.show', compact('user'));
    }

    /**
     * Update the specified user in storage.
     * This method is typically called via AJAX from the settings page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // Unique username, but ignore the current user's ID
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed', // Password is optional for update
            'role' => 'required|integer|in:0,1,2',
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username ini sudah digunakan.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'role.required' => 'Role pengguna wajib dipilih.',
            'role.in' => 'Role pengguna tidak valid.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;

        // Only update password if it's provided in the request
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'Pengguna berhasil diperbarui!', 'user' => $user], 200);
    }

    /**
     * Remove the specified user from storage.
     * This method is typically called via AJAX from the settings page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan.'], 404);
        }

        $user->delete();

        return view('pengaturan');//response()->json(['message' => 'Pengguna berhasil dihapus!'], 200);
    }
}
