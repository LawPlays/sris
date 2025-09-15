<?php
namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentRegistrationController extends Controller {
    public function create() {
        // show registration form
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            // remove any 'role' validation if present
        ]);

        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'student', // force student role
        ]);

        auth()->login($user);

        return redirect()->route('registration.thanks');
    }

    public function thanks() {
        return view('registration.thanks');
    }
}
