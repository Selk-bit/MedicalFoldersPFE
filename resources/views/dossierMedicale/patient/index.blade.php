<table>
    @csrf
    <tr>
        <th>#</th>
        <th>CIN</th>
        <th>Nom</th>
        <th>Prenom</th>
        @if ( $role === 1 )
            <th>Dossier Medical</th>
        @endif
        <th colspan="2" >Action</th>
    </tr>
    
    <tr>
        @foreach ($data as $key => $item)
            <th>{{$item->Uid}}</th>
            <th>{{$item->name}}</th>
            <th>{{$item->nom}}</th>
            <th>{{$item->prenom}}</th>
            @if ( $role === 0 )
                <th><a href="{{route('CDM' ,$item->Uid)}}">Ouvrir un dossier medicale</a></th>
                <th><a href="{{ route('SeeCDM',$item->Uid)}}">Voir L'historique</a></th>{{-- CDM : Contenue du dosseri medicale --}}
                @else
                <th>{{$item->Objet}}</th>
                <th>
                    <form action="{{route('uploadFile')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="pdf">
                        <input type="text" name="RAid" value="{{$item->RAid}}" hidden>
                        <button type="submit">Upload</button>
                    </form>
                </th>
            @endif
        </tr>
        @endforeach
</table>