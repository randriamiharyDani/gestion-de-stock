@extends('main')
@section('content')

<div class="container overflow-y-none">
    <h1 class="text-4xl text-bold my-4">Article</h1>
    <div class="grid grid-cols-2 gap-4 h-full">

        {{-- Ajouter produit --}}
        <div class="block h-full">
            <div class="text-lg font-medium text-gray-700 text-center mt-2">Add your article details below</div>

             @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif
            <div class="border border-gray-50 rounded-2xl bg-white shadow-xl p-3 my-4">
                <form action="{{ route('add-product') }}" method="post">
                    @csrf
                    <div class="bg-white rounded-lg mb-4">
                        <div class="relative bg-inherit">
                            <input type="text" id="name" name="name"
                                   class="peer bg-transparent h-16 w-full rounded-lg text-gray-200 placeholder-transparent ring-1 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600"
                                   placeholder="Name product" />
                            <label for="name"
                                   class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">
                                Name product
                            </label>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg mb-4">
                        <div class="relative bg-inherit">
                            <input type="number" id="price" name="price"
                                   class="peer bg-transparent h-16 w-full rounded-lg text-gray-200 placeholder-transparent ring-1 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600"
                                   placeholder="Enter price" />
                            <label for="price"
                                   class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">
                                Enter price
                            </label>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg mb-4">
                        <div class="relative bg-inherit">
                            <input type="number" id="stock" name="stock"
                                   class="peer bg-transparent h-16 w-full rounded-lg text-gray-200 placeholder-transparent ring-1 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600"
                                   placeholder="Enter stock" />
                            <label for="stock"
                                   class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">
                                Enter stock
                            </label>
                        </div>
                    </div>
                    {{-- Description --}}
                    <div class="bg-white rounded-lg mb-4">
                        <div class="relative bg-inherit">
                            <textarea id="description" name="description" rows="4"
                                      class="peer bg-transparent h-16 w-full rounded-lg text-gray-200 placeholder-transparent ring-1 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600"
                                      placeholder="Description"></textarea>
                            <label for="description"
                                   class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-4 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">
                                Description
                            </label>
                        </div>
                    </div>
                    {{-- Submit button --}}
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add
                    </button>
                </form>
            </div>
        </div>
        {{-- Liste des produits --}}
        <div class="block h-full ">
            <div class="text-lg font-medium text-gray-700 text-center mt-2">List article</div>
            <div class="border border-gray-50 rounded-2xl bg-white shadow-xl p-3 my-4 overflow-y-auto h-[600px] bg-slate-500">
                @foreach ($products as $product)
                   <div class="border border-gray-500 mb-2 rounded-xl px-3">
                     <div class="flex justify-between items-center  mb-2">
                        <h3 class="text-lg font-medium text-gray-700">{{ $product->name }}</h3>
                        <div class="grid grid-flow-row">
                            <a href="{{ route('delete-product', ['id' => $product->id]) }}}" class="bg-red-500 hover:bg-red-700 text-white font-bold mb-4 py-2 px-4 rounded">
                                Delete
                            </a>
                        </div>
                    </div>
                    <div class="text-gray-600 text-sm">Price: ${{ $product->price }}</div>
                    <div class="text-gray-600 text-sm">Stock: {{ $product->stock }}</div>
                    <div class="text-gray-600 text-sm">Description: {{ $product->description }}</div>
                   </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
