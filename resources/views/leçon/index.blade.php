@extends('layouts.app')
@section('content')
<div class="container">
<h2>les leçons</h2>

            
     {{--        <form  action="{{url('/search')}}">
  <div style="margin-left: 640px" class="textbox"> 
    <input type="text" name="query" placeholder="search leçon" >
  </div> --}}
</form>
<div class="table">
  
  @if($message = Session::get('success'))
  <div class="success">
    <p>{{$message}}</p>
  </div>
  @endif
  <table class="table">
    <a id="create" href="{{route('leçon.create')}}">create leçon</a>
    <tr class="table text-center">
      <th>ID</th>
      <th>nom leçon</th>
      <th>type</th>
    </tr>
    @foreach ($leçon as $leçon)
    @if($matiere == $leçon->matiere_id)
    <tr>
      <th>{{ $leçon->id }}</th>
      <td>{{ $leçon->nom }}</td>
      <td>{{ $leçon->type }}</td>
      <td>
        <a href="{{route("videos.index" , ['leçon' => $leçon->id])}}">videos</a>
        @if (Auth::user()->role == "admin")
        <a class="btn btn-primary" href="{{ route('leçon.edit', $leçon->id) }}">Modifier</a>
        <form style="display: inline-block" action="{{ route('leçon.destroy', $leçon->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this leçon?')" type="submit">Supprimer</button>
        </form>
        @endif
        <a class="btn btn-primary" href="{{ route('leçon.show', $leçon->id) }}">show</a>
      </td>
    </tr>
    @endif
    @endforeach
  </table>
</div>
@endsection