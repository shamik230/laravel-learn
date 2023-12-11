<div>
    <x-form-select name="brand_id" label="Brand" :options="$brands" placeholder="Choose..."/>
    <x-form-input name="model" label="Model"/>
    <x-form-input name="vin" label="VIN"/>
    <x-form-select name="category" label="Category" :options="$categories" placeholder="Choose..."/>
    <x-form-select name="tags[]" label="Tags" :options="$tags" multiple many-relation/>
    <x-form-textarea name="description" label="Description"/>
</div>