<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-500 border
    border-transparent rounded-md font-semibold text-white hover:bg-blue-600 active:bg-blue-600 focus:outline-none
    focus:border-blue-600 focus:ring focus:ring-blue-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>