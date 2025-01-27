@extends('main')

@section('content')

    <div class="container mt-20">
        <h1 class="text-center text-3xl m-10"> Manage Stock </h1>
        <div class="custom-select-container">
            <label for="product_id" class="block text-gray-700 font-medium mb-2">Select Product</label>
            <select name="name" id="product_id" class="custom-select">
                <option value="" disabled selected>Select Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-name="{{ $product->name }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="afficher">
        <form action="{{route('add_stock')}}" method="post">
            @csrf
            <table class="table border border-gray-300 w-full text-left">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4">Name</th>
                        <th class="py-2 px-4">Quantity</th>
                        <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody id="product-table-body">
                    <!-- Les lignes des produits seront ajoutées ici dynamiquement -->

                </tbody>
            </table>
            <button type="submit">submit</button>
        </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            // alert('hi')
            $('#product_id').select2();

            $('#product_id').on('change',function(){
//                alert($(this).val())
                let id= $(this).val();
                $.ajax({
                    type : "get",
                    url : '/select-product/'+id,
                    success : function(data){
                        console.log(data)
                        $('#product-table-body').append(
                            ` <tr>
                                <input type="hidden" value=`+data.id+` name='product[`+data.id+`]['id']'>
                        <td class="py-2 px-4">`+data.name+`</td>
                        <td class="py-2 px-4"><input type="number" name='product[`+data.id+`]['qte']'></td>
                        <td class="py-2 px-4"><button class="btn btn-danger remove-item">delete</button></td>
                    </tr>

                            `
                        )
                    },
                    error : function(error){
                        console.log(error)
                    }
                })
            })
        })
    </script>
        @endsection


