<x-layout>
    <h1 class="title">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register') }}" method="post">
            @csrf

            {{-- username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="input @error('username') ring-red-500 @enderror">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="input @error('email') ring-red-500 @enderror">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- confirmed password --}}
            <div class="mb-8">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="input @error('password') ring-red-500 @enderror">
            </div>

            {{-- Submit Button --}}
            <button class="primary-btn">Register</button>
        </form>
    </div>
</x-layout>