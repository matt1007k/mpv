@php
switch ($color) {
case 'primary':
$classColor ='text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500';
break;
case 'danger':
$classColor ='text-white bg-red-600 hover:bg-red-700 focus:ring-red-500';
break;
default:
$classColor = 'text-black bg-gray-100 hover:bg-gray-200 focus:ring-gray-100';
break;
}

switch ($size) {
case 'large':
$classSize ='text-base px-6 py-3';
break;
case 'small':
$classSize ='text-sm px-4 py-2';
break;
default:
$classSize = 'text-base px-4 py-2';
break;
}
@endphp
<button {{ $attributes->merge(['type' => 'button']) }} class="inline-flex items-center {{ $classColor }}
    border border-transparent
    font-medium rounded-md
    shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $classSize }}">
    {{ $slot }}
</button>