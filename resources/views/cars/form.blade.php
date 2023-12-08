<div>
    <x-form-input name="brand" label="Brand"/>
    <x-form-input name="model" label="Model"/>
    <x-form-input name="vin" label="VIN"/>
    <x-form-select name="category" label="Category" :options="$categories" placeholder="Choose..."/>
    <x-form-textarea name="description" label="Description"/>
</div>