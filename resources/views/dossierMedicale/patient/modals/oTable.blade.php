

<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody id="ocontent">
  @isset($Ordennance)
  @foreach ($Ordennance as $key => $item)
  @if($item->isDeleted == 0)
  <tr class="tro">
  <td data-label='ID'><input id="l" value="{{$item->id}}" disabled></td>
  <td data-label='Description'><textarea class='d'>{{$item->medicamentsModeEmploi}}</textarea ></td>
  <td data-label='Action'><button class="btnso btn btn-outline-danger">Supprimer</button></td>
  </tr>
  @endif
  @endforeach	
  @endisset
  </tbody>
</table>