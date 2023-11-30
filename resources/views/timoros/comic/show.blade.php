<main class="flex flex-col items-center py-32 h-screen">
    @include('components.layouts.partials.admin.user-logout')
    <section class="w-4/5 mx-auto flex-1">
        <table class="w-full table-fixed my-10 mx-auto border-separate border-spacing-y-1 border-spacing-x-3
                   lg:border-spacing-y-4 lg:border-spacing-x-4 text-center text-white drop-shadow-3xl">
            <thead>
                <tr class="uppercase lg:hidden">
                    <th class="border border-gray-300 rounded w-6">{!! __('showAll.id') !!}</th>
                    <th class="border border-gray-300 rounded w-28">{!! __('showAll.title') !!}</th>
                    <th class="border border-gray-300 rounded w-28">{!! __('showAll.operation') !!}</th>
                </tr>
                <tr class="hidden uppercase lg:table-row">
                    <th class="border border-gray-300 rounded w-6">{!! __('showAll.id') !!}</th>
                    <th class="border border-gray-300 rounded w-28">{!! __('showAll.title') !!}</th>
                    <th class="border border-gray-300 rounded w-28">{!! __('showAll.perTitle') !!}</th>
                    <th class="border border-gray-300 rounded w-6">{!! __('showAll.pages') !!}</th>
                    <th class="border border-gray-300 rounded w-28">{!! __('showAll.uploaded') !!}</th>
                    <th class="border border-gray-300 rounded w-28">{!! __('showAll.updated') !!}</th>
                    <th class="border border-gray-300 rounded w-10">{!! __('showAll.operation') !!}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($titles as $title)
                    <tr class="lg:hidden">
                        <td class="border border-gray-300 rounded">{{ $title->id }}</td>
                        <td class="border border-gray-300 rounded truncate">{{ $title->title }}</td>
                        <td class="border border-gray-300 rounded flex flex-col items-center">
                    <span onclick="dropMenu('item_actions_list{!! $title->id !!}')" class="rounded-md py-1 px-4 capitalize border-[1px] bg-gray-100 border-gray-400
                                 hover:cursor-pointer hover:bg-gray-200 text-sm text-black">
                            Operation <i class="fa-solid fa-angle-down"></i>
                    </span>
                            <div id="item_actions_list{!! $title->id !!}"
                                 class="hidden w-fit absolute bg-gray-100 mt-9 border-[1px] border-gray-400 rounded
                                        flex flex-col justify-center items-center divide-y divide-gray-500 text-black">
                                <span class="capitalize px-8 py-1"><a href="{{ route('admin.comic.edit-page', [
                                                                            'key' => $title->id,
                                                                        ]) }}" wire:navigate>Edit</a></span>
                                <span class="capitalize px-8 py-1 hover:cursor-pointer" wire:click="delete({!! $title->id !!})">Delete</span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{!! __('showAll.noComics') !!}</td>
                    </tr>
                @endforelse
                @forelse($titles as $title)
                    <tr class="hidden lg:table-row">
                        <td class="border border-gray-300 rounded">{{ $title->id }}</td>
                        <td class="border border-gray-300 rounded truncate">{{ $title->title }}</td>
                        <td class="border border-gray-300 rounded truncate">{{ $title->per_title }}</td>
                        <td class="border border-gray-300 rounded">{{ array_key_exists($title->id, $pages) ? $pages[$title->id] : 0}}</td>
                        <td class="border border-gray-300 rounded">{!! $title->created_at !!}</td>
                        <td class="border border-gray-300 rounded">{!! $title->updated_at !!}</td>
                        <td class="border border-gray-300 rounded flex flex-col items-center">
                            <span onclick="dropMenu('item_actions_list0{!! $title->id !!}')" class="rounded-md py-1 px-4 capitalize border-[1px] bg-gray-100 border-gray-400
                                         hover:cursor-pointer hover:bg-gray-200 text-sm text-black">
                                    {!! __('showAll.operation') !!} <i class="fa-solid fa-angle-down"></i>
                            </span>
                            <div id="item_actions_list0{!! $title->id !!}"
                                 class="hidden w-fit absolute bg-gray-100 mt-9 border-[1px] border-gray-400 rounded
                                        divide-y divide-gray-500 text-black">
                                <span class="block px-8 py-1"><a href="{{ route('admin.comic.edit-page', [
                                                                            'key' => $title->id,
                                                                        ]) }}" wire:navigate>{!! __('showAll.opEdit') !!}</a></span>
                                <span class="block px-8 py-1 hover:cursor-pointer" wire:click="delete({!! $title->id !!})">{!! __('showAll.opDel') !!}</span>
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
                    <td colspan="7">{!! $titles->links() !!}</td>
                </tr>
            </tfoot>
        </table>
    </section>
</main>
<script src="{{asset('js/raw.js')}}"></script>
