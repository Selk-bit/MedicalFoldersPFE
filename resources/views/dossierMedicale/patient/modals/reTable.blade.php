

<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Specialite</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="recontent">
  @isset($Redirection)
  @foreach ($Redirection as $key => $item)
  @if($item->isDeleted == 0)
  <tr class="trre">
  <td data-label='ID'><input id="j" value="{{$item->id}}" disabled></td>
  <td data-label='Spécialité'><input value="{{$item->nomSpecialite}}" disabled></td>
  <td data-label='Description'><textarea class='d'>{{$item->description}}</textarea ></td>
  <td data-label='Action'><button class="btnsre btn btn-outline-danger">Supprimer</button></td>
  </tr>
  @endif
  @endforeach	
  @endisset
  </tbody>
</table>