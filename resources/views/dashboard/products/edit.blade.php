<x-layouts.app :title="__('Edit Product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <!-- Product Name -->
        <flux:input label="Name" name="name" value="{{ old('name', $product->name) }}" class="mb-3" />

        <!-- Product Category (Moved below Name) -->
        <div class="mb-3">
            <label for="product_category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <select name="product_category_id" id="product_category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                <option value="" disabled>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->product_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Product Description -->
        <flux:textarea label="Description" name="description" class="mb-3">{{ old('description', $product->description) }}</flux:textarea>

        <!-- Product Price -->
        <flux:input label="Price" name="price" value="{{ old('price', $product->price) }}" class="mb-3" />

        <!-- Product Stock -->
        <flux:input label="Stock" name="stock" value="{{ old('stock', $product->stock) }}" class="mb-3" />

        <!-- Product Image -->
        @if($product->image)
            <div class="mb-3">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded">
            </div>
        @endif
        <flux:input type="file" label="Image" name="image" class="mb-3" />

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('products.index') }}" variant="ghost" class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>