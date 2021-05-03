

<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Type</th>
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="racontent">
  @isset($RadioAnalyse)
      @foreach ($RadioAnalyse as $key => $item)
            @if($item->isDeleted == 0)
                    <tr class="trra">
                      <td data-label='ID'><input id="k" value="{{$item->id}}" disabled></td>
                    
                @if($item->etat == 0)    
                      @if($item->type == 0)
                          <td data-label='Type'><select class='ty' ><option value="0">Analyse</option><option value="1">Radio</option></select></td>
                      @else
                          <td data-label='Type'><select class='ty' ><option value="1">Radio</option><option value="0">Analyse</option></select></td>
                      @endif
                      
                        <td data-label='Titre'><input value="{{$item->titre}}" class='t'></td>
                        <td data-label='Description'><textarea class='d'>{{$item->description}}</textarea ></td>
                        <td data-label='Action'><button class="btns btn btn-outline-danger" >Supprimer</button></td>
                      </tr>
                      <tr>
              @else
                @if($item->type == 0)
                            <td data-label='Type'><select class='ty' disabled><option value="0" >Analyse</option><option value="1">Radio</option></select ></td>
                        @else
                            <td data-label='Type'><select class='ty' disabled><option value="1">Radio</option><option value="0">Analyse</option></select ></td>
                        @endif
                        
                          <td data-label='Titre'><input value="{{$item->titre}}" class='t' disabled></td>
                          <td data-label='Description'><textarea class='d' disabled>{{$item->description}}</textarea ></td>
                          <!-- <td data-label='Action'><button class="btns btn btn-outline-danger" >Supprimer</button></td> -->
                          <td data-label='Action'><p>Dismissed</p>

                        </tr>
                        <tr>
              @endif


                    <td>Donwload</td>
                      @isset($files)
                        @foreach ($files as $key => $fl)
                        @if($fl->isDeleted == 0)
                        @if($item->id == $fl->radioAnalyse_id)
                          <td><input id="idrd" value="{{$fl->radioAnalyse_id}}" hidden><a id="rdr" href="{{$fl->src}}">Voir et Telecharger</a></td>
                        @endif
                        @endif
                        @endforeach	
                      @endisset
                    </tr>
            @endif
      @endforeach	
  @endisset

  </tbody>
</table>