@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(
    ['class' => 'mt-5 mb-5 min-w-full border-indigo-400 focus:border-indigo-300 focus:ring
     focus:ring-indigo-200 focus:ring-opacity-50 foculs:text-green-500 rounded-md shadow-sm h-9 px-2']) !!}>
