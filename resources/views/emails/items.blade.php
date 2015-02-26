Here are all your todo items. Enjoy!

@foreach($items as $item)
    <p>{{ $item['title'] }}</p>

    @if($item['completed'])
        <p>Completed</p>
    @else
        <p>Not completed</p>
    @endif
@endforeach
