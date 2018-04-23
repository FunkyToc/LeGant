@include('admin/partials/header')

    <div>

        <div class="">
            <div class="title">
                Espace Goy
            </div>
            @include('admin/partials/menu')
        </div>

        <div id="news">
            <p>Au total, <b>{{ $mailCount }}</b> mails envoyés avec amour, grace auxquels la fonte de la banquise c'est accentuée de <b>{{ round($mailCount * 0.0146, 0) }}</b> mètres. <b>{{ $rageCount }}</b> rageux on tentés la désinscription.</p>
        </div>

        <div id="userList">
            <h3>Last Mangakas</h3>
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

        <div id="textList">
            <h3>Last Punchlines</h3>
            <table>
                <tr>
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts as $text)
                    <tr>
                        <td><b>{{ $text->type }}</b></td>
                        <td>{{ $text->text }}</td> 
                        <td>{{ date('d-m-Y', strtotime($text->created_at)) }}</td>
                        <td><a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Suppr</a></td>
                    </tr>
                @endforeach

            </table>

        </div>

    </div>

@include('admin/partials/footer')