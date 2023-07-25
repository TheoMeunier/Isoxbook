<div>
    <x-modules.modal.modal-content>
        <x-slot name="title">
            <h3>{{ __('title.chapter.delete') }}</h3>
        </x-slot>

        <x-slot name="content">
            <p class="text-center dark:text-white">{{ __('modals.chapters.delete') }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-buttons.button-secondary wire:click.prevent="$emit('closeModal')">
                {{ __('button.action.close') }}
            </x-buttons.button-secondary>
            <x-buttons.buttons-danger wire:click.prevent="destroy()">
                {{ __('button.action.delete') }}
            </x-buttons.buttons-danger>
        </x-slot>
    </x-modules.modal.modal-content>
</div>

