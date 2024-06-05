<div class="m-5">
    <a class="btn btn-warning" href="{{ route('mecaniciens.create') }}">@lang('Ajouter un mécanicien')</a>
    <a href="{{route('generate-pdfm')}}">
        <button class="btn btn-info-emphasis" >@lang('telecharger en pdf')</button>
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
        <th >@lang('Nom')</th>
        <th >@lang('prenom')</th>
        <th >@lang('adresse')</th>
        <th >@lang('telephone')</th>
        <th >@lang('Action')</th>
    </tr>
    @foreach ($mecaniciens as $meca)
        <tr id="row{{$meca->id}}">
            <td>{{ $meca->nom}}</td>
            <td>{{ $meca->prenom}}</td>
            <td>{{ $meca->adresse }}</td>
            <td>{!! $meca->telephone !!}</td>
            <td>
                <button class="btnShow btn bg-primary hover:bg-info-emphasis text-black font-bold  px-2 border-b-4 border-primary hover:border-primary rounded" v="{{$meca->id}}">@lang('Voir')</button>
                <a class="btnEdit btn  bg-success hover:bg-success text-white font-bold  px-2 border-b-4 border-success hover:border-success rounded" href="{{ route('mecaniciens.edit',$meca->id) }}">@lang('Modifier')</a>
                <button class="btnDelete btn  bg-red hover:bg-redtext-white font-bold px-2 border-b-4 border-red-700 hover:border-red-500 rounded" v="{{$meca->id}}">{{ trans('Supprimer')}}</button>
            </td>
        </tr>
    @endforeach
</table>

0
<script>
    $(document).on('click',".btnShow",function(){
        var mecanicien_id = $(this).attr('v');
        var myData = {'mecanicien_id': mecanicien_id};
        var url = '{{ route("mecaniciens.show") }}';

        axios.post(url, myData)
        .then(response => {
                $("#showM").html(response.data);
                $("#myModalShowM").show();
        })
        .catch(error => {
            console.log(error);
        });
    })

    $(document).on("click",".btnDelete",function(){
            $("#txtId").val($(this).attr('v'));
            $("#myModalDeleteM").show();
        })
</script>
