@extends('layouts.app')
@section('content')
    <div class="container">
      <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
      <h2>Créer une formation</h2>
      <form action="{{ route('formation.store')}}" method="POST" enctype="multipart/form-data" class=" g-3  needs-validation" novalidate>
      @if ( $errors->any() )
                    <div class="pb-0 alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        @csrf
        
        <div class="mb-3">
          <label for=""  class="form-label">nom</label>
          <input type="text" name="nom_formation" id=""  class="form-control @error('nom_formation') is-invalid @enderror">
          @error('nom_formation')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="date_début"  class="form-label">date de début</label>
          <input id="date_début" type="date" name="date_début" id=""  class="form-control @error('date_début') is-invalid @enderror">
          @error('date_début')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for=""  class="form-label">date de fin</label>
          <input type="date" name="date_fin" id="" class="form-control @error('date_fin') is-invalid @enderror">
          @error('date_fin')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">formation image</label>
          <input type="file" name="image" id=""  class="form-control @error('image') is-invalid @enderror">
          @error('image')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">type</label>
          <select name="type" id="" class="form-select @error('type') is-invalid @enderror">
            <option value="présentiel">présentiel</option>
            <option value="a distance">a distance</option>
            <option value="les deux">les deux</option>
          </select>
          @error('type')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="mb-3">
          <button class="btn btn-primary button-43" type="submit">create</button>
        </div>
      </form>
    </div>
    <script>

          
          
    </script>
@endsection