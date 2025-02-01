<h1>This is the index page</h1>
<p>My name is {{$name}} {{$surname}}</p>
<p>{!!$job!!}</p>
<p>Year: {{$year}}</p>
<p>{{date('Y')}}</p>
<p>{{strtoupper($name .' '. $surname)}}</p>
<p>{{Illuminate\Support\Str::after("Hello world", "Hello ")}}</p>
<p>{{PHP_VERSION}}</p>
@{{name}}  // used if we are using vue.js in blade files considers these text as plain text rather than variable
@@for
@verbatim   // used to avoid typing @ in each line
<div>
    {{name}}
    {{job}}
    {{hobbies}}
</div>
@endverbatim

<!-- <script>
    const hobbies = {{ \Illuminate\Support\Js::from($hobbies) }};
</script> -->

<!-- Shows the comment in inspect -->
{{-- Hides the comment in inspect --}}

@if (count($hobbies) > 1)
This will be displayed
@elseif (count($hobbies) == 1)
Hobby is 1
@else
This wont be displayed
@endif

{{-- reverse of if    --}}
@unless (false)
This will be printed   
@endunless

{{-- variable exists or not --}}
@isset($cars)
    <p>The car variable exists</p>
@endisset

@empty($cars)
    <p>To check if the car varible is empty or not</p>
@endempty

@switch($hobbies)
    @case(count($hobbies) == 0)
        <p>There is no car</p>
        @break
    @case(count($hobbies) > 0)
        <p>There are cars</p>
        @break
    @default
        <p>There is one car</p>
@endswitch

@for ($i = 0; $i < 5; $i++)
    <p> {{$i + 1}}
@endfor

@foreach ($hobbies as $hobbey)
    {{-- {{dd($loop)}} --}}
    <p>Name: {{$hobbey}}</p>
@endforeach

@foreach ([1, 2, 3, 4, 5] as $n)
    @continue($n == 2)
    <p>{{$n}}</p>
    @break($n == 3)
@endforeach


{{-- To apply css classes if certain conditions are met --}}
<div @class(['my-css-class', 'georgia' => $country === 'ge'])
    @style([
        'color:green', 'background-color:cyan' => $country === 'ge'
    ])>   
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi quia illo voluptates incidunt libero molestias necessitatibus eum delectus maxime soluta! Voluptas necessitatibus illum in mollitia nam perferendis minima quidem expedita!
</div>

@include('shared.button', ['color' => 'yellow', 'text' => 'submit'])

{{-- doesn't include the file if it doesnt exist also doesnt show any error if file doesnt exist --}}
@includeIf('view.name', ['some' => 'data'])  

@php
    $cars = [1, 2, 3, 4, 5];
@endphp

{{-- iterate over the $cars array and include a specific view for each item. view.empty file is a fallback file
if cars array is empty --}}
@each('car.view', $cars, 'car', 'view.empty')

