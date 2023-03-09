@extends('layouts.app')

@section('content')
@section('title', 'dish list')


<div class="container">
    <div class="row justify-content-center">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-10">
                    <div class="card">
                        <div class="card-header card-header-cats">
                            <h3><a href="{{route('dishes-index')}}">
                                    All dishes</a></h3>
                        </div>
                        @forelse($dishes as $dish)
                        <div class="container">
                            <div id="{{ $dish['id'] }}" class="row justify-content-center">


                                <div id="{{ $dish['id'] }}" class="card card-list">
                                    <div class="card-body card-body-list">
                                        <div class="col-2">

                                            <div class="smallimg">
                                                @if($dish->photo)
                                                <img src="{{asset($dish->photo)}}">
                                                @else
                                                <img src="{{asset('/dishes/no.jpg')}}">

                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            {{-- <div class="card-header-list"> --}}
                                            <p class="title">{{$dish->title}}</p>
                                            <p class="">({{$dish->ingridients}})</p>
                                            {{-- </div> --}}
                                        </div>
                                        <div class="col-3">

                                            <p class="title">{{$dish->dishRestorant->title}}</p>
                                            <p>{{$dish->dishRestorant->town}}</p>
                                            <p>{{$dish->dishRestorant->address}}</p>
                                        </div>
                                        <div class="col-2">
                                            <p class="price"> Price: {{$dish->price}} eur</p>
                                        </div>

                                        <div class="col-2">
                                            <div class="buttons">
                                                <a class="btn btn-outline-success" href="{{route('dishes-edit', $dish)}}">Edit</a>
                                                @if(Auth::user()?->role == 'admin')

                                                <form action="{{route('dishes-delete', $dish)}}" method="post">
                                                    <button type="submit" class="btn btn-outline-danger btn-delete">Delete</button>
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="list-group-item">No types yet</div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>



        @endsection
