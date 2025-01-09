<?php

use Illuminate\Support\Facades\Auth;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\User;



new #[Layout('layouts.login')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login()
    {
        $this->validate();

        $this->form->authenticate();
        $authID = Auth::user()->id;
        $user = User::find($authID);

        // Periksa apakah pengguna sudah login di perangkat lain
        if (Auth::check() && $user->status_login) {
        // Logout pengguna yang mencoba login dari perangkat baru
            Auth::logout();
        // Redirect dengan pesan error
            // return redirect('\login')->route('guest.page');
            return redirect()->route('login')->with('error_message', 'Akun sedang digunakan');
        }

        // Set status_login menjadi true setelah login berhasil
        if (Auth::check()) {
            $authID = Auth::user()->id;
            $user = User::find($authID);
            $user->status_login = true;
            $user->save();
        }

        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('sekretariat')) {
            return redirect()->route('sekretariat')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('layanan')) {
            return redirect()->route('layanan')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('pengembangan')) {
            return redirect()->route('pengembangan')->with('success', 'Log in Berhasil');
        }

        if (Auth::user()->hasRole('kearsipan')) {
            return redirect()->route('kearsipan')->with('success', 'Log in Berhasil');
        }


        Session::regenerate();

        // $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; ?>


<div>
    @if (session('error_message'))
        <div class="text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error_message') }}
        </div>
    @endif

    @if(session('message'))
        <div class="text-yellow-500 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <x-slot name="title">
        <h1 class="text-grey-300 dark:text-white"> Login Aplikasi</h1>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">

        <div class="input-box">
            <i class="fas fa-envelope"></i>
            <x-text-input wire:model="form.id_user" id="id_user" type="text" name="id_user" placeholder="Email Address atau Username" required autofocus autocomplete="id_user" />
            <x-input-error :messages="$errors->get('form.id_user')" class="mt-2" />
        </div>


        <div class="input-box" style="position: relative; width: 100%;">
            <!-- Ikon Lock -->
            <i class="fas fa-lock"></i>
        
            <!-- Input Password -->
            <x-text-input 
                wire:model="form.password" 
                id="password"
                type="password"
                name="password"
                class="input-field" 
                required 
                autocomplete="current-password" 
                placeholder="Password"
            />
        
            <!-- Ikon Mata -->
            <span id="toggle-password" 
                  class="toggle-password"
                  style="position: absolute; top: 50%; right: 60px; transform: translateY(-50%); cursor: pointer;">
                <i class="fas fa-eye" id="eye-icon"></i>
            </span>
        
            <!-- Error Message -->
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>
        
        

          <div class="remember">
            {{-- <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember Me</label> --}}
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya ') }}</span>
            </label>
          </div>



        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Lupa Password?') }}
                </a>
            @endif
            <x-primary-button class="ms-3">
                <span  wire:loading.class="loading loading-spinner loading-md" ></span>

                {{ __('Log in') }}
            </x-primary-button>
        </div>
        
    </form>


    <script>
        // Mengubah tipe input password ketika ikon diklik
        const togglePassword = document.getElementById('toggle-password');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
    
        togglePassword.addEventListener('click', function() {
            // Toggle password visibility
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
    
            // Ubah ikon berdasarkan kondisi
            if (type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
</div>