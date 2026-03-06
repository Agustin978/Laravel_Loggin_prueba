<form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    <div>
        <label for="nomb_usr" class="block text-sm font-medium text-slate-700 mb-1">Usuario</label>
        <div class="relative">
            <input type="text" name="nomb_usr" id="nomb_usr" wire:model="nomb_usr"
                class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50 border transition-colors outline-none"
                placeholder="Ej: loboa" required autofocus>
        </div>
        @error('nomb_usr') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Contraseña</label>
        <div class="relative">
            <input type="password" name="password" id="password" wire:model="password"
                class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-3 bg-slate-50 border transition-colors outline-none"
                required>
        </div>
        @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
    </div>

    <div>
        <button type="submit"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors transform active:scale-[0.98]">
            Ingresar al Sistema
        </button>
    </div>
</form>