@extends('main')
@section('content')
    {{-- Liste des produits --}}
 <div class="bg-white container overflow-y-none pt-8 mt-10">

  <!-- produits Table -->
        <h2 class="text-2xl mb-4">Product List</h2>

    <div class="overflow-y-auto rounded-lg  max-h-[650px] ">

      <table class="w-full bg-white border mb-20">
        <thead>
          <tr class="bg-[#2B4DC994] text-center text-xs md:text-sm font-thin text-white sticky top-0 w-full">
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">ID</span>
            </th>
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Name</span>
            </th>
            <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Price</span>
            </th>
             <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Stock</span>
            </th>
             <th class="p-0">
              <span class="block py-2 px-3 border-r border-gray-300">Description</span>
            </th>
            {{-- <th class="p-4 text-xs md:text-sm">Actions</th> --}}
             <th class="p-0">
              <span class="block py-2 px-3 border-r ">Actions</span>
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b text-xs md:text-sm text-center text-gray-800 m-5">
              <td class="p-5 md:p-4">{{$product->id}}</td>
              <td class="p-4 md:p-4">{{$product->name}}</td>
              <td class="p-4 md:p-4">{{$product->price}}</td>
              <td class="p-4 md:p-4">{{$product->stock}}</td>
              <td class="p- md:p-4">{{$product->description}}</td>
              <td class="relative p-2 md:p-4 flex justify-center space-x-2">
                <a href="{{ route('delete-product', ['id' => $product->id]) }}}" class="bg-red-500 hover:bg-red-700 text-white font-bold mb-4 py-2 px-4 rounded">
                                Delete
                </a>

              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
{{-- </div> --}}
@endsection
