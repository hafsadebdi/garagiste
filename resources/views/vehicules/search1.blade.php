@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show mt-10" role="alert">
    <strong>@lang('Whooops ') </strong>@lang('Veuillez remplir tous les champs.')
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<table class="table table-hover mt-10" style="border: solid black 1px">
<thead>
    <tr>
        <th>ID</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Type de Fuel</th>
        <th>Immatriculation</th>
        <th>Image</th>
        <th>Nom du client</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach ($vehicules as $vehicule)
        <tr id="row{{ $vehicule->id }}">
            <td>{{ $vehicule->id }}</td>
            <td>{{ $vehicule->marque }}</td>
            <td>{{ $vehicule->modele }}</td>
            <td>{{ $vehicule->typeFuel }}</td>
            <td>{{ $vehicule->registration }}</td>
            <td><img src="{{ asset('images/' . $vehicule->image) }}" alt="Image du véhicule" style="width: 100px;"></td>
            <td>{{ $vehicule->client->nom ?? 'N/A' }} {{ $vehicule->client->prenom }}</td>

                <td>
                    <a class="btn btn-success " href="{{ route('vehicules.edit2', $vehicule->id) }}">@lang('Modifier')</a>
                    <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$vehicule->id}}">{{ trans('Supprimer')}}</button>
                </td>

        </tr>
    @endforeach
</tbody>
</table>

<script>
 $(document).on("click",".btnDelete",function(){
$("#txtId").val($(this).attr('v'));
$("#myModalDeleteV").show();
})
</script>

</section>
</div>


