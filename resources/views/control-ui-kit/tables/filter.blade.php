<div x-data="{ active: false }" class="text-sm">

    <div class="flex space-x-2 items-center m-4">
        <x-input-checkbox name="active" x-model="active" />
        <span>Countries</span>
    </div>

    <div x-show="active" class="border-t border-gray-150">
        <div class="flex space-x-2">
            <input value="226" type="checkbox" />
            <span>United Kingdom</span>
        </div>
        <div class="flex space-x-2">
            <input value="227" type="checkbox" />
            <span>United States</span>
        </div>
    </div>

</div>
