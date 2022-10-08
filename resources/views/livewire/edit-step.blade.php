<div>
    <div class="flex justify-center px-4 py-4">
        <h2 class="text-lg pb-4">Edit step for Task</h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer"></span>
    </div>
    @foreach ($steps as $k => $step)
        <div class="flex justify-center py-2" wire:key="{{ $loop->index }}">
            <input type="text" name="stepName[]" placeholder="Describe step {{ $loop->index+1 }}" class="py-1 px-2 border rounded" value="{{ $step['name'] ?? '' }}">
            <input type="hidden" name="stepId[]" value="{{ $step['id'] ?? '' }}">
            <span class="fas fa-times text-red-400 p-2 cursor-pointer" wire:click="remove({{$loop->index}})"></span>
        </div>
    @endforeach
</div>
