@include('admin/partials/header')

    <div>

        <div class="">
            <div class="title">
                Espace Goy
            </div>
            @include('admin/partials/menu')
        </div>

        <div id="add">
            <h3>Ajouter une Punchline</h3>
            <form action="" method="POST">
                <select name="type" required>
                    <option value="" selected disabled> - </option>
                    <option value="hello">hello</option>
                    <option value="text">text</option>
                    <option value="bye">bye</option>
                </select>
                <input id="input-text" type="text" placeholder="Allez viens, on est bien !" name="text" required>
                <button>Valider</button>
                {{ csrf_field() }}
            </form>
        </div>

        <div id="textList">
            <h3>Punchlines <span>({{ count($texts['hello']) + count($texts['text']) + count($texts['bye']) }})</span></h3>

            <table>
                <tr>
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts['hello'] as $text)
                    <tr id="hello" class="{{ $text->active ? '' : 'deleted' }}">
                        <td><b>{{ $text->type }}</b></td>
                        <td>{{ $text->text }}</td> 
                        <td>{{ date('d-m-Y', strtotime($text->created_at)) }}</td>
                        <td>
                            @if($text->active)
                                <a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Suppr</a>
                            @else
                                <a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Active</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                <tr class="space">
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts['text'] as $text)
                    <tr id="text" class="{{ $text->active ? '' : 'deleted' }}">
                        <td><b>{{ $text->type }}</b></td>
                        <td>{{ $text->text }}</td> 
                        <td>{{ date('d-m-Y', strtotime($text->created_at)) }}</td>
                        <td>
                            @if($text->active)
                                <a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Suppr</a>
                            @else
                                <a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Active</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                
                <tr class="space">
                    <th>Type</th>
                    <th>Text</th> 
                    <th>Creation</th>
                    <th>Action</th>
                </tr>

                @foreach ($texts['bye'] as $text)
                    <tr id="bye" class="{{ $text->active ? '' : 'deleted' }}">
                        <td><b>{{ $text->type }}</b></td>
                        <td>{{ $text->text }}</td> 
                        <td>{{ date('d-m-Y', strtotime($text->created_at)) }}</td>
                        <td>
                            @if($text->active)
                                <a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Suppr</a>
                            @else
                                <a href="{{ route('admin_del_text', ['id' => $text->id]) }}">Active</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>

@include('admin/partials/footer')