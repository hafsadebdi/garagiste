<div class="m-5">
    <a class="btn btn-secondary" href="{{ route('clients.create') }}">@lang('Ajouter un client')</a>
    <a href="{{route('generate-pdfc')}}">
        <button class="btn"  style="backgound-color:orange">@lang('telecharger en pdf')</button>
    </a>
    <a href="{{ route('clients.export') }}">
        <button class="btn "style="backgound-color:black">@lang('Export en Excel')</button>
    </a>

</div>




  @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-hover mt-10" style="border: solid black 1px">
    <tr>
        <th >@lang('Nom')</th>
        <th >@lang('prenom')</th>
        <th >@lang('adresse')</th>
        <th >@lang('telephone')</th>
        <th >@lang('Action')</th>
    </tr>
    @foreach ($clients as $clt)
        <tr id="row{{$clt->id}}">
            <td>{{ $clt->nom}}</td>
            <td>{{ $clt->prenom}}</td>
            <td>{{ $clt->adresse }}</td>
            <td>{!! $clt->telephone !!}</td>
            <td>
                <button class="btnShow btn bg-blue hover:bg-blue-100 text-black font-bold  px-2 border-b-4 border-blue hover:border-blue rounded" v="{{$clt->id}}">@lang('Voir')</button>
                <a class="btnEdit btn  bg-success hover:bg-succes text-white font-bold  px-2 border-b-4 border-success hover:border-success rounded" href="{{ route('clients.edit',$clt->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$clt->id}}">{{ trans('Supprimer')}}</button>
            </td>
        </tr>
    @endforeach
</table>


<script>
    $(document).on('click',".btnShow",function(){
        var client_id = $(this).attr('v');
        var myData = {'client_id': client_id};
        var url = '{{ route("clients.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showClient").html(response.data);
                $("#myModalShowClient").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteClient").show();
        })
</script>
