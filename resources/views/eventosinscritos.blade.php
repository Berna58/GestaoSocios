<div class="row">
    <div class="col-lg-12">
        <div class="card m-3">
            <div class="card-body p-0" style="max-height: 600px; overflow-y: scroll;">
                <table class="table" id="tabela-eventos-inscritos">
                    <thead>
                    <tr>
                        <th>Evento</th>
                        <th>Data</th>
                        <th>Local</th>
                        <th>Presença</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($eventosInscritos as $evento)
                        <tr>
                            <td class="text-nowrap align-middle">{{ $evento->titulo }}</td>
                            <td class="text-nowrap align-middle">{{ $evento->data }}</td>
                            <td class="text-nowrap align-middle">{{ $evento->local }}</td>
                            <td class="text-nowrap align-middle">
                                @if ($evento->data < now())
                                    @if ($evento->presenca)
                                        <span class="text-success">Presente</span>
                                    @else
                                        <span class="text-danger">Não presente</span>
                                    @endif
                                @else
                                    <span class="text-info">Evento Futuro</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
