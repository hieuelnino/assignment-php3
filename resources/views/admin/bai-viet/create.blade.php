@extends('admin.layouts.main')
@section('title')
    Create Blog
@endsection
@section('content')
    <div class="grid  place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-11/12 md:w-11/12 lg:w-11/12">
            <h1 class="text-xl font-semibold">Tạo blog mới </h1>
            <form class="mt-6" method="post" action="{{ route('bai-viet.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <label class="text-gray-600 font-light" for="name">Tiêu đề bài viết</label>
                <input type='text' placeholder="Enter your input here" name="title" value="{{ old('title') }}"
                    class="w-full mt-2 mb-6 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none " />
                @error('title')
                    <div class="text-red-500 text-sm mb-2">
                        {{ $message }}
                    </div>

                @enderror
                <label class="block" for="desc">
                    <span class="text-gray-700">Danh mục</span>
                </label>

                <select name="cate_id"
                    class="w-full mt-2 mb-6 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-">
                    @foreach ($cates as $cate)
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
                <label class="block" for="desc">
                    <span class="text-gray-700">Miêu tả</span>
                </label>
                <textarea name="short_desc"
                    class="w-full mt-2 mb-6 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-">{{ old('short_desc') }}</textarea>
                <label class="block" for="desc">
                    @error('short_desc')
                        <div class="text-red-500 text-sm mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <span class="text-gray-700">Ảnh nền</span>
                </label>
                <input type='file' placeholder="Enter your input here" name="image"
                    class="w-full mt-2 mb-6 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none" />
                @error('image')
                    <div class="text-red-500 text-sm mb-2">
                        {{ $message }}
                    </div>

                @enderror
                <label class="block" for="desc">
                    <span class="text-gray-700">Nội dung</span>
                </label>
                <textarea name="content" class="form-control my-editor"></textarea>
                @error('content')
                    <div class="text-red-500 text-sm mb-2">
                        {{ $message }}
                    </div>

                @enderror
                <button type="submit"
                    class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-blue-600 shadow-lg focus:outline-none hover:bg-blue-900 hover:shadow-none">
                    Create
                </button>
            </form>
        </div>
    </div>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: 'textarea.my-editor',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);

    </script>

@endsection
