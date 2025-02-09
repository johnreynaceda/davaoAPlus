<div>
    <h1 class="text-lg font-bold text-gray-700">PROVIDENTIAL LOAN APPLICATION FORM</h1>
    <p class="text-sm text-gray-600">*Salary *Appliance *Pension *Educational *Motorcycle/Vehicle *Others</p>
    <div class="mt-5">
        <div>
            {{ $this->form }}
        </div>
        <div class="mt-5">
            <x-button label="Submit Form" blue squared right-icon="arrow-right" wire:click="submitForm"
                spinner="submitForm" />
            <p class="text-sm text-gray-500">by clicking this button, you autorized and confirm that the information
                contained are true
                anf correct.
            </p>
        </div>
    </div>
</div>
