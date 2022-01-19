<div class="form">
    <form class="newAddressForm" wire:submit.prevent="handleSubmit">

        <livewire:input-label labelText="Building" message="* enter a vaild value" fieldName="building" />

        <livewire:input-label labelText="Apartment" fieldName="apartment" message="* enter a vaild value" />

        <livewire:input-label labelText="Floor" fieldName="floor"
            message="* enter a vaild integer in range [-2 : 180]" />

        <livewire:input-label labelText="Street" fieldName="street" message="* enter a vaild name" />

        <livewire:input-label labelText="Email" fieldName="email" message="*e-mail isn't valid" />

        <livewire:input-label labelText="Area name" fieldName="area_name" message="* enter a vaild name" />

        <button class="submit">Submit Data</button>

        @if ($message == 201)
            <div class="message">
                Address submitted successfully
            </div>
        @elseif($message == 400)
            <div class="error" style="color: red; font-size: 10px">
                Submit Faild Please Check your Data
            </div>
        @endif


    </form>
</div>
<style>
    .newAddressForm {
        display: inline-block;
        border: 1px solid rgba(128, 128, 128, 0.335);
        background-color: rgba(255, 255, 255, 0.541);
        border-radius: 7px;
        padding: 10px 10px;
        box-shadow: 1px 2px 5px 4px #e9e7e781;
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

    .message {
        color: green;
        font-weight: 10px;
        font-size: 10px;
        margin-bottom: -5px;
        border: 1px solid green;
        width: fit-content;
        border-radius: 2px 5px;
        font-size: 10px;
        background-color: rgba(0, 128, 0, 0.294);
        padding-left: 1px;
        padding-right: 1px;
    }

    .form {
        margin-left: 40px;
    }

    .submit {
        margin-top: 10px;
        margin-left: 150px;
        border: 1px solid rgba(128, 128, 128, 0.061);
        border-radius: 6px;
        color: white;
        box-shadow: 1px 1px 5px 1px #d1d1d181;
        background-color: #4b6587;
        transition: background-color 0.3s ease;
    }

    .submit:enabled:hover {
        background-color: #5a7daa;
        transition: background-color 0.3s ease;
    }

    .submit:disabled {
        background-color: #8e9aaa80;
        color: rgb(245, 238, 238);
        transition: background-color 0.6s ease;
        transform: scale() 0.6s ease;
    }

</style>
