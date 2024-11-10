<th wire:click="setSortBy('{{ $name }}')" class="px-4 py-3 noselect">
    {{ $displayName }}
    <button class="flex items-center"
            style="background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;">

    @if ($sortBy !== $name)
    <div>
        <i class="bx bx-chevron-up w-4 h-4" style="display: block; height: 5px"></i>
        <i class="bx bx-chevron-down w-4 h-4" style="display: block; height: 7px"></i>
    </div>
    @elseif ($sortDir === 'ASC')
    <i class="bx bx-chevron-up ml-1 w-4 h-4"></i>
    @else
    <i class="bx bx-chevron-down ml-1 w-4 h-4"></i>
    @endif
    </button>
</th>
