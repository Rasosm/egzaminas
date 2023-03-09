@extends('layouts.app')

@section('content')
@section('title', 'New Restorant')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-7" style="margin-top: 0">
            <div class="card m-4">
                <div class="card-header create">
                    <h3>Create new restorant</h3>

                </div>
                <div class="card-body">
                    <form action="{{route('restorants-store')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Restorant</label>
                            <input type="text" name="restorant_title" class="form-control" placeholder="restorant" value="{{old('restorant_title')}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" name="restorant_code" class="form-control" placeholder="code" value="{{old('restorant_code')}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="restorant_address" class="form-control" placeholder="address" value="{{old('restorant_address')}}">
                        </div>

                </div>
                <div class="mb-3" style="justify-content: center; display: flex">
                    <button type="submit" class="btn btn-outline-warning mt-4">Save</button>

                </div>
                @csrf

                </form>
            </div>
        </div>
    </div>

</div>
</div>

@endsection
