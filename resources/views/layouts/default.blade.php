<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titre }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased lg:pt-10 pb-16 bg-slate-950 text-slate-50 " style="font-family: 'jetbrains Mono'; font-weight: lighter;  ">

    {{-- Début : corps de la page  --}}
    <div
        class="mx-auto px-4 max-w-7xl  sm:px-6 lg:px-8"
        x-data="{menuH : true}">

        {{-- Header --}}
        <header
            class="flex justify-between items-center border-b border-slate-50 pb-2 border-opacity-50 rounded-md sticky top-0 z-10 bg-slate-950 pt-6"
           >

            {{-- Logo --}}
            <a href="{{ route("Index") }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-14 h-14 text-slate-50 hover:text-orange-700 hover:scale-110 transition-all duration-700">
                    <path fill-rule="evenodd" d="M1.5 9.832v1.793c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875V9.832a3 3 0 0 0-.722-1.952l-3.285-3.832A3 3 0 0 0 16.215 3h-8.43a3 3 0 0 0-2.278 1.048L2.222 7.88A3 3 0 0 0 1.5 9.832ZM7.785 4.5a1.5 1.5 0 0 0-1.139.524L3.881 8.25h3.165a3 3 0 0 1 2.496 1.336l.164.246a1.5 1.5 0 0 0 1.248.668h2.092a1.5 1.5 0 0 0 1.248-.668l.164-.246a3 3 0 0 1 2.496-1.336h3.165l-2.765-3.226a1.5 1.5 0 0 0-1.139-.524h-8.43Z" clip-rule="evenodd" />
                    <path d="M2.813 15c-.725 0-1.313.588-1.313 1.313V18a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-1.688c0-.724-.588-1.312-1.313-1.312h-4.233a3 3 0 0 0-2.496 1.336l-.164.246a1.5 1.5 0 0 1-1.248.668h-2.092a1.5 1.5 0 0 1-1.248-.668l-.164-.246A3 3 0 0 0 7.046 15H2.812Z" />
                </svg>
            </a>

            {{-- Titre de site --}}
            <h1 class="text-4xl text-slate-50 font-bold lg:ml-20 hidden md:block">
                Mon <span class="text-orange-700 hover:scale-125 hover:px-3 transition-all duration-700 inline-block">blog</span> !
            </h1>

            <button
                x-cloak
                class="flex items-center font-bold text-xl rounded-full p-4 hover:scale-105 hover:bg-slate-50 hover:text-orange-700 transition-all text-slate-50 bg-orange-700 duration-700"
                @click="menuH = !menuH">
                <span
                    x-cloak
                    x-text="menuH ? 'Menu' : 'Moins'">
                </span>

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-6 h-6 w-6 ml-2"
                    x-cloak
                    x-show="menuH">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>

                <svg
                    x-cloak
                    x-show="!menuH"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="size-6 h-6 w-6 ml-2">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                </svg>
            </button>

        </header>

        {{-- Navigation --}}
        <div class="relative">
            <nav
                x-show="!menuH"
                x-cloak
                x-transition.duration.800ms
                class="absolute z-30 right-0  bg-slate-300 flex justify-center flex-col w-52 rounded-md overflow-hidden py-2">

                <a
                    href="{{ route("article.create") }}"
                    class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:w-full mx-3 lg:mx-0">
                    Ajouter
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6 w-6 h-6 text-orange-700 font-bold ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                      </svg>
                </a>

                <a
                    x-transition.duration.800ms
                    href="{{ route("scanner" ) }}"
                    class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:w-full mx-3 lg:mx-0">
                    <span class="inline-flex">Scanner</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6 w-6 h-6 text-orange-700 ml-2">
                        <path d="M4.5 4.5a3 3 0 0 0-3 3v9a3 3 0 0 0 3 3h8.25a3 3 0 0 0 3-3v-9a3 3 0 0 0-3-3H4.5ZM19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06Z" />
                    </svg>
                </a>

                <a
                    x-transition.duration.800ms
                    href="{{ route('profile.edit') }}"
                    class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:w-full mx-3 lg:mx-0">
                    <span class="inline-flex">Profil</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6 w-6 h-6 text-orange-700 ml-2">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                      </svg>

                </a>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    class="">
                    @csrf
                    <button
                        type="submit"
                        x-transition.duration.800ms
                        class="inline-flex font-bold text-orange-700 p-4 rounded-full bg-slate-300 hover:bg-slate-50 hover:scale-110 transition-all duration-700 lg:w-full mx-3 lg:mx-0"
                        onclick="return confirm('Voulez-vous vraiment vous déconnectez ?')">
                        <span class="inline-flex">Déconnexion</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="size-6 w-6 h-6 text-orange-700 ml-2">
                            <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v9a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM6.166 5.106a.75.75 0 0 1 0 1.06 8.25 8.25 0 1 0 11.668 0 .75.75 0 1 1 1.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </nav>
        </div>

        {{-- Corps de la page avec les articles --}}
        <main class=" mt-8 lg:py-5 lg:px-5 rounded-md">
           {{ $slot }}
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
