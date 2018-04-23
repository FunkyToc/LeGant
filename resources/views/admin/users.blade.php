@include('admin/partials/header')

    <div>

        <div class="">
            <div class="title">
                Espace Goy
            </div>
            @include('admin/partials/menu')
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
                    <tr>
                        <td><b>{{ $user->email }}</b></td>
                        <td>{{ $user->targeted }}</td> 
                        <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                        <td><a href="{{ route('admin_del_user', ['id' => $user->id]) }}">Suppr</a></td>
                    </tr>
                @endforeach

            </table>
        </div>

    </div>

@include('admin/partials/footer')