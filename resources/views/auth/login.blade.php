<x-layout-simple :title="$pageTitle ?? 'Log In'">
    <div class="max-w-xl mx-auto p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Log In to Your Account</h1>
        
        <form class="space-y-4" method="POST" action="/login">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                <input type="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       id="email" 
                       class="{{ $errors->has('email') ? 'outline outline-2 outline-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }} bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                       placeholder="name@company.com" 
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       class="{{ $errors->has('password') ? 'outline outline-2 outline-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }} bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                       placeholder="••••••••" 
                       required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between pt-2 pb-2">
                <div class="flex items-center">
                    <input id="remember" 
                           type="checkbox" 
                           name="remember" 
                           value="1"
                           {{ old('remember') ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Log In
            </button>
            
            <!-- Register Link -->
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 text-center mt-4">
                Don't have an account? <a href="/register" class="text-blue-700 hover:underline dark:text-blue-500">Sign up</a>
            </div>
        </form>
    </div>
</x-layout-simple>