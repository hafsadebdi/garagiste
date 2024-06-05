<div class="m-5">
<a class="btn btn-secondary" href="{{route('vehicules.create')}}">@lang('Ajouter un vehicule')</a>
    <a href="{{route('generate-pdfc')}}">
        <button class="btn btn-primary" >@lang('telecharger en pdf')</button>
    </a>
    <a href="{{ route('clients.export') }}">
        <button class="btn btn-success">@lang('Export en Excel')</button>
    </a>

</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-10" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
    </div>
@endif

<table class="table  table-hover mt-10" style="border: solid black 1px">
    <tr>
        <th >@lang('Marque')</th>
        <th >@lang('Modele')</th>
        <th >@lang('typeFuel')</th>
        <th >@lang('Registration')</th>
        <th >@lang('Image')</th>
        <th >@lang('Action')</th>
    </tr>
    @foreach ($vehicules as $v)
        <tr id="row{{$v->id}}">
            <td>{{ $v->marque}}</td>
            <td>{{ $v->modele}}</td>
            <td>{{ $v->typeFuel }}</td>
            <td>{{ $v->registration }}</td>
            <td><img src="{{ asset('images/' . $v->image) }}" alt="Image du Véhicule" style="width: 100px; height: 1o0px;"></td>
            <td>
                <button class="btnShow btn bg-blue hover:bg-blue text-black font-bold  px-2 border-b-4 border-blue hover:border-blue rounded" v="{{$v->id}}">@lang('Voir')</button>
                <a class="btnEdit btn  bg-success hover:bg-success text-white font-bold  px-2 border-b-4 border-success hover:border-success rounded" href="{{ route('vehicules.edit',$v->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red-500 hover:bg-red-400 text-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$v->id}}">{{ trans('Supprimer')}}</button>
            </td>
        </tr>
    @endforeach
</table>


<script>
    $(document).on('click',".btnShow",function(){
        var vehicule_id = $(this).attr('v');
        var myData = {'vehicule_id': vehicule_id};
        var url = '{{ route("vehicules.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showV").html(response.data);
                $("#myModalShowV").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteV").show();
        })
</script>
