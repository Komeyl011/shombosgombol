<main class="flex flex-col items-center py-32 h-screen">
    <section class="w-4/5 mx-auto flex-1">
        <table class="w-full table-auto my-10 mx-auto border-separate border-spacing-y-1 border-spacing-x-3
                   lg:border-spacing-y-4 lg:border-spacing-x-4 text-center text-white drop-shadow-3xl">
            <thead>
            <tr class="uppercase lg:hidden">
                <th class="border border-gray-300 rounded w-6">{!! __('usersTable.id') !!}</th>
                <th class="border border-gray-300 rounded w-28">{!! __('usersTable.username') !!}</th>
                <th class="border border-gray-300 rounded w-28">{!! __('usersTable.operation') !!}</th>
            </tr>
            <tr class="hidden uppercase lg:table-row">
                <th class="border border-gray-300 rounded">{!! __('usersTable.id') !!}</th>
                <th class="border border-gray-300 rounded">{!! __('usersTable.username') !!}</th>
                <th class="border border-gray-300 rounded">{!! __('usersTable.email') !!}</th>
                <th class="border border-gray-300 rounded">{!! __('usersTable.created') !!}</th>
                <th class="border border-gray-300 rounded">{!! __('usersTable.updated') !!}</th>
                <th class="border border-gray-300 rounded">{!! __('usersTable.operation') !!}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr class="lg:hidden">
                    <td class="border border-gray-300 rounded">{{ $user->id }}</td>
                    <td class="border border-gray-300 rounded">{{ $user->username }}</td>
                    <td class="border border-gray-300 rounded flex flex-col items-center">
                    <span onclick="dropMenu('item_actions_list{!! $user->id !!}')" class="rounded-md py-1 px-4 capitalize border-[1px] bg-gray-100 border-gray-400
                                 hover:cursor-pointer hover:bg-gray-200 text-sm text-black">
                            Operation <i class="fa-solid fa-angle-down"></i>
                    </span>
                        <div id="item_actions_list{!! $user->id !!}"
                             class="hidden w-fit absolute bg-gray-100 mt-9 border-[1px] border-gray-400 rounded
                                        flex flex-col justify-center items-center divide-y divide-gray-500 text-black">
                                <span class="capitalize px-8 py-1"><a href="{{ route('admin.users.edit-user', [
                                                                            'key' => $user->id,
                                                                        ]) }}" wire:navigate>Edit</a></span>
                            <span class="capitalize px-8 py-1 hover:cursor-pointer" wire:click="delete({!! $user->id !!})">Delete</span>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">{!! __('showAll.noComics') !!}</td>
                </tr>
            @endforelse
            @forelse($users as $user)
                <tr class="hidden lg:table-row">
                    <td class="border border-gray-300 rounded">{{ $user->id }}</td>
                    <td class="border border-gray-300 rounded">{{ $user->username }}</td>
                    <td class="border border-gray-300 rounded">{{ $user->email }}</td>
                    <td class="border border-gray-300 rounded">{{ $user->created_at }}</td>
                    <td class="border border-gray-300 rounded">{{ $user->updated_at }}</td>
                    <td class="border border-gray-300 rounded flex flex-col items-center">
                            <span onclick="dropMenu('item_actions_list0{!! $user->id !!}')" class="rounded-md py-1 px-4 capitalize border-[1px] bg-gray-100 border-gray-400
                                         hover:cursor-pointer hover:bg-gray-200 text-sm text-black">
                                    {!! __('showAll.operation') !!} <i class="fa-solid fa-angle-down"></i>
                            </span>
                        <div id="item_actions_list0{!! $user->id !!}"
                             class="hidden w-fit absolute bg-gray-100 mt-9 border-[1px] border-gray-400 rounded
                                        divide-y divide-gray-500 text-black">
                                <span class="block px-8 py-1"><a href="{{ route('admin.users.edit-user', [
                                                                            'key' => $user->id,
                                                                        ]) }}" wire:navigate>{!! __('showAll.opEdit') !!}</a></span>
                            <span class="block px-8 py-1 hover:cursor-pointer" wire:click="deleteUser({!! $user->id !!})">{!! __('showAll.opDel') !!}</span>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">{!! __('showAll.noComics') !!}</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr></tr>
            <tr>
                <td colspan="7">{!! $users->links() !!}</td>
            </tr>
            </tfoot>
        </table>
    </section>
</main>
<script src="{{asset('js/raw.js')}}"></script>
