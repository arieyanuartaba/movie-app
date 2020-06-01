@extends('layouts.main')

@section('content')

    <div class="tvshow-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $tvDetail['poster_path']}}" alt="parasite" class="w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$tvDetail['name']}}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="ml-1">{{$tvDetail['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{$tvDetail['first_air_date']}}</span>
                    <span class="mx-2">|</span>
                    <span>
                            {{ $tvDetail['genres'] }}
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$tvDetail['overview']}}
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach ($tvCredits as $credit)
                        <div class="mt-4">
                            <a href="{{ route('actor.show', $credit['id']) }}">
                                <img src="{{ $credit['profile_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                            <a href="{{ route('actor.show', $credit['id']) }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                <strong>{{ $credit['name'] }}</strong> <br>
                                {{$credit['character']}}
                            </a>
                        </div>

                    @endforeach

                </div>

                <div x-data="{isOpen: false}">
                    @if(count($tvDetail['videos']['results']) > 0)
                    <div class="mt-12">
                        <button
                                @click="isOpen = true"
                                href="https://youtube.com/watch?v={{$tvDetail['videos']['results'][0]['key']}}" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration150" target="_blank">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                    </div>


                    <div
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            x-show.transition.opacity = "isOpen"
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                            @click="isOpen = false"
                                            @keydown.escape.window="isOpen = false"
                                            class="text-3xl leading-none hover:text-gray-300">&times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8" @click.away="isOpen = false">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $tvDetail['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($tvDetail['next_episode_to_air'] > 0)
    <div class="tvshow-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-semibold">Next Episode</h2>
            <div class="md:flex mt-4">
                <div class="md:flex-shrink-0">
                    <img class="rounded-lg md:w-56" src="{{$tvDetail['images_for_last_session']}}" alt="Woman paying for a purchase">
                </div>
                <div class="mt-4 md:mt-0 md:ml-6">
                    <div class="tracking-wide text-sm text-indigo-600 font-bold">
                        <div class="flex flex-cols">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="22px" height="20px" viewBox="0 0 1140 1038.968" enable-background="new 0 0 1140 1038.968" xml:space="preserve">
                                    <path fill="#F9F7F7" d="M970.14,163.351H877.8v-51.3c0-21.66-18.24-39.9-39.9-39.9h-57c-21.66,0-39.9,18.24-39.9,39.9v51.3H402.42
                                        v-51.3c0-21.66-18.24-39.9-39.9-39.9h-57c-21.66,0-39.9,18.24-39.9,39.9v51.3h-96.9c-38.76,0-70.68,31.92-70.68,70.68v637.26
                                        c0,38.76,31.92,70.68,70.68,70.68h801.42c38.76,0,70.68-31.92,70.68-70.68v-637.26C1040.82,195.271,1008.9,163.351,970.14,163.351z
                                         M783.18,115.471h52.44v69.54v55.86h-52.44v-55.86V115.471z M307.8,115.471h52.44v69.54v55.86H307.8v-55.86V115.471z
                                         M169.86,205.531h96.9v37.62c0,21.66,18.24,39.9,39.9,39.9h57c21.66,0,39.9-18.24,39.9-39.9v-37.62H741v37.62
                                        c0,21.66,18.24,39.9,39.9,39.9h57c21.66,0,39.9-18.24,39.9-39.9v-37.62h93.48c15.96,0,28.5,12.54,28.5,28.5v114H141.36v-114
                                        C141.36,218.071,153.9,205.531,169.86,205.531z M970.14,899.791H169.86c-15.96,0-28.5-12.54-28.5-28.5v-481.08h857.28v481.08
                                        C998.64,887.251,986.1,899.791,970.14,899.791z M327.18,505.351c0,11.4-9.12,20.52-20.52,20.52h-68.4
                                        c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4C318.06,483.691,327.18,493.951,327.18,505.351z M524.4,505.351
                                        c0,11.4-9.12,20.52-20.52,20.52h-68.4c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4
                                        C514.14,483.691,524.4,493.951,524.4,505.351z M720.48,505.351c0,11.4-9.12,20.52-20.52,20.52h-68.4c-11.4,0-20.52-9.12-20.52-20.52
                                        c0-11.4,9.12-20.52,20.52-20.52h68.4C711.36,483.691,720.48,493.951,720.48,505.351z M917.7,505.351c0,11.4-9.12,20.52-20.52,20.52
                                        h-68.4c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4C908.58,483.691,917.7,493.951,917.7,505.351z
                                         M327.18,645.571c0,11.4-9.12,20.52-20.52,20.52h-68.4c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4
                                        C318.06,625.051,327.18,634.171,327.18,645.571z M524.4,645.571c0,11.4-9.12,20.52-20.52,20.52h-68.4
                                        c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4C514.14,625.051,524.4,634.171,524.4,645.571z M720.48,645.571
                                        c0,11.4-9.12,20.52-20.52,20.52h-68.4c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4
                                        C711.36,625.051,720.48,634.171,720.48,645.571z M917.7,645.571c0,11.4-9.12,20.52-20.52,20.52h-68.4
                                        c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4C908.58,625.051,917.7,634.171,917.7,645.571z M327.18,786.931
                                        c0,11.4-9.12,20.52-20.52,20.52h-68.4c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4
                                        C318.06,765.271,327.18,774.391,327.18,786.931z M524.4,786.931c0,11.4-9.12,20.52-20.52,20.52h-68.4
                                        c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4C514.14,765.271,524.4,774.391,524.4,786.931z M720.48,786.931
                                        c0,11.4-9.12,20.52-20.52,20.52h-68.4c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4
                                        C711.36,765.271,720.48,774.391,720.48,786.931z M917.7,786.931c0,11.4-9.12,20.52-20.52,20.52h-68.4
                                        c-11.4,0-20.52-9.12-20.52-20.52c0-11.4,9.12-20.52,20.52-20.52h68.4C908.58,765.271,917.7,774.391,917.7,786.931z"/>
                            </svg>
                            <div class="ml-2 text-sm leading-normal block text-gray-400">{{$tvDetail['air_date_for_last_session']}}</div>
                        </div>

                        <div href="#" class="block mt-1 text-md leading-normal block text-gray-400  mt-1">{{$tvDetail['name_for_last_session']}}</div>
                    <p class="mt-2 text-gray-600">{{$tvDetail['overview_for_last_session']}}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif

    <div class="tvDetail-images border-b border-gray-800" x-data="{isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl text-semibold">Images</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($tvDetail['images'] as $image)
                    <div class="mt-8">
                        <a
                                @click.prevent="
                                    isOpen = true
                                    image='{{'https://image.tmdb.org/t/p/original/'. $image['file_path']}}'
                                "
                                href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w500/'. $image['file_path']}}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>
            <div
                    style="background-color: rgba(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    x-show.transition.opacity = "isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                    @click="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8" @click.away="isOpen = false">
                            <img :src="image" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection