<table>
    @csrf
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th colspan="2" >Actoin</th>
    </tr>
    <tr>
        @foreach ($data as $key => $item)
            <th>{{$item->id}}</th>
            <th>{{$item->nom}}</th>
            <th>{{$item->prenom}}</th>
            <th><a href="{{ route('SeeCDM',$item->id)}}">Uploader</a></th>
            <th><a href="{{route('CDM' ,$item->id)}}">Modifie</a></th>
        @endforeach
    </tr>


</table>