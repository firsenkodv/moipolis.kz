@props([
     'id'   =>  '',
     'name'   =>  '',
])
@once

        <script src="https://cdn.tiny.cloud/1/jx29ond1uxjntozqlorl9v2t8ztcltd76o4apnu23mykv1ns/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


     {{--   <script src="https://cdn.tiny.cloud/1/no-origin/tinymce/6.8.2-45/tinymce.min.js" referrerpolicy="origin"></script>--}}


        <script>
            tinymce.init({
                selector: '.textarea',
                height: 400,
                plugins: "advlist  anchor   autoresize autosave   code    directionality     image    link linkchecker lists         preview quickbars save searchreplace table   tinydrive  ",
                toolbar: 'undo redo | styles | bold italic | ',
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            });
        </script>

@endonce

<textarea

    id="{{$id}}"
    name="{{$name}}"
    class="textarea"

>{{ $slot  }}</textarea>




