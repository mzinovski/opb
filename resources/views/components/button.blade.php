<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-bold text-lg text-white normal-case inline-block min-h-[42px] lg:min-h-[52px] py-1.5 lg:py-3 px-5 bg-colormain transition-all hover:bg-colormain/70 rounded-md']) }}>
    {{ $slot }}
</button>
