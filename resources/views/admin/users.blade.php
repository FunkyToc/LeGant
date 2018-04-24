@include('admin/partials/header')

    <div>

        <div class="">
            <div class="title">
                Espace Goy
            </div>
            @include('admin/partials/menu')
        </div>

        <div id="add">
            <h3>Ajouter un Mangaka</h3>
            <form action="" method="POST">
                <input id="input-text" type="email" placeholder="mangaka@mail.com" name="email" required>
                <button>Valider</button>
                {{ csrf_field() }}
            </form>
        </div>

        <div id="userList">
            <h3>Mangakas <span>({{ count($users) }})</span></h3>
            <table>
                <tr>
                    <th>Email</th>
                    <th>Targeted</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($users as $user)
                    <tr class="{{ $user->active ? '' : 'deleted' }}">
                        <td><b>{{ $user->email }}</b></td>
                        <td>{{ $user->targeted }}</td> 
                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                        <td><a href="{{ route('admin_active_user', ['id' => $user->id]) }}">{{ $user->active ? 'Suppr' : 'Active' }}</a></td>
                    </tr>
                @endforeach

            </table>
        </div>

    </div>

@include('admin/partials/footer')