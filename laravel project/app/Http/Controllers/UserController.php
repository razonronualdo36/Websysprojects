<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'max:50',
                'unique:users,username',
            ],
            'full_name' => [
                'required',
                'max:100',
            ],
        ]);

        User::create($validated);

        return redirect()
            ->route('users')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => [
                'required',
                'max:100',
            ],
            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $upload = $request->file('avatar');
            $extension = strtolower($upload->extension());
            $filename = Str::uuid() . '.' . $extension;
            $path = 'avatars/' . $filename;

            $thumbnail = Image::read($upload)->cover(300, 300);

            Storage::disk('public')->put(
                $path,
                $thumbnail->encodeByExtension($extension, quality: 85)
            );

            $validated['avatar'] = $path;
        }

        $user->update($validated);

        return redirect()
            ->route('users')
            ->with('success', 'User updated successfully.');
    }
}