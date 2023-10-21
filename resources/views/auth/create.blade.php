<x-layout>
    <h1 class="my-16 text-center font-medium text-slate-600 text-4xl">Sign in</h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <x-label for="email">E-mail</x-label>
                <x-text-input name="email" type="email" />
            </div>

            <div class="mb-8">
                <x-label for="password">Password</x-label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="mb-8 flex justify-between text-sm font-medium">
                <div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="remember" name="remember"
                            class="rounded-sm border border-slate-400">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="#" class="text-indigo-600 hover:underline">Forget password?</a>
                </div>
            </div>

            <x-button class="w-full bg-indigo-50">
                Login
            </x-button>
        </form>
    </x-card>
</x-layout>
