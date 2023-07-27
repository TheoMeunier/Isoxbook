<x-app-layout>
    <x-slot name="header">
        <div class="h-50 py-9 flex items-center">
            <div>
                <form id="form__avatar" class="profil-header__avatar" enctype="multipart/form-data" method="post">
                    <div id="wrapper__avatar_img" class="flex w-full h-full">
                        @if(auth()->user()->avatar)
                            <img src="{{ Storage::url(auth()->user()->avatar ?? '') }}" class="object-contain" alt="">
                        @else
                            <x-icons.icon-user class="text-white p-5 profil-header__svg"/>
                        @endif
                    </div>
                    <div class="profil-header__upload">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    </div>
                    <input type="file" name="avatar">
                </form>
            </div>
            <div class="ml-4">
                <h2 class="font-semibold">{{ auth()->user()->name }}</h2>
                <p class="text-gray-800 mt-2">utilisateur depuis : {{ auth()->user()->created_at->diffForHumans(null, true) }}</p>
            </div>
        </div>
        <div class="font-semibold text-3xl text-gray-800 leading-tight">
            <div class="border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <a href="{{ route('profile.index') }}" class="inline-block text-gray-500 hover:text-indigo-600 hover:border-indigo-300 hover:border-b-2 rounded-t-lg py-4 px-4 text-sm font-medium text-center flex items-center gap-2 @if(request()->routeIs('profile.index')) text-indigo-600 border-indigo-300 border-b-2 @endif" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile_index" aria-selected="false">
                            <i class="fa-solid fa-user mr-2"></i>
                            {{ __('tab.profile.index') }}
                        </a>
                    </li>
                    <li class="mr-2" role="presentation">
                        <a href="{{ route('profile.edit') }}" class="inline-block text-gray-500 hover:text-indigo-600 hover:border-indigo-300 hover:border-b-2 rounded-t-lg py-4 px-4 text-sm font-medium text-center flex items-center gap-2 @if(request()->routeIs('profile.edit')) text-indigo-600 border-indigo-300 border-b-2 @endif" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="profile_edit" aria-selected="true">
                            <i class="fa-solid fa-pen mr-2"></i>
                            {{ __('tab.profile.edit') }}
                        </a>
                    </li>
                    <li class="mr-2" role="presentation">
                        <a href="{{ route('profile.actions') }}" class="inline-block text-gray-500 hover:text-indigo-600 hover:border-indigo-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center hover:border-b-2 flex items-center gap-2 @if(request()->routeIs('profile.actions')) text-indigo-600 border-indigo-300 border-b-2 @endif" data-tabs-target="#settings" type="button" role="tab" aria-controls=" " aria-selected="false">
                            <i class="fa-solid fa-box-archive mr-2"></i>
                            {{ __('tab.profile.action') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </x-slot>

    {{ $slot }}

</x-app-layout>
