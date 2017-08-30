@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="layout">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $category->title }}</h2>
                    <a href="{{ route('admin.products.create', ['id' => $category->id]) }}" class="btn btn-raised btn-primary">Əlavə et</a>
                    <table class="table table-striped table-hover ">
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
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title  }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', ['id' => $category->id, 'productId' => $product->id]) }}">{{ $product->description}}</a>
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img width="100%" src="/storage/{{$product->thumbnail}}" alt="">
                                </td>
                                <td>{{$product->options}}</td>
                                <td>{{ $product->created_at}}</td>
                                <td>{{ $product->user->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
