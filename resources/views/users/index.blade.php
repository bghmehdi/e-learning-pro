@extends('layouts.app')
@section('content')
@vite(['resources/js/search.js'])

<div class="container">

                <h1> Les utilisateurs</h1>
   
                <div class="les_card">
                      <div class="card-body">
                          <input
                              name="query"
                              class="form-control"
                              id="search"
                              type="text"
                              placeholder="chercher avec nom ou CIN"
                              list="lesnom"
                              onkeyup="search()"
                              style="width: 300px; margin-left:auto;"
                            />
                          <datalist id="lesnom">
                              @foreach ($allusers as $user)
                                <option value="{{ $user->nom }}"></option>
                              @endforeach
                          </datalist>
                          @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                          @endif
                          
                          @if($message = Session::get('success'))
                            <div class="text-success" role="alert">
                              {{$message}}
                            </div>
                          @endif
                            
                            @foreach ($users as $user)
                            @if ($user->role != 'admin')
                            <div class="une_card">    
                                <span class="searchItem" >
                                  <a href=" {{route('access.index', ['user' => $user->id, 'userName' => $user->nom])}} ">{{ $user->CIN }} </a>
                                </span>
                              <div>
                                <span class="searchItem">
                                  <a href=" {{route('access.index', ['user' => $user->id, 'userName' => $user->nom])}} ">{{ $user->nom }} {{ $user->prenom }}</a>
                                </span>
                              </div>
                              <div>{{ $user->role }}</div>
                              {{-- <td>{{ $user->ville }}</td> --}}
                              <div>
                                   
                                  <form style="display: inline-block" action="{{ route('users.update', $user->id) }}" method="Post">
                                      @csrf
                                      @method('put')
                                      <button class="btn btn-outline-primary" onclick="return confirm('formateur ?')" type="submit"> make formateur</button>
                                    </form>
                                    <form style="display: inline-block" action="{{ route('users.destroy', $user->id) }}" method="Post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-outline-danger" onclick="return confirm('do u really want to delete this user?')" type="submit">Supprimer</button>
                                    </form>
                              </div>
                            
                            </div>
                            @endif
                            @endforeach
                            <div class="pagination">
                              {{ $users->links('pagination.custom') }}
                            </div>
                          </div>
                          
    </div>
  </div>
  <script>
    function search() {
    var searchInput = document.getElementById('search');
    var filter = searchInput.value.toUpperCase();
    var les_card = document.querySelector('.les_card');
    var une_card = les_card.querySelectorAll('.une_card');

    une_card.forEach((card) => {
        let a1 = card.getElementsByTagName('a')[0];
        let a2 = card.getElementsByTagName('a')[1];
        txtValue1 = a1.textContent || a1.innerText;
        txtValue2 = a2.textContent || a2.innerText;
        console.log(txtValue1, txtValue2);
        if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    })
}
  </script>
@endsection