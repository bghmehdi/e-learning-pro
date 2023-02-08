@extends('layouts.app')
@section('content')
    <div class="container">
      <a href="{{ url()->previous() }}" ><i class="fa-solid fa-left-long"></i></a>
      <h2>Créer une formation</h2>
      <form action="{{ route('formation.store')}}" method="POST" class=" g-3  needs-validation" novalidate>
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
          <label for="" class="form-label">type</label>
          <input type="text" name="type" id=""  class="form-control @error('type') is-invalid @enderror">
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