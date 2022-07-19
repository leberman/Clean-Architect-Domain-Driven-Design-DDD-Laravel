@component('mail::message')
# {{ $object->title }} is a new post.

Thanks for create this post.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
