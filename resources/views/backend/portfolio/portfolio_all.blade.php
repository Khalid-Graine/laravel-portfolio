@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex flex-col w-11/12">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="border-r p-2 dark:border-neutral-500">
                                    id
                                </th>
                                <th scope="col" class="border-r p-2 dark:border-neutral-500">
                                    Name
                                </th>
                                <th scope="col" class="border-r p-2 dark:border-neutral-500">
                                    Title
                                </th>
                                <th scope="col" class="border-r p-2 dark:border-neutral-500">
                                    Image
                                </th>
                                <th scope="col" class="border-r p-2 dark:border-neutral-500">
                                    Description
                                </th>
                                <th scope="col" class="border-r p-2 dark:border-neutral-500">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Portfolios as $item)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap border-r font-medium dark:border-neutral-500 p-2">
                                        {{ $item->id }}
                                    </td>
                                    <td class="whitespace-nowrap border-r dark:borde  r-neutral-500 p-2">
                                        {{ $item->name }}
                                    </td>
                                    <td class="whitespace-nowrap border-r  dark:border-neutral-500 p-2 ">
                                        {{ $item->title }}
                                    </td>
                                    <td class="whitespace-nowrap border-r  dark:border-neutral-500 p-2 ">
                                        <img src="{{ asset('' . $item->image) }}"
                                            class=" w-10 h-10 rounded-sm  object-center bg-red-300" alt="">
                                    </td>
                                    <td class="border-r  dark:border-neutral-500 p-2">
                                        <div class="whitespace-pre-wrap  overflow-y-auto max-h-24">
                                            {{ $item->description }}
                                        </div>

                                    </td>
                                    <td class="">

                                        <div class="flex justify-center items-center gap-1">
                                            <form action="{{ route('portfolio.edit', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="w-20 py-2  rounded-sm bg-green-600">Edit</button>
                                            </form>
                                            <form action="{{ route('portfolio.destroy', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="w-20 py-2  rounded-sm bg-red-600">Delete</button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
