@extends('admin.layouts.main')
@section('title')Bài viết
@endsection
@section('content')
    <div class="my-3 w-1/4">
        <form action="" method="get">

            <div class="flex items-center mt-2 mb-6">
                <svg class="w-4 h-4 fill-current text-gray-500 ml-4 z-10" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="black">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg>
                <input type='text' placeholder="Search Blog Title..." name="keyword" value="{{ $keyword }}"
                    class="w-full -ml-8 pl-10 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" />
            </div>
        </form>
    </div>
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/12 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Category</th>

                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Image</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Short_desc</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Author</th>
                <th class="w-1/4"><a href="{{ route('bai-viet.create') }}"
                        class=" bg-blue-600 text-white px-2 py-1 cursor-pointer">Thêm mới</a></th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($blogs as $blog)
                <tr>
                    <td class="w-1/12 text-left py-3 px-4">{{ $blog->id }}</td>
                    <td class="w-1/4 text-left py-3 px-4">{{ $blog->title }}</td>
                    <td class="w-1/4 text-left py-3 px-4">{{ $blog->cate->name }}</td>

                    <td class="w-1/4 text-left py-3 px-4">
                        <img class="w-1/2" src="{{ asset('storage/images/bai-viet/' . $blog->image) }}" alt="image">
                    </td>
                    <td class="w-1/4 text-left py-3 px-4">{{ $blog->short_desc }}</td>
                    <td class="w-1/4 text-left py-3 px-4">{{ $blog->user->name }}</td>
                    <td class="w-1/4 text-center py-3 px-4">
                        <a class="bg-green-600 px-2 py-1 text-white"
                            href="{{ route('bai-viet.edit', ['id' => $blog->id]) }}">Edit</a>
                        <a class="bg-red-600 px-2 py-1 text-white" href="#"
                            onclick="event.preventDefault();document.getElementById('destroyform{{ $blog->id }}').submit()">{{ __('DELETE') }}</a>
                        <form style="display: none" action="{{ route('bai-viet.destroy', $blog->id) }}"
                            id="destroyform{{ $blog->id }}" method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3"> {{ $blogs->links() }}</div>
@endsection
