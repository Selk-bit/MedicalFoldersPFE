
<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Type</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody id="ccccontent">
  @isset($Controle)
  @foreach ($Controle as $key => $item)
  @if($item->isDeleted == 0)
  <tr class="trccc">
  <td data-label='ID'><input id="i" value="{{$item->id}}" disabled></td>
  @if($item->type == 0)
  <td data-label='Type'><select class='ty' ><option value="0">Controle</option><option value="1">Consultation</option></select></td>
  @else
  <td data-label='Type'><select class='ty' ><option value="1">Consultation</option><option value="0">Controle</option></select></td>
  @endif
  <td data-label='Date'><input type="date" value="{{$item->dateControleConsultation}}" class='t'></td>
  <td data-label='Action'><button class="btnsc btn btn-outline-danger">Supprimer</button></td>
  </tr>
  @endif
  @endforeach	
  @endisset
  </tbody>
</table>