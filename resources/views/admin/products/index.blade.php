@extends('admin.layouts.app')

@section('content')
    <div class="layout">
        <div class="row">
            <div class="col s12">
                <h5>{{ $category->title }}</h5>
                <a href="{{ route('admin.products.create', ['id' => $category->id]) }}"
                   class="btn btn-raised btn-primary">Əlavə et</a>
                <table class="bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ad</th>
                        <th>Təsviri</th>
                        <th>Qiymət</th>
                        <th>Şəkil</th>
                        <th>Seçimlər</th>
                        <th>Yaranma tarixi</th>
                        <th>Kim yaradib</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}">{{ $product->id }}</a>
                            </td>
                            <td>{{ $product->title  }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <img width="50%" src="/storage/{{$product->folder}}/thumbnail.jpg" alt="">
                            </td>
                            <td>{{$product->options}}</td>
                            <td>{{ $product->created_at}}</td>
                            <td>{{ $product->user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection
