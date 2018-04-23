@include('admin/partials/header')

    <div class="full-page">

        <div class="">
            <div class="title">
                Espace Goy
            </div>
            @include('admin/partials/admin-menu')
        </div>

        <div id="userList">
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
            <table>
                <tr>
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts['hello'] as $text)
                    <tr id="hello">
                        <td><b>{{ $text->type }}</b></td>
                        <td>{{ $text->text }}</td> 
                        <td>{{ date('d-m-Y', strtotime($text->created_at)) }}</td>
                        <td><a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Suppr</a></td>
                    </tr>
                @endforeach

                <tr class="space">
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts['text'] as $text)
                    <tr id="text">
                        <td><b>{{ $text->type }}</b></td>
                        <td>{{ $text->text }}</td> 
                        <td>{{ date('d-m-Y', strtotime($text->created_at)) }}</td>
                        <td><a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Suppr</a></td>
                    </tr>
                @endforeach
                
                <tr class="space">
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts['bye'] as $text)
                    <tr id="bye">
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