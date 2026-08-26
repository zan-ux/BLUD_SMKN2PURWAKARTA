<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - BLUD SMKN 2 Purwakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden w-full max-w-4xl flex">
        <!-- Left Panel -->
        <div class="hidden lg:block w-1/2 bg-green-950 p-12 relative overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-green-900 rounded-full opacity-50"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-green-900 rounded-full opacity-30"></div>
            
            <div class="relative z-10 h-full flex flex-col justify-between">
                @php
                    $profile = \App\Models\Profile::first();
                @endphp

                <div class="flex items-center gap-3 mb-8">
                    @if($profile && $profile->logo)
                        <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="h-12 w-auto">
                    @else
                        <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center">
                            <span class="text-2xl font-bold text-white">B</span>
                        </div>
                    @endif
                    <span class="font-bold text-white text-xl">{{ $profile->institution_name ?? 'BLUD Vokasi' }}</span>
                </div>
                
                <div>
                    <h1 class="text-3xl font-extrabold text-white mb-6 leading-tight">Join the<br>Community</h1>
                    <p class="text-green-200 leading-relaxed max-w-sm">
                        Create your account to access regional vocational education services, track your progress, and connect with opportunities.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Right Panel (Form) -->
        <div class="w-full lg:w-1/2 p-8 lg:p-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Create an Account</h2>
            <p class="text-gray-500 text-sm mb-8">Already have an account? <a href="{{ route('login') }}" class="text-green-800 font-semibold hover:text-green-600">Log in here</a></p>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="e.g Budi Santoso">
                    </div>
                    @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="name@example.com">
                        </div>
                        @error('email')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <div class="relative">
                            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="+62 812-3456-7890">
                        </div>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <input type="password" name="password" class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="Create a strong password">
                        <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600" onclick="togglePassword()">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Must be at least 8 characters long.</p>
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <input type="password" name="password_confirmation" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="Repeat your password">
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="terms" name="terms" class="mt-1 w-4 h-4 text-green-800 border-gray-300 rounded focus:ring-green-800">
                    <label for="terms" class="text-sm text-gray-600">I agree to the <a href="#" class="text-green-800 hover:text-green-600">Terms & Conditions</a> and <a href="#" class="text-green-800 hover:text-green-600">Privacy Policy</a> of the regional vocational service.</label>
                </div>
                
                <button type="submit" class="w-full bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition flex items-center justify-center gap-2">
                    Create Account
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </form>
            
            <div class="mt-6 flex items-center gap-4">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-sm text-gray-500">or register with</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>
            
            <div class="mt-6 grid grid-cols-2 gap-4">
                <button class="flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-700 py-3 rounded-lg hover:bg-gray-50 transition text-sm font-medium">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                    Google
                </button>
                <button class="flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-700 py-3 rounded-lg hover:bg-gray-50 transition text-sm font-medium">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#000" d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09l.01-.01zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                    Apple ID
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.querySelector('input[name="password"]');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
</body>
</html>