<div class="col mb-3">
    <div class="box">
        <label class="form-label">{{ $labelName }}</label>
        <div class="input-group mb-1">
            <input type="text" wire:model="{{ $wireName }}" name="{{ $name }}" class="form-control" placeholder="{{ $placeHolder }}">
        </div>
        @error($errorMsg)
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>
