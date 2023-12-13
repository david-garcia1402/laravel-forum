<table class="table table-dark table-striped table-borderless">
                <thead>
                    <tr>
                        <th></th>
                        <th>Matéria:</th>
                        <th>Staus:</th>
                        <th>Dúvida:</th>
                        <th>Usuário:</th>
                        <th>Opções:</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach($supports as $support)
                        <tr class="valores">
                            <td name='id'> {{$contador++}}</td>
                            <td name='subject'> {{$support->subject}}</td>
                            <td name='status'> {{$support->status}}</td>
                            <td name='description'><div class="descricao" style="max-width:500px;"><textarea class='form-control' style="max-height:400px; min-height:50px" disabled>{{$support->description}}</textarea></div></td>
                            <td name='user'> {{$support->user}}</td>
                                @if(auth()->check())
                                    @if(auth()->user()->id == $support->idUser)
                                        <td name="buttons">
                                            <div class="d-flex">
                                                <form action="{{ route('forum.view', ['id' => $support->id]) }}" method="GET">
                                                    <button type="submit" class="btn btn-dark" title="Visualizar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            
                                                <form action="{{ route('forum.destroy', ['id' => $support->id]) }}" style="margin:0 5px 0 5px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-dark" title="Excluir">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            
                                                <form action="{{ route('forum.edit', ['id' => $support->id]) }}">
                                                    <button type="submit" class="btn btn-dark" title="Editar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                @else
                                <td></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>