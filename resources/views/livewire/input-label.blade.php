<div>
    <div class='input_label_div'>

        @if (!$this->validateField())
            <div class="error" v-if="!validateField(fieldName, text)">
                {{ $message }}
            </div>
        @else
        @endif
        <label class='input_label'>{{ $labelText }}</label>
        <input class='input_input' wire:input="connect" wire:model="inputValue" />

    </div>
</div>
    <style>
        .input_label_div {
            display: inline-block;
            margin-bottom: 8px;
        }

        .input_input {
            width: 250px;
            text-align: start;
            border-radius: 7px;
            border: 1px solid rgba(88, 88, 88, 0.514);
        }

        .input_label {
            color: #585d59;
            width: 130px;
        }

        .error {
            color: red;
            font-weight: 10px;
            font-size: 10px;
            margin-bottom: -5px;
            border: 1px solid red;
            width: fit-content;
            border-radius: 2px 5px;
            font-size: 7px;
            background-color: rgba(255, 0, 0, 0.096);
            padding-left: 1px;
            padding-right: 1px;
        }

    </style>
