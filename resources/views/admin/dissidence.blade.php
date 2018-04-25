@include('admin/partials/header')

    <div>

        <div class="">
            <div class="title">
                Espace Goy
            </div>
            @include('admin/partials/menu')
        </div>
        
        <div id="news">
            <p>Chère Goy, veuillez noter que l'éradiquation d'une personne ou d'un terme est définitif. Soyez tolérant.</p>
        </div>

        <div id="userList">
            <h3>Mangakas dissidents</h3>
            <table>
                <tr>
                    <th>Email</th>
                    <th>Targeted</th> 
                    <th>Degré</th>
                    <th>Action</th>
                </tr>

                @foreach ($users as $user)
                    <tr>
                        <td><b>{{ $user->email }}</b></td>
                        <td>{{ $user->targeted }}</td> 
                        <td>{{ (strtotime($user->updated_at) > (time()-(60*60*24*6))) ? 'Surveillance' : 'Dissident' }}</td>
                        <td>
                            @if(strtotime($user->updated_at) > (time()-(60*60*4)))
                                Étude du sujet
                            @elseif(strtotime($user->updated_at) > (time()-(60*60*24*7)))
                                Annalyse du dossier
                            @else
                                <a href="{{ route('admin_delete_user', ['id' => $user->id]) }}">Éradiquer</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div id="textList">
            <h3>Punchlines dissidentes</h3>
            <table>
                <tr>
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Degré</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts as $text)
                    <tr>
                        <td><b>{{ $text->type }}</b></td>
                        <td>{{ $text->text }}</td> 
                        <td>{{ (strtotime($text->updated_at) > time()-(60*60*24*6)) ? 'Surveillance' : 'Dissidente' }}</td>
                        <td>
                            @if(strtotime($text->updated_at) > (time()-(60*60*4)))
                                Étude du sujet
                            @elseif(strtotime($text->updated_at) > (time()-(60*60*24*7)))
                                Annalyse du dossier
                            @else
                                <a href="{{ route('admin_delete_text', ['id' => $text->id]) }}">Éradiquer</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>

    </div>

@include('admin/partials/footer')