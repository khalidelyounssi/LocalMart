@props(['href', 'icon', 'label', 'active' => false])

<a href="{{ $href }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ $active ? 'bg-blue-600 text-white shadow-md shadow-blue-200' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-900' }}">
    <i class="fa-solid {{ $icon }} text-lg"></i>
    <span class="font-medium">{{ $label }}</span>
</a>