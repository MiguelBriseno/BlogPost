@extends('template')

@section('content')

    <div class="bg-gray-800 px-4 py-10 rounded-lg mb-8 flex justify-between">
        <div>
            <span class="text-xs uppercase text-gray-700 bg-white rounded-full px-2 py-1">Programación</span>
            <h1 class="text-xl text-white mt-4" >Blog</h1>
            <p class="text-m text-gray-400 mt-2">Proyecto de desarrollo web para profesionales</p>
        </div>
        <div class="relative">
            <img src="{{ asset('images/dev.png') }}">
        </div>
    </div>

    <div class="px-4">
        <h1 class="text-2xl mb-8 text-gray-900">Contenido Técnico</h1>
        <br>

        <div class="grid grid-cols-1 gap-4 mb-4">
            @foreach($posts as $post)
                <a href="{{ route('post', $post->slug) }}" class="bg-gray-100 rounded-lg px-6 py-4">
                    <p class="text-xs flex items-center gap-2">
                        <span class="uppercase text-white bg-gray-500 rounded-full px-2 py-1">Tutorial</span>
                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                    </p>
                    <h2 class="text-lg text-gray-900 mt-2">{{ $post->title }}</h2>

                    <div class="text-xs text-gray-900 opacity-75 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        {{ $post->user->name }}
                    </div>
                </a>
            @endforeach
        </div>

        {{ $posts->links() }}
    </div>

@endsection