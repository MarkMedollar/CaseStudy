
@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <h1> Update School Information </h1>
    </div>

    <div class="container">
        <div class="row">
            <form action="{{ route('colleges.update',['college'=>$college->id]) }}" method="POST">

                @csrf {{-- to avoid repetitive submission of entry in the form --}}
                @method('PUT')
                {{-- <div class="mb-3">
                  <label for="title" class="form-label">Book Title</label>
                  <input type="text"  class="form-control" id="title" name="title" value="{{ $book->title }}">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Book Author</label>
                    <input type="text" class="form-control"  id="author" name="author" value="{{ $book->author }}">
                </div>
                <div class="mb-3">
                    <label for="year_published" class="form-label">Year Published</label>
                    <input type="number" class="form-control"  id="year_published" name="year_published" value="{{ $book->year_published }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('books.index') }}" type="submit" class="btn btn-warning">Back</a> --}}

                <div class="mb-3">
                    <label for="name" class="form-label">HEI Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $college->name }}">
                          {{-- start validation for error  --}}
                              @error('name')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          {{-- end validation for error  --}}
                  </div>

                  <div class="mb-3">
                      <label for="address" class="form-label">HEI Address</label>
                      <input type="text" class="form-control" id="address" name="address" value="{{ $college->address }}">
                          {{-- start validation for error  --}}
                          @error('address')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          {{-- end validation for error  --}}
                  </div>

                  <div class="mb-3">
                      <label for="latitude" class="form-label">Latitude</label>
                      <input type="decimal" class="form-control" id="latitude" name="latitude" value="{{ $college->latitude }}" >

                          {{-- start validation for error  --}}
                          @error('latitude')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          {{-- end validation for error  --}}
                  </div>
                  <div class="mb-3">
                      <label for="longitude" class="form-label">Longitude</label>
                      <input type="decimal" class="form-control" id="longitude" name="longitude"  value="{{ $college->longitude }}" >
                          {{-- start validation for error  --}}
                          @error('longitude')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          {{-- end validation for error  --}}
                  </div>
                  <div class="mb-3">
                      <label for="website" class="form-label">HEI Website</label>
                      <input type="text" placeholder="www.unifast.com" class="form-control" id="website" name="website" value="{{ $college->website }} ">
                  </div>

                  <div class="mb-3">
                      <label for="contact_number" class="form-label">Contact Number</label>
                      <input type="text" placeholder="e.g 09088949035" class="form-control" id="contact_number" name="contact_number" value="{{ $college->contact_number}}">
                  </div>

                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('colleges.index') }}" type="submit" class="btn btn-warning">Back</a>

              </form>
        </div>
    </div>
</div>
@endsection

