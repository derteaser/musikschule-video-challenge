<div>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <ul class="divide-y">
                @foreach($permissions as $permission)
                    <li class="py-2">{{ $permission->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <x-jet-action-message class="mr-3 text-green-800" on="permissionCreated">
                {{ __('Added.') }}
            </x-jet-action-message>
            <x-jet-button wire:click="$toggle('creatingPermission')" wire:loading.attr="disabled">
                {{ __('Create Permission') }}
            </x-jet-button>
        </div>
    </div>
    <!-- Add Permission Modal -->
    <x-jet-dialog-modal wire:model="creatingPermission">
        <x-slot name="title">
            {{ __('Create Permission') }}
        </x-slot>

        <x-slot name="content">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
            <x-jet-input-error for="name" class="mt-2" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="ml-2" wire:click="createPermission" wire:loading.attr="disabled">
                {{ __('Create Permission') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
