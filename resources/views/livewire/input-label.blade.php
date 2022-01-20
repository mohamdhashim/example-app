<div>
    <div class='input_label_div'>

        @if (!$this->validateField())
            <div class="error" v-if="!validateField(fieldName, text)">
                {{ $message }}
            </div>
        @else
        @endif
        <label class='input_label'>{{ $labelText }}</label>

        @if ($fieldName == 'email')
            <input class='input_input' disabled wire:input="connect" wire:model="inputValue">
        @else
            <input class='input_input' wire:input="connect" wire:model="inputValue">

        @endif

    </div>
</div>
