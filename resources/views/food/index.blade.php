@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Add New Food</div>

                <div class="card-body">
                    <table class="table table-responsive">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach($foods as $food)
                                <td ><img src="{{asset('images')}}/{{$food->image}}" alt="img" height="100" with="100"></td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->description}}</td>
                                <td>{{$food->price}}</td>
                                <td>{{$food->category_id}}</td>
                                <td>
                                    <a href="{{route('food.edit', [$food->id])}}">
                                        <button type="button" class="btn btn-outline-success">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$food->id}}">Delete</button>

                                                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{route('food.destroy', [$food->id])}}" method="POST">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Food</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                            <div class="modal-body">
                                                            are you sure
                                                            </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                            </div>
                                
                                </td>
                          </tr>
                          @endforeach
                        </tbody>
                           
                      </table>
                    
                        

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
