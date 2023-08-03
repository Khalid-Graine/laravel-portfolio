@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex flex-col w-11/12">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full border text-center text-sm font-light ">
                        <thead class="border-b font-medium ">
                            <tr>
                                <th scope="col" class="border p-2 ">
                                    id
                                </th>
                                <th scope="col" class="border p-2 ">
                                    Title
                                </th>
                                <th scope="col" class="border p-2 ">
                                    Image
                                </th>
                                <th scope="col" class="border p-2 ">
                                    Description
                                </th>
                                <th scope="col" class="border p-2 ">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Services as $item)
                                <tr class=" p-2 border borde-black ">
                                    <td class="">
                                        {{ $item->id }}
                                    </td>

                                    <td class="p-2 border borde-black">
                                        {{ $item->title }}
                                    </td>
                                    <td class="p-2 border borde-black">
                                        <img src="{{ asset('' . $item->image) }}"
                                            class="w-10 h-10 rounded-sm  object-center bg-red-300" alt="">
                                    </td>
                                    <td class="p-2 border borde-black">
                                        <div class=" whitespace-pre-wrap overflow-y-auto max-h-16">
                                            {{ $item->description }}
                                        </div>
                                    </td>
                                    <td class="p-2 border borde-black">
                                        <div class="flex flex-col justify-center items-center gap-1">
                                            <form action="{{ route('service.edit', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="w-20 py-2  rounded-sm bg-green-600">Edit</button>
                                            </form>
                                            <form action="{{ route('service.destroy', $item->id) }}" method="post">
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
