<x-jet-action-section>
    <x-slot name="title">
        {{ __('Roles') }}
    </x-slot>

    <x-slot name="description">

    </x-slot>

    <x-slot name="content">
        <ul class="divide-y">
            @foreach($roles as $role)
                <li class="py-2 flex flex-row justify-between items-center">
                    {{ $role->name }}
                    <div>
                        @if($user->hasRole($role))
                            <x-icon-link href="#" :title="__('Remove')" wire:click="removeRole({{ $role }})">
                                <x-heroicon-o-minus class="w-5 h-5 group-hover:text-red-600"/>
                            </x-icon-link>
                        @else
                            <x-icon-link href="#" :title="__('Add')" wire:click="assignRole({{ $role }})">
                                <x-heroicon-o-plus class="w-5 h-5 group-hover:text-green-600"/>
                            </x-icon-link>
                        @endif
                    </div>
                </li>

            @endforeach
        </ul>
    </x-slot>
</x-jet-action-section>
