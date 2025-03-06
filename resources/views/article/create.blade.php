<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name").  " | "  . "Ajouter"}}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased pt-10 pb-16 bg-slate-950 text-slate-50 ">

    {{-- Début : corps de la page  --}}
    <div class="mx-auto px-4 max-w-7xl  sm:px-6 lg:px-8">

        {{-- Header --}}
        <header class="flex justify-between items-center border-b border-slate-50 pb-2 border-opacity-50 rounded-md sticky top-0 z-10 bg-slate-950 pt-6">

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

            {{-- Navigation --}}
            <nav class=" flex justify-between items-center ">
                <a href="{{ route("Index") }}" class="flex items-center font-bold text-orange-700 text-lg rounded-full p-4 bg-slate-300 hover:scale-105 hover:bg-slate-50 transition-all duration-700">
                    Acceuil
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-6 h-6 text-orange-700 font-bold ml-2">
                        <path d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 0 0 7.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 0 0 4.902-5.652l-1.3-1.299a1.875 1.875 0 0 0-1.325-.549H5.223Z" />
                        <path fill-rule="evenodd" d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 0 0 9.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 0 0 2.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3Zm3-6a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75v-3Zm8.25-.75a.75.75 0 0 0-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75v-5.25a.75.75 0 0 0-.75-.75h-3Z" clip-rule="evenodd" />
                      </svg>

                </a>

            </nav>
        </header>

        {{-- Corps de la page avec les articles --}}
        <main class="py-5 lg:px-5 px-1 rounded-md  lg:max-w-6xl mx-auto ">
            <div class="w-full h-auto lg:px-5 px-1 py-2  ">
                <form
                    action="{{ route("store") }}"
                    method="post"
                    x-data = "{show : true}"
                    enctype="multipart/form-data"
                    x-init = "setTimeout(() => show = false, 3000)"
                    class="flex flex-col w-full lg:max-w-4xl mx-auto bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-4 lg:p-8 shadow-lg">
                    @csrf

                    @if (session("success"))
                    <template x-if = "show">
                        <div
                            class="w-7/12 rounded-full bg-green-700 text-slate-50 text-lg text-center animate-pulse duration-700 p-4"
                        >
                            {{ session("success") }}
                        </div>
                    </template>
                    @endif

                    @if (session("error"))
                    <template x-if ="show">
                        <div class="w-7/12 rounded-full bg-red-700 text-slate-50 text-lg text-center animate-pulse duration-700 p-4">
                            {{ session("error") }}
                        </div>
                    </template>
                    @endif





                    @if ($errors->has('image'))
                        <template x-if="show" >
                            <div x-cloak class="text-slate-50 bg-red-700 rounded-full p-3 ">{{ $errors->first('image') }}</div>
                        </template>
                    @elseif ($errors->has('required'))
                        <template x-if="show" x-cloak>
                            <div x-cloak class="text-slate-50 bg-red-700 rounded-full p-3 ">{{ $errors->first('required') }}</div>
                        </template>
                    @endif


                    <h1 class="text-slate-100 text-4xl font-bold text-center py-6 hover:animate-pulse duration-700 ease-in-out">
                        Ajouter un article
                    </h1>

                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full">
                        <!-- Champs à gauche -->
                        <div class="space-y-6">
                            <div class="flex flex-col">
                                <label for="titre" class="text-orange-700 text-xl font-bold mb-2">Titre :</label>
                                <input type="text" name="titre" id="titre"
                                    placeholder="Donnez un titre à l'article..."
                                    class="w-full outline-none rounded-full h-12 text-slate-950 px-6 text-lg border border-gray-300 focus:ring-2 focus:ring-orange-700">
                            </div>

                            <div class="flex flex-col">
                                <label for="description" class="text-orange-700 text-xl font-bold mb-2">Description :</label>
                                <input type="text" name="description" id="description"
                                    placeholder="Décrivez votre article ici..."
                                    class="w-full outline-none rounded-full h-12 text-slate-950 px-6 text-lg border border-gray-300 focus:ring-2 focus:ring-orange-700">
                            </div>

                            <div class="flex flex-col">
                                <label for="instruction" class="text-orange-700 text-xl font-bold mb-2">Instruction :</label>
                                <input type="text" name="instruction" id="instruction"
                                    placeholder="Des instructions ?..."
                                    class="w-full outline-none rounded-full h-12 text-slate-950 px-6 text-lg border border-gray-300 focus:ring-2 focus:ring-orange-700">
                            </div>

                            <!-- Input pour l'upload d'image -->
                            <div class="flex flex-col">
                                <label for="image" class="text-orange-700 text-xl font-bold mb-2">Image :</label>
                                <input type="file" name="image" id="image"
                                    placeholder="Choisis une image..."
                                    accept=".jgp,.jpeg,.png"
                                    class="w-full outline-none bg-slate-50 text-base rounded-2xl text-slate-950 px-6 py-4 border border-gray-300 focus:ring-2 focus:ring-orange-700 resize-none">
                            </div>
                        </div>

                        <!-- Textearea Contexte à droite -->
                        <div class="flex flex-col">
                            <label for="context" class="text-orange-700 text-xl font-bold mb-2">Contexte :</label>
                            <textarea name="context" id="context" rows="12"
                                placeholder="Ajoutez un contexte ici..."
                                class="w-full outline-none rounded-2xl text-slate-950 px-6 py-4 text-lg border border-gray-300 focus:ring-2 focus:ring-orange-700 resize-none"></textarea>
                        </div>



                    </div>

                    <!-- Bouton d'enregistrement -->
                    <div class="flex justify-center mt-8">
                        <button class="bg-orange-700 font-extrabold text-xl px-6 py-3 rounded-full hover:bg-slate-50 hover:text-orange-700 hover:scale-105 transition-all duration-700">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
