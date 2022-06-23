@props(['type', 'name', 'id', 'label'])
<div class="w-full">
    <label for="{{ $name }}" class="block mb-4 text-gray-400">{{ $label }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full text-white border-gray-600 rounded-md bg-zinc-700']) }}>
    @error($name)
        <span class="p-1 text-red-500 ">{{ $message }}</span>
    @enderror
</div>
