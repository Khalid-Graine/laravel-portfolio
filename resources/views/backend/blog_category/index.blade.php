@extends('backend.admin_dashboard')
@section('admin')
    <div class="flex flex-col w-9/12">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full border text-center text-sm">
                        <thead class="border-b font-medium ">
                            <tr>
                                <th scope="col" class="border-r p-2 ">
                                    id
                                </th>
                                <th scope="col" class="border-r p-2 ">
                                    Blog Category name
                                </th>
                                <th scope="col" class="border-r p-2 ">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogCategories as $item)
                                <tr class="border-b ">
                                    <td class="whitespace-nowrap border-r font-medium  p-2">
                                        {{ $item->id }}
                                    </td>
                                    <td class="whitespace-nowrap border-r  p-2">
                                        {{ $item->blog_category_name }}
                                    </td>

                                    <td class="">
                                        <div class="flex justify-center items-center gap-1">
                                            <form action="{{ route('blog.category.edit', $item->id) }}" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="w-20 py-2  rounded-sm bg-green-600">Edit</button>
                                            </form>

                                            <form action="{{ route('blog.category.destroy', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="w-20 py-2  rounded-sm bg-red-600">Delete</button>
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
