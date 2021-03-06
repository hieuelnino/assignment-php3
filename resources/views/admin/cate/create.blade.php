@extends('admin.layouts.main')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="grid  place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
            <h1 class="text-xl font-semibold">Tạo danh mục mới </h1>
            <form class="mt-6" method="post" action="{{ route('danh-muc.store') }}" enctype="multipart/form-data">
                @csrf

                <label class="text-gray-600 font-light" for="name">Tên danh mục</label>
                <input type='text' placeholder="Enter your input here" name="name" value="{{ old('name') }}"
                    class="w-full mt-2 mb-6 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none " />
                @error('name')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <label class="block" for="desc">
                    <span class="text-gray-700">Logo</span>
                </label>
                <input type='file' placeholder="Enter your input here" name="logo"
                    class="w-full mt-2 mb-6 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none" />

                <button type="submit"
                    class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-blue-600 shadow-lg focus:outline-none hover:bg-blue-900 hover:shadow-none">
                    Create
                </button>
            </form>
        </div>
    </div>
@endsection
