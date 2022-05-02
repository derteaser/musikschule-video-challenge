<div>
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <ul class="divide-y">
                @foreach($roles as $role)
                    <li class="py-2 flex flex-row justify-between items-center">
                        {{ $role->name }}
                        <div class="flex items-center space-x-1">
                            @foreach($role->permissions as $permission)
                                <x-badge>{{ $permission->name }}</x-badge>
                            @endforeach
                        </div>
                        <div>
                            <x-icon-link :title="__('Edit')" href="{{ route('dashboard-role', ['role' => $role]) }}">
                                <x-heroicon-o-pencil class="w-5 h-5" />
                            </x-icon-link>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <x-jet-action-message class="mr-3 text-green-800" on="roleCreated">
                {{ __('Added.') }}
            </x-jet-action-message>
            <x-jet-button wire:click="$toggle('creatingRole')" wire:loading.attr="disabled">
                {{ __('Create Role') }}
            </x-jet-button>
        </div>
    </div>
    <!-- Add Permission Modal -->
    <x-jet-dialog-modal wire:model="creatingRole">
        <x-slot name="title">
            {{ __('Create Role') }}
        </x-slot>

        <x-slot name="content">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
            <x-jet-input-error for="name" class="mt-2" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="ml-2" wire:click="createRole" wire:loading.attr="disabled">
                {{ __('Create Role') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
