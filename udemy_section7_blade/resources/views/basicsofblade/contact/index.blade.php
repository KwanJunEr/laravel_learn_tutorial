<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

{{-- @php
    $title = "Contact Page"
@endphp --}}

<body>
    <h2>{{ "Contact Page!" }} </h2>
    <h3> {{ $title }} </h3>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident rem eligendi quidem, ad asperiores nemo!
    <h4>Passed Description </h4>
    {{ $description }}
    <ul>
        @foreach($books as $book)
            <li>{{ $book }} </li>
        @endforeach
    </ul>

    <h5>Using For loops </h5>
    <ul>
    @for($i = 0; $i < count($books); $i++)
        <li>{{ $books[$i] }};
    @endfor
    </ul>
</body>
</html>

{{-- 
@if()

@elseif()
@endif 

@for()  

@endfor

@foreach()

@endforeach

--}}
