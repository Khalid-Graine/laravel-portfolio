@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex flex-col  ">
        <div class="overflow-x-auto ">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="">
                    <table class="min-w-full border text-center text-sm">
                        <thead class="border-b font-medium ">
                            <tr>
                                <th scope="col" class="border-r p-4 ">
                                    id
                                </th>
                                <th scope="col" class="border-r p-4 ">
                                    Blog  name
                                </th>
                                <th scope="col" class="border-r p-4 ">
                                    title
                                </th>
                                <th scope="col" class="border-r p-4 ">
                                    image
                                </th>
                                <th scope="col" class="border-r p-4 ">
                                    description
                                </th>
                                <th scope="col" class="border-r p-4 ">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $item)
                                <tr class="max-w-full border">
                                    <td class="whitespace-wrap border-r font-medium  p-4">
                                        {{ $item->id }}
                                    </td>
                                    <td class="whitespace-wrap border-r  p-4">

                                        @isset($item->category)
                                            {{ $item->category->blog_category_name }}
                                        @endisset
                                    </td>
                                    <td class="whitespace-wrap border-r   p-4">
                                        {{ $item->title }}
                                    </td>
                                    <td class=" whitespace-wrap border-r  p-4">
                                        <img src="{{ asset('' . $item->image) }}" class="w-10 h-10" alt="">

                                    </td>
                                    <td class="border-r   p-4 ">
                                        <div class=" overflow-y-auto overflow-x-hidden w-[300px]  max-h-20">
                                            <p class="w whitespace-pre-wrap">{{ $item->description }}</p>
                                        </div>
                                    </td>

                                    <td class="border-r p-4 flex flex-col gap-1">
                                        <a href="{{ route('blog.edit', $item) }}"
                                            class="w-20 py-2  rounded-sm bg-green-600">edit</a>
                                        <form action="{{ route('blog.delete', $item->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="w-20 py-2  rounded-sm bg-red-600">Delete</button>
                                        </form>


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
