@props([
    'type' => 'button',
    'bg' => '[var(--primary)]',
    'label' => 'Button',
    'px' => '3',
    'py' => '2',
])

<button 
    {{ $attributes->merge([
        'type' => $type,
        'class' => "text-white bg-$bg hover:brightness-90 font-medium rounded-lg text-sm w-full sm:w-auto px-$px py-$py text-center hover:cursor-pointer hover:scale-102 transition-transform duration-200",
    ]) }}>
    {!! $label !!}
</button>
