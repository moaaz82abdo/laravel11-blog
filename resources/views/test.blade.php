HELLO TEST
@php $name='ahmed';
$books=['php','python','java','nextjs','flutter'] @endphp
{{$name}}
@foreach($books as $book)
<li>{{$book}}</li>

@endforeach

