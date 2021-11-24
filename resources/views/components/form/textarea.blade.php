@props(['disabled' => false])
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->class(['border-gray-300 focus:border-indigo-300
focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-base' , 'border-red-500' =>
$errors->has($attributes->get('name'))]) !!}>{{ $slot }}</textarea>